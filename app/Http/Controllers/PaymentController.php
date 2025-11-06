<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Midtrans\Config;
use Midtrans\Snap;
use App\Models\Booking;

class PaymentController extends Controller
{
    public function createTransaction($booking_id)
    {
        $booking = Booking::findOrFail($booking_id);
        $service = $booking->service;

        // Midtrans configuration
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = config('midtrans.is_sanitized');
        Config::$is3ds = config('midtrans.is_3ds');

        // ✅ FIX duplicate order ID by making it unique
        $orderId = 'BOOK-' . $booking->id . '-' . uniqid();

        $params = [
            'transaction_details' => [
                'order_id' => $orderId,
                'gross_amount' => $service->price,
            ],
            'customer_details' => [
                'first_name' => Auth::user()->name,
                'email' => Auth::user()->email,
                'phone' => Auth::user()->phone,
            ],
            'item_details' => [[
                'id' => $service->id,
                'price' => $service->price,
                'quantity' => 1,
                'name' => $service->name,
            ]],
        ];

        // Create SNAP token
        $snapToken = Snap::getSnapToken($params);

        return view('home.payment', compact('snapToken', 'booking', 'service'));
    }


    public function callback(Request $request)
    {
        $serverKey = config('midtrans.server_key');

        // Validate signature
        $hashed = hash('sha512',
            $request->order_id .
            $request->status_code .
            $request->gross_amount .
            $serverKey
        );

        if ($hashed !== $request->signature_key) {
            return response()->json(['status' => 'invalid signature'], 403);
        }

        // ✅ Extract booking ID from unique order_id
        // Example: BOOK-5-65f822d123 → raw = 5-65f822d123 → bookingId = 5
        $raw = str_replace('BOOK-', '', $request->order_id);
        $bookingId = explode('-', $raw)[0];

        $booking = Booking::find($bookingId);

        if (!$booking) {
            return response()->json(['status' => 'booking not found'], 404);
        }

        // ✅ Update status based on Midtrans status
        switch ($request->transaction_status) {
            case 'capture':
            case 'settlement':
                $booking->update(['status' => 'approved']);
                break;

            case 'pending':
                $booking->update(['status' => 'pending']);
                break;

            case 'deny':
            case 'cancel':
            case 'expire':
                $booking->update(['status' => 'cancelled']);
                break;
        }

        return response()->json(['status' => 'success']);
    }


    public function success()
    {
        return view('home.payment-success');
    }

    public function failed()
    {
        return view('home.payment-failed');
    }
}
