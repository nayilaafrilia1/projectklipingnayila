<?php
include 'koneksi.php';

if (isset($_POST['simpan'])) {
  $isikomentar = $_POST['isikomentar'];
  $tglkomentar = date('Y-m-d');

  $query = mysqli_query($koneksi, "INSERT INTO komentar (isikomentar, tglkomentar) VALUES ('$isikomentar', '$tglkomentar')");

  if ($query) {
    echo "<script>alert('Komentar berhasil ditambahkan!'); window.location='index.php?halaman=komentar';</script>";
  } else {
    echo "<script>alert('Gagal menambah komentar');</script>";
  }
}
?>

<div class="card">
  <div class="card-header">
    <h3 class="card-title">Tambah Komentar</h3>
  </div>

  <div class="card-body">
    <form method="POST" action="">
      <div class="form-group">
        <label>Isi Komentar</label>
        <textarea name="isikomentar" class="form-control" rows="3" required></textarea>
      </div>

      <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
      <a href="index.php?halaman=komentar" class="btn btn-secondary">Kembali</a>
    </form>
  </div>
</div>
