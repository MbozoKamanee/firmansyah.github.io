<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] != 'user') {
    header("Location: ../login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard User | MBOZOKAMANE</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Inter', sans-serif;
      margin: 0;
      background: linear-gradient(180deg, #e0f2fe 0%, #ffffff 100%);
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      height: 100vh;
    }
    .dashboard {
      background: white;
      padding: 40px;
      border-radius: 15px;
      box-shadow: 0 4px 15px rgba(0,0,0,0.1);
      text-align: center;
      width: 350px;
    }
    h1 {
      color: #1e3a8a;
      margin-bottom: 20px;
    }
    .btn {
      display: inline-block;
      margin: 10px 5px;
      padding: 10px 20px;
      border-radius: 8px;
      text-decoration: none;
      font-weight: 500;
      transition: 0.3s;
    }
    .btn-home {
      background: #3b82f6;
      color: white;
    }
    .btn-home:hover {
      background: #2563eb;
    }
    .btn-logout {
      background: #ef4444;
      color: white;
    }
    .btn-logout:hover {
      background: #dc2626;
    }
  </style>
</head>
<body>
  <div class="dashboard">
    <h1>Selamat Datang, <span><?= $_SESSION['username']; ?></span> 👋</h1>
    <p>Anda login sebagai <strong><?= $_SESSION['role']; ?></strong>.</p>

    <div class="actions">
      <a href="../index.php" class="btn btn-home">🏠 Beranda</a>
      <a href="../logout.php" class="btn btn-logout">🚪 Logout</a>
    </div>
  </div>
</body>
</html>
