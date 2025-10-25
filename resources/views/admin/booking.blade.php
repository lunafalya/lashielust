@php
    $user = Auth::user();
@endphp
@extends('layouts.admin')

@section('content')
<h1 class="fw-bold mb-4">BOOKING MANAGEMENT</h1>
    <div class="col-12">
<div class="card card-content-bg p-4">

    @if(session('success'))
        <div class="alert alert-success text-center fade show" role="alert" id="success-alert">
            {{ session('success') }}
        </div>
        <script>
            setTimeout(() => {
                document.getElementById('success-alert').style.display = 'none';
            }, 3000);
        </script>
    @endif

    <ul class="nav nav-tabs border-0 mb-4" id="bookingTabs" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link fw-bold active" id="all-tab" data-bs-toggle="tab"
                data-bs-target="#all" type="button" role="tab" aria-controls="all"
                aria-selected="true">All</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link fw-bold" id="done-tab" data-bs-toggle="tab"
                data-bs-target="#done" type="button" role="tab" aria-controls="done"
                aria-selected="false">Done</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link fw-bold" id="pending-tab" data-bs-toggle="tab"
                data-bs-target="#pending" type="button" role="tab" aria-controls="pending"
                aria-selected="false">Pending</button>
        </li>
    </ul>

    <div class="tab-content" id="bookingTabsContent">

        <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="text-secondary small fw-medium text-uppercase">
                        <tr>
                            <th>ID</th>
                            <th>User</th>
                            <th>Service</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($bookings as $booking)
                            <tr>
                                <td class="fw-bold text-muted">{{ $booking->id }}</td>
                                <td>{{ $booking->user->email ?? '-' }}</td>
                                <td>{{ $booking->service->name ?? '-' }}</td>
                                <td>{{ \Carbon\Carbon::parse($booking->booking_date)->format('d-m-Y') }}</td>
                                <td>{{ $booking->booking_time }}</td>
                                <td>
                                    @if ($booking->status == 'pending')
                                        <span class="badge" style="background-color: #fcd881; color: #333;">Pending</span>
                                    @elseif ($booking->status == 'approved')
                                        <span class="badge text-white" style="background-color: #63d471;">Approved</span>
                                    @else
                                        <span class="badge bg-secondary">{{ ucfirst($booking->status) }}</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted py-3">No bookings found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        


        <div class="tab-pane fade" id="done" role="tabpanel" aria-labelledby="done-tab">
            <div class="booking-cards-list">
                @forelse ($doneBookings as $booking)
                    <div class="card p-3 mb-3 shadow-sm border-0">
                        <div class="d-flex justify-content-between align-items-start">
                            <div class="flex-grow-1">
                                <p class="fw-medium mb-1" style="color: #694F3C;">{{ $booking->user->email }}</p>
                            </div>
                            <div class="text-end">
                                <span class="badge fw-bold text-white" style="background-color: #63d471;">Done</span>
                                <p class="text-muted small mb-0">
                                    {{ \Carbon\Carbon::parse($booking->booking_date)->format('d-m-Y') }},
                                    {{ $booking->booking_time }}
                                </p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mt-2">
                            <img src="{{ asset('storage/' . $booking->service->file_path) }}"
                                alt="Service Image"
                                class="rounded me-3"
                                style="width: 60px; height: 60px; object-fit: cover; background-color: #f7f3e8; padding: 5px;">

                                <p class="fw-bold mb-0">{{ $booking->service->name ?? '-' }}</p>
                                <small class="text-muted d-block">ID: {{ $booking->id }}</small>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-muted text-center py-4">No completed bookings found.</p>
                @endforelse
            </div>
        </div>

        <div class="tab-pane fade" id="pending" role="tabpanel" aria-labelledby="pending-tab">
            <div class="booking-cards-list">
                @forelse ($pendingBookings as $booking)
                    <div class="card p-3 mb-3 shadow-sm border-0">
                        <div class="d-flex justify-content-between align-items-start">
                            <div class="flex-grow-1">
                                <p class="fw-medium mb-1" style="color: #694F3C;">{{ $booking->user->email }}</p>
                            </div>
                            <div class="text-end">
                                <span class="badge fw-bold" style="background-color: #fcd881; color: #333;">Pending</span>
                                <p class="text-muted small mb-0">
                                    {{ \Carbon\Carbon::parse($booking->booking_date)->format('d-m-Y') }},
                                    {{ $booking->booking_time }}
                                </p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mt-2">
                            <img src="{{ asset('storage/' . $booking->service->file_path) }}"
                                alt="Service Image"
                                class="rounded me-3"
                                style="width: 60px; height: 60px; object-fit: cover; background-color: #f7f3e8; padding: 5px;">

                            <div class="flex-grow-1">
                                <p class="fw-bold mb-0">{{ $booking->service->name ?? '-' }}</p>
                                <small class="text-muted d-block">ID: {{ $booking->id }}</small>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-muted text-center py-4">No pending bookings found.</p>
                @endforelse
            </div>
            </div>
        </div>
    </div>


@endsection