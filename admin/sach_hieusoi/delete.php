<div class="container-1">
        <div class="confirm-form">
            <h1>Bạn có chắc chắn muốn xóa quyển sách này không?</h1>
            <form action="index.php?act=deletesachhieusoi" method="post">
                <input type="hidden" name="MaSach" value="<?php echo $_GET['MaSach']; ?>">
                <br>
                <button type="submit" name="confirm" value="yes">CÓ</button>
                <button type="button" onclick="history.back()">HỦY</button>
            </form>
        </div>
    </div>