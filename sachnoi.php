<?php
include "header.php";
include "slider.php";
?>


<?php
    if ($MoiNhat_sn && mysqli_num_rows($MoiNhat_sn) > 0) { 
        ?>
<div class="div-112">
    <div class="div-113">
        <h2>Mới nhất</h2>
        <div class="scrollbar">
            <?php while ($row2 = mysqli_fetch_assoc($MoiNhat_sn)): ?>
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
    if ($NgonTinh_sn && mysqli_num_rows($NgonTinh_sn) > 0) { 
        ?>
<div class="div-112">
    <div class="div-113">
        <h2>Ngôn Tình</h2>
        <div class="scrollbar">
            <?php while ($row2 = mysqli_fetch_assoc($NgonTinh_sn)): ?>
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
    if ($TrinhTham_sn && mysqli_num_rows($TrinhTham_sn) > 0) { 
        ?>
<div class="div-112">
    <div class="div-113">
        <h2>Trinh thám - Kinh dị</h2>
        <div class="scrollbar">
            <?php while ($row2 = mysqli_fetch_assoc($TrinhTham_sn)): ?>
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
    if ($TieuThuyet_sn && mysqli_num_rows($TieuThuyet_sn) > 0) { 
        ?>
<div class="div-112">
    <div class="div-113">
        <h2>Tiểu thuyết</h2>
        <div class="scrollbar">
            <?php while ($row2 = mysqli_fetch_assoc($TieuThuyet_sn)): ?>
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
    if ($PhatTrien_sn && mysqli_num_rows($PhatTrien_sn) > 0) { 
        ?>
<div class="div-112">
    <div class="div-113">
        <h2>Phát triển cá nhân</h2>
        <div class="scrollbar">
            <?php while ($row2 = mysqli_fetch_assoc($PhatTrien_sn)): ?>
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
    if ($TamLy_sn && mysqli_num_rows($TamLy_sn) > 0) { 
        ?>
<div class="div-112">
    <div class="div-113">
        <h2>Tâm Lý - Sức Khỏe Tinh Thần</h2>
        <div class="scrollbar">
            <?php while ($row2 = mysqli_fetch_assoc($TamLy_sn)): ?>
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