<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-primary elevation-4">

  <!-- Brand Logo -->
  <a href="index.php?halaman=dashboard" class="brand-link">
    <img src="dist/img/AdminLTELogo.png" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">CMS Kliping Koran Web</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel -->
<div class="user-panel mt-3 pb-3 mb-3 d-flex">
  <a href="index.php?halaman=profil" class="d-flex align-items-center text-decoration-none" style="width:100%;">
    <div class="image">
      <img src="dist/img/Gambar2.jpg" class="img-circle elevation-2" alt="User Image">
    </div>
    <div class="info">
      <span class="d-block text-dark">Nayila Afrilia</span>
    </div>
  </a>
</div>


    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        <!-- Dashboard -->
        <li class="nav-item">
          <a href="index.php?halaman=dashboard" class="nav-link <?= ($_GET['halaman'] ?? '') == 'dashboard' ? 'active' : '' ?>">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dashboard v2</p>
          </a>
        </li>

        <!-- Data Admin -->
        <li class="nav-item <?= in_array($_GET['halaman'] ?? '', ['admin','tambahadmin','editadmin']) ? 'menu-open' : '' ?>">
          <a href="#" class="nav-link <?= in_array($_GET['halaman'] ?? '', ['admin','tambahadmin','editadmin']) ? 'active' : '' ?>">
            <i class="nav-icon fas fa-user-shield"></i>
            <p>
              Data Admin
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="index.php?halaman=admin" class="nav-link <?= ($_GET['halaman'] ?? '') == 'admin' ? 'active' : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Daftar Admin</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="index.php?halaman=tambahadmin" class="nav-link <?= ($_GET['halaman'] ?? '') == 'tambahadmin' ? 'active' : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Tambah Admin</p>
              </a>
            </li>
          </ul>
        </li>

        <!-- Data Jabatan -->
        <li class="nav-item <?= in_array($_GET['halaman'] ?? '', ['jabatan','tambahjabatan','editjabatan']) ? 'menu-open' : '' ?>">
          <a href="#" class="nav-link <?= in_array($_GET['halaman'] ?? '', ['jabatan','tambahjabatan','editjabatan']) ? 'active' : '' ?>">
            <i class="nav-icon fas fa-briefcase"></i>
            <p>
              Data Jabatan
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="index.php?halaman=jabatan" class="nav-link <?= ($_GET['halaman'] ?? '') == 'jabatan' ? 'active' : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Daftar Jabatan</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="index.php?halaman=tambahjabatan" class="nav-link <?= ($_GET['halaman'] ?? '') == 'tambahjabatan' ? 'active' : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Tambah Jabatan</p>
              </a>
            </li>
          </ul>
        </li>

        <!-- Data Kategori -->
        <li class="nav-item <?= in_array($_GET['halaman'] ?? '', ['kategori','tambahkategori','editkategori']) ? 'menu-open' : '' ?>">
          <a href="#" class="nav-link <?= in_array($_GET['halaman'] ?? '', ['kategori','tambahkategori','editkategori']) ? 'active' : '' ?>">
            <i class="nav-icon fas fa-list"></i>
            <p>
              Data Kategori
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="index.php?halaman=kategori" class="nav-link <?= ($_GET['halaman'] ?? '') == 'kategori' ? 'active' : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Daftar Kategori</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="index.php?halaman=tambahkategori" class="nav-link <?= ($_GET['halaman'] ?? '') == 'tambahkategori' ? 'active' : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Tambah Kategori</p>
              </a>
            </li>
          </ul>
        </li>

        <!-- Data Konten -->
        <li class="nav-item <?= in_array($_GET['halaman'] ?? '', ['konten','tambahkonten','editkonten']) ? 'menu-open' : '' ?>">
          <a href="#" class="nav-link <?= in_array($_GET['halaman'] ?? '', ['konten','tambahkonten','editkonten']) ? 'active' : '' ?>">
            <i class="nav-icon fas fa-newspaper"></i>
            <p>
              Data Konten
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="index.php?halaman=konten" class="nav-link <?= ($_GET['halaman'] ?? '') == 'konten' ? 'active' : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Daftar Konten</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="index.php?halaman=tambahkonten" class="nav-link <?= ($_GET['halaman'] ?? '') == 'tambahkonten' ? 'active' : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Tambah Konten</p>
              </a>
            </li>
          </ul>
        </li>

        <!-- Data Komentar -->
        <li class="nav-item <?= in_array($_GET['halaman'] ?? '', ['komentar','tambahkomentar','editkomentar']) ? 'menu-open' : '' ?>">
          <a href="#" class="nav-link <?= in_array($_GET['halaman'] ?? '', ['komentar','tambahkomentar','editkomentar']) ? 'active' : '' ?>">
            <i class="nav-icon fas fa-comments"></i>
            <p>
              Data Komentar
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="index.php?halaman=komentar" class="nav-link <?= ($_GET['halaman'] ?? '') == 'komentar' ? 'active' : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Daftar Komentar</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="index.php?halaman=tambahkomentar" class="nav-link <?= ($_GET['halaman'] ?? '') == 'tambahkomentar' ? 'active' : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Tambah Komentar</p>
              </a>
            </li>
          </ul>
        </li>

        <!-- 📄 Menu Laporan -->
        <li class="nav-item <?= in_array($_GET['halaman'] ?? '', ['laporanadmin','laporanjabatan','laporankategori','laporankonten','laporankomentar']) ? 'menu-open' : '' ?>">
          <a href="#" class="nav-link <?= in_array($_GET['halaman'] ?? '',['laporanadmin','laporanjabatan','laporankategori','laporankonten','laporankomentar']) ? 'active' : '' ?>">
    <i class="nav-icon fas fa-file-alt"></i>
            <p>
              Laporan
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="index.php?halaman=laporanadmin" class="nav-link <?= ($_GET['halaman'] ?? '') == 'laporanadmin' ? 'active' : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Laporan Admin</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="index.php?halaman=laporanjabatan" class="nav-link <?= ($_GET['halaman'] ?? '') == 'laporanjabatan' ? 'active' : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Laporan Jabatan</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="index.php?halaman=laporankategori" class="nav-link <?= ($_GET['halaman'] ?? '') == 'laporankategori' ? 'active' : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Laporan Kategori</p>
              </a>
               <li class="nav-item">
               <a href="index.php?halaman=laporankonten" class="nav-link <?= ($_GET['halaman'] ?? '') == 'laporankonten' ? 'active' : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Laporan Konten</p>
</a>
<li class="nav-item">
               <a href="index.php?halaman=laporankomentar" class="nav-link <?= ($_GET['halaman'] ?? '') == 'laporankonten' ? 'active' : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Laporan Komentar</p>
</a>

            </li>
          </ul>
        </li>
        <!-- ========================= -->
        <!--          LOGOUT           -->
        <!-- ========================= -->
        <li class="nav-header">Keluar</li>
        <li class="nav-item">
          <a href="#" class="nav-link text-danger"
             onclick="if(confirm('Apakah Anda yakin ingin logout?')) { window.location='logout.php'; }">
            <i class="nav-icon fas fa-sign-out-alt"></i>
            <p>Logout</p>
          </a>
        </li>

      </ul>
    </nav>
  </div>
</aside>
