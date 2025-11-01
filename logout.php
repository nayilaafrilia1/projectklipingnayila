<?php
session_start();
session_unset();  // Hapus semua variabel sesi
session_destroy(); // Hapus sesi
header("Location: login.php"); // Arahkan ke halaman login
exit;
?>
