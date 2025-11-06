<?php
include 'koneksi.php';
session_start();

// kalau sudah login, langsung ke index
if (isset($_SESSION['username'])) {
  header("Location: index.php");
  exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = trim($_POST['username']);
  $password = md5($_POST['password']); // samakan dengan sistem login kamu
  $confirm  = md5($_POST['confirm']);

  // cek password sama atau tidak
  if ($password !== $confirm) {
    $error = "Password dan konfirmasi tidak cocok!";
  } else {
    // cek username sudah ada atau belum
    $check = mysqli_query($conn, "SELECT * FROM tb_user WHERE username='$username'");
    if (mysqli_num_rows($check) > 0) {
      $error = "Username sudah digunakan!";
    } else {
      $role = 'user';
      $query = "INSERT INTO tb_user (username, password, role) VALUES ('$username', '$password', '$role')";
      if (mysqli_query($conn, $query)) {
        header("Location: login.php?success=1");
        exit;
      } else {
        $error = "Gagal mendaftar, coba lagi!";
      }
    }
  }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registrasi Akun | MBOZOKAMANE</title>
  <link rel="stylesheet" href="asset/styles.css">
  <style>
    body {
      background: linear-gradient(180deg, #dbeafe, #ffffff);
      font-family: 'Inter', sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    .register-box {
      background: #fff;
      padding: 30px 40px;
      border-radius: 12px;
      box-shadow: 0 4px 20px rgba(0,0,0,0.1);
      width: 350px;
    }
    h2 {
      text-align: center;
      margin-bottom: 20px;
      color: #1e3a8a;
    }
    input {
      width: 100%;
      padding: 10px;
      margin-bottom: 12px;
      border: 1px solid #cbd5e1;
      border-radius: 8px;
    }
    button {
      width: 100%;
      padding: 10px;
      background: #3b82f6;
      color: white;
      border: none;
      border-radius: 8px;
      font-weight: bold;
      cursor: pointer;
    }
    button:hover {
      background: #2563eb;
    }
    .link {
      text-align: center;
      margin-top: 10px;
    }
    .error {
      color: red;
      text-align: center;
      margin-bottom: 10px;
    }
  </style>
</head>
<body>

  <div class="register-box">
    <h2>Daftar Akun</h2>
    <?php if (!empty($error)): ?>
      <p class="error"><?= $error ?></p>
    <?php endif; ?>
    <form method="POST" action="">
      <input type="text" name="username" placeholder="Username" required>
      <input type="password" name="password" placeholder="Password" required>
      <input type="password" name="confirm" placeholder="Konfirmasi Password" required>
      <button type="submit">Daftar</button>
    </form>
    <div class="link">
      <p>Sudah punya akun? <a href="login.php">Login di sini</a></p>
    </div>
  </div>

</body>
</html>
