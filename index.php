<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- Phần header của trang -->
    <div class="user-info">
            <?php
            session_start();
            if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
                echo "Chào mừng ".$_SESSION['HoTen']." đã đăng nhập!";
                echo "<a href='taikhoan/logout.php'>Đăng xuất</a>";
            } else {
                echo "<a href='taikhoan/login.php'>Đăng nhập</a>";
            }
            ?>

            
        </div>
</body>
</html>
