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
        <form action="connect_model/khach_hang.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="MaKH" value="<?php echo $MaKH; ?>">
            <h2>Quản lý thông tin</h2>
            <div class="thongtin">
                <a href="#" class="color-pp">Quản lý thông tin</a>
                <a href="#">Tài khoản và bảo mật</a>
                <a href="#">Tài khoản liên kết</a>
            </div>

            <div class="quanly_hinhanh">
            <img src="connect_model/<?php echo $hinhAnh; ?>" alt="Hình ảnh khách hàng">
            <div class="hinhanh-tk">
                <label for="fileInput">Thay ảnh</label>
                <input type="file" id="fileInput" name="HinhAnh">
            </div>
            </div>

            <div class="quanly_taikhoan">
                <label for="Email">Email</label>
                <input type="Email" disabled value="<?php echo $Email; ?>">
            </div>
            <div class="quanly_taikhoan">
                <label for="id">ID người dùng</label>
                <input type="text" disabled value="<?php echo $MaKH; ?>">
            </div>
            <div class="quanly_taikhoan">
                <label for="hoten">Họ và tên</label>
                <input type="HoTen" name="HoTen" value="<?php echo $HoTen; ?>">
            </div>
            <div class="quanly_taikhoan1">
                <div class="khac-1">
                    <label for="text">Ngày sinh</label>
                    <input type="date" name="NgaySinh" value="<?php echo $NgaySinh; ?>">
                </div>
                <div class="khac-1">
                    <label for="text">Giới Tính</label>
                    <select name="GioiTinh" id="" name="GioiTinh">
                        <option value="Khac" <?php if ($GioiTinh == 'Khac')
                            echo 'selected'; ?>>Khác</option>
                        <option value="Nam" <?php if ($GioiTinh == 'Nam')
                            echo 'selected'; ?>>Nam</option>
                        <option value="Nu" <?php if ($GioiTinh == 'Nu')
                            echo 'selected'; ?>>Nữ</option>
                    </select>
                </div>
            </div>
            
            <div class="button-khachhang">
                <button type="submit" class="update1">Cập nhật</button>
                <button type="submit">Hủy</button>
            </div>
        </form>


    </div>
</div>



<?php
include "footer.php";

?>