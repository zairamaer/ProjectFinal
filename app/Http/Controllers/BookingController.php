<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Booking;

class BookingController extends Controller
{
    /**
     * Display a listing of the user's bookings.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Retrieve the authenticated user's bookings
        $bookings = Booking::where('user_id', Auth::id())->with('property')->get();

        // Return the bookings to the view
        return view('bookings', compact('bookings'));
    }
}
