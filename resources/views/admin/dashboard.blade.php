<!doctype html>
<html
  lang="en"
  class="light-style layout-menu-fixed layout-compact"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="{{ asset('public') }}"
  data-template="vertical-menu-template-free"
  data-style="light">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=0.8, user-scalable=no, minimum-scale=0.8, maximum-scale=1.0" />
    <title>DASHBOARD</title>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('img/core-img/logo1.png') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('fonts/boxicons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('css/theme-default.css') }}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('libs/apex-charts/apex-charts.css') }}" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="{{ asset('js/helpers.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('js/config.js') }}"></script>
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="{{ route('dashboard') }}" class="app-brand-link">
              <img src="{{ asset('img/core-img/logo1.png') }}" alt="Mush Room Logo" class="app-brand-logo demo" style="width: 40px; height: auto;">
              <span class="app-brand-text demo menu-text fw-bold ms-2">MUSH ROOM</span>
            </a>
            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm d-flex align-items-center justify-content-center"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboards -->
            <li class="menu-item active">
                <a href="{{ route('dashboard') }}" class="menu-link" id="dashboard-link">
                  <i class="menu-icon tf-icons bx bx-chart"></i>
                  <div class="text-truncate" data-i18n="Dashboard">Dashboard</div>
                </a>
            </li>
             <!-- notification menu item -->
        <li class="menu-item">
            <a href="{{ route('notifications.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-bell"></i>
                <div class="text-truncate">Notification</div>
                <span class="badge rounded-pill bg-danger ms-auto">{{ $notificationCount }}</span>
            </a>
        </li>
           <!-- Product menu item -->
           <li class="menu-item">
            <a href="{{ route('products.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-shopping-bag"></i>
                <div class="text-truncate">Product</div>
            </a>
        </li>
         <!-- Rate menu item -->
         <li class="menu-item">
            <a href="{{ route('rate.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-star"></i>
                <div class="text-truncate">Rate</div>
            </a>
        </li>
        <!-- order menu item -->
        <li class="menu-item">
            <a href="{{ route('order') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-layout"></i>
                <div class="text-truncate">Order</div>
                    </a>
        </li>

        <!-- ACCOUNT CENTER SECTION -->
        <div class="account-center">
    <div class="menu-header small text-uppercase">
        <span class="menu-header-text">ACCOUNT CENTER</span>
    </div>
    <img src="{{ asset('img/acc.png') }}" alt="Account Center" class="img-fluid account-image" />
    <a href="{{ route('signin.form') }}" class="btn btn-primary w-100 text-center account-logout">LOGOUT</a>
</div>
            </li>
      </li>
</ul>
</aside>


<!-- Layout container -->
<div class="layout-page">
    <!-- Navbar -->
    <nav
      class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
      id="layout-navbar">
      <div class="layout-menu-toggle navbar-nav align-items-xl-center me-4 me-xl-0 d-xl-none">
        <a class="nav-item nav-link px-0 me-xl-6" href="javascript:void(0)">
          <i class="bx bx-menu bx-md"></i>
        </a>
      </div>

      <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
        <!-- Search -->
        <div class="navbar-nav align-items-center">
          <div class="nav-item d-flex align-items-center">
            <i class="bx bx-search bx-md search-icon"></i>
            <input
              type="text"
              class="form-control border-0 shadow-none ps-1 ps-sm-2 search-input"
              placeholder="Search"
              aria-label="Search"
              id="searchNotifications" />
          </div>
        </div>
        <!-- /Search -->

        <!-- BELL Notifikasi -->
        <ul class="navbar-nav flex-row align-items-center ms-auto">
            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle hide-arrow p-0 notification-icon"
                href="{{ route('notifications.index') }}"
                aria-label="Notifications"
                style="position: relative;">
                    <i class="bx bx-bell" style="font-size: 24px;"></i>
                    <!-- Badge notifikasi -->
                    <span id="notification-badge" class="badge bg-danger text-white rounded-pill position-absolute"
                        style="top: -5px; right: -10px; font-size: 10px; display: none;">
                        0
                    </span>
                </a>
            </li>
        </ul>



