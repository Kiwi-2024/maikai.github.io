<?php
    require_once '../db/db.php';
    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset ($_GET['MaChuong'])) {
        $MaChuong = $conn->real_escape_string($_GET["MaChuong"]);
        $sql = "SELECT * FROM chuong_sach where MaChuong = '$MaChuong'";
        $result = $conn->query($sql);
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $TenChuong = $row['TenChuong'];
            $NoiDung = $row['NoiDung'];
        } else {
            echo "không tìm thấy Chương sách!";
            exit();
        }
    } else {
        // echo "Yêu Cầu không hợp lệ!";
        exit();
    }
?>
<div class="content-header">
        <h2>Chỉnh sửa chương sách</h2>
    </div>
    <div class="container-1">
    <form class="form1" action="index.php?act=updatenoidung" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="MaChuong" value="<?php echo $MaChuong; ?>">
        <input type="hidden" name="MaSach" value="<?php echo isset($_GET['MaSach']) ? $_GET['MaSach'] : ''; ?>">
        <div class="form-group">
            <label for="TenDM">Tên Chương</label>
            <input type="text" name="TenChuong" id="TenDM" value="<?php echo $TenChuong; ?>" required>
        </div>
        <div class="form-group">
            <label for="MoTa">Nội Dung</label>
            <textarea name="NoiDung" id="MoTa"><?php echo $NoiDung; ?></textarea>
        </div>
        <div class="float">
        <button type="button" onclick="history.back()">HỦY</button>
        <button type="submit">Lưu chỉnh sửa</button>
        </div>
    </form>
</div>

