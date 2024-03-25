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
        <h2 class="logo">MAKA</h2>
        <div id="countdown"></div>
        <div class="maka1">
            <nav class="navigation">
                <a href="#section1" class="pgp">Home</a>
                <a href=".container" id="About" class="pgp">Sách điện tử</a>
                <a href="#seemore" class="pgp">Sách tóm tắt</a>
                <a href="#footer" class="pgp">Liên Hệ</a>
            </nav>
        </div>
        <div class="nav1-c">
            <div class="form-search">
                <form action="#" method="GET" id="form-">
                    <div class="parent">
                        <input id="Search" class="input" type="type" placeholder="Search..." oninput="searchUser()"/>
                        <button class="btn1">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </div>
                </form>
                <a href="#"><button class="goicuoc">Gói cước</button></a>
            </div>

            <div class="form-submit">
                <?php
                session_start();
                if (isset ($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                    echo "Chào mừng " . $_SESSION['HoTen'] . " đã đăng nhập!";
                    echo "<a href='taikhoan/logout.php'>Đăng xuất</a>";
                } else {
                    echo "<a href='#'><button class='btnLogin-popup'>Đăng Ký</button></a>";
                    echo "<a href='#'><button class='btnLogin-popup'>Đăng Nhập</button></a>";

                }
                ?>

            </div>
        </div>
        <!-- <button id="trangden"><ion-icon name="contrast"></ion-icon></button> -->

    </header>
    <div class="slider">
        <img src="img/3268.png" alt="">
    </div>


    <div id="section1">
    </div>


    <div class="voboclogin">
        <span class="icon-close"><ion-icon name="close"></ion-icon>
        </span>
        <div class="from-box login">
            <h2>Đăng Nhập</h2>
            <div class="form-logo1">
                <div class="code-qr"></div>
                <form action="#" class="form-var">
                    <div class="input-box">
                        <span class="icon"><ion-icon name="mail"></ion-icon></span>
                        <input type="email" required>
                        <label>Email</label>
                    </div>
                    <div class="input-box">
                        <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                        <input type="password" required minlength="8">
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
            <h2>Đăng Ký</h2>
            <div class="form-logo1">
                <div class="code-qr"></div>
                <form action="#">

                    <div class="input-box">
                        <span class="icon">
                            <ion-icon name="finger-print"></ion-icon>
                        </span>
                        <input type="text" id="registerPhone" name="registerPhone" required>
                        <label>Số điện thoại</label>
                        <span id="phoneError" class="error-message"></span>
                    </div>

                    <div class="input-box">
                        <span class="icon"><ion-icon name="mail"></ion-icon></span>
                        <input type="email" required>
                        <label>Email</label>
                    </div>
                    <div class="input-box">
                        <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                        <input type="password" required minlength="8">
                        <label>Password</label>

                        <!-- <label for="registerMedia">Media:</label>
      <input type="file" id="registerMedia" name="registerMedia" accept="image/*, video/*"> -->
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