<!-- User -->
<li class="nav-item navbar-dropdown dropdown-user dropdown">
  <a class="nav-link dropdown-toggle hide-arrow p-0" href="javascript:void(0);" data-bs-toggle="dropdown">
    <div class="avatar avatar-online">
      @if(Auth::user()->profile_path)
        <img src="{{ asset('storage/profile_images/' . Auth::user()->profile_path) }}" alt="Profile Image" class="w-px-40 h-auto rounded-circle" />
      @else
        <img src="{{ asset('img/avatars/default-avatar.png') }}" alt="Default Avatar" class="w-px-40 h-auto rounded-circle" />
      @endif
    </div>
  </a>
  <ul class="dropdown-menu dropdown-menu-end">
    <li>
      <a class="dropdown-item" href="#">
        <div class="d-flex">
          <div class="flex-shrink-0 me-3">
            <div class="avatar avatar-online">
              @if(Auth::user()->profile_path)
                <img src="{{ asset('storage/profile_images/' . Auth::user()->profile_path) }}" alt="Profile Image" class="w-px-40 h-auto rounded-circle" />
              @else
                <img src="{{ asset('img/avatars/default-avatar.png') }}" alt="Default Avatar" class="w-px-40 h-auto rounded-circle" />
              @endif
            </div>
          </div>
          <div class="flex-grow-1">
            <h6 class="mb-0">{{ Auth::user()->fullname }}</h6> <!-- Display user's full name -->
            <small class="text-muted">Admin</small> <!-- You can modify this based on your roles -->
          </div>
        </div>
      </a>
    </li>
    <li><div class="dropdown-divider my-1"></div></li>
    <li>
      <a class="dropdown-item" href="{{ route('profile') }}">
        <i class="bx bx-user bx-md me-3"></i><span>My Profile</span>
      </a>
    </li>
    <li><div class="dropdown-divider my-1"></div></li>

    <li>
      <div class="dropdown-divider my-1"></div>
    </li>
    <li>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
      </form>
      <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          <i class="bx bx-power-off bx-md me-3"></i><span>Log Out</span>
      </a>
    </li>
  </ul>
</li>
<!--/ User -->

<!--/ User -->
</ul>
      </div>
    </nav>

  <!-- bagian atas header Content  -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">
                <div class="col-xxl-8 mb-6 order-0">
                  <div class="card">
                    <div class="d-flex align-items-start row">
                      <div class="col-sm-7">
                        <div class="card-body">
                          <h5 class="card-title text-primary mb-3">Welcome, {{ Auth::user()->fullname }}! 🎉</h5>
                          <p class="mb-6 custom-text-color">
                            | Manage your products, orders, and customer feedback efficiently.<br /> <br />| Stay updated with real-time notifications and insights.
                          </p>
                        </div>
                      </div>

                      <div class="col-sm-5 text-center text-sm-left">
                        <div class="welcome-image">
                          <img
                            src="../assets/img/hdfoto.png"
                            height="200"
                            class="scaleX-n1-rtl"
                            alt="welcome image" />
                        </div>
                      </div>

                    </div>

                  </div>

                </div>

                <!--/ Total Revenue -->
                <div class="col-12 col-md-8 col-lg-12 col-xxl-4 order-3 order-md-2">
                  <div class="row">
                    <div class="col-6 mb-6">
                      <div class="card h-100">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between mb-4">
                            <!-- logo total order -->
                            <div class="avatar flex-shrink-0">
                                <i class="bx bx-cart" style="font-size: 24px; color: #4D2703;"></i>
                              </div>
                            <div class="dropdown">
                              <button
                                class="btn p-0"
                                type="button"
                                id="cardOpt4"
                                data-bs-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false">
                                <i class="bx bx-dots-vertical-rounded text-muted"></i>
                              </button>
                              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt4">
                                <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                              </div>
                            </div>
                          </div>
                          <p class="mb-1 custom-text-color">TOTAL ORDER</p>
                          <h4 class="card-title mb-3">{{ $totalOrders }}</h4>
                        </div>
                      </div>
                    </div>
                    <div class="col-6 mb-6">
                      <div class="card h-100">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between mb-4">


                            <!-- logo total produk -->
                            <div class="avatar flex-shrink-0">
                                <i class="bx bx-box" style="font-size: 24px; color: #4D2703;"></i>
                              </div>


                            <div class="dropdown">
                              <button
                                class="btn p-0"
                                type="button"
                                id="cardOpt1"
                                data-bs-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false">
                                <i class="bx bx-dots-vertical-rounded text-muted"></i>
                              </button>
                              <div class="dropdown-menu" aria-labelledby="cardOpt1">
                                <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                              </div>
                            </div>
                          </div>
                          <p class="mb-1 custom-text-color">TOTAL PRODUCT</p>
                          <h4 class="card-title mb-3">{{ $totalProducts }}</h4>
                        </div>
                      </div>
                    </div>
                    
