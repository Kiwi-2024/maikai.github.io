<?php
require_once '../db/db.php';

// Kiểm tra xem có tham số 'MaSach' được truyền từ URL không
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['MaSach'])) {
    $MaSach = $conn->real_escape_string($_GET['MaSach']);

    // Truy vấn để lấy thông tin sách dựa trên 'MaSach'
    $sql_sach = "SELECT * FROM sach WHERE MaSach = '$MaSach'";
    $result_sach = $conn->query($sql_sach);

    // Kiểm tra xem có dòng dữ liệu nào được trả về hay không
    if ($result_sach && $result_sach->num_rows == 1) {
        $row_sach = $result_sach->fetch_assoc();
        // Lấy thông tin sách từ dòng dữ liệu
        $TenSach = $row_sach['TenSach'];
        $TacGia = $row_sach['TacGia'];
        $MoTa = $row_sach['MoTa'];
        $LoaiSach = $row_sach['LoaiSach'];
        $NamXuatBan = $row_sach['NamXuatBan'];
        $DanhMuc = $row_sach['danhMucID']; // Sửa ở đây để lấy danh mục
        $HinhAnhBia = $row_sach['HinhAnhBia'];
    } else {
        echo "Không tìm thấy Sách!";
        exit();
    }
} else {
    // Nếu không có tham số 'MaSach' hoặc không phải là phương thức GET, hiển thị thông báo và kết thúc
    // echo "Yêu cầu không hợp lệ!";
    exit();
}

// Xử lý gửi biểu mẫu khi người dùng nhấn nút "Lưu chỉnh sửa"

?>

<div class="container-1">
    <h2>Chỉnh sửa thông tin Sách</h2>
    <form action="index.php?act=updatesach" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="MaSach" value="<?php echo $MaSach; ?>">

        <div class="form-group">
            <label for="category">Danh mục:</label>
            <select name="DanhMuc" id="category" class="select-box">
                <?php
                // Truy vấn để lấy danh sách các danh mục
                $sql = "SELECT MaDM, TenDM FROM danhmuc";
                $result = mysqli_query($conn, $sql);

                // Hiển thị các danh mục trong dropdown
                if ($result && mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $selected = ($row['MaDM'] == $DanhMuc) ? "selected" : "";
                        echo "<option value='" . $row['MaDM'] . "' $selected>" . $row['TenDM'] . "</option>";
                    }
                } else {
                    echo "<option value=''>No categories found</option>";
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="TenSach">Tên Sách:</label>
            <input type="text" name="TenSach" id="TenSach" value="<?php echo $TenSach; ?>">
        </div>
        <div class="form-group">
            <label for="TacGia">Tên Tác Giả:</label>
            <input type="text" name="TacGia" id="TacGia" value="<?php echo $TacGia; ?>">
        </div>
        <div class="form-group">
            <label for="MoTa">Mô tả:</label>
            <textarea name="MoTa" id="MoTa" required><?php echo $MoTa; ?></textarea>
        </div>
        <div class="form-group">
            <label for="LoaiSach">Loại sách:</label>
            <select name="LoaiSach" id="LoaiSach">
                <option value="MienPhi" <?php if ($LoaiSach == 'MienPhi') echo 'selected'; ?>>Sách miễn phí</option>
                <option value="HoiVien" <?php if ($LoaiSach == 'HoiVien') echo 'selected'; ?>>Sách Hội Viên</option>
            </select>
        </div>
        <div class="form-group">
            <label for="NamXuatBan">Năm Xuất Bản:</label>
            <input type="date" name="NamXuatBan" id="NamXuatBan" value="<?php echo $NamXuatBan; ?>">
        </div>
        <div class="form-group">
            <label for="HinhAnhBia">Hình ảnh:</label>
            <input type="file" name="HinhAnhBia" id="HinhAnhBia">
        </div>
        <button type="submit">Lưu chỉnh sửa</button>
    </form>
    <!-- Hiển thị hình ảnh hiện tại -->
</div>
