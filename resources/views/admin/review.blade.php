@extends('layouts.admin')
@php
    $user = Auth::user();
@endphp

@section('content')

<div class="row mb-2">
    
    <div class="col-lg-6 mb-4">
        <div class="card card-content-bg p-4 h-100">
            <h3 class="fw-bold mb-4">Users Rating</h3>

            <div class="d-flex align-items-center mb-3">
                <div class="me-5 text-center">
                    <p class="display-3 fw-bold mb-0">
                        {{ number_format($averageRating, 2) }}
                    </p>

                    <div class="rating mb-2">
                        @for ($i = 1; $i <= 5; $i++)
                            <i class="fa-solid fa-star {{ $i <= floor($averageRating) ? '' : ($i - $averageRating < 1 ? 'fa-star-half-alt' : 'inactive') }}"></i>
                        @endfor
                    </div>

                    <small class="text-muted">Total {{ $totalReviews }} reviews</small>
                </div>
                
                <div class="flex-grow-1">
                    @foreach (array_reverse($ratingPercentages, true) as $star => $percent)
                        <div class="d-flex align-items-center mb-2">
                            <span class="fw-medium me-3" style="width: 60px;">{{ $star }} Star</span>
                            <div class="progress flex-grow-1" style="height: 10px; background-color: #e9ecef;">
                                <div class="progress-bar"
                                    role="progressbar"
                                    style="width: {{ $percent }}%; background-color: #fcd881;"
                                    aria-valuenow="{{ $percent }}"
                                    aria-valuemin="0"
                                    aria-valuemax="100">
                                </div>
                            </div>
                            <span class="ms-2 text-muted small">{{ $percent }}%</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-lg-6 mb-4">
        <div class="card card-content-bg p-4 h-100">
            <h3 class="fw-bold mb-4">Reviews Statistics</h3>
            
            <div class="chart-container" style="height: 100px;">
                <p class="text-muted text-center mb-1">Weekly Report</p>
                <div class="d-flex justify-content-around align-items-end h-100 pb-2" style="gap: 5px;">
                    @php $weekly_data = [20, 30, 70, 40, 90, 100, 80]; $labels = ['M', 'T', 'W', 'T', 'F', 'S', 'S']; @endphp
                    @foreach($weekly_data as $index => $height)
                        <div class="text-center">
                            <div style="width: 15px; height: {{ $height }}%; background-color: #fcd881; border-radius: 3px;"></div>
                            <small class="text-muted">{{ $labels[$index] }}</small>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card card-content-bg p-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold mb-0">Manage Rating and Reviews</h3>
        <div class="d-flex align-items-center">
            <span class="text-muted me-3">10</span>
            <span class="fw-bold me-3">All</span>
            <button class="btn btn-sm btn-export" style="background-color: #fcd881; color: #333; font-weight: bold;">Export</button>
        </div>
    </div>
    
    <div class="review-list">
    @foreach ($reviews as $review)
        <div class="d-flex border-bottom py-3 align-items-center">
            <img src="{{ asset('storage/' . ($review->user->profile_photo ?? 'img/image.png')) }}"
                alt="Service Image"
                class="rounded-circle me-3"
                style="width: 50px; height: 50px; object-fit: cover;">

            <div>
                <p class="fw-medium mb-1">{{ $review->service->name}} - {{ $review->service->type }}</p>
                <small class="d-block mb-1 text-muted">{{ $review->service->category }}</small>
                <small class="d-block mb-1 text-muted">Customer: {{ $review->user->name }}</small>
                <div class="rating">
                    @for($i = 1; $i <= 5; $i++)
                        <i class="fa-solid fa-star {{ $i <= $review->rating ? '' : 'inactive' }}"></i>
                    @endfor
                </div>
                <p class="mb-0 small text-dark">{{ $review->review_text }}</p>
            </div>
        </div>
    @endforeach
</div>

</div>

@endsection