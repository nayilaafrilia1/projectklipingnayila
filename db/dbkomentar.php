<?php
include "../koneksi.php"; // Pastikan path ini benar sesuai struktur proyek kamu

$proses = $_GET['proses'] ?? '';

/* ==========================================
   TAMBAH KOMENTAR
========================================== */
if ($proses == 'tambah') {
    $isikomentar = mysqli_real_escape_string($koneksi, $_POST['isikomentar']);
    $tanggalkomentar = date('Y-m-d H:i:s'); // otomatis isi tanggal sekarang

    $query = "INSERT INTO komentar (isikomentar, tanggalkomentar) 
              VALUES ('$isikomentar', '$tanggalkomentar')";
    $simpan = mysqli_query($koneksi, $query);

    if ($simpan) {
        echo "<script>alert('Komentar berhasil ditambahkan!'); 
              window.location='../index.php?halaman=komentar';</script>";
    } else {
        echo "<script>alert('Gagal menambah komentar: " . mysqli_error($koneksi) . "'); 
              window.history.back();</script>";
    }
}

/* ==========================================
   EDIT KOMENTAR
========================================== */
elseif ($proses == 'edit') {
    $idkomentar = $_POST['idkomentar'];
    $isikomentar = mysqli_real_escape_string($koneksi, $_POST['isikomentar']);
    $tanggalkomentar = date('Y-m-d H:i:s'); // update waktu komentar

    $query = "UPDATE komentar SET 
                isikomentar = '$isikomentar', 
                tanggalkomentar = '$tanggalkomentar' 
              WHERE idkomentar = '$idkomentar'";

    $edit = mysqli_query($koneksi, $query);

    if ($edit) {
        echo "<script>alert('Komentar berhasil diperbarui!'); 
              window.location='../index.php?halaman=komentar';</script>";
    } else {
        echo "<script>alert('Gagal memperbarui komentar: " . mysqli_error($koneksi) . "'); 
              window.history.back();</script>";
    }
}

/* ==========================================
   HAPUS KOMENTAR
========================================== */
elseif ($proses == 'hapus') {
    $idkomentar = $_GET['idkomentar'];

    $hapus = mysqli_query($koneksi, "DELETE FROM komentar WHERE idkomentar='$idkomentar'");

    if ($hapus) {
        echo "<script>alert('Komentar berhasil dihapus!'); 
              window.location='../index.php?halaman=komentar';</script>";
    } else {
        echo "<script>alert('Gagal menghapus komentar: " . mysqli_error($koneksi) . "'); 
              window.history.back();</script>";
    }
}

/* ==========================================
   DEFAULT - jika parameter tidak dikenali
========================================== */
else {
    echo "<script>alert('Proses tidak dikenali!'); 
          window.history.back();</script>";
}
?>
