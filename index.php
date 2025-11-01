<?php
include 'koneksi.php';

// Deteksi halaman: landing (default) atau admin
$halaman = $_GET['halaman'] ?? 'landing';

// Daftar halaman admin
$halaman_admin = [
  'dashboard','home','profil',
  'admin','tambahadmin','editadmin','laporanadmin',
  'jabatan','tambahjabatan','editjabatan','laporanjabatan',
  'kategori','tambahkategori','editkategori','laporankategori',
  'konten','tambahkonten','editkonten','laporankonten',
  'komentar','tambahkomentar','editkomentar','laporankomentar'
];

// ==========================================================
// =============== LANDING PAGE ==============================
// ==========================================================
if ($halaman === 'landing') :
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CMS Kliping Koran & Web</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f5f7fa;
      color: #333;
    }

    /* Navbar */
    .navbar {
      background: rgba(0, 0, 0, 0.85);
      backdrop-filter: blur(10px);
    }
    .navbar-brand {
      font-weight: 600;
      color: #fff !important;
      letter-spacing: 0.5px;
    }
    .nav-link {
      color: #ddd !important;
      transition: 0.3s;
    }
    .nav-link:hover {
      color: #fff !important;
    }

    /* Hero Section */
    .hero {
      background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)),
                  url('landing/img/banner.jpg') center/cover no-repeat;
      height: 85vh;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      text-align: center;
      color: #fff;
    }
    .hero h1 {
      font-size: 2.8rem;
      font-weight: 700;
      text-shadow: 2px 2px 10px rgba(0,0,0,0.7);
    }
    .hero p {
      font-size: 1.1rem;
      margin-top: 10px;
      opacity: 0.9;
    }
    .hero .btn-primary {
      background-color: #0d6efd;
      border: none;
      margin-top: 25px;
      padding: 12px 28px;
      border-radius: 30px;
      font-weight: 500;
      transition: 0.3s;
    }
    .hero .btn-primary:hover {
      background-color: #0943a0;
    }

    /* Section Kategori */
    .kategori-section {
      padding: 80px 0;
      background: #fff;
    }
    .kategori-section h2 {
      text-align: center;
      margin-bottom: 50px;
      font-weight: 600;
      color: #0d1b2a;
    }
    .card-category {
      border: none;
      border-radius: 15px;
      box-shadow: 0 3px 12px rgba(0,0,0,0.1);
      transition: all 0.3s ease-in-out;
    }
    .card-category:hover {
      transform: translateY(-6px);
      box-shadow: 0 6px 18px rgba(0,0,0,0.15);
    }
    .card-category h5 {
      font-weight: 600;
      color: #0d6efd;
    }
    .card-category p {
      font-size: 0.9rem;
      color: #666;
    }

    /* Konten Section */
    .konten-section {
      padding: 80px 0;
      background: #f5f7fa;
    }
    .konten-section h2 {
      text-align: center;
      margin-bottom: 50px;
      font-weight: 600;
      color: #0d1b2a;
    }
    .card img {
      border-top-left-radius: 15px;
      border-top-right-radius: 15px;
    }

    /* Footer */
    footer {
      background: #0d1b2a;
      color: #fff;
      padding: 25px 0;
      text-align: center;
      font-size: 0.9rem;
      margin-top: 40px;
    }
  </style>
</head>

