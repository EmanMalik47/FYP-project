<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Brater Brains - @yield('admintitle')</title>
  <link rel="stylesheet" href="{{asset('css/admin/adminMaster.css')}}">
  @yield('styles')
  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  
</head>
<body>

  <!-- Mobile Sidebar Toggle Button -->
  <button class="menu-toggle-btn d-md-none" id="menuToggleBtn" aria-label="Toggle Sidebar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="header fixed-top shadow"><img src="../images/logo.png" class="img-fluid " height="200" width="200"></div>
<br><br><br>
  <div class="d-flex flex-column flex-md-row ">
    <!-- Sidebar -->
  <nav class="sidebar col-md-3 col-lg-2 position-fixed" id="sidebar">
      <ul class="nav flex-column mt-4">
        <li class="nav-item">
      <a href="{{ route('admin.dashboard.adminDashboard') }}"
         class="nav-link {{ request()->routeIs('admin.dashboard.adminDashboard') ? 'active' : '' }}">
        Dashboard
      </a>
    </li>

    <li class="nav-item">
      <a href="{{ route('admin.dashboard.manageuser') }}"
         class="nav-link {{ request()->routeIs('admin.dashboard.manageuser') ? 'active' : '' }}">
        Manage Users
      </a>
    </li>
            <li class="nav-item">
      <a href="{{ route('admin.dashboard.manageSkills') }}"
         class="nav-link {{ request()->routeIs('admin.dashboard.manageSkills') ? 'active' : '' }}">
        Manage Skills
      </a>
    </li>

    <li class="nav-item">
      <a href="{{ route('admin.dashboard.exchangeRequest') }}"
         class="nav-link {{ request()->routeIs('admin.dashboard.exchangeRequest') ? 'active' : '' }}">
        Exchange Requests
      </a>
    </li>

    <li class="nav-item">
      <a href="{{ route('admin.dashboard.adminCertificates') }}"
         class="nav-link {{ request()->routeIs('admin.dashboard.adminCertificates') ? 'active' : '' }}">
        Certificates
      </a>
    </li>

    <li class="nav-item">
      <a href="{{ route('admin.dashboard.query') }}"
         class="nav-link {{ request()->routeIs('admin.dashboard.query') ? 'active' : '' }}">
        Query
      </a>
    </li>

    <li class="nav-item mt-auto">
      <a href="#" class="nav-link text-danger fw-bold" data-bs-toggle="modal" data-bs-target="#logoutModal">
        Logout
      </a>
    </li>
      </ul>
    </nav>

    <!-- Main Content -->
    
    @yield('adminContent')
    <!-- Logout Confirmation Modal -->
{{-- <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content bg-dark text-white">
      <div class="modal-header">
        <h5 class="modal-title" id="logoutModalLabel">Confirm Logout</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Are you sure you want to logout?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <a href="{{ route('logout') }}" class="btn btn-danger">Logout</a>
      </div>
    </div>
  </div>
</div>
  </div> --}}

  <!-- Bootstrap 5 JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Sidebar Toggle Script -->
  <script>
    document.getElementById('menuToggleBtn').addEventListener('click', function () {
      const sidebar = document.getElementById('sidebar');
      sidebar.classList.toggle('show');
    });
  </script>
</body>
</html>
