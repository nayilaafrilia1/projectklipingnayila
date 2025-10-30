<?php
// Mulai session
session_start();

// Koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "db_login"); 
// Ubah "db_login" sesuai nama database kamu

// Cek koneksi
if (mysqli_connect_errno()) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

// Ambil data dari form login
$username = $_POST['username'];
$password = $_POST['password'];

// Cegah SQL Injection
$username = mysqli_real_escape_string($koneksi, $username);
$password = mysqli_real_escape_string($koneksi, $password);

// Query untuk cek user di database
$query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
$result = mysqli_query($koneksi, $query);

// Cek hasil query
if (mysqli_num_rows($result) > 0) {
    // Jika login berhasil
    $_SESSION['username'] = $username;
    header("Location: dashboard.php"); // arahkan ke halaman utama
    exit();
} else {
    // Jika login gagal
    echo "<script>
        alert('Username atau password salah!');
        window.location.href = 'login.php';
    </script>";
}
?>
