<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Beranda | CMS Kliping Koran</title>
  
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  
  <!-- CSS Utama -->
  <link rel="stylesheet" href="landing/style.css">
</head>
<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand fw-bold" href="?halaman=home">Kliping SMKN 1 Karang Baru</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link active" href="?halaman=home">Beranda</a></li>
          <li class="nav-item"><a class="nav-link" href="?halaman=about">Tentang</a></li>
          <li class="nav-item"><a class="nav-link" href="?halaman=kontak">Kontak</a></li>
          <li class="nav-item"><a class="btn btn-primary btn-sm ms-2" href="?halaman=dashboard">Masuk Admin</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Hero Section -->
  <section class="hero d-flex align-items-center justify-content-center text-center text-white">
    <div class="container">
      <h1 class="display-4 fw-bold text-shadow">CMS Kliping Koran & Web</h1>
      <p class="lead text-shadow">Platform pengelolaan berita dan kliping sekolah berbasis digital</p>
      <a href="?halaman=about" class="btn btn-light btn-lg mt-3 shadow-sm">Lihat Koleksi</a>
    </div>
  </section>

  <!-- Konten Singkat -->
  <section class="py-5 bg-light text-center">
    <div class="container">
      <h2 class="fw-bold mb-4">Tentang Sistem</h2>
      <p class="text-muted">
        Sistem ini dibuat untuk mengelola berita dan dokumentasi kliping koran sekolah secara digital dan efisien.
      </p>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-dark text-white text-center py-3">
    <p class="mb-0">&copy; <?= date('Y'); ?> CMS Kliping Koran | SMKN 1 Karang Baru</p>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
