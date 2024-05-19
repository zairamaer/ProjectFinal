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
        if ($request->has('location') && $request->input('location')) {
            $properties = Property::where('location', $request->input('location'))->get();
        } else {
            $properties = Property::all();
        }
        
        $locations = Property::pluck('location')->unique()->filter()->toArray();
    
        return view('properties.index', compact('properties', 'locations'));
    }    

        /**
     * Display the specified property.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Retrieve the property details from the database
        $property = Property::findOrFail($id);

        // Return the property details to the view
        return view('properties.show', compact('property'));
    }

    /**
     * Filter properties by location.
     *
     * @param  string  $location
     * @return \Illuminate\Http\Response
     */
    public function filterByLocation(Request $request)
    {
        $location = $request->input('location');
        $properties = Property::where('location', $location)->get();
        $locations = Property::distinct('location')->pluck('location');
        return view('properties.index', compact('properties', 'locations'));
    }

    public function book(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'check_in' => 'required|date',
            'check_out' => 'required|date|after:check_in',
        ]);
    
        // Find the property
        $property = Property::findOrFail($id);
    
        // Check for existing bookings overlapping with the requested date range
        $conflictingBookings = Booking::where('property_id', $property->id)
            ->where(function ($query) use ($request) {
                $query->where(function ($query) use ($request) {
                    $query->where('check_in', '>=', $request->check_in)
                          ->where('check_in', '<', $request->check_out);
                })
                ->orWhere(function ($query) use ($request) {
                    $query->where('check_out', '>', $request->check_in)
                          ->where('check_out', '<=', $request->check_out);
                });
            })
            ->exists();
    
        if ($conflictingBookings) {
            return redirect()->back()->withErrors('Another booking already exists within the requested date range.');
        }
    
        // Create a new booking
        $booking = new Booking();
        $booking->user_id = Auth::id(); // Assign the authenticated user's id
        $booking->property_id = $property->id;
        $booking->check_in = $request->check_in;
        $booking->check_out = $request->check_out;
        // Add more fields to the booking as needed
        $booking->save();
    
        // Redirect back with success message
        return redirect()->back()->with('success', 'Property booked successfully.');
    }    
}
