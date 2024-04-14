<?php
    require_once "../db/db.php";
$results = mysqli_query($conn, 'SELECT * FROM danhgia_nhanxet ORDER BY MaDG DESC');
?>
<div class="content-header">
    <h2>Quản lý Bình luận đánh giá khách hàng</h2>
</div>
<div class="container-2">
    
    <table class="table">
        <thead>
            <tr>
            <th>Mã Bình luận</th>
                <th>Mã Khách hàng</th>
                <th>NhanXet</th>
                <th>Đánh Giá</th>
                <th>Chức năng</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($results)) { ?>
                <tr>
                <td><?php echo $row['MaDG'] ?></td>
                    <td><?php echo $row['nguoi_dung_id'] ?></td>
                    <td><?php echo $row['NhanXet'] ?></td>
                    <td><?php echo $row['DanhGia'] ?></td>
                    <td>
                        <a href="index.php?act=deletebinhluan&MaDG=<?php echo $row['MaDG']; ?>" class="link">Delete</a>
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
