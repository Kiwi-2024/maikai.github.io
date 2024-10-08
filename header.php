<?php
require_once "connect_model/model.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.1/css/all.min.css'>
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Montserrat&amp;display=swap"rel="stylesheet'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
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
                <a href="sachnoi.php" id="About" class="pgp">Sách nói</a>
                <a href="sachhieusoi.php" class="pgp">Sách hiệu sồi</a>
                <a href="sachdientu.phpc" class="pgp">Sách tóm tắt</a>
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
                require_once "db/db.php";

                $defaultImage = "img/Screenshot 2024-04-01 153617.png";

                if (isset($_SESSION['MaKH'])) {
                    $MaKH = $_SESSION['MaKH'];
                }

                if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                    echo "<a href='khachhang.php?MaKH=$MaKH'>";
                    $sql = "SELECT HinhAnh, HoTen FROM khach_hang WHERE MaKH = '$MaKH'";
                    $result = $conn->query($sql);

                    if ($result && $result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $hinhAnh = $row['HinhAnh'];
                        $hoTen = $row['HoTen']; 
                    } else {
                        $hinhAnh = $defaultImage; 
                    }


                    echo "<img src='connect_model/$hinhAnh' alt='Hình ảnh khách hàng'>";
                    echo "<button class='down'><ion-icon name='caret-down'></ion-icon></button>";
                    echo "</a>";
                    ?>
                    <div class="admin-khachhang">
                        <div class="taikhoan">
                            <p>
                                <?php echo $hoTen; ?>
                            </p>
                            <img src="connect_model/<?php echo $hinhAnh; ?>" alt="Hình ảnh khách hàng">

                        </div>

                        <button class="hoivien-aac"><a href="#">Trở thành hội viên</a></button>

                        <div class="flex-p">

                            <div class="icon-flex"><a href="khachhang.php?MaKH=<?php echo $MaKH ?>"><ion-icon
                                        name="person-outline"></ion-icon>
                                    <p>Quản lý tài khoản</p>
                                </a></div>
                            <div class="icon-flex"><a href="tusach.php"><ion-icon name="reorder-four-outline"></ion-icon>
                                    <p>Tủ sách cá nhân</p>
                                </a></div>
                            <div class="icon-flex"><a href="lich_su.php"><ion-icon name="receipt-outline"></ion-icon>
                                    <p>Lịch sử đọc sách</p>
                                </a></div>
                            <div class="icon-flex"><a href="#"><ion-icon name="call-outline"></ion-icon>
                                    <p>Hỗ trợ khách hàng</p>
                                </a></div>
                            <div class="icon-flex"><a href="taikhoan/logout.php"><ion-icon
                                        name="log-out-outline"></ion-icon>
                                    <p>Đăng xuất</p>
                                </a></div>
                        </div>
                    </div>

                    <?php

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
                <div class="code-qr">
                    <img src="img/qr.png" alt="">
                </div>
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
                <div class="code-qr"><img src="img/qr.png" alt=""></div>
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
                        <input type="text" id="registerPhone" name="SoDienThoai" pattern="[0-9]{10}" title="Số điện thoại phải có 10 chữ số" required>
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