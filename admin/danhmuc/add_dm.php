<div class="content-header">
        <h2>Thêm danh mục loại sách</h2>
    </div>
    <div class="container-1">
    <div class="boxcenter">
        <div class="form-container">
            <form action="index.php?act=adddm" method="post">
                <div class="row mb">
                    <label for="TenDM" class="label">Tên danh mục:</label><br>
                    <input type="text" name="TenDM" required class="input"><br><br>
                </div>
                <div class="row mb">
                    <label for="MoTa" class="label">Mô tả:</label><br>
                    <textarea name="MoTa" class="textarea"></textarea><br><br>
                </div>
                <div class="row mb">
                <input type="submit" value="Thêm" class="submit-btn">
                <a href="index.php?act=listdm" class="submit-btn1">Hủy</a>

                </div>
            </form>
        </div>
    </div>
</div>
