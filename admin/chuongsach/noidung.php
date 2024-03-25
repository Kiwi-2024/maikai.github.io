<?php
// Kết nối tới cơ sở dữ liệu
require_once "../db/db.php";
if (isset ($_GET['MaChuong'])) {
    $MaChuong = $_GET['MaChuong'];
    // Truy vấn lấy thông tin sản phẩm dựa trên ID
    $sql = "SELECT * FROM chuong_sach WHERE MaChuong=$MaChuong";
    $result = $conn->query($sql);
    ?>
    <?php if ($result->num_rows > 0) {
        $row = $result->fetch_assoc(); ?>
        <div class="container">
        <div class="tenh4">
        <h4>Tên chương: <div class="namechuong"> <?php echo $row['TenChuong']; ?> </div> </h4>


            </h4>
        </div>
        
        <p>
        <div class="noidung">
        <p>Nội dung:</p>
        <div class="noidung11p">
            <?php echo $row['NoiDung']; ?></div>
        </div>
        </p>
        </div>
        <?php
    } else {
        echo "Chương không tồn tại.";
    }
} else {
    echo "Không có ID Chương được cung cấp.";
}
?>