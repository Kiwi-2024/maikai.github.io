<div class="content-header">
    <h2>Thêm Audio mới</h2>
</div>
<div class="container-1">
    <form action="index.php?act=addaudiofile" method="post" enctype="multipart/form-data" class="form1 form2">
        <div class="box-pp">
            <div class="form-group1">
                <label for="category">Danh mục:</label>
                <select name="DanhMuc" id="category" class="select-box">
                    <?php
                    // Kết nối đến cơ sở dữ liệu
                    require_once "../db/db.php";
                    // Kiểm tra kết nối
                    if (!$conn) {
                        die("Connection failed: " . mysqli_connect_error());
                    }

                    // Truy vấn để lấy danh sách các danh mục
                    $sql = "SELECT MaDM, TenDM FROM danhmuc";
                    $result = mysqli_query($conn, $sql);

                    // Hiển thị các danh mục trong dropdown
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<option class='option' value='" . $row['MaDM'] . "'>" . $row['TenDM'] . "</option>";
                        }
                    } else {
                        echo "<option class='option' value=''>No categories found</option>";
                    }

                    // Đóng kết nối
                    mysqli_close($conn);
                    ?>
                </select>
            </div>
            <div class="form-group1">
                <label for="product_name">Tên Audio:</label>
                <input type="text" name="TenSach" required>
            </div>
            <div class="form-group1">
                <label for="MyAudio">File Audio:</label>
                <input type="file" name="MyAudio">
            </div>
        </div>
        <div class="box-pp">
            <div class="form-group1">
                <label for="namxuatban">Năm xuất bản:</label>
                <input type="date" name="NamXuatBan" required>
            </div>
            <div class="form-group1">
                <label for="HinhAnh">Hình ảnh bìa</label>
                <input type="file" name="HinhAnhBia" class="file-input">
            </div>
            <div class="form-group1">
                <label for="description">Mô tả:</label><br>
                <textarea name="MoTa" id="mota"></textarea>
            </div>
        </div>
        <div class="box-hh">
            <div class="right">
                <button type="button" onclick="history.back()">HỦY</button>
                <button type="submit" name="submit">Thêm Audio</button>
            </div>
        </div>
    </form>
</div>