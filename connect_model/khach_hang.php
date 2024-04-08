<?php
require "../db/db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["MaKH"])) {
    // Kiểm tra kết nối
    if ($conn->connect_error) {
        die("Kết nối không thành công: " . $conn->connect_error);
    }

    $MaKH = $_POST["MaKH"];
    $HoTen = $_POST['HoTen'];
    $GioiTinh = $_POST['GioiTinh'];
    $NgaySinh = $_POST['NgaySinh'];

    if (empty($NgaySinh)) {
        echo 'Yêu cầu không hợp lệ: Ngày sinh không được để trống';
        exit();
    }

    $targetDir = 'uploads/';
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($_FILES["HinhAnh"]["name"], PATHINFO_EXTENSION));
    $targetFile = $targetDir . uniqid() . "." . $imageFileType;
    if ($_FILES['HinhAnh']['tmp_name']) {
        // Kiểm tra kích thước file 
        if ($_FILES['HinhAnh']['size'] > 500000) {
            echo "Xin lỗi, hình ảnh của bạn quá lớn.";
            $uploadOk = 0;
        }
        $allowedFormats = array("jpg", "png", "jpeg", "gif");
        if (!in_array($imageFileType, $allowedFormats)) {
            echo "Chỉ chấp nhận các định dạng JPG, JPEG, PNG and GIF.";
            $uploadOk = 0;
        }

        if ($uploadOk && move_uploaded_file($_FILES["HinhAnh"]["tmp_name"], $targetFile)) {
            $sql_update = "UPDATE khach_hang SET HoTen = '$HoTen', GioiTinh = '$GioiTinh', NgaySinh = '$NgaySinh', HinhAnh = '$targetFile' WHERE MaKH = '$MaKH'";
            if ($conn->query($sql_update) === true) {
                echo "<script>alert('Cập nhật thông tin tài khoản thành công!'); window.location='{$_SERVER['HTTP_REFERER']}';</script>";
                // header("Location: {$_SERVER['HTTP_REFERER']}");
            } else {
                echo 'Lỗi Cập nhật thông tin tài khoản:' . $conn->error;
            }
        } else {
            echo "Lỗi khi tải hình ảnh.";
        }
    } else {
        // nếu người dùng không tải lên hình ảnh mới, chỉ cập nhật thông tin khác
        $sql_update = "UPDATE khach_hang SET HoTen = '$HoTen', GioiTinh = '$GioiTinh', NgaySinh = '$NgaySinh' WHERE MaKH = '$MaKH'";
        if ($conn->query($sql_update) === true) {
            echo "<script>alert('Cập nhật thông tin tài khoản thành công!'); window.location='{$_SERVER['HTTP_REFERER']}';</script>";
            // header("Location: {$_SERVER['HTTP_REFERER']}");
        } else {
            echo 'Lỗi cập nhật thông tin tài khoản:' . $conn->error;
        }
        $conn->close(); // Đóng kết nối
    }
} else {
    echo 'Yêu cầu không hợp lệ';
}
?>
