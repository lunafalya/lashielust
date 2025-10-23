@php
    $user = Auth::user();
@endphp
@extends('layouts.admin')

@section('content')

{{-- Tambahkan Judul Halaman --}}
<h1 class="fw-bold mb-4">BOOKING MANAGEMENT</h1>

<div class="card card-content-bg p-4">

    @php
        // Data Dummy Lengkap yang disatukan
        $fullBookings = [
            // Data 1: Pending
            ['id' => '0000', 'email' => 'belibeli123@gmail.com', 'service' => 'Nail Art', 'type' => 'Basic', 'price' => 'Rp.10.000', 'date' => '23-10-2024', 'time' => '15:24', 'status' => 'Pending', 'display_status' => 'Pending', 'img' => 'images/service_nail_art.png'],
            // Data 2: Pending
            ['id' => '0001', 'email' => 'customer_x@mail.com', 'service' => 'Lash Lift', 'type' => '12mm', 'price' => 'Rp.30.000', 'date' => '23-10-2024', 'time' => '16:00', 'status' => 'Pending', 'display_status' => 'Pending', 'img' => 'images/service_lash_lift.png'],
            // Data 3: Completed
            ['id' => '0002', 'email' => 'a@gmai.com', 'service' => 'Nail Art', 'type' => '3d', 'price' => 'Rp.15.000', 'date' => '23-10-2024', 'time' => '11:00', 'status' => 'Completed', 'display_status' => 'Done', 'img' => 'images/service_nail_art.png'],
            // Data 4: Completed
            ['id' => '0003', 'email' => 'hohopopp@mail.com', 'service' => 'Eyelash', 'type' => '14mm', 'price' => 'Rp.15.000', 'date' => '23-10-2024', 'time' => '09:00', 'status' => 'Completed', 'display_status' => 'Done', 'img' => 'images/service_lash_lift.png'],
        ];

        // Memisahkan data untuk tab Done dan Pending (menggunakan status Completed/Pending)
        $pendingBookings = array_filter($fullBookings, fn($b) => $b['status'] == 'Pending');
        $doneBookings = array_filter($fullBookings, fn($b) => $b['status'] == 'Completed');
    @endphp

    <ul class="nav nav-tabs border-0 mb-4" id="bookingTabs" role="tablist">
        <li class="nav-item" role="presentation">
            {{-- Default aktif di ALL --}}
            <button class="nav-link fw-bold active" id="all-tab" data-bs-toggle="tab" data-bs-target="#all" type="button" role="tab" aria-controls="all" aria-selected="true">All</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link fw-bold" id="done-tab" data-bs-toggle="tab" data-bs-target="#done" type="button" role="tab" aria-controls="done" aria-selected="false">Done</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link fw-bold" id="pending-tab" data-bs-toggle="tab" data-bs-target="#pending" type="button" role="tab" aria-controls="pending" aria-selected="false">Pending</button>
        </li>
    </ul>

    <div class="tab-content" id="bookingTabsContent">
        
        <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="text-secondary small fw-medium text-uppercase">
                        <tr>
                            <th scope="col" style="width: 50px;">ID</th>
                            <th scope="col">Email</th>
                            <th scope="col">Service</th>
                            <th scope="col">Type</th>
                            <th scope="col">Price</th>
                            <th scope="col">Time</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($fullBookings as $booking)
                            <tr>
                                <td class="fw-bold text-muted">{{ $booking['id'] }}</td>
                                <td>{{ $booking['email'] }}</td>
                                <td>{{ $booking['service'] }}</td>
                                <td>{{ $booking['type'] }}</td>
                                <td>{{ $booking['price'] }}</td>
                                <td>{{ $booking['date'] }} ({{ $booking['time'] }})</td>
                                <td>
                                    @if ($booking['status'] == 'Pending')
                                        <span class="badge" style="background-color: #fcd881; color: #333; font-weight: bold;">Pending</span>
                                    @elseif ($booking['status'] == 'Completed')
                                        <span class="badge text-white" style="background-color: #63d471; font-weight: bold;">Completed</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        
        <div class="tab-pane fade" id="done" role="tabpanel" aria-labelledby="done-tab">
            <div class="booking-cards-list">
                @forelse ($doneBookings as $booking)
                    {{-- START: Desain Kartu Langsung --}}
                    <div class="card p-3 mb-3" style="border: none; box-shadow: 0 2px 4px rgba(0,0,0,0.05);">
                        <div class="d-flex justify-content-between align-items-start">
                            <div class="flex-grow-1">
                                <p class="fw-medium mb-1" style="color: #694F3C;">{{ $booking['email'] }}</p>
                            </div>
                            <div class="text-end">
                                <span class="badge fw-bold text-white" style="background-color: #63d471;">Done</span>
                                <p class="text-muted small mb-0">{{ $booking['date'] }}, {{ $booking['time'] }}</p>
                            </div>
                        </div>
                        
                        <div class="d-flex align-items-center mt-2">
                            <img src="{{ asset($booking['img']) }}" alt="Service Image" class="rounded me-3" style="width: 60px; height: 60px; object-fit: cover; background-color: #f7f3e8; padding: 5px;">
                            
                            <div class="flex-grow-1">
                                <p class="fw-bold mb-0">{{ $booking['service'] }}</p>
                                <small class="text-muted d-block">ID: {{ $booking['id'] }}</small>
                            </div>
                            
                            <div class="text-end ms-auto">
                                <small class="text-muted d-block">Total</small>
                                <p class="fw-bold mb-0" style="color: #333;">{{ $booking['price'] }}</p>
                            </div>
                        </div>
                    </div>
                    {{-- END: Desain Kartu Langsung --}}
                @empty
                    <p class="text-muted text-center py-4">Tidak ada pesanan yang sudah Selesai (Done).</p>
                @endforelse
            </div>
        </div>
        
        <div class="tab-pane fade" id="pending" role="tabpanel" aria-labelledby="pending-tab">
            <div class="booking-cards-list">
                @forelse ($pendingBookings as $booking)
                    {{-- START: Desain Kartu Langsung --}}
                    <div class="card p-3 mb-3" style="border: none; box-shadow: 0 2px 4px rgba(0,0,0,0.05);">
                        <div class="d-flex justify-content-between align-items-start">
                            <div class="flex-grow-1">
                                <p class="fw-medium mb-1" style="color: #694F3C;">{{ $booking['email'] }}</p>
                            </div>
                            <div class="text-end">
                                <span class="badge fw-bold" style="background-color: #fcd881; color: #333;">Pending</span>
                                <p class="text-muted small mb-0">{{ $booking['date'] }}, {{ $booking['time'] }}</p>
                            </div>
                        </div>
                        
                        <div class="d-flex align-items-center mt-2">
                            <img src="{{ asset($booking['img']) }}" alt="Service Image" class="rounded me-3" style="width: 60px; height: 60px; object-fit: cover; background-color: #f7f3e8; padding: 5px;">
                            
                            <div class="flex-grow-1">
                                <p class="fw-bold mb-0">{{ $booking['service'] }}</p>
                                <small class="text-muted d-block">ID: {{ $booking['id'] }}</small>
                            </div>
                            
                            <div class="text-end ms-auto">
                                <small class="text-muted d-block">Total</small>
                                <p class="fw-bold mb-0" style="color: #333;">{{ $booking['price'] }}</p>
                            </div>
                        </div>
                    </div>
                    {{-- END: Desain Kartu Langsung --}}
                @empty
                    <p class="text-muted text-center py-4">Tidak ada pesanan yang masih Tertunda (Pending).</p>
                @endforelse
            </div>
        </div>

    </div>
    
</div>

@endsection