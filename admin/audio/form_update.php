<?php
require_once '../db/db.php';


if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['MaSach'])) {
    $MaSach = $conn->real_escape_string($_GET['MaSach']);

    $sql_sach = "SELECT * FROM sach_noi WHERE MaSach = '$MaSach'";
    $result_sach = $conn->query($sql_sach);

    if ($result_sach && $result_sach->num_rows == 1) {
        $row_sach = $result_sach->fetch_assoc();
        $TenSach = $row_sach['TenSach'];
        $Sach_url = $row_sach['Sach_url'];
        $MoTa = $row_sach['MoTa'];
        $NamXuatBan = $row_sach['NamXuatBan'];
        $DanhMuc = $row_sach['danhMucID']; // Sửa ở đây để lấy danh mục
        $HinhAnhBia = $row_sach['HinhAnhBia'];
    } else {
        echo "Không tìm thấy Sách!";
        exit();
    }
} else {
    // echo "Yêu cầu không hợp lệ!";
    exit();
}

?>
<div class="content-header">
        <h2>Chỉnh sửa sách nói</h2>
    </div>
<div class="container-1">
    <form action="index.php?act=updatesachnoi" class="form1 form2" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="MaSach" value="<?php echo $MaSach; ?>">
        <div class="box-pp">
        <div class="form-group1">
            <label for="category">Danh mục:</label>
            <select name="DanhMuc" id="danhmuc" class="select-box">
                <?php
                // Truy vấn để lấy danh sách các danh mục
                $sql = "SELECT MaDM, TenDM FROM danhmuc";
                $result = mysqli_query($conn, $sql);

                // Hiển thị các danh mục trong dropdown
                if ($result && mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $selected = ($row['MaDM'] == $DanhMuc) ? "selected" : "";
                        echo "<option class='option' value='" . $row['MaDM'] . "' $selected>" . $row['TenDM'] . "</option>";
                    }
                } else {
                    echo "<option class='option' value=''>No categories found</option>";
                }
                ?>
            </select>
        </div>
        <div class="form-group1">
            <label for="TenSach">Tên Sách:</label>
            <input type="text" name="TenSach" id="TenSach" value="<?php echo $TenSach; ?>">
        </div>
        <div class="form-group1">
            <label for="MyAudio">File Audio:</label>
            <input type="file" name="MyAudio" id="MyAudio">
        </div>
        </div>
        <div class="box-pp">
        <div class="form-group1">
            <label for="NamXuatBan">Năm Xuất Bản:</label>
            <input type="date" name="NamXuatBan" id="NamXuatBan" value="<?php echo $NamXuatBan; ?>">
        </div>
        <div class="form-group1">
            <label for="HinhAnhBia">Hình ảnh:</label>
            <input type="file" name="HinhAnhBia" id="HinhAnhBia">
        </div>
        <div class="form-group1">
            <label for="MoTa">Mô tả:</label>
            <textarea name="MoTa" id="mota" required><?php echo $MoTa; ?></textarea>
        </div>
        </div>
        <div class="box-hh">
            <div class="right">
        <button type="button" onclick="history.back()">HỦY</button>
        <button type="submit">Lưu chỉnh sửa</button>
        </div>
        </div>
    </form>
    <!-- Hiển thị hình ảnh hiện tại -->
</div>
