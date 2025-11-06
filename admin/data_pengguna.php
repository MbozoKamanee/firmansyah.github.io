<?php
session_start();
include '../koneksi.php';

if (!isset($_SESSION['username']) || $_SESSION['role'] != 'admin') {
  header("Location: ../login.php");
  exit;
}

// Ambil data user dari database
$result = mysqli_query($conn, "SELECT * FROM tb_user ORDER BY id DESC");

// Tambah User
if (isset($_POST['tambah'])) {
  $username = $_POST['username'];
  $password = md5($_POST['password']);
  $role = $_POST['role'];
  mysqli_query($conn, "INSERT INTO tb_user (username, password, role) VALUES ('$username', '$password', '$role')");
  header("Location: data_pengguna.php");
  exit;
}

// Hapus User
if (isset($_GET['hapus'])) {
  $id = $_GET['hapus'];
  mysqli_query($conn, "DELETE FROM tb_user WHERE id='$id'");
  header("Location: data_pengguna.php");
  exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kelola Pengguna | MBOZOKAMANE</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/a2e0e9d6b3.js" crossorigin="anonymous"></script>
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(135deg, #eef2ff 0%, #ffffff 100%);
      margin: 0;
      color: #1f2937;
    }

    /* HEADER */
    .header {
      background: linear-gradient(90deg, #6366f1, #8b5cf6);
      color: white;
      padding: 18px 40px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }
    .header h1 {
      font-size: 22px;
      margin: 0;
    }
    .menu-admin a {
      color: white;
      margin: 0 10px;
      text-decoration: none;
      font-weight: 500;
    }
    .menu-admin a:hover { text-decoration: underline; }
    .logout-btn {
      background: #ef4444;
      color: white;
      padding: 8px 14px;
      border-radius: 8px;
      text-decoration: none;
    }

    /* CONTAINER */
    .container {
      max-width: 1100px;
      margin: 50px auto;
      background: #fff;
      border-radius: 16px;
      padding: 40px;
      box-shadow: 0 8px 25px rgba(0,0,0,0.08);
      animation: fadeIn 0.5s ease;
    }
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(15px); }
      to { opacity: 1; transform: translateY(0); }
    }

    h2 {
      text-align: center;
      color: #1e3a8a;
      margin-bottom: 25px;
    }

    /* FORM TAMBAH USER */
    form {
      display: flex;
      gap: 10px;
      flex-wrap: wrap;
      justify-content: center;
      margin-bottom: 30px;
    }
    input, select {
      padding: 10px;
      border: 1px solid #cbd5e1;
      border-radius: 8px;
      font-size: 14px;
      width: 180px;
    }
    button {
      background: linear-gradient(90deg, #6366f1, #8b5cf6);
      border: none;
      color: white;
      padding: 10px 18px;
      border-radius: 8px;
      cursor: pointer;
      font-weight: 500;
    }
    button:hover {
      opacity: 0.9;
      transform: scale(1.05);
    }

    /* TABLE */
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 10px;
      text-align: left;
    }
    th, td {
      padding: 12px;
      border-bottom: 1px solid #e5e7eb;
    }
    th {
      background: #eef2ff;
      color: #1e3a8a;
      font-weight: 600;
    }
    tr:hover td {
      background: #f9fafb;
    }
    .action-btn {
      text-decoration: none;
      padding: 6px 10px;
      border-radius: 6px;
      font-size: 13px;
      font-weight: 500;
      margin-right: 5px;
    }
    .edit-btn {
      background: #3b82f6;
      color: white;
    }
    .edit-btn:hover { background: #2563eb; }
    .delete-btn {
      background: #ef4444;
      color: white;
    }
    .delete-btn:hover { background: #dc2626; }

    footer {
      text-align: center;
      margin-top: 40px;
      color: #6b7280;
      font-size: 14px;
    }
  </style>
</head>
<body>

  <header class="header">
    <h1>Kelola Pengguna</h1>
    <nav class="menu-admin">
      <a href="../index.php">Beranda</a>
      <a href="dashboard.php">Dashboard</a>
      <a href="../logout.php" class="logout-btn">Logout</a>
    </nav>
  </header>

  <div class="container">
    <h2><i class="fa-solid fa-users"></i> Daftar Pengguna</h2>

    <!-- Form Tambah User -->
    <form method="POST">
      <input type="text" name="username" placeholder="Username" required>
      <input type="password" name="password" placeholder="Password" required>
      <select name="role" required>
        <option value="">Pilih Role</option>
        <option value="admin">Admin</option>
        <option value="user">User</option>
      </select>
      <button type="submit" name="tambah"><i class="fa-solid fa-plus"></i> Tambah</button>
    </form>

    <!-- Tabel Data User -->
    <table>
      <thead>
        <tr>
          <th>No</th>
          <th>Username</th>
          <th>Role</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php $no=1; while($row = mysqli_fetch_assoc($result)): ?>
          <tr>
            <td><?= $no++; ?></td>
            <td><?= htmlspecialchars($row['username']); ?></td>
            <td><span style="text-transform: capitalize;"><?= $row['role']; ?></span></td>
            <td>
              <a href="edit_pengguna.php?id=<?= $row['id']; ?>" class="action-btn edit-btn"><i class="fa-solid fa-pen"></i> Edit</a>
              <a href="data_pengguna.php?hapus=<?= $row['id']; ?>" class="action-btn delete-btn" onclick="return confirm('Hapus user ini?')"><i class="fa-solid fa-trash"></i> Hapus</a>
            </td>
          </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </div>

  <footer>
    © 2025 MBOZOKAMANE | Panel Admin — Kelola Pengguna
  </footer>

</body>
</html>
