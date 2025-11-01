<?php
// Pastikan session aktif
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
?>
<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-light bg-white border-bottom shadow-sm">

  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <!-- Tombol Menu Sidebar -->
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button">
        <i class="fas fa-bars"></i>
      </a>
    </li>

    <!-- Home -->
    <li class="nav-item d-none d-sm-inline-block">
      <a href="index.php?halaman=dashboard"
         class="nav-link <?php echo ($_GET['halaman'] ?? '') == 'dashboard' ? 'active' : ''; ?>">
         Home
      </a>
    </li>

    <!-- Contact -->
    <li class="nav-item d-none d-sm-inline-block">
      <a href="index.php?halaman=contact"
         class="nav-link <?php echo ($_GET['halaman'] ?? '') == 'contact' ? 'active' : ''; ?>">
         Contact
      </a>
    </li>
  </ul>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">

    <!-- Search -->
    <li class="nav-item">
      <a class="nav-link" data-widget="navbar-search" href="#" role="button">
        <i class="fas fa-search"></i>
      </a>
      <div class="navbar-search-block">
        <form class="form-inline">
          <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-navbar" type="submit">
                <i class="fas fa-search"></i>
              </button>
              <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
        </form>
      </div>
    </li>

    <!-- Notifications -->
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="far fa-bell"></i>
        <span class="badge badge-warning navbar-badge">15</span>
      </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <span class="dropdown-item dropdown-header">15 Notifications</span>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item">
          <i class="fas fa-envelope mr-2"></i> 4 new messages
          <span class="float-right text-muted text-sm">3 mins</span>
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item">
          <i class="fas fa-users mr-2"></i> 8 friend requests
          <span class="float-right text-muted text-sm">12 hours</span>
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
      </div>
    </li>

    <!-- User Profile Dropdown -->
    <li class="nav-item dropdown">
      <a class="nav-link d-flex align-items-center" data-toggle="dropdown" href="#">
        <img src="dist/img/Gambar2.jpg"
             class="img-circle elevation-2"
             alt="User Image"
             style="width:30px; height:30px; object-fit:cover; margin-right:5px;">
        <span><?php echo $_SESSION['nama_admin'] ?? 'User'; ?></span>
      </a>
      <div class="dropdown-menu dropdown-menu-right">
        <a href="index.php?halaman=profil" class="dropdown-item">
          <i class="fas fa-user mr-2"></i> Profil
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item text-danger" onclick="logoutConfirm()">
          <i class="fas fa-sign-out-alt mr-2"></i> Logout
        </a>
      </div>
    </li>

    <!-- Fullscreen -->
    <li class="nav-item">
      <a class="nav-link" data-widget="fullscreen" href="#" role="button">
        <i class="fas fa-expand-arrows-alt"></i>
      </a>
    </li>

    <!-- Control Sidebar -->
    <li class="nav-item">
      <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
        <i class="fas fa-th-large"></i>
      </a>
    </li>
  </ul>
</nav>
<!-- /.navbar -->

<!-- Script Logout -->
<script>
function logoutConfirm() {
  if (confirm("Apakah Anda yakin ingin logout?")) {
    window.location.href = "logout.php";
  }
}
</script>

<!-- Custom CSS -->
<style>
  .navbar-light .navbar-nav .nav-link {
    color: #000 !important;
    font-weight: 500;
  }

  .navbar-light .navbar-nav .nav-link:hover {
    color: #007bff !important;
  }

  .navbar-light .navbar-nav .nav-link.active {
    color: #007bff !important;
    font-weight: 600;
  }

  .dropdown-menu-right {
    min-width: 200px;
  }
</style>
