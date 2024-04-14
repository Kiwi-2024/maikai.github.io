<?php
include "header.php";
require_once "db/db.php";


?>

<div class="quanly">
    <div class="quanly_tk">
        <div class="box-left">
        <h3><?php echo $hoTen; ?></h3>
            <img src="connect_model/<?php echo $hinhAnh; ?>" alt="Hình ảnh khách hàng">
        </div>
        <div class="flex-quanly">

            <div class="icon-flex1"><a href="khachhang.php?MaKH=<?php echo $MaKH ?>"><ion-icon name="person-outline"></ion-icon>
                    <p>Quản lý tài khoản</p>
                </a></div>
            <div class="icon-flex1"><a href="tusach.php"><ion-icon name="reorder-four-outline"></ion-icon>
                    <p>Tủ sách cá nhân</p>
                </a></div>
            <div class="icon-flex1 button_color"><a href="lich_su.php"><ion-icon name="receipt-outline"></ion-icon>
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