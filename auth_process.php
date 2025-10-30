<?php
session_start();
require_once '../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: login.php");
    exit;
}

$username = trim($_POST['username'] ?? '');
$password = $_POST['password'] ?? '';

if ($username === '' || $password === '') {
    header("Location: login.php?error=" . urlencode("Username atau password tidak boleh kosong"));
    exit;
}

$stmt = $koneksi->prepare("SELECT idadmin, username, password, namaadmin FROM admin WHERE username = ? LIMIT 1");
if (!$stmt) {
    header("Location: login.php?error=" . urlencode("Kesalahan server"));
    exit;
}
$stmt->bind_param('s', $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result && $result->num_rows === 1) {
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['password'])) {
        session_regenerate_id(true);
        $_SESSION['idadmin']   = $row['idadmin'];
        $_SESSION['username']  = $row['username'];
        $_SESSION['namaadmin'] = $row['namaadmin'];
        $_SESSION['last_activity'] = time();

        header("Location: ../dashboard.php");
        exit;
    }
}

header("Location: login.php?error=" . urlencode("Username atau password salah"));
exit;
?>
