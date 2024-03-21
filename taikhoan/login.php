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

        // Lưu thông tin người dùng vào session
        $_SESSION['loggedin'] = true;
        $_SESSION['Email'] = $row['Email'];
        $_SESSION['HoTen'] = $row['HoTen'];
        $_SESSION['VaiTro'] = $row['VaiTro'];
        
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@500&family=Open+Sans:wght@500&family=Poppins:wght@500;600;700;800;900&display=swap" rel="stylesheet">
    <title>Đăng Nhập</title>
</head>
<body>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Noto+Sans:wght@500&family=Open+Sans:wght@500&family=Poppins:wght@500;600;700;800;900&display=swap');
      </style>
<div class="login-">
    <div class="login-ppp">
    <div class="logo_login tt1-pp">
        <img src="../img\Logo_Login.svg" alt="">
    </div>
    <div class="tt1-pp tt-h">Nhập Email và Mật Khẩu để đăng Nhập</div>
    <form action="login.php" method="post">
        <div class="email tt1-pp">
            <label for="Email"><ion-icon name="mail"></ion-icon></label>
            <input type="email" name="Email" placeholder="Nhập Email" required>
        </div>
        <div class="pass tt1-pp">
            <label for="MatKhau"><ion-icon name="lock-closed"></ion-icon></label>
            <input type="Password" name="MatKhau" placeholder="Nhập mật khẩu" required id="input_">
        <br>
        </div>
        <div id="submit" class="tt1-pp">
            <input type="submit" value="Đăng nhập">
            <div class="box_r">
                <a href="register.php" id="register">Đăng Ký</a>
                <a href="#" id="forget">Quên Mật Khẩu</a>
            </div>
        </div>
    </form>
    </div>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>
