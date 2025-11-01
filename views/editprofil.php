<?php
include 'koneksi.php';

$id = $_GET['id'] ?? 0;
$query = mysqli_query($koneksi, "SELECT * FROM admin WHERE idadmin = '$id'");
$admin = mysqli_fetch_assoc($query);

if (isset($_POST['update'])) {
    $nama = mysqli_real_escape_string($koneksi, $_POST['namaadmin']);
    $email = mysqli_real_escape_string($koneksi, $_POST['email']);
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);

    // Cek apakah ada file foto baru
    $foto_baru = $_FILES['foto']['name'];
    if (!empty($foto_baru)) {
        $tmp_name = $_FILES['foto']['tmp_name'];
        $nama_file = time() . '_' . basename($foto_baru);
        move_uploaded_file($tmp_name, "uploads/" . $nama_file);

        // Hapus foto lama jika ada
        if (!empty($admin['foto']) && file_exists("uploads/" . $admin['foto'])) {
            unlink("uploads/" . $admin['foto']);
        }

        // Update dengan foto baru
        $update = mysqli_query($koneksi, "UPDATE admin SET 
                    namaadmin='$nama', email='$email', username='$username', foto='$nama_file' 
                    WHERE idadmin='$id'");
    } else {
        // Update tanpa ubah foto
        $update = mysqli_query($koneksi, "UPDATE admin SET 
                    namaadmin='$nama', email='$email', username='$username' 
                    WHERE idadmin='$id'");
    }

    if ($update) {
        echo "<script>
                alert('Profil berhasil diperbarui!');
                window.location.href='index.php?halaman=profil';
              </script>";
        exit;
    } else {
        echo "<div class='alert alert-danger'>Gagal memperbarui profil.</div>";
    }
}
?>

<section class="content">
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card shadow-sm">
          <div class="card-header bg-primary text-white">
            <h3 class="card-title"><i class="fas fa-edit mr-2"></i> Edit Profil</h3>
          </div>
          <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
              <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" name="namaadmin" class="form-control" 
                       value="<?= htmlspecialchars($admin['namaadmin']); ?>" required>
              </div>

              <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" 
                       value="<?= htmlspecialchars($admin['email']); ?>" required>
              </div>

              <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control" 
                       value="<?= htmlspecialchars($admin['username']); ?>" required>
              </div>

              <div class="form-group">
                <label>Foto Profil</label><br>
                <?php if (!empty($admin['foto'])): ?>
                  <img src="uploads/<?= htmlspecialchars($admin['foto']); ?>" 
                       alt="Foto Profil" class="img-thumbnail mb-2" 
                       style="width:120px; height:120px; object-fit:cover;">
                <?php else: ?>
                  <img src="dist/img/default-user.png" 
                       alt="Default" class="img-thumbnail mb-2" 
                       style="width:120px; height:120px; object-fit:cover;">
                <?php endif; ?>
                <input type="file" name="foto" class="form-control-file">
                <small class="text-muted">Kosongkan jika tidak ingin mengubah foto.</small>
              </div>

              <button type="submit" name="update" class="btn btn-primary">
                <i class="fas fa-save"></i> Simpan Perubahan
              </button>
              <a href="index.php?halaman=profil" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Kembali
              </a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
