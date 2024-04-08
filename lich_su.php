<?php
include "header.php";
require_once "db/db.php";
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['MaKH'])) {
    $MaKH = $conn->real_escape_string($_GET['MaKH']);

    $sql_kh = "SELECT * FROM khach_hang WHERE MaKH = '$MaKH'";
    $result_kh = $conn->query($sql_kh);

    if ($result_kh && $result_kh->num_rows == 1) {
        $row_kh = $result_kh->fetch_assoc();
        $HoTen = $row_kh['HoTen'];
        $GioiTinh = $row_kh['GioiTinh'];
        $Email = $row_kh['Email'];
        $HinhAnh = $row_kh['HinhAnh'];
        $MaKH = $row_kh['MaKH'];
        $NgaySinh = $row_kh['NgaySinh']; // Thêm dòng này để gán giá trị cho $NgaySinh
    } else {
        echo "Không tìm thấy Tài khoản!";
        exit();
    }
} else {
    
}

?>

<div class="quanly">
    <div class="quanly_tk">
        <div class="box-left">
            <h3>Ngọc Tâm</h3>
            <img src="connect_model/<?php echo $hinhAnh; ?>" alt="Hình ảnh khách hàng">
        </div>
        <div class="flex-quanly">

            <div class="icon-flex1 button_color"><a href="#"><ion-icon name="person-outline"></ion-icon>
                    <p>Quản lý tài khoản</p>
                </a></div>
            <div class="icon-flex1"><a href="#"><ion-icon name="reorder-four-outline"></ion-icon>
                    <p>Tủ sách cá nhân</p>
                </a></div>
            <div class="icon-flex1"><a href="lich_su.php"><ion-icon name="receipt-outline"></ion-icon>
                    <p>Lịch sử đọc sách</p>
                </a></div>
            <div class="icon-flex1"><a href="#"><ion-icon name="call-outline"></ion-icon>
                    <p>Hỗ trợ khách hàng</p>
                </a></div>
            <div class="icon-flex1"><a href="taikhoan/logout.php"><ion-icon name="log-out-outline"></ion-icon>
                    <p>Đăng xuất</p>
                </a></div>
        </div>
    </div>
    <div class="quanly_tt">

    <div class="div-112">
    <div class="div-113">
        <h2>Lịch sử đọc sách</h2>
        <div class="scrollbar">
            <?php while ($row1 = mysqli_fetch_assoc($lich_su_sach)): ?>
                <div class="sach1">
                    <img src="admin/<?php echo $row1['HinhAnhBia']; ?>" alt="">
                    <a href="mota.php?MaSach=<?php echo $row1['MaSach']; ?>">
                        <p>
                            <?php echo $row1['TenSach']; ?>
                        </p>
                    </a>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</div>



    </div>
</div>



<?php
include "footer.php";

?>