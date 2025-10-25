<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Review;

class AdminReviewController extends Controller
{
        public function index()
    {

    $user = auth()->user();

    $reviews = Review::with(['user', 'booking.service'])
        ->orderBy('created_at', 'desc')
        ->get();

    $averageRating = $reviews->avg('rating') ?? 0;

    $totalReviews = $reviews->count();

    $ratingCounts = [];
    for ($i = 1; $i <= 5; $i++) {
        $ratingCounts[$i] = $reviews->where('rating', $i)->count();
    }

    $ratingPercentages = [];
    foreach ($ratingCounts as $star => $count) {
        $ratingPercentages[$star] = $totalReviews > 0 ? round(($count / $totalReviews) * 100, 1) : 0;
    }

    return view('admin.review', compact(
        'reviews',
        'averageRating',
        'totalReviews',
        'ratingPercentages'
    ));
}
}