<?php
session_start();

// jika belum login, arahkan ke login.php
if (!isset($_SESSION['idadmin'])) {
    header("Location: login.php");
    exit;
}
?>


<?php 
include 'koneksi.php'; 
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
    // ====== CEK HALAMAN DARI URL ======
    if (isset($_GET['halaman']) && $_GET['halaman'] != '') {
        $halaman = strtolower($_GET['halaman']);
        $halaman = preg_replace('/[^a-z0-9_-]/i', '', $halaman); // sanitasi
    } else {
        $halaman = 'dashboard';
    }

    // ====== JUDUL HALAMAN DINAMIS ======
    switch ($halaman) {
        case 'dashboard':
        case 'home':
            $judul_halaman = 'Dashboard v2';
            break;

        case 'profil':
            $judul_halaman = 'Profil Admin';
            break;

        case 'admin':
        case 'tambahadmin':
        case 'editadmin':
        case 'laporanadmin':
            $judul_halaman = 'Data Admin';
            break;

        case 'jabatan':
        case 'tambahjabatan':
        case 'editjabatan':
        case 'laporanjabatan':
            $judul_halaman = 'Data Jabatan';
            break;

        case 'kategori':
        case 'tambahkategori':
        case 'editkategori':
        case 'laporankategori':
            $judul_halaman = 'Data Kategori';
            break;

        case 'konten':
        case 'tambahkonten':
        case 'editkonten':
        case 'laporankonten':
            $judul_halaman = 'Data Konten';
            break;

        case 'komentar':
        case 'tambahkomentar':
        case 'editkomentar':
        case 'laporankomentar':
            $judul_halaman = 'Data Komentar';
            break;

        default:
            $judul_halaman = 'Halaman Tidak Dikenal';
            break;
    }
    ?>

    <!-- Header Halaman -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?= $judul_halaman; ?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="?halaman=dashboard">Home</a></li>
              <?php if ($halaman != 'dashboard'): ?>
                <li class="breadcrumb-item active"><?= $judul_halaman; ?></li>
              <?php else: ?>
                <li class="breadcrumb-item active">Dashboard</li>
              <?php endif; ?>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <!-- Konten Halaman -->
    <section class="content">
      <?php
      // ====== ROUTING HALAMAN ======
      switch ($halaman) {
          /* DASHBOARD */
          case 'dashboard':
          case 'home':
              if (file_exists("views/dashboard.php")) {
                  include("views/dashboard.php");
              } else {
                  echo "<div class='p-5 text-center text-danger'>⚠️ File <b>views/dashboard.php</b> tidak ditemukan!</div>";
              }
              break;


          /* ADMIN */
          case 'admin':
              include("views/Admin/admin.php");
              break;
          case 'tambahadmin':
              include("views/Admin/tambahadmin.php");
              break;
          case 'editadmin':
              include("views/Admin/editadmin.php");
              break;
          case 'tampiladmin':
              include("views/Admin/tampiladmin.php");
              break;

          /* JABATAN */
          case 'jabatan':
              include("views/Jabatan/jabatan.php");
              break;
          case 'tambahjabatan':
              include("views/Jabatan/tambahjabatan.php");
              break;
          case 'editjabatan':
              include("views/Jabatan/editjabatan.php");
              break;

          /* KATEGORI */
          case 'kategori':
              include("views/Kategori/kategori.php");
              break;
          case 'tambahkategori':
              include("views/Kategori/tambahkategori.php");
              break;
          case 'editkategori':
              include("views/Kategori/editkategori.php");
              break;

          /* KOMENTAR */
          case 'komentar':
              include("views/Komentar/komentar.php");
              break;
          case 'tambahkomentar':
              include("views/Komentar/tambahkomentar.php");
              break;
          case 'editkomentar':
              include("views/Komentar/editkomentar.php");
              break;

          /* KONTEN */
          case 'konten':
              include("views/Konten/konten.php");
              break;
          case 'tambahkonten':
              include("views/Konten/tambahkonten.php");
              break;
          case 'editkonten':
              include("views/Konten/editkonten.php");
              break;

          /* LAPORAN */
          case 'laporanadmin':
              include("views/Laporan/laporanadmin.php");
              break;
          case 'laporanjabatan':
              include("views/Laporan/laporanjabatan.php");
              break;
          case 'laporankategori':
              include("views/Laporan/laporankategori.php");
              break;
          case 'laporankonten':
              include("views/Laporan/laporankonten.php");
              break;
          case 'laporankomentar':
              include("views/Laporan/laporankomentar.php");
              break;

          /* DEFAULT */
          default:
              if (file_exists("views/$halaman.php")) {
                  include("views/$halaman.php");
              } else {
                  echo "<div class='p-5 text-center text-danger'>⚠️ Halaman <b>$halaman.php</b> tidak ditemukan!</div>";
              }
              break;
      }
      ?>
    </section>
  </div>

  <!-- Sidebar Control -->
  <aside class="control-sidebar control-sidebar-dark"></aside>

  <!-- Footer -->
  <footer class="main-footer">
    <?php include 'pages/footer.php'; ?>
  </footer>
</div>

<!-- Script -->
<?php 
if (file_exists('pages/footer_scripts.php')) {
    include 'pages/footer_scripts.php'; 
}
?>

<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="dist/js/adminlte.js"></script>
<script src="plugins/chart.js/Chart.min.js"></script>
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="dist/js/demo.js"></script>

</body>
</html>
