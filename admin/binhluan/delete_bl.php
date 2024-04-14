<div class="container-1">
        <div class="confirm-form">
            <h1>Bạn có chắc chắn muốn xóa bình luận này không?</h1>
            <form action="index.php?act=deletebinhluan" method="post">
                <input type="hidden" name="MaDG" value="<?php echo $_GET['MaDG']; ?>">
                <br>
                <button type="submit" name="confirm" value="yes">CÓ</button>
                <button type="button" onclick="history.back()">HỦY</button>
            </form>
        </div>
    </div>