<!-- RECENT ORDERS -->
<div class="col-12 col-md-8 col-lg-12 col-xxl-4 order-3 order-md-2">
    <div class="card">
        <h5 class="card-header">RECENT ORDERS</h5>
        <div class="table-responsive text-nowrap">
            <div class="table-container">
                <table class="table">
                    <thead>
                        <tr class="text-nowrap">
                            <th>No.</th>
                            <th>Order No</th>
                            <th>Customer Name</th>
                            <th>Status</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @forelse ($recentOrders as $index => $order)
                            <tr>
                                <th scope="row">{{ $index + 1 }}</th>
                                <td>{{ $order->id }}</td>
                                <td>
                                    <!-- Assuming the customer's name can be fetched from the user relationship -->
                                    {{ $order->user->fullname ?? 'Unknown' }}
                                </td>
                                <td>{{ $order->status }}</td>
                                <td>{{ $order->transaction_date }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">No recent orders found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

                     <!-- NOTIFICATIONS -->
<div class="col-12 col-md-8 col-lg-12 col-xxl-4 order-3 order-md-2 mb-4 mt-4">
    <div class="card">
        <h5 class="card-header">NOTIFICATIONS</h5>
        <div class="table-responsive text-nowrap">
            <div class="table-container">
                <table class="table">
                    <thead>
                        <tr class="text-nowrap">
                            <th>No.</th>
                            <th>Message</th>
                            <th>Last Update</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @forelse ($notifications as $index => $notification)
                            <tr>
                                <th scope="row">{{ $index + 1 }}</th>
                                <td>{{ $notification->message }}</td>
                                <td>
    @if ($notification->updated_at)
        {{ $notification->updated_at->diffForHumans() }}
    @else
        Not updated yet
    @endif
</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center">No notifications available.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


                      <!-- QUICK ACCESS -->
<div class="col-12 col-md-8 col-lg-12 col-xxl-4 order-3 order-md-2 mb-4 mt-4">
  <div class="card mb-4">
    <h5 class="card-header text-start">QUICK ACCESS</h5>
    <div class="card-body">
      <div class="d-flex flex-wrap gap-4">
        <a href="{{ route('products.index') }}" class="btn btn-primary">Manage Products</a>
        <a href="{{ route('order') }}" class="btn btn-primary">Manage Orders</a>
        <a href="{{ route('rate.index') }}" class="btn btn-primary">Manage Ratings</a>
        <a href="{{ route('notifications.index') }}" class="btn btn-primary">Notifications</a>
      </div>
    </div>
  </div>
</div>
                    </div>

                  </div>

                </div>

              </div>



            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

 <!-- ADD AJAX FOR UNREADCOUNT NOTIF -->
 <script>
         // SEARCH NOTIF
        $('#searchNotifications').on('input', function() {
            var searchQuery = $(this).val().toLowerCase(); // Get the search input and convert to lowercase

            // Filter table rows based on the search query
            $('#notif-table tbody tr').each(function() {
                var message = $(this).find('td').eq(1).text().toLowerCase(); // Get the Message column text
                var lastUpdate = $(this).find('td').eq(2).text().toLowerCase(); // Get the Last Update column text

                // Check if there's a match in either column
                if (message.includes(searchQuery) || lastUpdate.includes(searchQuery)) {
                    $(this).show(); // Show the row if there is a match
                } else {
                    $(this).hide(); // Hide the row if no match
                }
            });
        });
     </script>
        <script>
            function updateNotificationBadge() {
            $.ajax({
                url: "{{ url('/api/notifications/unread-count') }}",
                method: 'GET',
                dataType: 'json',
                success: function(response) {
                    const unreadCount = response.unread_count;

                    // Perbarui badge di navbar
                    const navbarBadge = $('#notification-badge');
                    const menuBadge = $('#notification-badge-menu');

                    if (unreadCount > 0) {
                        navbarBadge.text(unreadCount).show();
                        menuBadge.text(unreadCount).show();
                    } else {
                        navbarBadge.hide();
                        menuBadge.hide();
                    }
                },
                error: function(error) {
                    console.error('Gagal memuat jumlah notifikasi:', error);
                }
            });
        }

        // Panggil fungsi saat halaman dimuat dan refresh setiap 30 detik
        $(document).ready(function() {
            updateNotificationBadge();
            setInterval(updateNotificationBadge, 30000); // Refresh setiap 30 detik
        });

        // SEARCH
        $('#search').on('input', function() {
        var searchQuery = $(this).val().toLowerCase(); // Ambil nilai pencarian dan ubah ke huruf kecil

        // Filter baris tabel berdasarkan kueri pencarian
        $('#recentorderstable tbody tr').each(function() {
            var orderNo = $(this).find('td').eq(1).text().toLowerCase(); // Mengambil Order No
            var customerName = $(this).find('td').eq(2).text().toLowerCase(); // Mengambil Customer Name
            var status = $(this).find('td').eq(3).text().toLowerCase(); // Mengambil Status
            var date = $(this).find('td').eq(4).text().toLowerCase(); // Mengambil Date

            // Cek apakah ada kecocokan dalam salah satu kolom
            if (orderNo.includes(searchQuery) || customerName.includes(searchQuery) || status.includes(searchQuery) || date.includes(searchQuery)) {
                $(this).show(); // Tampilkan baris jika ada kecocokan
            } else {
                $(this).hide(); // Sembunyikan baris jika tidak ada kecocokan
            }
        });
    });

        </script>

    <script src="{{ asset('libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('libs/popper/popper.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="{{ asset('libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('js/menu.js') }}"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ asset('libs/apex-charts/apexcharts.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    <!-- Main JS -->
    <script src="{{ asset('js/main.js') }}"></script>

    <!-- Page JS -->
    <script src="{{ asset('js/dashboards-analytics.js') }}"></script>

    <!-- Place this tag before closing body tag for github widget button. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>

  </body>
</html>