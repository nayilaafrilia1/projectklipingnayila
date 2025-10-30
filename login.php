<?php
session_start();
if (isset($_SESSION['login'])) {
  header("Location: ../index.php?halaman=dashboard");
  exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login CMS Nayila</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(135deg, #007bff, #6610f2);
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .login-card {
      background: white;
      padding: 40px;
      border-radius: 12px;
      width: 380px;
      box-shadow: 0 5px 20px rgba(0,0,0,0.2);
    }
    .logo {
      width: 80px;
      margin-bottom: 20px;
    }
  </style>
</head>
<body>

<div class="login-card text-center">
  <img src="../dist/img/AdminLTELogo.png" class="logo" alt="Logo CMS">
  <h4 class="mb-4">Login Administrator</h4>
  <form action="../cek_login.php" method="POST">
    <div class="form-floating mb-3">
      <input type="text" name="username" class="form-control" placeholder="Username" required>
      <label>Username</label>
    </div>
    <div class="form-floating mb-3">
      <input type="password" name="password" class="form-control" placeholder="Password" required>
      <label>Password</label>
    </div>
    <button type="submit" name="login" class="btn btn-primary w-100">Login</button>
  </form>
</div>

</body>
</html>
