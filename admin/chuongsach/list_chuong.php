<?php
// Kết nối đến cơ sở dữ liệu MySQL
require_once "../db/db.php";

// Lấy thông tin sách từ cơ sở dữ liệu (ví dụ)
$MaSach = $_GET['MaSach'];
$sql_sach = "SELECT * FROM sach WHERE MaSach = $MaSach";
$result_sach = mysqli_query($conn, $sql_sach);
$row_sach = mysqli_fetch_assoc($result_sach);

// Kiểm tra xem có sách nào được tìm thấy không
if (!$row_sach) {
    echo "Không tìm thấy sách.";
    exit();
}

// Lấy danh sách chương của cuốn sách
$sql_chuong = "SELECT * FROM chuong_sach WHERE sach_id = $MaSach";
$result_chuong = mysqli_query($conn, $sql_chuong);
?>


<a class="link" href="index.php?act=addchuong&MaSach=<?php echo $row_sach['MaSach']; ?>">Thêm chương mới</a>
<br>
<hr>
    <h1>Danh Sách Chương - <?php echo $row_sach['TenSach']; ?></h1>
    
    <ul>
        <?php while ($row_chuong = mysqli_fetch_assoc($result_chuong)) { ?>
            <li>
                <a href="hien_thi_chuong.php?chuong_id=<?php echo $row_chuong['MaChuong']; ?>">
                    <?php echo $row_chuong['TenChuong']; ?>
                </a>
            </li>
        <?php } ?>
    </ul>
<?php
// Đóng kết nối
mysqli_close($conn);
?>
