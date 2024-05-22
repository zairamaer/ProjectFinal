<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PropertyController extends Controller
{
    /**
     * Display a listing of the properties.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $location = $request->input('location');
        $properties = $location 
            ? Property::where('location', $location)->get() 
            : Property::all();

        $locations = Property::distinct()->pluck('location')->filter()->toArray();

        return view('users.properties.index', compact('properties', 'locations'));
    }

    /**
     * Display the specified property.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $property = Property::findOrFail($id);
        return view('users.properties.show', compact('property'));
    }

    /**
     * Filter properties by location.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function filterByLocation(Request $request)
    {
        return $this->index($request);
    }

    /**
     * Book a property.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function book(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'check_in' => 'required|date|after_or_equal:today',
            'check_out' => 'required|date|after:check_in',
        ]);
    
        // Find the property
        $property = Property::findOrFail($id);
    
        // Check for existing bookings overlapping with the requested date range
        $conflictingBookings = Booking::where('property_id', $property->id)
            ->where(function ($query) use ($request) {
                $query->where('check_in', '<=', $request->check_out)
                      ->where('check_out', '>=', $request->check_in);
            })
            ->exists();
    
        if ($conflictingBookings) {
            return redirect()->back()->withErrors('Another booking already exists within the requested date range.');
        }
    
        // Create a new booking
        $booking = new Booking([
            'user_id' => Auth::id(),
            'property_id' => $property->id,
            'check_in' => $request->check_in,
            'check_out' => $request->check_out,
        ]);
        $booking->save();
    
        // Redirect back with success message
        return redirect()->back()->with('success', 'Property booked successfully.');
    }
}
