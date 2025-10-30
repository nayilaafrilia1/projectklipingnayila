<?php
include "../koneksi.php";
session_start();

$proses = isset($_GET['proses']) ? $_GET['proses'] : '';

/* ==========================================
   TAMBAH JABATAN
========================================== */
if ($proses == 'tambah') {
    $namajabatan = mysqli_real_escape_string($koneksi, $_POST['namajabatan']);

    $query = mysqli_query($koneksi, "INSERT INTO jabatan (namajabatan) VALUES ('$namajabatan')");

    if ($query) {
        echo "<script>
                alert('Jabatan berhasil ditambahkan!');
                window.location='../index.php?halaman=jabatan';
              </script>";
    } else {
        echo "<script>
                alert('Gagal menambah jabatan.');
                window.history.back();
              </script>";
    }
    exit;
}

/* ==========================================
   EDIT JABATAN
========================================== */
if ($proses == 'edit') {
    $idjabatan = $_POST['idjabatan'];
    $namajabatan = mysqli_real_escape_string($koneksi, $_POST['namajabatan']);

    $query = mysqli_query($koneksi, "UPDATE jabatan SET namajabatan='$namajabatan' WHERE idjabatan='$idjabatan'");

    if ($query) {
        echo "<script>
                alert('Jabatan berhasil diperbarui!');
                window.location='../index.php?halaman=jabatan';
              </script>";
    } else {
        echo "<script>
                alert('Gagal memperbarui jabatan.');
                window.history.back();
              </script>";
    }
    exit;
}

/* ==========================================
   HAPUS JABATAN (CEK RELASI DENGAN ADMIN)
========================================== */
if ($proses == 'hapus') {
    $idjabatan = $_GET['idjabatan'];

    // Cek apakah jabatan masih dipakai oleh admin
    $cek = mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM admin WHERE idjabatan = '$idjabatan'");
    $data = mysqli_fetch_assoc($cek);

    if ($data['total'] > 0) {
        echo "<script>
                alert('Tidak dapat menghapus jabatan karena masih digunakan oleh {$data['total']} admin.');
                window.location='../index.php?halaman=jabatan';
              </script>";
        exit;
    }

    // Jika tidak digunakan, baru hapus
    $hapus = mysqli_query($koneksi, "DELETE FROM jabatan WHERE idjabatan='$idjabatan'");

    if ($hapus) {
        echo "<script>
                alert('Jabatan berhasil dihapus!');
                window.location='../index.php?halaman=jabatan';
              </script>";
    } else {
        echo "<script>
                alert('Gagal menghapus jabatan.');
                window.history.back();
              </script>";
    }
    exit;
}
?>
