<?php
require_once "../db/db.php";

// Khởi tạo biến $results
$results = null;

if (isset($_GET['btnsearch'])) {
    $keyword = mysqli_real_escape_string($conn, $_GET['keyword']);

    if ($keyword !== '') {
        $querysearch = "SELECT * FROM khach_hang WHERE HoTen LIKE '%$keyword%' AND VaiTro = 'customer'";
        $results = mysqli_query($conn, $querysearch);
    } else {
        $querysearch = "SELECT * FROM khach_hang WHERE VaiTro = 'customer'";
        $results = mysqli_query($conn, $querysearch);
    }
} else {
    $query = "SELECT * FROM khach_hang WHERE VaiTro = 'customer'";
    $results = mysqli_query($conn, $query);
}
?>
<div class="content-header">
<h2> Quản lý Khách Hàng</h2>
    </div>
    <div class="search-container">
    <form action="index.php" method="GET">
        <input type="hidden" name="act" value="listtaikhoan">
        <div class="search">
            <input type="text" placeholder="Tìm kiếm theo tên khách hàng" name="keyword" id="keyword" value="<?php echo isset($_GET['keyword']) ? $_GET['keyword'] : ''; ?>">
            <button type="submit" name="btnsearch">Tìm kiếm</button>
        </div>
    </form>
</div>

<div class="table-container113">
    <?php if ($results && mysqli_num_rows($results) > 0) { ?>
        <table class="table">
            <tr>
                <th>Mã Khách hàng</th>
                <th>Tên Khách hàng</th>
                <th>Email</th>
                <th>Số điện thoại</th>
                <th>Hình ảnh</th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($results)) { ?>
                <tr>
                    <td><?php echo $row['MaKH']; ?></td>
                    <td><?php echo $row['HoTen']; ?></td>
                    <td><?php echo $row['Email']; ?></td>
                    <td><?php echo $row['SoDienThoai']; ?></td>
                    <td><?php echo "<br> <img src='" . $row['HinhAnh'] . "' width='140px'>"; ?></td>
                </tr>
            <?php } ?>
        </table>
    <?php } else { ?>
        <p>Không có kết quả nào phù hợp.</p>
    <?php } ?>
</div>


<?php
// Giải phóng bộ nhớ và đóng kết nối
if ($results) {
    mysqli_free_result($results);
}
mysqli_close($conn);
?>
