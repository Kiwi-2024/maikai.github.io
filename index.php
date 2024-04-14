<?php require_once "header.php"; ?>
<div class="slider">
    <div class="slider-image">
        <img src="img/3268.png" alt="">
    </div>
</div>
<?php


if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    if ($lich_su_sach && mysqli_num_rows($lich_su_sach) > 0) { 
        ?>
<div class="div-112">
    <div class="div-113">
        <h2>Lịch sử đọc sách</h2>
        <div class="scrollbar">
            <?php while ($row1 = mysqli_fetch_assoc($lich_su_sach)): ?>
                <div class="sach1">
                    <img src="admin/<?php echo $row1['HinhAnhBia']; ?>" alt="">
                    <a href="mota.php?MaSach=<?php echo $row1['MaSach']; ?>">
                        <p>
                            <?php echo $row1['TenSach']; ?>
                        </p>
                    </a>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</div>
<?php }} ?>

<?php
    if ($TacPhamKinhDien && mysqli_num_rows($TacPhamKinhDien) > 0) { 
        ?>
<div class="div-112">
    <div class="div-113">
        <h2>Tác Phẩm Kinh Điển</h2>
        <div class="scrollbar">
            <?php while ($row2 = mysqli_fetch_assoc($TacPhamKinhDien)): ?>
                <div class="sach1">
                    <img src="admin/<?php echo $row2['HinhAnhBia']; ?>" alt="">
                    <a href="mota.php?MaSach=<?php echo $row2['MaSach']; ?>">

                        <p>
                            <?php echo $row2['TenSach']; ?>
                        </p>
                    </a>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</div>
<?php } ?>

<?php
    if ($sachmienphi && mysqli_num_rows($sachmienphi) > 0) { 
        ?>
<div class="div-112">
    <div class="div-113">
        <h2>Sách Miễn Phí</h2>
        <div class="scrollbar">
            <?php while ($row2 = mysqli_fetch_assoc($sachmienphi)): ?>
                <div class="sach1">
                    <img src="admin/<?php echo $row2['HinhAnhBia']; ?>" alt="">
                    <a href="mota.php?MaSach=<?php echo $row2['MaSach']; ?>">

                        <p>
                            <?php echo $row2['TenSach']; ?>
                        </p>
                    </a>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</div>
<?php } ?>

<?php
    if ($MoiNhat && mysqli_num_rows($MoiNhat) > 0) { 
        ?>
<div class="div-112">
    <div class="div-113">
        <h2>Mới Nhất</h2>
        <div class="scrollbar">
            <?php while ($row2 = mysqli_fetch_assoc($MoiNhat)): ?>
                <div class="sach1">
                    <img src="admin/<?php echo $row2['HinhAnhBia']; ?>" alt="">
                    <a href="mota.php?MaSach=<?php echo $row2['MaSach']; ?>">

                        <p>
                            <?php echo $row2['TenSach']; ?>
                        </p>
                    </a>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</div>
<?php } ?>

<?php
    if ($TrinhTham && mysqli_num_rows($TrinhTham) > 0) { 
        ?>
<div class="div-112">
    <div class="div-113">
        <h2>Trinh thám - Kinh dị</h2>
        <div class="scrollbar">
            <?php while ($row2 = mysqli_fetch_assoc($TrinhTham)): ?>
                <div class="sach1">
                    <img src="admin/<?php echo $row2['HinhAnhBia']; ?>" alt="">
                    <a href="mota.php?MaSach=<?php echo $row2['MaSach']; ?>">

                        <p>
                            <?php echo $row2['TenSach']; ?>
                        </p>
                    </a>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</div>
<?php } ?>

<?php
    if ($ChungKhoan && mysqli_num_rows($ChungKhoan) > 0) { 
        ?>
<div class="div-112">
    <div class="div-113">
        <h2>Chứng khoán - Bất động sản - Đầu tư</h2>
        <div class="scrollbar">
            <?php while ($row2 = mysqli_fetch_assoc($ChungKhoan)): ?>
                <div class="sach1">
                    <img src="admin/<?php echo $row2['HinhAnhBia']; ?>" alt="">
                    <a href="mota.php?MaSach=<?php echo $row2['MaSach']; ?>">

                        <p>
                            <?php echo $row2['TenSach']; ?>
                        </p>
                    </a>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</div>
<?php } ?>


<?php require_once "footer.php"; ?>