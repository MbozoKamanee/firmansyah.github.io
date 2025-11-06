<?php
session_start();
include 'koneksi.php';

$username = $_POST['username'];
$password = md5($_POST['password']); // <- penting karena database pakai MD5

$query = mysqli_query($conn, "SELECT * FROM tb_user WHERE username='$username' AND password='$password'");
$data = mysqli_fetch_assoc($query);

if ($data) {
    $_SESSION['username'] = $data['username'];
    $_SESSION['role'] = $data['role'];

    if ($data['role'] == 'admin') {
        header("Location: admin/dashboard.php");
        exit;
    } else {
        header("Location: user/dashboard.php");
        exit;
    }
} else {
    echo "<script>
            alert('Username atau password salah!');
            window.location.href='login.php';
          </script>";
}
?>
