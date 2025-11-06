<?php
session_start();
include '../koneksi.php';

if (!isset($_SESSION['username']) || $_SESSION['role'] != 'admin') {
  header("Location: ../login.php");
  exit;
}

$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM tb_user WHERE id='$id'");

header("Location: data_pengguna.php");
exit;
?>
