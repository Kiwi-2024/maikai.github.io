<div class="content-header">
        <h2>Thêm sách hiệu sồi mới</h2>
    </div>
<div class="container-1">
    <form action="index.php?act=addsachhieusoi" method="post" enctype="multipart/form-data" class="form1 form2">
    <div class="box-pp">
    <div class="form-group1">
            <label for="category">Danh mục:</label>
            <select name="DanhMuc" id="category" class="select-box">
                <?php
                require_once "../db/db.php";
                $sql = "SELECT MaDM, TenDM FROM danhmuc_sachsoi";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option class='option' value='" . $row['MaDM'] . "'>" . $row['TenDM'] . "</option>";
                    }
                } else {
                    echo "<option class='option' value=''>No categories found</option>";
                }

                mysqli_close($conn);
                ?>
            </select>
            </div>
        <div class="form-group1">
            <label for="product_name">Tên Sách:</label>
            <input type="text" name="TenSach" required>
        </div>
        <div class="form-group1">
            <label for="tacgia">Tác giả:</label>
            <input type="text" name="TacGia" required>
        </div>
        <div class="form-group1">
            <label for="Gia">Giá:</label>
            <input type="number" name="Gia" required>
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
            <button type="submit">Thêm Sách</button>
        </div>
        </div>
    </form>
</div>