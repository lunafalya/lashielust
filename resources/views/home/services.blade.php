@extends('layouts.app')
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Services - Lashie Lust</title>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;700&family=Poppins:wght@400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link rel="icon" href="img/core-img/logo.png">
</head>
<body>

@section('content')
      <section class="home1">
      <div class="home-content1">
      <img src="{{ asset('images/ourservice1.png') }}" alt="ourservice">
    </div>
  </section>
<section class="service-filter-section">
    <div class="service-filter-container">
      <ul class="service-filter">
          <li class="active" data-filter="all">All</li>
          <li data-filter="nails">Nails</li>
          <li data-filter="eyes">Eyes</li>
          <li data-filter="hair">Hair</li>
          <li data-filter="body">Body</li>
          <li data-filter="piercing">Piercing</li>
      </ul>
    </div>
</section>

<section class="service-grid">
    @foreach($services as $service)
        <div class="service-item" data-category="{{ strtolower($service->category) }}">
            <a href="{{ route('services.show', $service->id) }}">
                <img src="{{ asset('storage/' . $service->file_path) }}" alt="{{ $service->name }}">
                <h3>{{ $service->name }}</h3>
                <p>From Rp.{{ number_format($service->price, 0, ',', '.') }}</p>
            </a>
        </div>
    @endforeach
</section>

@endsection

  <script>
    const carousel = document.querySelector('.carousel');
    const nextBtn = document.querySelector('.carousel-btn.next');
    const prevBtn = document.querySelector('.carousel-btn.prev');

    const scrollStep = 350;

    nextBtn.addEventListener('click', () => {
      carousel.scrollBy({ left: scrollStep, behavior: 'smooth' });
    });

    prevBtn.addEventListener('click', () => {
      carousel.scrollBy({ left: -scrollStep, behavior: 'smooth' });
    });
  </script>

  <script>
  const profileBtn = document.getElementById('profileBtn');
  const dropdownMenu = document.getElementById('dropdownMenu');
  profileBtn.addEventListener('click', function (event) {
    event.stopPropagation(); 
    dropdownMenu.classList.toggle('show');
  });

  window.addEventListener('click', function (event) {
    if (!dropdownMenu.contains(event.target) && event.target !== profileBtn) {
      dropdownMenu.classList.remove('show');
    }
  });
</script>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const filterItems = document.querySelectorAll('.service-filter li');
    const serviceItems = document.querySelectorAll('.service-item');

    filterItems.forEach(filter => {
        filter.addEventListener('click', () => {
            // ubah status aktif pada tombol filter
            filterItems.forEach(f => f.classList.remove('active'));
            filter.classList.add('active');

            const filterValue = filter.getAttribute('data-filter');

            serviceItems.forEach(item => {
                const itemCategory = item.getAttribute('data-category').toLowerCase();

                if (filterValue === 'all' || itemCategory === filterValue) {
                    item.style.display = 'block';
                    item.classList.add('show');
                } else {
                    item.style.display = 'none';
                    item.classList.remove('show');
                }
            });
        });
    });
});
</script>

<script>
const filterTabs = document.querySelectorAll('.service-filter li');
const serviceItems = document.querySelectorAll('.service-item');

filterTabs.forEach(tab => {
tab.addEventListener('click', () => {
filterTabs.forEach(t => t.classList.remove('active'));
tab.classList.add('active');
const filter = tab.getAttribute('data-filter');

serviceItems.forEach(item => {
        let isMatch = false;
        
        if (filter === 'all') {
            isMatch = true;
        } else if (filter === 'lash' && itemType.includes('lash')) {
            isMatch = true;
        } else if (filter === 'nail' && itemType.includes('nail')) {
            isMatch = true;
        } else if (filter === 'hair' && itemType.includes('hair')) {
            isMatch = true;
        } 
        
item.style.display = isMatch ? 'block' : 'none';
});
});
});
</script>

</body>
</html>
