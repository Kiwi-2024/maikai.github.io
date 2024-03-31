<?php
// Kết nối tới cơ sở dữ liệu
    require_once "../db/db.php";
$results = mysqli_query($conn, 'SELECT * FROM danhmuc_sachsoi');
?>
<div class="content-header">
<h2> Quản lý danh mục loại sách hiệu sồi</h2>
    </div>
    <div class="container-2">
    <a href="index.php?act=adddmhieusoi" class="add-button">Thêm danh mục</a>
        <table class="table">
            <tr>
                <th>Mã danh mục</th>
                <th>Tên danh mục</th>
                <th>Mô tả</th>
                <th>Chức năng</th>
            </tr>
            <?php while($row = mysqli_fetch_assoc($results)){ ?>
                <tr>
                    <td>
                        <?php echo $row['MaDM']?>
                    </td>
                    <td>
                        <?php echo $row['TenDM']?>
                    </td>
                    <td>
                        <?php echo $row['MoTa']?>
                    </td>
                    <td>
                    <a class="link" href="index.php?act=updatedmhieusoi&MaDM=<?php echo $row['MaDM']; ?>">Update</a>

                        <br>
                        <a class="link" href="index.php?act=deletedmhieusoi&MaDM=<?php echo $row['MaDM']; ?>">Delete</a>
                    </td>
                </tr>
                <?php } ?>
        </table>
    </div>
<?php 
mysqli_free_result($results);
mysqli_close($conn)
?>