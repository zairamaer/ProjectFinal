<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Booking;

class UserBookingController extends Controller
{
    /**
     * Display all bookings of the authenticated user.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Retrieve all bookings of the authenticated user
        $bookings = Booking::where('user_id', Auth::id())->get();

        // Return the bookings to the view
        return view('user_bookings.index', compact('bookings'));
    }
}
