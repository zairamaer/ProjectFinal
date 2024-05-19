<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class AdminBookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::with('user', 'property')->get();
        return view('admin.bookings.index', compact('bookings'));
    }

    public function updateStatus(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);

        // Validate the request data
        $request->validate([
            'status' => 'required|in:pending,approved,declined', // Ensure the status value is one of the predefined enum values
        ]);

        // Update the status column
        $booking->status = $request->status; // Make sure $request->status is one of 'pending', 'approved', or 'decline'
        $booking->save();

        return redirect()->route('admin.bookings.index')->with('success', 'Booking approved successfully.');

    }
}
