<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Midtrans\Config;
use Midtrans\Snap;
use App\Models\User;
use App\Models\Booking;
use App\Models\Service;

class PaymentController extends Controller
{
public function createTransaction($booking_id)
{
    $booking = Booking::findOrFail($booking_id);
    $service = $booking->service;

    Config::$serverKey = config('midtrans.server_key');
    Config::$isProduction = config('midtrans.is_production');
    Config::$isSanitized = config('midtrans.is_sanitized');
    Config::$is3ds = config('midtrans.is_3ds');

    $params = [
        'transaction_details' => [
            'order_id' => 'BOOK-' . uniqid(),
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

    $snapToken = Snap::getSnapToken($params);

    return view('home.payment', compact('snapToken', 'booking', 'service'));
}


    public function callback(Request $request)
    {
        $serverKey = config('midtrans.server_key');
        $hashed = hash('sha512',
            $request->order_id . $request->status_code . $request->gross_amount . $serverKey
        );

        if ($hashed === $request->signature_key) {
            $bookingId = str_replace('BOOK-', '', $request->order_id);
            $booking = \App\Models\Booking::find($bookingId);

            if ($booking) {
                if ($request->transaction_status == 'capture' || $request->transaction_status == 'settlement') {
                    $booking->update(['status' => 'paid']);
                } elseif ($request->transaction_status == 'pending') {
                    $booking->update(['status' => 'pending']);
                } elseif ($request->transaction_status == 'deny' || $request->transaction_status == 'cancel' || $request->transaction_status == 'expire') {
                    $booking->update(['status' => 'failed']);
                }
            }
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
