<?php
// Gunakan __DIR__ agar path selalu tepat meskipun file dipanggil dari lokasi berbeda
include __DIR__ . '/../../koneksi.php';

// Proses simpan kategori
if (isset($_POST['simpan'])) {
    $nama_kategori = mysqli_real_escape_string($koneksi, trim($_POST['nama_kategori']));

    // Cek apakah kategori sudah ada
    $cek = mysqli_query($koneksi, "SELECT * FROM kategori WHERE namakategori='$nama_kategori'");
    if (mysqli_num_rows($cek) > 0) {
        echo "<script>
                alert('Kategori sudah ada!');
                window.location='index.php?halaman=kategori';
              </script>";
    } else {
        $query = mysqli_query($koneksi, "INSERT INTO kategori (namakategori) VALUES ('$nama_kategori')");
        if ($query) {
            echo "<script>
                    alert('Kategori berhasil ditambahkan!');
                    window.location='index.php?halaman=kategori';
                  </script>";
        } else {
            echo "<script>alert('Gagal menambahkan kategori!');</script>";
        }
    }
}
?>

<div class="card">
    <div class="card-header bg-primary text-white">
        <h3 class="card-title">Tambah Kategori</h3>
    </div>
    <div class="card-body">
        <form method="POST" action="">
            <div class="form-group mb-3">
                <label for="nama_kategori">Nama Kategori</label>
                <input type="text" id="nama_kategori" name="nama_kategori" class="form-control"
                       placeholder="Masukkan nama kategori" required>
            </div>
            <button type="submit" name="simpan" class="btn btn-success">Simpan</button>
            <a href="index.php?halaman=kategori" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
