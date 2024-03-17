<div class="container-1">
    <div class="boxcenter">
        <div class="form-container">
            <h2>Thêm Danh mục Sách</h2>
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
                </div>
            </form>
        </div>
    </div>
</div>