<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once ('db/db.php');
$sachmienphi = mysqli_query($conn, "SELECT * FROM sach where LoaiSach = 'MienPhi'");
$MoiNhat = mysqli_query($conn, "SELECT * FROM sach");
$TacPhamKinhDien = mysqli_query($conn, "SELECT * FROM sach where danhMucID = '37'");


// mô tả

?>