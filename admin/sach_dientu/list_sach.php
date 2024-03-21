<?php
// Kết nối tới cơ sở dữ liệu
require_once "../db/db.php";
$results = mysqli_query($conn, 'SELECT * FROM sach');

?>
<h1>Quản lý Sách</h1>

<div class="container-2">
    <a href="index.php?act=addsach"><button>Thêm Sách Mới</button></a>
    <table class="table">
        <tr>
            <th>Mã Sách</th>
            <th>Tên Sách</th>
            <th>Tác Giả</th>
            <th>Mô tả</th>
            <th>Loại sách</th>
            <th>Năm xuất bản</th>
            <th>Hình ảnh bìa</th>
            <th>Chức năng</th>
            <th>Thêm chương</th>

        </tr>
        <?php while ($row = mysqli_fetch_assoc($results)) { ?>
            <tr>
                <td>
                    <?php echo $row['MaSach'] ?>
                </td>
                <td>
                    <?php echo $row['TenSach'] ?>
                </td>
                <td>
                    <?php echo $row['TacGia'] ?>
                </td>
                <td>
                    <?php echo $row['MoTa'] ?>
                </td>
                <td>
                    <?php echo $row['LoaiSach'] ?>
                </td>
                <td>
                    <?php echo $row['NamXuatBan'] ?>
                </td>
                <td>
                <?php echo "<br> <img src='" . $row['HinhAnhBia'] . "' width='150px'>"; ?>
                </td>
                <td>
                    <a class="link" href="index.php?act=updatesach&MaSach=<?php echo $row['MaSach']; ?>">Update</a>
                    <br>
                    <a class="link" href="sach_dientu/delete.php?MaSach=<?php echo $row['MaSach']; ?>">Delete</a>
                </td>
                <td>
                    <a class="link" href="index.php?act=listchuong&MaSach=<?php echo $row['MaSach']; ?>">List Chương Sách</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>

</body>

</html>
<?php
mysqli_free_result($results);
mysqli_close($conn)
    ?>