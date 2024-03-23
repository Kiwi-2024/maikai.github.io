<?php
// Kết nối tới cơ sở dữ liệu
require_once "../db/db.php";
// Thực hiện truy vấn SQL để lấy thông tin sách và số lượng chương
$results = mysqli_query($conn, 'SELECT sach.*, COUNT(chuong_sach.MaChuong) AS SoChuong
                                FROM sach
                                LEFT JOIN chuong_sach ON sach.MaSach = chuong_sach.sach_id
                                GROUP BY sach.MaSach
                                ORDER BY SoChuong DESC');
?>
<div class="content-header">
        <h2>Quản lý sách</h2>
    </div>
    <div class="container-2">
    <a href="index.php?act=addsach" class="add-button">Thêm Sách Mới</a>
    <table class="table">
        <thead>
            <tr>
                <th>Tên Sách</th>
                <th>Tác Giả</th>
                <th>Mô tả</th>
                <th>Loại sách</th>
                <th>Năm xuất bản</th>
                <th>Hình ảnh bìa</th>
                <th>Số chương</th>
                <th>Chức năng</th>
                <th>Thêm chương</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($results)) { ?>
                <tr>
                    <td><?php echo $row['TenSach'] ?></td>
                    <td><?php echo $row['TacGia'] ?></td>
                    <td><?php echo $row['MoTa'] ?></td>
                    <td><?php echo $row['LoaiSach'] ?></td>
                    <td><?php echo $row['NamXuatBan'] ?></td>
                    <td><img src="<?php echo $row['HinhAnhBia'] ?>" alt="Hình ảnh bìa" width="150px"></td>
                    <td><?php echo $row['SoChuong'] ?></td>
                    <td>
                        <a href="index.php?act=updatesach&MaSach=<?php echo $row['MaSach']; ?>" class="link">Update</a>
                        <br>
                        <a href="index.php?act=deletesach&MaSach=<?php echo $row['MaSach']; ?>" class="link">Delete</a>
                    </td>
                    <td>
                        <a href="index.php?act=listchuong&MaSach=<?php echo $row['MaSach']; ?>" class="link">List Chương Sách</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<?php
mysqli_free_result($results);
mysqli_close($conn)
    ?>