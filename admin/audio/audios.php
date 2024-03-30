<div class="content-header">
        <h2>Thêm sách mới</h2>
    </div>
<div class="container-1">
    <form action="index.php?act=addsach" method="post" enctype="multipart/form-data" class="form1 form2">
    <div class="box-pp">
    <div class="form-group1">
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
        </div>
        <div class="box-hh">
        <div class="right">
            <button type="button" onclick="history.back()">HỦY</button>
            <button type="submit">Thêm Sách</button>
        </div>
        </div>
    </form>
</div>