<?php
include 'koneksi.php';

// Ambil data admin aktif (sementara ambil baris pertama)
$id_admin = 1; 
$data_admin = mysqli_query($koneksi, "SELECT * FROM admin WHERE idadmin = '$id_admin'");
$admin = mysqli_fetch_assoc($data_admin);
?>

<section class="content">
  <div class="container-fluid">
    <div class="row">

      <!-- Profil Card -->
      <div class="col-md-4">
        <div class="card card-primary card-outline shadow-sm">
          <div class="card-body box-profile text-center">
            <!-- Foto Profil -->
            <div class="mb-3">
              <?php if (!empty($admin['foto'])): ?>
                <img class="profile-user-img img-fluid img-circle"
                     src="uploads/<?= htmlspecialchars($admin['foto']); ?>"
                     alt="Foto Admin" style="width:120px; height:120px; object-fit:cover;">
              <?php else: ?>
                <img class="profile-user-img img-fluid img-circle"
                     src="dist/img/default-user.png"
                     alt="Default Foto" style="width:120px; height:120px; object-fit:cover;">
              <?php endif; ?>
            </div>

            <h3 class="profile-username text-center"><?= htmlspecialchars($admin['namaadmin'] ?? 'Nama Admin'); ?></h3>
            
            <a href="index.php?halaman=editadmin&id=<?= $admin['idadmin']; ?>" 
               class="btn btn-primary btn-block">
              <b>Edit Profil</b>
            </a>
          </div>
        </div>
      </div>

      <!-- Detail Profil -->
      <div class="col-md-8">
        <div class="card shadow-sm">
          <div class="card-header bg-primary text-white">
            <h3 class="card-title"><i class="fas fa-user-circle mr-2"></i> Detail Profil</h3>
          </div>
          <div class="card-body">
            <table class="table table-bordered table-striped">
              <tr>
                <th width="30%">Nama Lengkap</th>
                <td><?= htmlspecialchars($admin['namaadmin'] ?? '-'); ?></td>
              </tr>
              <tr>
                <th>Email</th>
                <td><?= htmlspecialchars($admin['email'] ?? '-'); ?></td>
              </tr>
              <tr>
                <th>Username</th>
                <td><?= htmlspecialchars($admin['username'] ?? '-'); ?></td>
              </tr>
              <tr>
                <th>Tanggal Bergabung</th>
                <td><?= htmlspecialchars($admin['tanggaldaftar'] ?? date('Y-m-d')); ?></td>
              </tr>
            </table>
          </div>
        </div>

        <!-- Info tambahan -->
        <div class="card bg-light mt-3 shadow-sm">
          <div class="card-body">
            <h5><i class="fas fa-info-circle text-primary mr-2"></i> Informasi Tambahan</h5>
            <p class="text-muted mb-0">
              Halaman ini menampilkan informasi lengkap tentang akun admin yang sedang login.
              Kamu bisa memperbarui data melalui tombol <b>Edit Profil</b>.
            </p>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>
