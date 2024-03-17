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
    <div class="container-1">
        <h2>Chỉnh sửa danh mục tạp chí</h2>
        <form action="index.php?act=updatedm" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="MaDM" value="<?php echo $MaDM; ?>">
            <div class="form-group">
                <label for="TenDM">Tên danh mục</label>
                <input type="text" name="TenDM" id="" value="<?php echo $TenDM; ?>" required>
            </div>
            <div class="form-group">
                <label for="TenDM">Mô Ta</label>
                <textarea name="MoTa" required><?php echo $MoTa; ?></textarea>
            </div>
            <button type="submit">Lưu chỉnh sửa</button>

        </form>

    </div>
