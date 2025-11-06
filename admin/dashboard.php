<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] != 'admin') {
  header("Location: ../login.php");
  exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard Admin | MBOZOKAMANE</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/a2e0e9d6b3.js" crossorigin="anonymous"></script>
  <style>
    * {
      box-sizing: border-box;
      transition: all 0.3s ease;
    }

    /* === FULL BACKGROUND IMAGE === */
    body {
      margin: 0;
      font-family: 'Poppins', sans-serif;
      color: #1e293b;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      background: url("asset/saya.jpg") no-repeat center center fixed;
      background-size: cover;
    }

    /* Overlay agar teks tetap jelas */
    body::before {
      content: "";
      position: fixed;
      top: 0; left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0,0,0,0.35);
      z-index: -1;
    }

    /* HEADER */
    .header {
      background: rgba(99, 102, 241, 0.9);
      backdrop-filter: blur(6px);
      color: white;
      padding: 18px 40px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      position: sticky;
      top: 0;
      z-index: 10;
      border-bottom: 2px solid rgba(255,255,255,0.2);
    }

    .header h1 {
      margin: 0;
      font-size: 22px;
      letter-spacing: 0.5px;
      font-weight: 600;
    }

    .menu-admin a {
      color: white;
      margin: 0 12px;
      text-decoration: none;
      font-weight: 500;
      position: relative;
    }

    .menu-admin a::after {
      content: '';
      position: absolute;
      width: 0%;
      height: 2px;
      background: white;
      bottom: -4px;
      left: 0;
      transition: width 0.3s;
    }

    .menu-admin a:hover::after {
      width: 100%;
    }

    .logout-btn {
      background: #ef4444;
      color: white;
      padding: 8px 16px;
      border-radius: 8px;
      text-decoration: none;
      font-size: 14px;
      font-weight: 500;
      transition: 0.3s;
    }

    .logout-btn:hover {
      background: #dc2626;
      transform: scale(1.05);
    }

    /* MAIN WRAPPER */
    .container {
      max-width: 1100px;
      margin: 80px auto;
      background: rgba(255, 255, 255, 0.85);
      backdrop-filter: blur(10px);
      border-radius: 20px;
      padding: 50px;
      box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
      animation: fadeIn 0.6s ease;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(10px); }
      to { opacity: 1; transform: translateY(0); }
    }

    .welcome {
      text-align: center;
      margin-bottom: 40px;
    }

    .welcome h2 {
      font-size: 26px;
      color: #1e3a8a;
      margin: 0;
    }

    .welcome p {
      color: #334155;
      font-size: 15px;
    }

    .welcome span {
      font-weight: 600;
      color: #2563eb;
    }

    /* DASHBOARD ACTION CARDS */
    .actions {
      display: flex;
      justify-content: center;
      flex-wrap: wrap;
      gap: 40px;
    }

    .action-card {
      background: rgba(255, 255, 255, 0.85);
      border-radius: 16px;
      padding: 30px 20px;
      width: 260px;
      text-align: center;
      box-shadow: 0 3px 18px rgba(0,0,0,0.15);
      text-decoration: none;
      color: inherit;
      position: relative;
      overflow: hidden;
      backdrop-filter: blur(6px);
    }

    .action-card:hover {
      transform: translateY(-6px);
      border-color: #6366f1;
    }

    .action-card h3 {
      color: #1e3a8a;
      font-size: 20px;
      margin: 10px 0 8px;
    }

    .action-card p {
      color: #475569;
      font-size: 14px;
    }

    .action-icon {
      font-size: 36px;
      color: #6366f1;
      margin-bottom: 10px;
      display: inline-block;
    }

    /* FOOTER */
    footer {
      text-align: center;
      padding: 20px 0;
      color: white;
      font-size: 14px;
      margin-top: auto;
      background: rgba(30,41,59,0.8);
      border-top: 1px solid rgba(255,255,255,0.1);
    }
  </style>
</head>
<body>

  <!-- Header -->
  <header class="header">
    <h1>MBOZOKAMANE Admin</h1>
    <nav class="menu-admin">
      <a href="../index.php">Beranda</a>
      <a href="data_pengguna.php">User</a>
      <a href="../logout.php" class="logout-btn">Logout</a>
    </nav>
  </header>

  <!-- Main Content -->
  <main class="container">
    <div class="welcome">
      <h2>Selamat Datang, <span><?= $_SESSION['username']; ?></span> 👋</h2>
      <p>Anda login sebagai <span><?= $_SESSION['role']; ?></span>.  
         Silakan kelola pengguna di bawah ini.</p>
    </div>

    <div class="actions">
      <a href="data_pengguna.php" class="action-card">
        <i class="fa-solid fa-users-gear action-icon"></i>
        <h3>Kelola Pengguna</h3>
        <p>Tambah, edit, dan hapus akun pengguna yang terdaftar.</p>
      </a>
    </div>
  </main>

  <footer>
    © 2025 MBOZOKAMANE — Hanya Untuk Admin
  </footer>

</body>
</html>
