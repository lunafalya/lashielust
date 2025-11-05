<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Booking;
use App\Models\User;
use Carbon\Carbon;
use App\Models\Review;

class AdminController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $bookings = Booking::with(['user', 'service'])
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();
        
        $bookingNotifications = Booking::with('service')
        ->orderBy('created_at', 'desc')
        ->take(3)
        ->get()
        ->map(function ($booking) {
            return [
                'type' => 'booking',
                'message' => 'Booking masuk untuk "' . ($booking->service->name ?? '-') . '" pukul "' .
                            $booking->booking_time . '" tanggal ' .
                            Carbon::parse($booking->booking_date)->format('d F Y'),
                'created_at' => $booking->created_at,
            ];
        });

        $reviewNotifications = Review::with('service')
        ->orderBy('created_at', 'desc')
        ->take(3)
        ->get()
        ->map(function ($review) {
            return [
                'type' => 'review',
                'message' => 'Ulasan bintang ' . $review->rating . ' diterima untuk "' .
                            ($review->service->name ?? '-') . '"',
                'created_at' => $review->created_at,
            ];
        });

        $notifications = $bookingNotifications->merge($reviewNotifications)
        ->sortByDesc('created_at')
        ->take(3);

        $totalOrders = $bookings->count();
        $totalUang = 0;

        foreach ($bookings as $booking) {
            $totalUang += ($booking->service->price);
        }

        return view('admin.dashboard', compact('user', 'bookings', 'totalOrders', 'totalUang', 'notifications','notifications'));
    }

}