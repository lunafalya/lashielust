<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Service;
use App\Models\Booking;
use App\Models\Review;

class ReviewController extends Controller
{
    public function create($booking_id) {
        $booking = Booking::with('service')->findOrFail($booking_id);
        return view('home.review', compact('booking'));
    }

    public function store(Request $request)
    {
        Review::create([
            'user_id' => Auth::id(),
            'service_id' => $request->service_id,
            'booking_id' => $request->booking_id,
            'rating' => $request->rating_value,
            'review_text' => $request->review_text,
        ]);

        return redirect()->route('services.show', $request->service_id)->with('success', 'Review added!');
    }
}
