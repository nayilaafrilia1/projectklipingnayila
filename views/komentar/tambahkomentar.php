<?php
if (!isset($koneksi)) {
    include __DIR__ . '/../../koneksi.php';
}

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Jalankan hanya jika form dikirim
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Ambil data dari form dengan pengecekan
    $isikomentar = isset($_POST['isikomentar']) ? mysqli_real_escape_string($koneksi, $_POST['isikomentar']) : '';

    // Validasi input
    if (empty($isikomentar)) {
        echo "<script>alert('Isi komentar tidak boleh kosong!');</script>";
    } else {
        $query = "INSERT INTO komentar (isikomentar, tanggalkomentar) VALUES ('$isikomentar', NOW())";
        $simpan = mysqli_query($koneksi, $query);

        if ($simpan) {
            echo "<script>
                alert('Komentar berhasil disimpan!');
                window.location.href='index.php?halaman=komentar';
            </script>";
            exit;
        } else {
            echo "<div class='alert alert-danger m-3'>
                    Gagal menyimpan komentar: " . mysqli_error($koneksi) . "
                  </div>";
        }
    }
}
?>

<section class="content">
    <div class="card shadow-sm">
        <div class="card-header bg-gradient-primary">
            <h3 class="card-title text-white m-0">Tambah Komentar</h3>
        </div>
        <div class="card-body">
            <form method="POST">
                <div class="form-group">
                    <label for="isikomentar">Isi Komentar</label>
                    <textarea name="isikomentar" id="isikomentar" rows="5" class="form-control" placeholder="Tulis komentar..." required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Simpan
                </button>
                <a href="index.php?halaman=komentar" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </form>
        </div>
    </div>
</section>
