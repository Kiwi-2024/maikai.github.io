<?php
// Kết nối tới cơ sở dữ liệu
require_once "../db/db.php";

// Khởi tạo biến $results
$results = null;

if (isset($_GET['btnsearch'])) {
    $keyword = mysqli_real_escape_string($conn, $_GET['keyword']);

    if ($keyword !== '') {
        $querysearch = "SELECT sach_soi.*, COUNT(chuong_sach.MaChuong) AS SoChuong
                        FROM sach_soi
                        LEFT JOIN chuong_sach ON sach_soi.MaSach = chuong_sach.sach_soi_id
                        WHERE TenSach LIKE '%$keyword%'
                        GROUP BY sach_soi.MaSach
                        ORDER BY MaSach DESC";
        $results = mysqli_query($conn, $querysearch);
    } else {
        $results = mysqli_query($conn, 'SELECT sach_soi.*, COUNT(chuong_sach.MaChuong) AS SoChuong
                                        FROM sach_soi
                                        LEFT JOIN chuong_sach ON sach_soi.MaSach = chuong_sach.sach_soi_id
                                        GROUP BY sach_soi.MaSach
                                        ORDER BY MaSach DESC');
    }
} else {
    $results = mysqli_query($conn, 'SELECT sach_soi.*, COUNT(chuong_sach.MaChuong) AS SoChuong
                                    FROM sach_soi
                                    LEFT JOIN chuong_sach ON sach_soi.MaSach = chuong_sach.sach_soi_id
                                    GROUP BY sach_soi.MaSach
                                    ORDER BY MaSach DESC');
}
?>

<div class="content-header">
    <h2>Quản lý sách hiệu sồi</h2>
</div>
<div class="search-container">
    <form action="index.php?act=listsachhieusoi" method="GET">
        <input type="hidden" name="act" value="listsach">
        <div class="search">
            <input type="text" placeholder="Tìm kiếm theo tên sách" name="keyword" id="keyword" value="<?php echo isset($_GET['keyword']) ? $_GET['keyword'] : ''; ?>">
            <button type="submit" name="btnsearch">Tìm kiếm</button>
        </div>
    </form>
</div>
<div class="container-2">
    <a href="index.php?act=addsachhieusoi" class="add-button">Thêm Sách hiệu sồi Mới</a>
    <table class="table">
        <thead>
            <tr>
                <th>Tên Sách</th>
                <th>Tác Giả</th>
                <th>Mô tả</th>
                <th>Giá</th>
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
                    <td><?php echo $row['Gia'] ?></td>
                    <td><?php echo $row['NamXuatBan'] ?></td>
                    <td><img src="<?php echo $row['HinhAnhBia'] ?>" alt="Hình ảnh bìa" width="150px"></td>
                    <td><?php echo isset($row['SoChuong']) ? $row['SoChuong'] : '0'; ?></td>
                    <td>
                        <a href="index.php?act=updatesachhieusoi&MaSach=<?php echo $row['MaSach']; ?>" class="link">Update</a>
                        <br>
                        <a href="index.php?act=deletesachhieusoi&MaSach=<?php echo $row['MaSach']; ?>" class="link">Delete</a>
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
mysqli_close($conn);
?>
