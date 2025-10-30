<?php
session_start(); // Penting kalau pakai $_SESSION

include_once __DIR__ . '/../koneksi.php';

// Cek parameter proses
if (!isset($_GET['proses'])) {
    die("Aksi tidak dikenali.");
}

$proses = $_GET['proses'];

// =========================================================
// ================ PROSES TAMBAH ADMIN ====================
// =========================================================
if ($proses == 'tambah') {
    $nama      = mysqli_real_escape_string($koneksi, $_POST['namaadmin']);
    $username  = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password  = trim($_POST['password']);
    $nohp      = mysqli_real_escape_string($koneksi, $_POST['nohp']);
    $email     = mysqli_real_escape_string($koneksi, $_POST['email']);
    $idjabatan = intval($_POST['idjabatan']);

    // Validasi minimal
    if (empty($nama) || empty($username) || empty($password)) {
        echo "<script>
                alert('Semua field wajib diisi!');
                window.history.back();
              </script>";
        exit;
    }

    // Enkripsi password
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    // Proses upload foto
    $fotoFinal = 'default-user.png';
    if (!empty($_FILES['fotoadmin']['name'])) {
        $foto = $_FILES['fotoadmin']['name'];
        $tmp  = $_FILES['fotoadmin']['tmp_name'];
        $folder = __DIR__ . '/../foto/admin/';

        if (!is_dir($folder)) mkdir($folder, 0777, true);

        $namaFileBaru = time() . '_' . basename($foto);
        if (move_uploaded_file($tmp, $folder . $namaFileBaru)) {
            $fotoFinal = $namaFileBaru;
        }
    }

    // Simpan ke database
    $query = "
        INSERT INTO admin (namaadmin, username, password, nohp, email, idjabatan, fotoadmin)
        VALUES ('$nama', '$username', '$passwordHash', '$nohp', '$email', $idjabatan, '$fotoFinal')
    ";

    if (mysqli_query($koneksi, $query)) {
        echo "<script>
                alert('Admin berhasil ditambahkan!');
                window.location='../index.php?halaman=admin';
              </script>";
        exit;
    } else {
        echo "❌ Gagal menambah admin: " . mysqli_error($koneksi);
    }
}

// =========================================================
// ================ PROSES EDIT ADMIN ======================
// =========================================================
elseif ($proses == 'edit') {
    $idadmin   = intval($_POST['idadmin']);
    $nama      = mysqli_real_escape_string($koneksi, $_POST['namaadmin']);
    $username  = mysqli_real_escape_string($koneksi, $_POST['username']);
    $nohp      = mysqli_real_escape_string($koneksi, $_POST['nohp']);
    $email     = mysqli_real_escape_string($koneksi, $_POST['email']);
    $idjabatan = intval($_POST['idjabatan']);
    $password  = trim($_POST['password']);

    // Ambil data lama
    $q_lama = mysqli_query($koneksi, "SELECT fotoadmin FROM admin WHERE idadmin = $idadmin");
    $d_lama = mysqli_fetch_assoc($q_lama);
    $foto_lama = $d_lama['fotoadmin'] ?? '';

    // Upload foto baru
    $fotoFinal = $foto_lama;
    if (!empty($_FILES['fotoadmin']['name'])) {
        $fotoBaru = $_FILES['fotoadmin']['name'];
        $tmp = $_FILES['fotoadmin']['tmp_name'];
        $folderTujuan = __DIR__ . '/../foto/admin/';
        if (!is_dir($folderTujuan)) mkdir($folderTujuan, 0777, true);

        $namaFileBaru = time() . '_' . basename($fotoBaru);
        if (move_uploaded_file($tmp, $folderTujuan . $namaFileBaru)) {
            $fotoFinal = $namaFileBaru;
            if (!empty($foto_lama) && file_exists($folderTujuan . $foto_lama)) {
                unlink($folderTujuan . $foto_lama);
            }
        }
    }

    // Update query
    if (!empty($password)) {
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $query = "
            UPDATE admin SET 
                namaadmin='$nama',
                username='$username',
                password='$passwordHash',
                nohp='$nohp',
                email='$email',
                idjabatan=$idjabatan,
                fotoadmin='$fotoFinal'
            WHERE idadmin=$idadmin
        ";
    } else {
        $query = "
            UPDATE admin SET 
                namaadmin='$nama',
                username='$username',
                nohp='$nohp',
                email='$email',
                idjabatan=$idjabatan,
                fotoadmin='$fotoFinal'
            WHERE idadmin=$idadmin
        ";
    }

    if (mysqli_query($koneksi, $query)) {
        echo "<script>
                alert('Data admin berhasil diperbarui!');
                window.location='../index.php?halaman=admin';
              </script>";
        exit;
    } else {
        echo "❌ Gagal update data: " . mysqli_error($koneksi);
    }
}

// =========================================================
// ================ PROSES HAPUS ADMIN =====================
// =========================================================
elseif ($proses == 'hapus') {
    $idadmin = base64_decode($_GET['id']); 

    if (isset($_SESSION['idadmin']) && $_SESSION['idadmin'] == $idadmin) {
        echo "<script>
                alert('Tidak dapat menghapus diri sendiri!');
                window.location='../index.php?halaman=admin';
              </script>";
        exit;
    }

    $foto_query = mysqli_query($koneksi, "SELECT fotoadmin FROM admin WHERE idadmin='$idadmin'");
    $foto_data = mysqli_fetch_assoc($foto_query);
    $nama_foto = $foto_data['fotoadmin'] ?? null;

    $hapus = mysqli_query($koneksi, "DELETE FROM admin WHERE idadmin='$idadmin'");

    if ($hapus) {
        if ($nama_foto && $nama_foto != 'default-user.png' && file_exists('../foto/admin/' . $nama_foto)) {
            unlink('../foto/admin/' . $nama_foto);
        }

        echo "<script>
                alert('Admin berhasil dihapus!');
                window.location='../index.php?halaman=admin';
              </script>";
    } else {
        echo "<script>
                alert('Gagal menghapus admin.');
                window.history.back();
              </script>";
    }
    exit;
}
?>
