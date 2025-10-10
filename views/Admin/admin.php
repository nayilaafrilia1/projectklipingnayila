<?php
include 'koneksi.php';
$query = mysqli_query($koneksi, "SELECT * FROM admin");
?>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">

    <!-- Tombol di pojok kanan atas -->
    <div style="text-align: right; margin-bottom: 10px;">
      <a href="index.php?halaman=tambahadmin" class="btn btn-primary btn-sm">
        <i class="fas fa-user-plus"></i> Tambah Admin
      </a>
    </div>

    <!-- Card data admin -->
    <div class="card" style="margin-left: 0; margin-right: 0;">
      <div class="card-header">
        <h3 class="card-title mb-0">Data Admin</h3>
      </div>

      <div class="card-body p-0">
        <table class="table table-hover table-bordered table-striped mb-0" style="width: 100%;">
          <thead class="thead-dark text-center">
            <tr>
              <th>ID Admin</th>
              <th>Nama Admin</th>
              <th>ID Jabatan</th>
              <th>Username</th>
              <th>Password</th>
              <th>No HP</th>
              <th>Email</th>
            </tr>
          </thead>
          <tbody>
            <?php while ($data = mysqli_fetch_assoc($query)) { ?>
              <tr>
                <td class="text-center"><?= $data['idadmin'] ?></td>
                <td><?= htmlspecialchars($data['namaadmin'] ?? '-', ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlspecialchars($data['idjabatan'] ?? '-', ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlspecialchars($data['username'] ?? '-', ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlspecialchars($data['password'] ?? '-', ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlspecialchars($data['nohp'] ?? '-', ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlspecialchars($data['email'] ?? '-', ENT_QUOTES, 'UTF-8') ?></td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>

  </div>
</section>
