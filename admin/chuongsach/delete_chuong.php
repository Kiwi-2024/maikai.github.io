<div class="container-1">
    <div class="confirm-form">
        <h1>Bạn có chắc chắn muốn xóa chương <?php echo isset($_GET['MaChuong']) ? $_GET['MaChuong'] : ''; ?>?</h1>
        <p>Chương này thuộc quyển sách có mã: <?php echo isset($_GET['MaSach']) ? $_GET['MaSach'] : ''; ?></p>
        <form action="index.php?act=deletechuong" method="post">
            <input type="hidden" name="MaChuong" value="<?php echo isset($_GET['MaChuong']) ? $_GET['MaChuong'] : ''; ?>">
            <input type="hidden" name="MaSach" value="<?php echo isset($_GET['MaSach']) ? $_GET['MaSach'] : ''; ?>">
            <br>
            <button type="submit" name="submit" value="xoa">CÓ</button>
            <button type="submit" name="submit" value="huy">HỦY</button>
        </form>
    </div>
</div>
