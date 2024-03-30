<?php
include "header.php";
?>
<?php
// Kiểm tra nếu tham số MaSach được truyền qua URL
if (isset($_GET['MaSach'])) {

    $MaSach = $_GET['MaSach'];
    require "db/db.php";
    if (!$conn) {
        die("Kết nối không thành công: " . mysqli_connect_error());
    }

    // Thực hiện truy vấn để lấy thông tin sách dựa trên MaSach
    $query_sach = "SELECT * FROM sach WHERE MaSach = $MaSach";
    $result_sach = mysqli_query($conn, $query_sach);

    // Kiểm tra kết quả truy vấn
    if (mysqli_num_rows($result_sach) > 0) {

        while ($row = mysqli_fetch_assoc($result_sach)) {
            // Lấy danh mục ID từ sách
            $danhMucID = $row['danhMucID'];

            $query_danhmuc = "SELECT TenDM FROM danhmuc WHERE MaDM = $danhMucID";
            $result_danhmuc = mysqli_query($conn, $query_danhmuc);

            if ($result_danhmuc && mysqli_num_rows($result_danhmuc) > 0) {
                $row_danhmuc = mysqli_fetch_assoc($result_danhmuc);
                $tenDanhMuc = $row_danhmuc['TenDM'];

                $query_so_chuong = "SELECT COUNT(*) AS SoChuong FROM chuong_sach WHERE sach_id = $MaSach";
                $result_so_chuong = mysqli_query($conn, $query_so_chuong);

                if ($result_so_chuong) {
                    $row_so_chuong = mysqli_fetch_assoc($result_so_chuong);
                    $soLuongChuong = $row_so_chuong['SoChuong'];
                } else {
                    $soLuongChuong = 0;
                }

                ?>
                <div class="div-mota">
                    <div class="back">
                        <a href="index.php">Trang Chủ > </a>
                        <a href="#">
                            <?php echo $row['TenSach'] ?>
                        </a>
                    </div>
                    <div class="box-bewen">
                        <img src="admin/<?php echo $row['HinhAnhBia']; ?>" alt="">
                        <div class="bewen1">
                            <h2>
                                <?php echo $row['TenSach'] ?>
                            </h2>
                            <div class="box-name">
                                <div class="name-sach">
                                    <p>Tác giả:</p>
                                    <x>
                                        <?php echo $row['TacGia'] ?>
                                    </x>
                                </div>
                                <div class="name-sach">
                                    <p>Thể Loại:</p>
                                    <x>
                                        <?php echo $tenDanhMuc; ?>
                                    </x>
                                </div>
                                <div class="name-sach">
                                    <p>Ngày thêm:</p>
                                    <x>
                                        <?php echo $row['ThoiGianThem'] ?>
                                    </x>
                                </div>
                                <div class="name-sach">
                                    <p>Số chương</p>
                                    <x>
                                        <?php echo $soLuongChuong; ?>
                                    </x>
                                </div>
                                <div class="name-sach">
                                    <p>Trạng thái</p>
                                    <x>
                                        Đang cập nhật
                                    </x>
                                </div>
                            </div>
                            <hr class="hr">
                            <div class="box-name1">
                                <div class="chonnoidung">
                                    <div class="loaisach">Chọn loại sách: <button>
                                            <p>Sách điện tử</p>
                                        </button></div>
                                    <div class="loaisach">Chọn nội dung: <button>
                                            <p>Đầy đủ</p>
                                        </button></div>
                                </div>
                                <div class="buton-btn">
                                    <button class="docsach">Đọc sách</button>
                                </div>
                                <div class="mota-sach">
                                    <p>
                                        <?php echo $row['MoTa'] ?>
                                    </p>
                                </div>
                                <div class="comment">
                                    <h3>Đọc giả nói gì về ❝
                                        <?php echo $row['TenSach'] ?>❞
                                    </h3>
                                    <h4>Đánh giá và nhận xét</h4>
                                    <hr>
                                    <?php
                                    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                                        ?>
                                        <div class="danhgia-button">
                                            <button class="btn113"><ion-icon name="create-outline"></ion-icon>
                                                <p>Viết đánh giá</p>
                                            </button>
                                        </div>
                                        <div class="danhgia">
                                            <form action="admin/index.php?act=nhanxet" method="post">
                                                <h2>Đánh giá & Nhận xét</h2>
                                                <span class="icon-close1"><ion-icon name="close"></ion-icon></span>
                                                <input type="hidden" name="MaSach" value="<?php echo $MaSach; ?>">
                                                <div class="row-radio">
                                                    <label for="radio">Đánh Giá </label>
                                                    <div class="star_wrap">
                                                        <input type="radio" name="rate" value="5">
                                                        <input type="radio" name="rate" value="4">
                                                        <input type="radio" name="rate" value="3">
                                                        <input type="radio" name="rate" value="2">
                                                        <input type="radio" name="rate" value="1">
                                                    </div>
                                                </div>
                                                <div class="row-nhanxet">
                                                    <label for="NhanXet">Nhận xét </label>
                                                    <textarea name="NhanXet" id="nhanxet" maxlength="300"
                                                        placeholder="Hảy cho chúng mình một vài nhận xét và đống góp ý kiến nhé"></textarea>
                                                </div>
                                                <button type="submit" class="btn-sub">Gửi nhận xét</button>
                                            </form>
                                        </div>
                                        <?php
                                    } else {

                                        echo "<div class='thongbao'><p>Vui lòng đăng nhập để nhận xét</p></div>";
                                    }
                                    ?>

                                    <?php

                                    // Truy vấn SQL để lấy thông tin về bình luận của khách hàng đó cho sách cụ thể
                                    $sql_danhgia_nhanxet = "SELECT dn.MaDG, s.TenSach, kh.HoTen, dn.NhanXet, dn.DanhGia, 
                                DATE_FORMAT(dn.ThoiGianThem, '%d/ %m/ %Y') AS ThoiGianThem 
                                FROM danhgia_nhanxet dn
                                INNER JOIN sach s ON dn.sach_id = s.MaSach 
                                INNER JOIN khach_hang kh ON dn.nguoi_dung_id = kh.MaKH
                                WHERE dn.sach_id = $MaSach";

                                    // Thực thi truy vấn
                                    $result_danhgia_nhanxet = $conn->query($sql_danhgia_nhanxet);
                                    if ($result_danhgia_nhanxet->num_rows > 0) {
                                        while ($row_danhgia = $result_danhgia_nhanxet->fetch_assoc()) {
                                            ?>
                                            <div class="form-danhgia">
                                                <div class="img-name">
                                                    <div class="flex-pp">
                                                        <img src="img/b2d4a77ce9ae88fea6f1fe1054f552d3.jpg" alt="">
                                                        <p>
                                                            <?php echo $row_danhgia["HoTen"]; ?>
                                                        </p>
                                                    </div>
                                                    <p>
                                                        <?php echo $row_danhgia["ThoiGianThem"]; ?>
                                                    </p>
                                                </div>
                                                <div class="comment-form">
                                                    <p>
                                                        <?php echo $row_danhgia["NhanXet"]; ?>
                                                    </p>
                                                    <x>
                                                        <?php echo $row_danhgia["DanhGia"]; ?>
                                                    </x>
                                                </div>
                                            </div>
                                            <?php
                                            // echo "Tên Sách: " . $row_danhgia["TenSach"] . "<br>";
                                        }
                                    }
                                    ?>


                                </div>

                            </div>
                        </div>
                        <div class="bewen2">

                        </div>
                    </div>
                </div>
                <?php
            } else {
                echo "Không tìm thấy thông tin danh mục.";
            }
        }
    } else {
        echo "Không tìm thấy sách với ID đã cho.";
    }

    // Đóng kết nối
    mysqli_close($conn);
} else {
    echo "Không có ID sách được chỉ định.";
}
?>

<?php
include "footer.php";
?>