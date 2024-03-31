

<div class="container-1">
    <div class="confirm-form">
        <h1>Bạn có chắc chắn muốn xóa sách nói có mã <?php echo isset($_GET['MaSach']) ? $_GET['MaSach'] : ''; ?>?</h1>
        <form action="index.php?act=deletesachnoi" method="post">
            <input type="hidden" name="MaSach" value="<?php echo isset($_GET['MaSach']) ? $_GET['MaSach'] : ''; ?>">
            <br>
            <button type="submit" name="submit" value="xoa">CÓ</button>
            <button type="button" onclick="history.back()">HỦY</button>
        </form>
    </div>
</div>
