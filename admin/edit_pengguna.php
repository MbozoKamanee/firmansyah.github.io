<?php
session_start();
include '../koneksi.php';

if (!isset($_SESSION['username']) || $_SESSION['role'] != 'admin') {
  header("Location: ../login.php");
  exit;
}

$id = isset($_GET['id']) ? $_GET['id'] : null;
$data = null;

// Ambil data user jika mode edit
if ($id) {
  $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE id='$id'");
  $data = mysqli_fetch_assoc($result);
}

// Simpan perubahan atau tambah data baru
if (isset($_POST['simpan'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $role = $_POST['role'];

  // Jika password kosong saat edit, jangan ubah password
  if ($id) {
    if (!empty($password)) {
      $password = md5($password);
      mysqli_query($conn, "UPDATE tb_user SET username='$username', password='$password', role='$role' WHERE id='$id'");
    } else {
      mysqli_query($conn, "UPDATE tb_user SET username='$username', role='$role' WHERE id='$id'");
    }
  } else {
    $password = md5($password);
    mysqli_query($conn, "INSERT INTO tb_user (username, password, role) VALUES ('$username', '$password', '$role')");
  }

  header("Location: data_pengguna.php");
  exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $id ? 'Edit Pengguna' : 'Tambah Pengguna'; ?> | MBOZOKAMANE</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/a2e0e9d6b3.js" crossorigin="anonymous"></script>
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(135deg, #eef2ff 0%, #ffffff 100%);
      margin: 0;
      color: #1f2937;
    }

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

    .container {
      max-width: 600px;
      margin: 60px auto;
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

    form {
      display: flex;
      flex-direction: column;
      gap: 15px;
    }

    input, select {
      padding: 12px;
      border: 1px solid #cbd5e1;
      border-radius: 8px;
      font-size: 14px;
    }

    button {
      background: linear-gradient(90deg, #6366f1, #8b5cf6);
      border: none;
      color: white;
      padding: 12px;
      border-radius: 8px;
      cursor: pointer;
      font-weight: 500;
      margin-top: 10px;
      transition: 0.2s;
    }

    button:hover {
      opacity: 0.9;
      transform: scale(1.03);
    }

    .back-btn {
      text-decoration: none;
      background: #e5e7eb;
      color: #374151;
      padding: 10px 14px;
      border-radius: 8px;
      display: inline-block;
      margin-top: 20px;
      text-align: center;
    }

    .back-btn:hover {
      background: #d1d5db;
    }

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
    <h1><?= $id ? 'Edit Pengguna' : 'Tambah Pengguna'; ?></h1>
    <nav class="menu-admin">
      <a href="../index.php">Beranda</a>
      <a href="data_pengguna.php">Data Pengguna</a>
      <a href="../logout.php" class="logout-btn">Logout</a>
    </nav>
  </header>

  <div class="container">
    <h2><i class="fa-solid fa-user-pen"></i> <?= $id ? 'Edit Data Pengguna' : 'Tambah Pengguna Baru'; ?></h2>

    <form method="POST">
      <label>Username</label>
      <input type="text" name="username" value="<?= $data ? htmlspecialchars($data['username']) : ''; ?>" required>

      <label>Password <?= $id ? '(Kosongkan jika tidak diubah)' : ''; ?></label>
      <input type="password" name="password" placeholder="<?= $id ? 'Biarkan kosong jika tidak diubah' : 'Masukkan password'; ?>">

      <label>Role</label>
      <select name="role" required>
        <option value="">Pilih Role</option>
        <option value="admin" <?= $data && $data['role']=='admin' ? 'selected' : ''; ?>>Admin</option>
        <option value="user" <?= $data && $data['role']=='user' ? 'selected' : ''; ?>>User</option>
      </select>

      <button type="submit" name="simpan">
        <i class="fa-solid fa-floppy-disk"></i> Simpan
      </button>
    </form>

    <a href="data_pengguna.php" class="back-btn"><i class="fa-solid fa-arrow-left"></i> Kembali</a>
  </div>

  <footer>
    © 2025 MBOZOKAMANE | Panel Admin — <?= $id ? 'Edit Pengguna' : 'Tambah Pengguna'; ?>
  </footer>

</body>
</html>
