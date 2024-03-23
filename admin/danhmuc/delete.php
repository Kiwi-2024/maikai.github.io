

<div class="container-1">
    <div class="confirm-form">
        <h1>Bạn có chắc chắn muốn xóa danh mục có mã <?php echo isset($_GET['MaDM']) ? $_GET['MaDM'] : ''; ?>?</h1>
        <form action="index.php?act=deletedanhmuc" method="post">
            <input type="hidden" name="MaDM" value="<?php echo isset($_GET['MaDM']) ? $_GET['MaDM'] : ''; ?>">
            <br>
            <button type="submit" name="submit" value="xoa">CÓ</button>
            <button type="button" onclick="history.back()">HỦY</button>
        </form>
    </div>
</div>
