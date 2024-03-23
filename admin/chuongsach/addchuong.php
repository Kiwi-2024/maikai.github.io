<div class="content-header">
        <h2>Thêm Chương</h2>
    </div>
<div class="content">
    <div class="content-form">
        <form action="index.php?act=addchuong" method="POST">
            <input type="hidden" name="MaSach" value="<?php echo $_GET['MaSach']; ?>">
            <label for="TenChuong">Tên chương:</label><br>
            <input type="text" id="TenChuong" name="TenChuong"><br>
            <label for="NoiDung">Nội dung chương:</label><br>
            <textarea id="NoiDung" name="NoiDung"></textarea><br>
            <button type="button" onclick="history.back()">HỦY</button>
            <input type="submit" value="Thêm chương">
        </form>
    </div>
</div>
