<h1>Thêm Chương</h1>
    <form action="index.php?act=addchuong" method="POST">
        <input type="hidden" name="MaSach" value="<?php echo $_GET['MaSach']; ?>">
        <label for="TenChuong">Tên chương:</label><br>
        <input type="text" id="TenChuong" name="TenChuong"><br>
        <label for="NoiDung">Nội dung chương:</label><br>
        <textarea id="NoiDung" name="NoiDung"></textarea><br>
        <input type="submit" value="Thêm chương">
    </form>