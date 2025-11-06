<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Service;
use App\Models\Booking;

class BookingController extends Controller
{
    public function create($id)
{
    $service = Service::findOrFail($id);
    $user = auth()->user();

    return view('home.booking', compact('service', 'user'));
}

    public function store(Request $request)
    {
        $request->validate([
            'service_id' => 'required',
            'booking_date' => 'required|date',
            'booking_time' => 'required',
            'notes' => 'nullable',
        ]);

        // ✅ Prevent double booking on same date & same time slot
        $exists = Booking::where('service_id', $request->service_id)
            ->where('booking_date', $request->booking_date)
            ->where('booking_time', $request->booking_time)
            ->where('status', '!=', 'cancelled') // cancelled can be reused
            ->exists();

        if ($exists) {
            return back()
                ->withErrors(['booking_time' => 'This time slot is already booked. Please choose another time.'])
                ->withInput();
        }

        // ✅ Create booking
        $booking = Booking::create([
            'user_id' => auth()->id(),
            'service_id' => $request->service_id,
            'booking_date' => $request->booking_date,
            'booking_time' => $request->booking_time,
            'notes' => $request->notes,
            'status' => 'pending',
        ]);

        return redirect()->route('payment.createPage', ['booking_id' => $booking->id]);
    }

    public function history()
    {
        $user = auth()->user();

        $bookings = Booking::with(['service', 'review']) // include service & review
            ->where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('home.history', compact('bookings'));
    }

    public function checkBookedSlots(Request $request)
{
    $request->validate([
        'service_id' => 'required',
        'booking_date' => 'required|date',
    ]);

    $booked = Booking::where('service_id', $request->service_id)
        ->where('booking_date', $request->booking_date)
        ->where('status', '!=', 'cancelled')
        ->pluck('booking_time');

    return response()->json($booked);
}

}
