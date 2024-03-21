<?php  
if(isset($_GET['MaSach'])) {
    $maSachcanxoa = $_GET['MaSach'];
}
if(isset($_GET['submit'])) {
    if($_GET['submit'] == 'xoa'){
        require('../../db/db.php');
        if(mysqli_query($conn, "DELETE FROM sach WHERE MaSach = $maSachcanxoa")){
            header('Location: ../index.php?act=listsach');
        } else {
            echo "Xóa không thành công!";
        }
        mysqli_close($conn);
    } else {
        header('Location: ../index.php?act=listsach');
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xóa</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="container-1">
        <div class="confirm-form">
            <h1>Bạn có chắc chắn muốn xóa danh mục: <?php echo $maSachcanxoa;?></h1>
            <form action="" method="get">
                <input type="hidden" name="MaSach" value="<?php  echo $maSachcanxoa;?>">
                <br>
                <button name="submit" value="xoa">CÓ</button>
                <button name="submit" value="huy">HỦY</button>
            </form>
        </div>
    </div>
</body>
</html>
