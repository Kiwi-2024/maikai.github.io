<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once ('db/db.php');
$sachmienphi = mysqli_query($conn, "SELECT * FROM sach where LoaiSach = 'MienPhi'");
$MoiNhat = mysqli_query($conn, "SELECT * FROM sach");
$TacPhamKinhDien = mysqli_query($conn, "SELECT * FROM sach where danhMucID = '37'");
$TrinhTham = mysqli_query($conn, "SELECT * FROM sach where danhMucID = '23'");
$Marketing = mysqli_query($conn, "SELECT * FROM sach where danhMucID = '24'");
$TaiChinh = mysqli_query($conn, "SELECT * FROM sach where danhMucID = '25'");
$PhatTrien = mysqli_query($conn, "SELECT * FROM sach where danhMucID = '26'");
$HocTap = mysqli_query($conn, "SELECT * FROM sach where danhMucID = '27'");
$SucKhoe = mysqli_query($conn, "SELECT * FROM sach where danhMucID = '28'");
$TuDuy = mysqli_query($conn, "SELECT * FROM sach where danhMucID = '29'");
$ChungKhoan = mysqli_query($conn, "SELECT * FROM sach where danhMucID = '30'");

// sách hiệu sồi ===================================
$HienDai_Soi = mysqli_query($conn, "SELECT * FROM sach_soi where danhMucID = '6'");
$MoiNhat_Soi = mysqli_query($conn, "SELECT * FROM sach_soi");
$CoDai_Soi = mysqli_query($conn, "SELECT * FROM sach_soi where danhMucID = '7'");
$HuyenHuyen_Soi = mysqli_query($conn, "SELECT * FROM sach_soi where danhMucID = '8'");
$TrinhTham_Soi = mysqli_query($conn, "SELECT * FROM sach_soi where danhMucID = '9'");
$DamMy_Soi = mysqli_query($conn, "SELECT * FROM sach_soi where danhMucID = '10'");

// sách nói
$MoiNhat_sn = mysqli_query($conn, "SELECT * FROM sach_noi");
$NgonTinh_sn = mysqli_query($conn, "SELECT * FROM sach_noi where danhMucID = '36'");
$TrinhTham_sn = mysqli_query($conn, "SELECT * FROM sach_noi where danhMucID = '23'");
$TieuThuyet_sn = mysqli_query($conn, "SELECT * FROM sach_noi where danhMucID = '43'");
$PhatTrien_sn = mysqli_query($conn, "SELECT * FROM sach_noi where danhMucID = '26'");
$TamLy_sn = mysqli_query($conn, "SELECT * FROM sach_noi where danhMucID = '44'");

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
if (isset($_SESSION['MaKH'])) {
    $sql_tusach = "SELECT 
    yeuthich.*, 
    CASE 
        WHEN yeuthich.sach_soi_id IS NOT NULL THEN sach_soi.TenSach 
        WHEN yeuthich.sach_noi_id IS NOT NULL THEN sach_noi.TenSach
        ELSE sach.TenSach 
    END AS TenSach,
    CASE 
        WHEN yeuthich.sach_soi_id IS NOT NULL THEN sach_soi.HinhAnhBia 
        WHEN yeuthich.sach_noi_id IS NOT NULL THEN sach_noi.HinhAnhBia
        ELSE sach.HinhAnhBia 
    END AS HinhAnhBia,
    CASE 
        WHEN yeuthich.sach_soi_id IS NOT NULL THEN sach_soi.MaSach 
        WHEN yeuthich.sach_noi_id IS NOT NULL THEN sach_noi.MaSach
        ELSE sach.MaSach 
    END AS MaSach
FROM 
    yeuthich 
LEFT JOIN 
    sach ON yeuthich.sach_id = sach.MaSach
LEFT JOIN 
    sach_soi ON yeuthich.sach_soi_id = sach_soi.MaSach
LEFT JOIN 
    sach_noi ON yeuthich.sach_noi_id = sach_noi.MaSach
WHERE 
    yeuthich.nguoi_dung_id = $MaKH";


    // Thực thi truy vấn
    $tu_sach = mysqli_query($conn, $sql_tusach);
    
    // Kiểm tra lỗi trong quá trình thực thi truy vấn
    if (!$tu_sach) {
        die("Lỗi truy vấn: " . mysqli_error($conn));
    }
    
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