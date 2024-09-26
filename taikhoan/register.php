<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $HoTen = $_POST['HoTen'];
    $SoDienThoai = $_POST['SoDienThoai'];
    $MatKhau = $_POST['MatKhau'];
    $confirm_password = $_POST['confirm_password'];
    require_once('../db/db.php');
    if ($conn->connect_error) {
        die('Kết nối Không thành công' . $conn->connect_error);
    }
    if (isset($_POST['Email'])) {
        $Email = $_POST['Email'];
        // Kiểm tra xem địa chỉ email có kết thúc bằng ".com" hay không
        $suffix = substr($Email, -9);
        if (filter_var($Email, FILTER_VALIDATE_EMAIL) && $suffix === "gmail.com") {
            echo "<script>alert('Đăng ký tài khoản thành công!');</script>";
            echo "<script>window.location.href = '../index.php';</script>";
        } else {
            echo "<script>alert('Địa chỉ Email không hợp lệ!');</script>";
            echo "<script>window.location.href = '../index.php';</script>";
            exit();
        }
    }

    if (empty($HoTen) || empty($SoDienThoai) || empty($MatKhau)) {
        echo "<div id='success-message' class='success-message' style='color: red;'>Vui lòng nhập đầy đủ thông tin</div>";
        return;
    }
    $check_query = "select * from khach_hang where Email = '$Email'";
    $result = $conn->query($check_query);
    if ($result->num_rows > 0) {
        echo "Địa chỉ email đã được sử dụng. Vui lòng chọn 1 địa chỉ email khác.";
    } else {
        if ($MatKhau === $confirm_password) {
            $hashed_password = password_hash($MatKhau, PASSWORD_DEFAULT);
            $sql = "insert into khach_hang (Email, MatKhau, HoTen, SoDienThoai) values('$Email', '$hashed_password', '$HoTen', '$SoDienThoai')";

            if ($conn->query($sql) == TRUE) {
                echo 'Đăng ký tài khoản thành công';
            } else {
                echo 'Lỗi: ' . $conn->error;
            }
        } else {
            echo "Nhập lại mật khẩu không đúng";
        }
    }
    // đóng kết nối
    $conn->close();
}
