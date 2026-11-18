<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $bookings = $user
            ? Booking::where('user_id', $user->id)->latest()->get()
            : collect();

        return view('welcome', compact('user', 'bookings'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'car_name' => 'required|string|max:255',
            'pickup_location' => 'required|string|max:255',
            'start_time' => 'required|date',
            'return_time' => 'required|date|after_or_equal:start_time',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:30',
        ]);

        $user = Auth::user();

        $booking = Booking::create([
            'user_id' => $user ? $user->id : null,
            'car_name' => $validated['car_name'],
            'email' => $validated['email'] ?? ($user ? $user->email : 'Not provided'),
            'phone' => $validated['phone'] ?? ($user ? $user->phone : 'Not provided'),
            'pickup_location' => $validated['pickup_location'],
            'start_time' => $validated['start_time'],
            'return_time' => $validated['return_time'],
            'driver_phone' => '+880 1712-345678',
            'status' => 'confirmed',
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Rent Hour Successful!',
            'booking' => $booking,
        ]);
    }

    public function myBookings()
    {
        $user = Auth::user();
        $bookings = $user
            ? Booking::where('user_id', $user->id)->latest()->get()
            : Booking::latest()->take(10)->get();

        return response()->json([
            'status' => 'success',
            'bookings' => $bookings,
        ]);
    }
}
