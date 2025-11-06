<?php
session_start();
session_unset();
session_destroy();

// Setelah logout, arahkan ke halaman register
header("Location: register.php");
exit;
?>
