
<?php
    require_once '../db/db.php';
    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset ($_GET['MaDM'])) {
        $MaDM = $conn->real_escape_string($_GET["MaDM"]);
        $sql = "SELECT * FROM danhmuc where MaDM = '$MaDM'";
        $result = $conn->query($sql);
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $TenDM = $row['TenDM'];
            $MoTa = $row['MoTa'];
        } else {
            echo "không tìm thấy danh mục!";
            exit();
        }
    } else {
        // echo "Yêu Cầu không hợp lệ!";
        exit();
    }
?>

<div class="content-header">
        <h2>Chỉnh sửa danh mục</h2>
    </div>
    <div class="container-1">
    <form class="form1" action="index.php?act=updatedm" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="MaDM" value="<?php echo $MaDM; ?>">
        <div class="form-group">
            <label for="TenDM">Tên danh mục</label>
            <input type="text" name="TenDM" id="TenDM" value="<?php echo $TenDM; ?>" required>
        </div>
        <div class="form-group">
            <label for="MoTa">Mô tả</label>
            <textarea name="MoTa" id="MoTa"><?php echo $MoTa; ?></textarea>
        </div>
        <div class="float">
        <button type="button" onclick="history.back()">HỦY</button>
        <button type="submit">Lưu chỉnh sửa</button>
        </div>
    </form>
</div>

