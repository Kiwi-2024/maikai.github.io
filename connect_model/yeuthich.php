<?php
if (isset($_POST['MaKH'])) {
    require_once ('../db/db.php');

    $nguoi_dung_id = $_POST['MaKH'];
    
    $sql = "";
    if (isset($_POST['sach_soi_id'])) {
        $sach_soi_id = $_POST['sach_soi_id'];
        $sql = "INSERT INTO yeuthich (nguoi_dung_id, sach_soi_id) VALUES ('$nguoi_dung_id', '$sach_soi_id')";
        $delete_id = $sach_soi_id;
        $check_sql = "SELECT * FROM yeuthich WHERE nguoi_dung_id = '$nguoi_dung_id' AND sach_soi_id = '$delete_id'";
        $delete_sql = "DELETE FROM yeuthich WHERE nguoi_dung_id = '$nguoi_dung_id' AND sach_soi_id = '$delete_id'";
    } elseif (isset($_POST['sach_noi_id'])) {
        $sach_noi_id = $_POST['sach_noi_id'];
        $sql = "INSERT INTO yeuthich (nguoi_dung_id, sach_noi_id) VALUES ('$nguoi_dung_id', '$sach_noi_id')";
        $delete_id = $sach_noi_id;
        $check_sql = "SELECT * FROM yeuthich WHERE nguoi_dung_id = '$nguoi_dung_id' AND sach_noi_id = '$delete_id'";
        $delete_sql = "DELETE FROM yeuthich WHERE nguoi_dung_id = '$nguoi_dung_id' AND sach_noi_id = '$delete_id'";
    } else {
        // Kiểm tra xem MaSach có tồn tại không
        $sach_id = $_POST['MaSach'];
        $check_sach_sql = "SELECT * FROM sach WHERE MaSach = '$sach_id'";
        $check_sach_result = $conn->query($check_sach_sql);
        if ($check_sach_result->num_rows == 0) {
            echo "Lỗi: MaSach không tồn tại trong CSDL";
            exit;
        }

        $sql = "INSERT INTO yeuthich (nguoi_dung_id, sach_id) VALUES ('$nguoi_dung_id', '$sach_id')";
        $delete_id = $sach_id;
        $check_sql = "SELECT * FROM yeuthich WHERE nguoi_dung_id = '$nguoi_dung_id' AND sach_id = '$delete_id'";
        $delete_sql = "DELETE FROM yeuthich WHERE nguoi_dung_id = '$nguoi_dung_id' AND sach_id = '$delete_id'";
    }
    
    // Kiểm tra xem người dùng đã thích cuốn sách này trước đó chưa
    
    $check_result = $conn->query($check_sql);
    if ($check_result) {
        if ($check_result->num_rows > 0) {
            // Nếu đã thích rồi, xóa sự thích
            $delete_result = $conn->query($delete_sql);
            if ($delete_result) {
               header("Location: {$_SERVER['HTTP_REFERER']}");
                exit;
            } else {

            }
        } else {
            // Nếu chưa thích, thêm vào danh sách yêu thích
            $insert_result = $conn->query($sql);
            if ($insert_result) {
                header("Location: {$_SERVER['HTTP_REFERER']}");
                exit;
            } else {
            }
        }
    } else {
        echo "Lỗi khi thực hiện câu truy vấn SELECT: " . $conn->error;
    }
    
    $conn->close();
} else {
    echo "Lỗi: MaKH không được gửi từ biểu mẫu";
}

?>
