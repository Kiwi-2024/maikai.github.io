<?php
include "header.php";
include "slider.php";
?>
<?php
    if ($HienDai_Soi && mysqli_num_rows($HienDai_Soi) > 0) { 
        ?>
<div class="div-112">
    <div class="div-113">
        <h2>Hiện đại</h2>
        <div class="scrollbar">
            <?php while ($row2 = mysqli_fetch_assoc($HienDai_Soi)): ?>
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
    if ($MoiNhat_Soi && mysqli_num_rows($MoiNhat_Soi) > 0) { 
        ?>
<div class="div-112">
    <div class="div-113">
        <h2>Mới nhất</h2>
        <div class="scrollbar">
            <?php while ($row2 = mysqli_fetch_assoc($MoiNhat_Soi)): ?>
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
    if ($CoDai_Soi && mysqli_num_rows($CoDai_Soi) > 0) { 
        ?>
<div class="div-112">
    <div class="div-113">
        <h2>Cổ đại</h2>
        <div class="scrollbar">
            <?php while ($row2 = mysqli_fetch_assoc($CoDai_Soi)): ?>
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
    if ($HuyenHuyen_Soi && mysqli_num_rows($HuyenHuyen_Soi) > 0) { 
        ?>
<div class="div-112">
    <div class="div-113">
        <h2>Huyền huyễn</h2>
        <div class="scrollbar">
            <?php while ($row2 = mysqli_fetch_assoc($HuyenHuyen_Soi)): ?>
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
    if ($TrinhTham_Soi && mysqli_num_rows($TrinhTham_Soi) > 0) { 
        ?>
<div class="div-112">
    <div class="div-113">
        <h2>Trinh thám</h2>
        <div class="scrollbar">
            <?php while ($row2 = mysqli_fetch_assoc($TrinhTham_Soi)): ?>
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
    if ($DamMy_Soi && mysqli_num_rows($DamMy_Soi) > 0) { 
        ?>
<div class="div-112">
    <div class="div-113">
        <h2>Đam mỹ</h2>
        <div class="scrollbar">
            <?php while ($row2 = mysqli_fetch_assoc($DamMy_Soi)): ?>
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