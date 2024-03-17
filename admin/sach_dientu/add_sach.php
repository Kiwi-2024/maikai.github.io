<h1>Thêm Sách mới</h1>
<div class="form-container">
    <form action="index.php?act=addsach" method="post" enctype="multipart/form-data" class="product-form">
        <div class="form-group">
            <label for="category">Danh mục:</label>
            <select name="DanhMuc" id="category" class="select-box">
                <?php
                // Kết nối đến cơ sở dữ liệu
                require_once "../db/db.php";
                // Kiểm tra kết nối
                if (!$conn) {
                    die ("Connection failed: " . mysqli_connect_error());
                }

                // Truy vấn để lấy danh sách các danh mục
                $sql = "SELECT MaDM, TenDM FROM danhmuc";
                $result = mysqli_query($conn, $sql);

                // Hiển thị các danh mục trong dropdown
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='" . $row['MaDM'] . "'>" . $row['TenDM'] . "</option>";
                    }
                } else {
                    echo "<option value=''>No categories found</option>";
                }

                // Đóng kết nối
                mysqli_close($conn);
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="product_name">Tên Sách:</label>
            <input type="text" name="TenSach" required class="text-input">
        </div>
        <div class="form-group">
            <label for="tacgia">Tác giả:</label>
            <input type="text" name="TacGia" required class="text-input">
        </div>
        <div class="form-group">
            <label for="description">Mô tả:</label><br>
            <textarea name="MoTa" id="description" rows="4" cols="50" class="textarea"></textarea>
        </div>
        <div class="form-group">
            <label for="loaisach">Loại sách:</label>
            <select name="LoaiSach" id="loaisach">
                <option value="Miễn Phí">Sách miễn phí</option>
                <option value="Hội Viên">Sách Hội Viên</option>
            </select>
        </div>
        <div class="form-group">
            <label for="namxuatban">Năm xuất bản:</label>
            <input type="date" name="NamXuatBan" required class="text-input">
        </div>
        
        <div class="form-group">
            <label for="HinhAnh">Hình ảnh bìa</label>
            <input type="file" name="HinhAnhBia" class="file-input">
        </div>
        <div class="form-group">
            <button type="submit" class="submit-btn">Thêm sản phẩm</button>
        </div>
    </form>
</div>