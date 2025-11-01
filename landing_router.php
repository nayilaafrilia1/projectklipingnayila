<?php
// Router untuk halaman publik / landing page

$halaman = $_GET['halaman'] ?? 'home';
$path = __DIR__ . "/landing/$halaman.php"; // pastikan path absolut

if (file_exists($path)) {
    include $path;
} else {
    include __DIR__ . '/landing/home.php';
}
