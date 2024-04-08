<?php
session_start();

unset($_SESSION['audio_url']);

// session_unset();
// session_destroy();

echo "Session đã được xóa thành công!";
?>
