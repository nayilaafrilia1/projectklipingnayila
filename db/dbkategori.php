<?php
include "../koneksi.php";
session_start();

$proses = $_GET['proses'] ?? '';

/* ==========================================
   TAMBAH KATEGORI
========================================== */
if ($proses == 'tambah') {
    $namakategori = mysqli_real_escape_string($koneksi, $_POST['namakategori'] ?? '');

    if (empty($namakategori)) {
        echo "<script>alert('Nama kategori tidak boleh kosong!'); window.history.back();</script>";
        exit;
    }

    $query = "INSERT INTO kategori (namakategori) VALUES ('$namakategori')";
    $simpan = mysqli_query($koneksi, $query);

    if ($simpan) {
        echo "<script>
            alert('Kategori berhasil ditambahkan!');
            window.location.href='/nayilaafrilia/11pertemuan29/2lembarkerja/index.php?halaman=kategori';
        </script>";
    } else {
        echo "<script>alert('Gagal menambahkan kategori: " . mysqli_error($koneksi) . "'); window.history.back();</script>";
    }
}

/* ==========================================
   EDIT KATEGORI
========================================== */
elseif ($proses == 'edit') {
    $idkategori = mysqli_real_escape_string($koneksi, $_POST['idkategori'] ?? '');
    $namakategori = mysqli_real_escape_string($koneksi, $_POST['namakategori'] ?? '');

    if (empty($idkategori) || empty($namakategori)) {
        echo "<script>alert('Data tidak lengkap!'); window.history.back();</script>";
        exit;
    }

    $query = "UPDATE kategori SET namakategori='$namakategori' WHERE idkategori='$idkategori'";
    $edit = mysqli_query($koneksi, $query);

    if ($edit) {
        echo "<script>
            alert('Kategori berhasil diperbarui!');
            window.location.href='/nayilaafrilia/11pertemuan29/2lembarkerja/index.php?halaman=kategori';
        </script>";
    } else {
        echo "<script>alert('Gagal memperbarui kategori: " . mysqli_error($koneksi) . "'); window.history.back();</script>";
    }
}

/* ==========================================
   HAPUS KATEGORI
========================================== */
elseif ($proses == 'hapus') {
    $idkategori = mysqli_real_escape_string($koneksi, $_GET['idkategori'] ?? '');

    if (empty($idkategori)) {
        echo "<script>alert('ID kategori tidak ditemukan!'); window.history.back();</script>";
        exit;
    }

    $hapus = mysqli_query($koneksi, "DELETE FROM kategori WHERE idkategori='$idkategori'");

    if ($hapus) {
        echo "<script>
            alert('Kategori berhasil dihapus!');
            window.location.href='/nayilaafrilia/11pertemuan29/2lembarkerja/index.php?halaman=kategori';
        </script>";
    } else {
        echo "<script>alert('Gagal menghapus kategori: " . mysqli_error($koneksi) . "'); window.history.back();</script>";
    }
}

/* ==========================================
   TIDAK ADA PROSES
========================================== */
else {
    echo "<script>
        alert('Proses tidak dikenal!');
        window.location.href='/nayilaafrilia/11pertemuan29/2lembarkerja/index.php?halaman=kategori';
    </script>";
}
?>
