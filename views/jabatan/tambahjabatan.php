<?php
ob_start();
include 'koneksi.php';

if (isset($_POST['simpan'])) {
    $namajabatan = mysqli_real_escape_string($koneksi, $_POST['namajabatan']);

    $query = mysqli_query($koneksi, "INSERT INTO jabatan (namajabatan) VALUES ('$namajabatan')");

    if ($query) {
        echo "<script>
                alert('Jabatan berhasil ditambahkan!');
                window.location='index.php?halaman=jabatan';
              </script>";
        exit;
    } else {
        echo "<div class='alert alert-danger'>Gagal menambah jabatan: " . mysqli_error($koneksi) . "</div>";
    }
}
ob_end_flush();
?>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Tambah Jabatan</h3>
    </div>

    <div class="card-body">
        <form method="POST">
            <div class="mb-3">
                <label for="namajabatan" class="form-label">Nama Jabatan</label>
                <input type="text" name="namajabatan" id="namajabatan" class="form-control" required>
            </div>

            <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
            <a href="index.php?halaman=jabatan" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
