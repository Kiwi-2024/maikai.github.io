<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $Email = $_POST['Email'];
    $HoTen = $_POST['HoTen'];
    $SoDienThoai = $_POST['SoDienThoai'];
    $MatKhau = $_POST['MatKhau'];
    $confirm_password =$_POST['confirm_password'];
    // kết nối cơ sở dữ liệu
    require_once('../db/db.php');
    // kiểm tra kết nối
    if($conn->connect_error){
        die('Kết nối Không thành công'. $conn->connect_error);
    }
    // Kiểm tra xem địa chỉ email đã tồn tại trong cơ sở dữ liệu chưa
    $check_query = "select * from khach_hang where Email = '$Email'";
    $result = $conn->query($check_query);
    if($result->num_rows > 0){
        // địa chỉ email đã tồn tại hiển thị thông báo người dùng
        echo "Địa chỉ email đã được sử dụng. Vui lòng chọn 1 địa chỉ email khác.";
    }else{
        if($MatKhau === $confirm_password){
            $hashed_password = password_hash($MatKhau, PASSWORD_DEFAULT);
            // thực hiện truy vấn đăng ký
            $sql = "insert into khach_hang (Email, MatKhau, HoTen, SoDienThoai) values('$Email', '$hashed_password', '$HoTen', '$SoDienThoai')";
    
        if($conn->query($sql) == TRUE){
            echo 'Đăng ký tài khoản thành công';
            }else{
                echo 'Lỗi: '. $conn->error;
            }
        }else{
            echo "Nhập lại mật khẩu không đúng";
        }
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
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@500&family=Open+Sans:wght@500&family=Poppins:wght@500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <title>Đăng Ký</title>
</head>
<body>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Noto+Sans:wght@500&family=Open+Sans:wght@500&family=Poppins:wght@500;600;700;800;900&display=swap');
      </style>
    <div class="register login-">
        <div class="login-ppp">
            <div class="logo_register">
                <img src="../img\Logo_Login.svg" alt="">
            </div>
            <div class="tt1-pp tt-hh">Nhập đầy đủ thông tin đăng ký</div>
            <form action="register.php" method="post">
                <div class="hoten_register tt1-pp">
                    <label for="HoTen"><ion-icon name="person"></ion-icon></label>
                    <input type="text" name="HoTen" id="" placeholder="Họ và Tên">
                </div>
                <div class="email_register tt1-pp">
                    <label for="Emai"><ion-icon name="mail"></ion-icon></label>
                    <input type="email" name="Email" id="" placeholder="Nhập Email">
                </div>
                <div class="tel_register tt1-pp">
                    <label for="SoDienThoai"><ion-icon name="call"></ion-icon></label>
                    <input type="tel" id="" name="SoDienThoai" pattern="[0-9]{10}" required title="Số Điện Thoại Không Tồn Tại" placeholder="Số Điện Thoại">
                </div>
                <div class="pass_register tt1-pp">
                    <label for="matKhau"><ion-icon name="lock-closed"></ion-icon></label>
                    <input type="password" name="MatKhau" placeholder="Nhập mật khẩu" required>
                </div>
                <div class="pass_register tt1-pp">
                    <label for="confirm_password"><ion-icon name="lock-closed"></ion-icon></label>
                    <input type="password" name="confirm_password" placeholder="Nhập lại mật khẩu" required>
                </div>
                <!-- <label for="HinhAnh">HinhAnh</label>
                <input type="file" name="HinhAnh" id=""> -->
                <div id="submit_register" class="tt1-pp">
                    <input type="submit" value="Đăng ký" id="button_re">
                    <a href="login.php" id="login_regi">Đăng nhập</a>
                
                </div>
            </form>
    </div>
    </div>
        <script src="../js.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>
