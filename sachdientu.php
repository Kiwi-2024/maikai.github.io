<?php
include "header.php";
include "slider.php";
?>

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
        <h2>Mới nhất</h2>
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
    if ($TacPhamKinhDien && mysqli_num_rows($TacPhamKinhDien) > 0) { 
        ?>
<div class="div-112">
    <div class="div-113">
        <h2>Tác phẩm kinh điển</h2>
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
    if ($Marketing && mysqli_num_rows($Marketing) > 0) { 
        ?>
<div class="div-112">
    <div class="div-113">
        <h2>Marketing - Bán hàng</h2>
        <div class="scrollbar">
            <?php while ($row2 = mysqli_fetch_assoc($Marketing)): ?>
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
    if ($TaiChinh && mysqli_num_rows($TaiChinh) > 0) { 
        ?>
<div class="div-112">
    <div class="div-113">
        <h2>Tài chính cá nhân</h2>
        <div class="scrollbar">
            <?php while ($row2 = mysqli_fetch_assoc($TaiChinh)): ?>
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
    if ($PhatTrien && mysqli_num_rows($PhatTrien) > 0) { 
        ?>
<div class="div-112">
    <div class="div-113">
        <h2>Phát triển cá nhân</h2>
        <div class="scrollbar">
            <?php while ($row2 = mysqli_fetch_assoc($PhatTrien)): ?>
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
    if ($HocTap && mysqli_num_rows($HocTap) > 0) { 
        ?>
<div class="div-112">
    <div class="div-113">
        <h2>Học tập - Hướng nghiệp</h2>
        <div class="scrollbar">
            <?php while ($row2 = mysqli_fetch_assoc($HocTap)): ?>
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
    if ($SucKhoe && mysqli_num_rows($SucKhoe) > 0) { 
        ?>
<div class="div-112">
    <div class="div-113">
        <h2>Sức khỏe - Làm đẹp</h2>
        <div class="scrollbar">
            <?php while ($row2 = mysqli_fetch_assoc($SucKhoe)): ?>
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
    if ($TuDuy && mysqli_num_rows($TuDuy) > 0) { 
        ?>
<div class="div-112">
    <div class="div-113">
        <h2>Tư duy sáng tạo</h2>
        <div class="scrollbar">
            <?php while ($row2 = mysqli_fetch_assoc($TuDuy)): ?>
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

<?php
include "footer.php";
?>