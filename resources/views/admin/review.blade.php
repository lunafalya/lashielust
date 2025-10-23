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
                    <p class="display-3 fw-bold mb-0">4.95</p>
                    <div class="text-warning mb-1">
                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>
                    </div>
                    <small class="text-muted">Total 187 reviews</small>
                </div>
                
                <div class="flex-grow-1">
                    @php
                        $ratings = [
                            '5 Star' => 90, // Nilai persentase (Contoh)
                            '4 Star' => 50,
                            '3 Star' => 20,
                            '2 Star' => 10,
                            '1 Star' => 5,
                        ];
                    @endphp
                    
                    @foreach ($ratings as $label => $percent)
                        <div class="d-flex align-items-center mb-2">
                            <span class="fw-medium me-3" style="width: 60px;">{{ $label }}</span>
                            <div class="progress flex-grow-1" style="height: 10px; background-color: #e9ecef;">
                                <div 
                                    class="progress-bar" 
                                    role="progressbar" 
                                    style="width: {{ $percent }}%; background-color: #fcd881;" 
                                    aria-valuenow="{{ $percent }}" 
                                    aria-valuemin="0" 
                                    aria-valuemax="100">
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-lg-6 mb-4">
        <div class="card card-content-bg p-4 h-100">
            <h3 class="fw-bold mb-4">Reviews Statistics</h3>
            
            <p class="mb-1"><span class="fw-bold">12 New Reviews</span> <span class="badge bg-success">+8.5%</span></p>
            <p class="mb-4">87% Positive Reviews</p>
            
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
        
        <div class="d-flex border-bottom py-3">
            <img src="{{ asset('images/user.png') }}" alt="Customer Avatar" class="rounded-circle me-3" style="width: 50px; height: 50px; object-fit: cover;">
            <div class="flex-grow-1">
                <p class="fw-medium mb-1">Nail Art</p>
                <small class="d-block mb-1 text-muted">Customer :John</small>
                <div class="text-warning mb-1">
                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                </div>
                <p class="mb-0 small text-dark">Review :Great product! Really loved the quality and fast delivery.</p>
            </div>
            <div class="d-flex align-items-start ms-auto">
                <button class="btn btn-sm btn-dark me-2">Detail</button>
                <button class="btn btn-sm btn-danger">Hapus</button>
            </div>
        </div>
        
        <div class="d-flex border-bottom py-3">
            <img src="{{ asset('images/user.png') }}" alt="Customer Avatar" class="rounded-circle me-3" style="width: 50px; height: 50px; object-fit: cover;">
            <div class="flex-grow-1">
                <p class="fw-medium mb-1">Eyelash extension</p>
                <small class="d-block mb-1 text-muted">Customer :John</small>
                <div class="text-warning mb-1">
                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                </div>
                <p class="mb-0 small text-dark">Review :Great product! Really loved the quality and fast delivery.</p>
            </div>
            <div class="d-flex align-items-start ms-auto">
                <button class="btn btn-sm btn-dark me-2">Detail</button>
                <button class="btn btn-sm btn-danger">Hapus</button>
            </div>
        </div>

        <div class="d-flex pt-3">
            <img src="{{ asset('images/user.png') }}" alt="Customer Avatar" class="rounded-circle me-3" style="width: 50px; height: 50px; object-fit: cover;">
            <div class="flex-grow-1">
                <p class="fw-medium mb-1">Nail Art</p>
                <small class="d-block mb-1 text-muted">Customer :John</small>
                <div class="text-warning mb-1">
                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                </div>
                <p class="mb-0 small text-dark">Review :Great product! Really loved the quality and fast delivery.</p>
            </div>
            <div class="d-flex align-items-start ms-auto">
                <button class="btn btn-sm btn-dark me-2">Detail</button>
                <button class="btn btn-sm btn-danger">Hapus</button>
            </div>
        </div>

        </div>
</div>

@endsection