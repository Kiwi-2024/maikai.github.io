<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once ('db/db.php');
$sachmienphi = mysqli_query($conn, "SELECT * FROM sach where LoaiSach = 'MienPhi'");
$MoiNhat = mysqli_query($conn, "SELECT * FROM sach");
$TacPhamKinhDien = mysqli_query($conn, "SELECT * FROM sach where danhMucID = '37'");

// sách hiệu sồi ===================================
$HienDai_Soi = mysqli_query($conn, "SELECT * FROM sach_soi where danhMucID = '6'");
$MoiNhat_Soi = mysqli_query($conn, "SELECT * FROM sach_soi");


// sách nói

$MoiNhat_sn = mysqli_query($conn, "SELECT * FROM sach_noi");

$NgonTinh_sn = mysqli_query($conn, "SELECT * FROM sach_noi where danhMucID = '36'");

// Lịch sử=======================================================
if (isset($_SESSION['MaKH'])) {
    $MaKH = $_SESSION['MaKH'];
    $sql_lichsu = "SELECT lich_su.*, 
                CASE WHEN sach_soi_id IS NOT NULL THEN sach_soi.TenSach ELSE sach.TenSach END AS TenSach,
                CASE WHEN sach_soi_id IS NOT NULL THEN sach_soi.HinhAnhBia ELSE sach.HinhAnhBia END AS HinhAnhBia,
                CASE WHEN sach_soi_id IS NOT NULL THEN sach_soi.MaSach ELSE sach.MaSach END AS MaSach,
                lich_su.audio_id,
                audiofiles.TenAudio,
                audiofiles.Audio_url
            FROM lich_su 
            LEFT JOIN sach ON lich_su.sach_id = sach.MaSach
            LEFT JOIN sach_soi ON lich_su.sach_soi_id = sach_soi.MaSach
            LEFT JOIN audiofiles ON lich_su.audio_id = audiofiles.MaAudio
            WHERE lich_su.nguoi_dung_id = $MaKH";


    $lich_su_sach = mysqli_query($conn, $sql_lichsu);

}


//================================================================


if (isset($_GET['MaSach'])) {
    $MaSach = $_GET['MaSach'];
    // Thực hiện truy vấn SQL để lấy thông tin về sách từ hai bảng
    $sql_sach = "SELECT * FROM sach WHERE MaSach = $MaSach";
    $sql_sach_soi = "SELECT * FROM sach_soi WHERE MaSach = $MaSach";
    $sql_sach_noi = "SELECT * FROM sach_noi WHERE MaSach = $MaSach";

    // Thực hiện truy vấn và kiểm tra kết quả
    $result_sach_noi = mysqli_query($conn, $sql_sach_noi);
    $result_sach_soi = mysqli_query($conn, $sql_sach_soi);
    $result_sach = mysqli_query($conn, $sql_sach);

    $sql_chuong = "SELECT * FROM chuong_sach WHERE sach_id = $MaSach";
    $sql_chuong_soi = "SELECT * FROM chuong_sach WHERE sach_soi_id = $MaSach";



    $result_chuong = mysqli_query($conn, $sql_chuong);
    $result_chuong_soi = mysqli_query($conn, $sql_chuong_soi);



    if (!$result_sach_soi || !$result_sach || !$result_chuong || !$result_chuong_soi || !$result_sach_noi) {
        echo "Đã xảy ra lỗi khi truy vấn cơ sở dữ liệu.";
        exit();
    }

    // Lấy dữ liệu từ kết quả truy vấn
    $row_sach_noi = mysqli_fetch_assoc($result_sach_noi);
    $row_sach_soi = mysqli_fetch_assoc($result_sach_soi);
    $row_sach = mysqli_fetch_assoc($result_sach);

    // Kiểm tra nếu không có sách được tìm thấy
    if (!$row_sach && !$row_sach_soi && !$row_sach_noi) {
        echo "Không có sách được tìm thấy.";
        exit();
    }

    // Kiểm tra xem biến $MaKH đã được gán giá trị chưa
    $MaKH = isset($_GET['MaKH']) ? $_GET['MaKH'] : '';
} else {
    // echo "Không có ID sách được chỉ định.";
    // exit();
}


// khách hàng



?>