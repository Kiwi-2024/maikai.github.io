<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once ('db/db.php');
$sachmienphi = mysqli_query($conn, "SELECT * FROM sach where LoaiSach = 'MienPhi'");
$MoiNhat = mysqli_query($conn, "SELECT * FROM sach");
$TacPhamKinhDien = mysqli_query($conn, "SELECT * FROM sach where danhMucID = '37'");

$sql_danhgia_nhanxet = "SELECT danhgia_nhanxet.MaDG, sach.TenSach, khach_hang.HoTen, danhgia_nhanxet.NhanXet, danhgia_nhanxet.DanhGia, danhgia_nhanxet.ThoiGianThem 
FROM danhgia_nhanxet 
INNER JOIN sach ON danhgia_nhanxet.sach_id = sach.MaSach 
INNER JOIN khach_hang ON danhgia_nhanxet.nguoi_dung_id = khach_hang.MaKH";
$result_danhgia_nhanxet = $conn->query($sql_danhgia_nhanxet);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
<link rel="stylesheet" href="css.css">

<body>
    <header>
        <a href="index.php">
            <h2 class="logo">MAKA</h2>
        </a>
        <div id="countdown"></div>
        <div class="maka1">
            <nav class="navigation">
                <a href="sachdientu.php" class="pgp">Sách điện tử</a>
                <a href=".container" id="About" class="pgp">Sách nói</a>
                <a href="#seemore" class="pgp">Sách hiệu sồi</a>
                <a href="#seemore" class="pgp">Sách tóm tắt</a>
                <a href="#footer" class="pgp">Podcast</a>
            </nav>
        </div>
        <div class="nav1-c">
            <div class="form-search">
                <form action="#" method="GET" id="form-">
                    <div class="box">
                        <div class="container-2">

                            <input type="search" id="search" placeholder="Search..." />
                            <span class="icon1"><ion-icon name="search"></ion-icon></span>
                        </div>
                    </div>
                </form>

            </div>

            <div class="goicuoc"><a href="#"><button>Gói Cước</button></a></div>
            <div class="form-submit">
                <?php
                if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                    echo $_SESSION['HoTen'];
                    echo "<a href='taikhoan/logout.php'>Đăng xuất</a>";
                    echo "<a href='#'><button class='btnLogin-popup acc11'>Đăng Nhập</button></a>";
                } else {
                    echo "<a href='#'><button class='btnLogin-popup'>Đăng Nhập</button></a>";
                }
                ?>



            </div>
        </div>
        <!-- <button id="trangden"><ion-icon name="contrast"></ion-icon></button> -->

    </header>

    <div id="section1">
    </div>


    <div class="voboclogin">
        <span class="icon-close"><ion-icon name="close"></ion-icon>
        </span>
        <div class="from-box login">
            <h2>Đăng Nhập</h2>
            <div class="form-logo1">
                <div class="code-qr"></div>
                <form action="taikhoan/login.php" class="form-var" method="post">
                    <div class="input-box">
                        <span class="icon"><ion-icon name="mail"></ion-icon></span>
                        <input type="email" required name="Email">
                        <label>Email</label>
                    </div>
                    <div class="input-box">
                        <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                        <input type="password" required minlength="8" name="MatKhau">
                        <label>Password</label>
                    </div>
                    <div class="remember-forgot">
                        <label><input type="checkbox">Lưu Đăng Nhập</label>
                        <a href="#">Quên mật khẩu?</a>
                    </div>
                    <button type="submit" class="btn">Đăng Nhập</button>
                    <div class="login-register">
                        <p>không có tài khoản? <a href="#" class="linkdangky">
                                Đăng Ký
                            </a></p>
                    </div>
                </form>
            </div>
        </div>
        <div class="from-box register">
            <h2 class="h2">Đăng Ký</h2>
            <div class="form-logo1">
                <div class="code-qr"></div>
                <form action="taikhoan/register.php" method="post">
                    <div class="input-box">
                        <span class="icon"><ion-icon name="person"></ion-icon></span>
                        <input type="HoTen" required name="HoTen">
                        <label>Họ Tên</label>
                    </div>
                    <div class="input-box">
                        <span class="icon"><ion-icon name="mail"></ion-icon></span>
                        <input type="email" required name="Email">
                        <label>Email</label>
                    </div>
                    <div class="input-box">
                        <span class="icon">
                            <ion-icon name="call"></ion-icon>
                        </span>
                        <input type="text" id="registerPhone" name="SoDienThoai" required>
                        <label>Số điện thoại</label>
                        <span id="phoneError" class="error-message"></span>
                    </div>
                    <div class="input-box">
                        <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                        <input type="password" required minlength="8" name="MatKhau">
                        <label>Password</label>
                    </div>
                    <div class="input-box">
                        <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                        <input type="password" required minlength="8" name="confirm_password">
                        <label>Nhập lại password</label>
                    </div>
                    <div class="remember-forgot">
                        <label><input type="checkbox">Tôi đồng ý với tất cả điều khoản</label>
                    </div>
                    <button type="submit" class="btn">Đăng Ký</button>
                    <div class="login-register">
                        <p>Bạn đã có tài khoản? <a href="#" class="linkdangnhap">
                                Đăng Nhập
                            </a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>