<body>
  <!-- NAVBAR -->
  <nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">Kliping SMKN 1 Karang Baru</a>
      <button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item"><a class="nav-link" href="#home">Beranda</a></li>
          <li class="nav-item"><a class="nav-link" href="#kategori">Kategori</a></li>
          <li class="nav-item"><a class="nav-link" href="#konten">Kliping</a></li>
          <li class="nav-item"><a class="btn btn-primary btn-sm ms-2" href="?halaman=dashboard">Masuk Admin</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- HERO -->
  <section id="home" class="hero">
    <h1>CMS Kliping Koran & Web</h1>
    <p>Platform pengelolaan berita dan kliping sekolah berbasis digital</p>
    <a href="#konten" class="btn btn-primary">Lihat Koleksi</a>
  </section>

  <!-- KATEGORI -->
  <section id="kategori" class="kategori-section">
    <div class="container">
      <h2>Kategori Kliping</h2>
      <div class="row justify-content-center">
        <?php
        $kategori = mysqli_query($koneksi, "SELECT * FROM kategori LIMIT 4");
        while ($row = mysqli_fetch_assoc($kategori)) {
          echo "
          <div class='col-md-3 mb-4'>
            <div class='card card-category text-center p-4'>
              <h5>{$row['namakategori']}</h5>
              <p>Kumpulan artikel dalam kategori ini.</p>
            </div>
          </div>";
        }
        ?>
      </div>
    </div>
  </section>

  <!-- KONTEN -->
  <section id="konten" class="konten-section">
    <div class="container">
      <h2>Kliping Terbaru</h2>
      <div class="row">
        <?php
        $konten = mysqli_query($koneksi, "SELECT * FROM konten ORDER BY idkonten DESC LIMIT 6");
        while ($row = mysqli_fetch_assoc($konten)) {
          $gambar = !empty($row['gambar']) ? "admin/uploads/{$row['gambar']}" : "landing/img/noimage.jpg";
          echo "
          <div class='col-md-4 mb-4'>
            <div class='card h-100 shadow-sm border-0 rounded-4'>
              <img src='$gambar' class='card-img-top' style='height:220px; object-fit:cover;'>
              <div class='card-body'>
                <h5 class='card-title'>{$row['judul']}</h5>
                <p class='text-muted small'>".substr(strip_tags($row['isikonten']),0,90)."...</p>
              </div>
              <div class='card-footer bg-white text-center'>
                <a href='#' class='btn btn-outline-primary btn-sm rounded-pill'>Baca Selengkapnya</a>
              </div>
            </div>
          </div>";
        }
        ?>
      </div>
    </div>
  </section>

  <!-- FOOTER -->
  <footer>
    &copy; <?= date('Y'); ?> CMS Kliping Koran & Web | SMKN 1 Karang Baru
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
// ==========================================================
// =============== ADMIN DASHBOARD AREA =====================
// ==========================================================
else:
  include 'pages/header.php';
?>
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__wobble" src="dist/img/AdminLTELogo.png" alt="Logo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark">
      <?php include 'pages/navbar.php'; ?>
  </nav>

  <!-- Sidebar -->
  <aside class="main-sidebar sidebar-light-primary elevation-4">
      <?php include 'pages/sidebar.php'; ?>
  </aside>

  <!-- Content Wrapper -->
  <div class="content-wrapper">
      <?php
      $judul_map = [
          'dashboard' => 'Dashboard',
          'profil' => 'Profil Admin',
          'admin' => 'Data Admin',
          'tambahadmin' => 'Tambah Admin',
          'editadmin' => 'Edit Admin',
          'laporanadmin' => 'Laporan Admin',
          'jabatan' => 'Data Jabatan',
          'kategori' => 'Data Kategori',
          'konten' => 'Data Konten',
          'komentar' => 'Data Komentar',
          'laporanjabatan' => 'Laporan Jabatan',
          'laporankategori' => 'Laporan Kategori',
          'laporankonten' => 'Laporan Konten',
          'laporankomentar' => 'Laporan Komentar'
      ];
      $judul_halaman = $judul_map[$halaman] ?? 'Dashboard';
      ?>

      <div class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h1 class="m-0"><?= htmlspecialchars($judul_halaman); ?></h1>
                  </div>
                  <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                          <li class="breadcrumb-item"><a href="?halaman=dashboard">Home</a></li>
                          <li class="breadcrumb-item active"><?= htmlspecialchars($judul_halaman); ?></li>
                      </ol>
                  </div>
              </div>
          </div>
      </div>

      <section class="content">
          <?php
          $path_map = [
  'dashboard' => 'views/dashboard.php',
  'profil' => 'views/profil.php',
  'admin' => 'views/Admin/admin.php',
  'tambahadmin' => 'views/Admin/tambahadmin.php',
  'editadmin' => 'views/Admin/editadmin.php',
  'jabatan' => 'views/Jabatan/jabatan.php',
  'kategori' => 'views/Kategori/kategori.php',
  'konten' => 'views/Konten/konten.php',
  'tambahkonten' => 'views/Konten/tambahkonten.php',
  'editkonten' => 'views/Konten/editkonten.php',
  'komentar' => 'views/Komentar/komentar.php',
  'laporanadmin' => 'views/Laporan/laporanadmin.php',
  'laporanjabatan' => 'views/Laporan/laporanjabatan.php',
  'laporankategori' => 'views/Laporan/laporankategori.php',
  'laporankonten' => 'views/Laporan/laporankonten.php',
  'laporankomentar' => 'views/Laporan/laporankomentar.php'
];

          $path = $path_map[$halaman] ?? "views/$halaman.php";
          if (file_exists($path)) include $path;
          else include $path_map['dashboard'];
          ?>
      </section>
  </div>

  <!-- Footer -->
  <footer class="main-footer">
      <?php include 'pages/footer.php'; ?>
  </footer>
</div>

<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="dist/js/adminlte.js"></script>

</body>
</html>
<?php endif; ?>
