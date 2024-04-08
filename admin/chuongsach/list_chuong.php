<?php
require_once "../db/db.php";

if (isset($_GET['MaSach'])) {
    $MaSach = $_GET['MaSach'];
    $sql_sach = "SELECT * FROM sach WHERE MaSach = $MaSach";
    $sql_sach_soi = "SELECT * FROM sach_soi WHERE MaSach = $MaSach";

    $result_sach = mysqli_query($conn, $sql_sach);
    $result_sach_soi = mysqli_query($conn, $sql_sach_soi);

    $row_sach = mysqli_fetch_assoc($result_sach);
    $row_sach_soi = mysqli_fetch_assoc($result_sach_soi);

    // Hiển thị thông tin sách từ cả hai bảng
    if ($row_sach || $row_sach_soi) {
        ?>
        <div class="content-header">
            <h2>Danh Sách Chương:
                <?php 
                if($row_sach) {
                    echo $row_sach['TenSach'];
                } else {
                    echo $row_sach_soi['TenSach'];
                }
                ?>
            </h2>
        </div>
        <?php
    } else {
        echo "Không tìm thấy sách.";
        exit();
    }

    // Lấy danh sách chương của cuốn sách
    $sql_chuong = "SELECT * FROM chuong_sach WHERE sach_id = $MaSach";
    $result_chuong = mysqli_query($conn, $sql_chuong);

    // Lấy danh sách chương của cuốn sách (sach_soi)
    $sql_chuong_soi = "SELECT * FROM chuong_sach WHERE sach_soi_id = $MaSach";
    $result_chuong_soi = mysqli_query($conn, $sql_chuong_soi);
    ?>
    <div class="container">
        <a class="add-button" href="index.php?act=addchuong&MaSach=<?php echo $MaSach; ?>">Thêm chương mới</a>
        <?php
        $stt_chuong = 1; // Biến đếm số chương
        // Đếm số chương
        $total_chapters = mysqli_num_rows($result_chuong);
        $total_chapters_soi = mysqli_num_rows($result_chuong_soi);
        $total_chapters_all = $total_chapters + $total_chapters_soi;
        echo "<tr><td colspan='3'>Tổng số chương: $total_chapters_all</td></tr>";
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

                    // Bắt đầu vòng lặp để hiển thị danh sách chương của sach
                    while ($row_chuong = mysqli_fetch_assoc($result_chuong)) {
                        ?>
                        <tr>
                            <td><a href="index.php?act=listnoidung&MaChuong=<?php echo $row_chuong['MaChuong']; ?>">
                                    <?php echo $row_chuong['TenChuong']; ?>
                                </a></td>
                            <td>
                                <?php echo $stt_chuong++; ?>
                            </td>
                            <td>
                                <a class="delete-link"
                                    href="index.php?act=updatenoidung&MaChuong=<?php echo $row_chuong['MaChuong']; ?>&MaSach=<?php echo $MaSach; ?>">Update
                                    |</a>
                                <a class="delete-link"
                                    href="index.php?act=deletechuong&MaChuong=<?php echo $row_chuong['MaChuong']; ?>&MaSach=<?php echo $MaSach; ?>">Xóa</a>
                            </td>
                        </tr>
                    <?php } ?>
                    <?php
                    // Bắt đầu vòng lặp để hiển thị danh sách chương của sach_soi
                    while ($row_chuong_soi = mysqli_fetch_assoc($result_chuong_soi)) {
                        ?>
                        <tr>
                            <td><a href="index.php?act=listnoidung&MaChuong=<?php echo $row_chuong_soi['MaChuong']; ?>">
                                    <?php echo $row_chuong_soi['TenChuong']; ?>
                                </a></td>
                            <td>
                                <?php echo $stt_chuong++; ?>
                            </td>
                            <td>
                                <a class="delete-link"
                                    href="index.php?act=updatenoidung&MaChuong=<?php echo $row_chuong_soi['MaChuong']; ?>&MaSach=<?php echo $MaSach; ?>">Update
                                    |</a>
                                <a class="delete-link"
                                    href="index.php?act=deletechuong&MaChuong=<?php echo $row_chuong_soi['MaChuong']; ?>&MaSach=<?php echo $MaSach; ?>">Xóa</a>
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
} else {
    echo "Không có mã sách nào được cung cấp!";
}
?>