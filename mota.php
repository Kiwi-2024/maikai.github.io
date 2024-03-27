<?php
include "header.php";
?>
<?php
// Kiểm tra nếu tham số "MaSach" được truyền qua URL
if (isset ($_GET['MaSach'])) {
    // Lấy giá trị của tham số "MaSach"
    $MaSach = $_GET['MaSach'];
    require "db/db.php";
    // Kiểm tra kết nối
    if (!$conn) {
        die ("Kết nối không thành công: " . mysqli_connect_error());
    }

    // Thực hiện truy vấn để lấy thông tin sách dựa trên MaSach
    $query_sach = "SELECT * FROM sach WHERE MaSach = $MaSach";
    $result_sach = mysqli_query($conn, $query_sach);

    // Kiểm tra kết quả truy vấn
    if (mysqli_num_rows($result_sach) > 0) {
        // Lặp qua từng hàng kết quả và hiển thị thông tin sách
        while ($row = mysqli_fetch_assoc($result_sach)) {
            // Lấy danh mục ID từ sách
            $danhMucID = $row['danhMucID'];

            // Truy vấn để lấy tên danh mục dựa trên mã danh mục
            $query_danhmuc = "SELECT TenDM FROM danhmuc WHERE MaDM = $danhMucID";
            $result_danhmuc = mysqli_query($conn, $query_danhmuc);

            // Kiểm tra kết quả truy vấn danh mục
            if ($result_danhmuc && mysqli_num_rows($result_danhmuc) > 0) {
                // Lấy tên danh mục từ kết quả truy vấn
                $row_danhmuc = mysqli_fetch_assoc($result_danhmuc);
                $tenDanhMuc = $row_danhmuc['TenDM'];

                // Lấy số lượng chương từ bảng chương dựa trên MaChuong của sách
                $query_so_chuong = "SELECT COUNT(*) AS SoChuong FROM chuong_sach WHERE sach_id = $MaSach";
                $result_so_chuong = mysqli_query($conn, $query_so_chuong);

                // Kiểm tra kết quả truy vấn số lượng chương
                if ($result_so_chuong) {
                    $row_so_chuong = mysqli_fetch_assoc($result_so_chuong);
                    $soLuongChuong = $row_so_chuong['SoChuong'];
                } else {
                    $soLuongChuong = 0;
                }

                // Hiển thị thông tin sách và số lượng chương
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
                                    <div class="loaisach">Chọn loại sách: <button><p>Sách điện tử</p></button></div>
                                    <div class="loaisach">Chọn nội dung: <button><p>Đầy đủ</p></button></div>
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
                                    <h4>Bình luận</h4>
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