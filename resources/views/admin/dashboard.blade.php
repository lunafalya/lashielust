@php
    $user = Auth::user();
@endphp

@extends('layouts.admin')

@section('content')

<div class="row mb-4">
    <div class="col-12">
        <div class="p-4 card-content-bg">
            

            <div class="row">
                <div class="col-md-7">
                    <h1 class="fw-bold">Welcome {{ $user->name }}!</h1>
                    <p class="text-secondary">| Manage your orders and customer's feedback efficiently.</p>
                    <p class="text-secondary mb-4">| Stay updated with real-time notifications and insights.</p>
                </div>
                
                <div class="col-md-5">
                    <p class="fw-bold mb-2">Sales overview</p>
                    <div class="p-3" style="border: 1px solid #eee; border-radius: 8px; height: 250px;">
                        
                        <canvas id="salesChart" style="max-height: 230px;"></canvas>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row g-4 mb-4">
    
    <div class="col-md-6">
        <div class="card p-4 card-content-bg">
            <div class="d-flex align-items-center mb-2">
                <div class="icon-wrapper me-3"> 
                    <i class="fas fa-shopping-cart fa-lg"></i> </div>
                <p class="mb-0 fw-medium">Today's Order</p>
            </div>
            <div class="stat-number fw-bold">115</div> 
        </div>
    </div>
    
    <div class="col-md-6">
        <div class="card p-4 card-content-bg">
            <div class="d-flex align-items-center mb-2">
                <div class="icon-wrapper me-3">
                    <i class="fas fa-sack-dollar fa-lg"></i> </div>
                <p class="mb-0 fw-medium">Today's Income</p>
            </div>
            <div class="stat-number fw-bold">Rp 50.000</div>
        </div>
    </div>
</div>

<div class="card mb-4 card-content-bg overflow-auto">
    
    <h3 class="pt-4 px-3 fw-bold mb-3">RECENT ORDERS</h3>
    
    <div class="px-3">
        <table class="table table-striped table-hover mb-4">
            <thead class="table-header-custom">
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">ORDER NO</th>
                    <th scope="col">CUSTOMER NAME</th>
                    <th scope="col">STATUS</th>
                    <th scope="col">DATE</th>
                </tr>
            </thead>
            <tbody>
                <tr><td>1</td><td>#001</td><td>John Doe</td><td>Completed</td><td>May 10, 2024</td></tr>
                <tr><td>2</td><td>#002</td><td>Jane Smith</td><td>Pending</td><td>May 11, 2024</td></tr>
            </tbody>
        </table>
    </div>
</div>

<div class="card mb-5 card-content-bg overflow-auto">
    
    <h3 class="pt-4 px-3 fw-bold mb-3">NOTIFICATIONS</h3> 
    
    <div class="px-3">
        <table class="table table-striped table-hover mb-4">
            <thead class="table-header-custom">
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Message</th>
                    <th scope="col">Last Update</th>
                </tr>
            </thead>
            <tbody>
                <tr><td>1</td><td>New booking received.</td><td>5 mins ago</td></tr>
            </tbody>
        </table>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const ctx = document.getElementById('salesChart');

        // Data Dummy untuk 12 Bulan
        const months = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];
        
        // Data Dummy (Penjualan Bulanan)
        const barData = [250, 300, 450, 400, 350, 500, 550, 480, 420, 510, 580, 600];
        
        // Data Dummy (Tren/Garis)
        const lineData = [150, 180, 220, 250, 210, 280, 310, 290, 260, 330, 360, 390];


        new Chart(ctx, {
            type: 'bar', // Tipe chart awal
            data: {
                labels: months,
                datasets: [
                    // Dataset Bar (Penjualan/Orders)
                    {
                        label: 'Orders',
                        data: barData,
                        backgroundColor: '#4E3C8B', // Warna Batang Gelap
                        borderColor: '#4E3C8B',
                        borderWidth: 1,
                        yAxisID: 'y'
                    },
                    // Dataset Line (Tren/Revenue) - Mirip di Screenshot
                    {
                        label: 'Revenue',
                        data: lineData,
                        type: 'line', // Ganti tipe menjadi 'line'
                        borderColor: '#988350', // Warna garis (krem/emas)
                        backgroundColor: 'rgba(0, 0, 0, 0)',
                        borderWidth: 2,
                        tension: 0.3, // Untuk membuat garis sedikit melengkung
                        pointRadius: 0, // Sembunyikan titik data
                        yAxisID: 'y1'
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    x: {
                        grid: {
                            display: false // Menghilangkan garis grid vertikal
                        }
                    },
                    y: { // Sumbu Y untuk Bar
                        beginAtZero: true,
                        grid: {
                            color: '#e0e0e0', // Warna garis grid horizontal
                            borderDash: [5, 5] // Membuat garis putus-putus
                        }
                    },
                    y1: { // Sumbu Y sekunder untuk Line
                        type: 'linear',
                        display: false, // Sembunyikan sumbu Y sekunder
                        position: 'right',
                        grid: {
                            drawOnChartArea: false // Jangan tampilkan garis grid
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: false // Sembunyikan Legend
                    },
                    tooltip: {
                        mode: 'index',
                        intersect: false,
                    }
                }
            }
        });
    });
</script>

@endsection