<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Review;
use Carbon\Carbon;

class AdminNotificationController extends Controller
{
    public function index()
    {
        // Ambil 10 booking terbaru
        $bookings = Booking::with('service')
            ->orderBy('created_at', 'desc')
            ->take(10)
            ->get()
            ->map(function ($booking) {
                return [
                    'type' => 'booking',
                    'message' => 'Booking masuk untuk "' . ($booking->service->name ?? '-') . '" pukul "' .
                                 $booking->booking_time . '" tanggal ' . Carbon::parse($booking->booking_date)->format('d F Y'),
                    'created_at' => $booking->created_at,
                ];
            });

        // Ambil 10 review terbaru
        $reviews = Review::with('service')
            ->orderBy('created_at', 'desc')
            ->take(10)
            ->get()
            ->map(function ($review) {
                return [
                    'type' => 'review',
                    'message' => 'Ulasan bintang ' . $review->rating . ' diterima untuk "' . ($review->service->name ?? '-') . '"',
                    'created_at' => $review->created_at,
                ];
            });

        // Gabungkan booking dan review lalu urutkan berdasarkan waktu
        $notifications = $bookings->merge($reviews)->sortByDesc('created_at')->take(10);

        return view('admin.notifications', compact('notifications'));
    }
}
