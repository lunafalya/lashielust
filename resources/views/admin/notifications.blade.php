@extends('layouts.admin')
@php
    $user = Auth::user();
@endphp

@section('content')

<div class="card mb-5 card-content-bg p-4">
    
    <h1 class="fw-bold mb-4">NOTIFICATION</h1>
    
    <div class="d-flex align-items-center mb-4">
        
        <div class="input-group me-3" id="startDateWrapper" style="width: 150px;">
            <input type="text" id="startDatePicker" class="form-control text-center" placeholder="mm / dd / yy" value="" data-input>
            
            <span class="input-group-text datepicker-icon" data-toggle> 
                <i class="fas fa-calendar-alt"></i>
            </span>
        </div>
        
    </div>
    
    <hr class="mb-4">
    
<table class="table table-hover mb-0 align-middle">
            <tbody>
                @forelse ($notifications as $index => $notification)
                    <tr>
                        <td class="fw-bold align-middle" style="width: 50px;">{{ $index + 1 }}</td>

                        <td class="align-middle">
                            @if ($notification['type'] === 'booking')
                                <i class="fas fa-box fa-lg me-3 text-dark"></i>
                            @else
                                <i class="fas fa-comment-dots fa-lg me-3 text-dark"></i>
                            @endif

                            <span class="fw-medium">
                                @if ($notification['type'] === 'booking')
                                    Booking masuk
                                @else
                                    Ulasan diterima
                                @endif
                            </span>
                            – {!! $notification['message'] !!}
                        </td>

                        <td class="text-muted text-end align-middle" style="width: 150px;">
                            {{ \Carbon\Carbon::parse($notification['created_at'])->diffForHumans() }}
                        </td>

                        <!-- <td class="text-end align-middle" style="width: 160px;">
                            <button class="btn btn-sm" style="background-color: #fcd881; color: #333; font-weight: bold;">
                                Mark as Read
                            </button>
                        </td> -->
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center text-muted py-4">No notifications yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        flatpickr("#startDateWrapper", { 
            dateFormat: "m / d / y",
            wrap: true, 
            
        });
    });
</script>
@endsection