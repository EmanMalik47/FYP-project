<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Brater Brains - @yield('admintitle')</title>
  <link rel="stylesheet" href="css/admin/adminMaster.css">
  @yield('styles')
  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  
</head>
<body>

  <!-- Mobile Sidebar Toggle Button -->
  <button class="menu-toggle-btn d-md-none" id="menuToggleBtn" aria-label="Toggle Sidebar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="header"><img src="../images/logo.png" class="img-fluid " height="200" width="200"></div>

  <div class="d-flex flex-column flex-md-row">
    <!-- Sidebar -->
    <nav class="sidebar col-md-3 col-lg-2" id="sidebar">
      <ul class="nav flex-column mt-4">
        <li class="nav-item"><a href="admin\dashboard\adminDashboard" class="nav-link active">Dashboard</a></li>
        <li class="nav-item"><a href="manageuser" class="nav-link">Manage Users</a></li>
        <li class="nav-item"><a href="manageSkills" class="nav-link">Manage Skills</a></li>
        <li class="nav-item"><a href="#" class="nav-link">Exchange Requests</a></li>
        <li class="nav-item"><a href="#" class="nav-link">Categories</a></li>
        <li class="nav-item"><a href="#" class="nav-link">Reports</a></li>
        <li class="nav-item mt-auto"><a href="#" class="nav-link text-danger fw-bold">Logout</a></li>
      </ul>
    </nav>

    <!-- Main Content -->
    @yield('adminContent')
    
  </div>

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
