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
    
    <table class="table table-hover mb-0">
        <tbody>
            
            
            <tr>
                <td class="fw-bold align-middle" style="width: 50px;">1</td>
                
                <td class="align-middle">
                    <i class="fas fa-box fa-lg me-3 text-dark"></i> 
                    <span class="fw-medium">Booking masuk</span> untuk "nail art" pukul "10.00-12.00"
                </td>
                
                <td class="text-muted text-end align-middle" style="width: 120px;">1 minutes ago</td>
                
                <td class="text-end align-middle" style="width: 150px;">
                    <button class="btn btn-sm" style="background-color: #fcd881; color: #333; font-weight: bold;">Mark as Read</button>
                </td>
            </tr>
            
            <tr>
                <td class="fw-bold align-middle">2</td>
                <td class="align-middle">
                    <i class="fas fa-comment-dots fa-lg me-3 text-dark"></i>
                    <span class="fw-medium">Ulasan bintang 5</span> diterima untuk "Jamur Kancing"
                </td>
                <td class="text-muted text-end align-middle">5 minutes ago</td>
                <td class="text-end align-middle">
                    <button class="btn btn-sm" style="background-color: #fcd881; color: #333; font-weight: bold;">Mark as Read</button>
                </td>
            </tr>

            <tr>
                <td class="fw-bold align-middle">3</td>
                <td class="align-middle">
                    <i class="fas fa-check-circle fa-lg me-3 text-success"></i> 
                    Pesanan <span class="fw-medium">#12345 dikonfirmasi</span>
                </td>
                <td class="text-muted text-end align-middle">10 minutes ago</td>
                <td class="text-end align-middle">
                    <button class="btn btn-sm" style="background-color: #fcd881; color: #333; font-weight: bold;">Mark as Read</button>
                </td>
            </tr>

            <tr>
                <td class="fw-bold align-middle">4</td>
                <td class="align-middle">
                    <i class="fas fa-times-circle fa-lg me-3 text-danger"></i> 
                    Pesanan <span class="fw-medium">#12344 dibatalkan</span>
                </td>
                <td class="text-muted text-end align-middle">15 minutes ago</td>
                <td class="text-end align-middle">
                    <button class="btn btn-sm" style="background-color: #fcd881; color: #333; font-weight: bold;">Mark as Read</button>
                </td>
            </tr>
            
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