<?php
session_start();
// Xóa hoặc unset các biến session
unset($_SESSION['loggedin']);
unset($_SESSION['Email']);
unset($_SESSION['VaiTro']);

// Sau đó chuyển hướng người dùng đến trang đăng nhập
header("Location: login.php");
exit;
?>