<!DOCTYPE html>
<html lang="en">

<head>
    <?php 
    include 'koneksi.php'; // Pastikan koneksi database aktif di awal
    include 'pages/header.php'; 
    ?>
</head>

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__wobble" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-dark">
            <?php include 'pages/navbar.php'; ?>
        </nav>

        <!-- Sidebar -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <?php include 'pages/sidebar.php'; ?>
        </aside>

        <!-- Content Wrapper -->
        <div class="content-wrapper">
            <!-- Header Halaman -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Dashboard v2</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="?halaman=dashboard">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard v2</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Konten Halaman -->
            <section class="content">
                <?php
                if (isset($_GET['halaman'])) {
                    $halaman = strtolower($_GET['halaman']); // Normalisasi huruf kecil

                    switch ($halaman) {
                        /* ================================
                           === BAGIAN UTAMA / DASHBOARD ===
                        =================================*/
                        case 'dashboard':
                        case 'home':
                            include("views/dashboard.php");
                            break;

                        /* ================================
                           === BAGIAN ADMIN ===
                        =================================*/
                        case 'admin':
                            include("views/Admin/admin.php");
                            break;
                        case 'tambahadmin':
                            include("views/Admin/tambahadmin.php");
                            break;
                        case 'editadmin':
                            include("views/Admin/editadmin.php");
                            break;

                        /* ================================
                           === BAGIAN JABATAN ===
                        =================================*/
                        case 'jabatan':
                            include("views/Jabatan/jabatan.php");
                            break;
                        case 'tambahjabatan':
                            include("views/Jabatan/tambahjabatan.php");
                            break;
                        case 'editjabatan':
                            include("views/Jabatan/editjabatan.php");
                            break;

                        /* ================================
                           === BAGIAN KATEGORI ===
                        =================================*/
                        case 'kategori':
                            include("views/Kategori/kategori.php");
                            break;
                        case 'tambahkategori':
                            include("views/Kategori/tambahkategori.php");
                            break;
                        case 'editkategori':
                            include("views/Kategori/editkategori.php");
                            break;

                        /* ================================
                           === BAGIAN KOMENTAR ===
                        =================================*/
                        case 'komentar':
                            include("views/Komentar/komentar.php");
                            break;
                        case 'tambahkomentar':
                            include("views/Komentar/tambahkomentar.php");
                            break;
                        case 'editkomentar':
                            include("views/Komentar/editkomentar.php");
                            break;

                        /* ================================
                           === BAGIAN KONTEN ===
                        =================================*/
                        case 'konten':
                            include("views/Konten/konten.php");
                            break;
                        case 'tambahkonten':
                            include("views/Konten/tambahkonten.php");
                            break;
                        case 'editkonten':
                            include("views/Konten/editkonten.php");
                            break;

                        /* ================================
                           === DEFAULT: NOT FOUND ===
                        =================================*/
                        default:
                            include("views/notfound.php");
                            break;
                    }
                } else {
                    // Jika tidak ada parameter 'halaman', tampilkan dashboard
                    include("views/dashboard.php");
                }
                ?>
            </section>
        </div>

        <!-- Sidebar Kontrol -->
        <aside class="control-sidebar control-sidebar-dark"></aside>

        <!-- Footer -->
        <footer class="main-footer">
            <?php include 'pages/footer.php'; ?>
        </footer>
    </div>

    <!-- Script bawaan template -->
    <?php include 'pages/footer_scripts.php'; ?>
    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <script src="dist/js/adminlte.js"></script>
    <script src="plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
    <script src="plugins/raphael/raphael.min.js"></script>
    <script src="plugins/jquery-mapael/jquery.mapael.min.js"></script>
    <script src="plugins/jquery-mapael/maps/usa_states.min.js"></script>
    <script src="plugins/chart.js/Chart.min.js"></script>
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="plugins/jszip/jszip.min.js"></script>
    <script src="plugins/pdfmake/pdfmake.min.js"></script>
    <script src="plugins/pdfmake/vfs_fonts.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <script src="dist/js/demo.js"></script>
    <script src="dist/js/pages/dashboard2.js"></script>
</body>

</html>
