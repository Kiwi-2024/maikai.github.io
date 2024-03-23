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

<div class="content-header">
    <h2 class="">Danh Sách Chương:
        <?php echo $row_sach['TenSach']; ?>
    </h2>
</div>
<div class="container">
    <div class="action">
        <a class="" href="index.php?act=addchuong&MaSach=<?php echo $row_sach['MaSach']; ?>">Thêm chương mới</a>
    </div>
    <?php
        $stt_chuong = 1; // Biến đếm số chương

        // Đếm số chương
        $total_chapters = mysqli_num_rows($result_chuong);
        echo "<tr><td colspan='3'>Tổng số chương: $total_chapters</td></tr>";
    ?>
    <div class="table-container">
        <table class="table">
            <thead>
                <tr>
                    <th>Tên chương</th>
                    <th>Số chương</th>
                    <th>Chức năng</th>
                </tr>
            </thead>
            <tbody>
    <?php 

    // Bắt đầu vòng lặp để hiển thị danh sách chương
    while ($row_chuong = mysqli_fetch_assoc($result_chuong)) { ?>
        <tr>
            <td><a href="index.php?act=listnoidung&MaChuong=<?php echo $row_chuong['MaChuong']; ?>">
                    <?php echo $row_chuong['TenChuong']; ?>
                </a>
            </td>
            <td>
                <?php echo $stt_chuong++; ?> <!-- Hiển thị số chương -->
            </td>
            <td><a class="delete-link"
                    href="index.php?act=deletechuong&MaChuong=<?php echo $row_chuong['MaChuong']; ?>&MaSach=<?php echo $MaSach; ?>">Xóa</a>
            </td>
        </tr>
    <?php } ?>
</tbody>

        </table>
    </div>
</div>


<?php
// Đóng kết nối
mysqli_close($conn);
?>