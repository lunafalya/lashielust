<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;


class AdminBookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::with(['user', 'service'])
            ->orderBy('created_at', 'desc')
            ->get();

        $totalOrders = $bookings->count();
        $pendingBookings = $bookings->where('status', 'pending');
        $doneBookings = $bookings->where('status', 'approved');
        $cancelledBookings = $bookings->where('status', 'cancelled');

        return view('admin.booking', compact('bookings', 'totalOrders', 'pendingBookings', 'doneBookings', 'cancelledBookings'));
    }
}
