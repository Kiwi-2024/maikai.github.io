<?php
// Bắt đầu session
session_start();

// Kiểm tra nếu có yêu cầu POST và MaSach được gửi
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['MaSach'])) {
    // Lưu URL của sách vào session
    $_SESSION['audio_url'] = $_POST['MaSach'];
}
?>