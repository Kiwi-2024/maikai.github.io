<?php
// Kết nối tới cơ sở dữ liệu
require_once "../db/db.php";
$results = mysqli_query($conn, 'SELECT * FROM sach_noi');
?>
<div class="content-header">
    <h2>Quản lý sách nói</h2>
</div>
<div class="container-2">
    <a href="index.php?act=addaudiofile" class="add-button">Thêm Sách nói mới</a>
    <table class="table">
        <thead>
            <tr>
                <th>Tên Sách</th>
                <th>Mô tả</th>
                <th>Năm xuất bản</th>
                <th>Hình ảnh bìa</th>
                <th>Audio</th>
                <th>Chức năng</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($results)) { ?>
                <tr>
                    <td><?php echo $row['TenSach'] ?></td>
                    <td><?php echo $row['MoTa'] ?></td>
                    <td><?php echo $row['NamXuatBan'] ?></td>
                    <td><img src="<?php echo $row['HinhAnhBia'] ?>" alt="Hình ảnh bìa" width="120px"></td>
                    <td><audio src="<?php echo $row['Sach_url'] ?>" controls></td>
                    <td>
                        <a href="index.php?act=updatesachnoi&MaSach=<?php echo $row['MaSach']; ?>" class="link">Update</a>
                        <br>
                        <a href="index.php?act=deletesachnoi&MaSach=<?php echo $row['MaSach']; ?>" class="link">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<?php
mysqli_free_result($results);
mysqli_close($conn);
?>
