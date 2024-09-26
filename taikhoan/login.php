<?php
session_start(); // Bắt đầu session
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $Email = $_POST["Email"];
    $MatKhau = $_POST["MatKhau"];
    // kiểm tra kết nối
    require_once("../db/db.php");
    if($conn->connect_errno) {
        die("Kết nối không thành công: ".$conn->connect_errno);
    }

// Thực hiện truy vấn đăng nhập
    $sql = "SELECT * FROM khach_hang WHERE Email = '$Email'";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
        if(password_verify($MatKhau, $row["MatKhau"])){
            echo 'Đăng nhập thành công!';

        }else{
            echo 'Vui lòng nhập lại Email hoặc mật khẩu';
        }
        $_SESSION['loggedin'] = true;
        $_SESSION['Email'] = $row['Email'];
        $_SESSION['HoTen'] = $row['HoTen'];
        $_SESSION['MaKH'] = $row['MaKH'];
        $_SESSION['VaiTro'] = $row['VaiTro'];
        $_SESSION['HinhAnh'] = $row['HinhAnh'];
        
        // Nếu vai trò là admin, chuyển hướng tới trang admin
        if($_SESSION['VaiTro'] === 'admin') {
            header("Location: ../admin/index.php?act=listdm");
            exit;
        } else {
            // Nếu không phải admin, chuyển hướng tới trang người dùng
            header("Location: ../index.php");
            exit;
        }

    }else{
        echo 'Tài khoản không tồn tại';
    }
    // đóng kết nối
    $conn->close();
}
?>