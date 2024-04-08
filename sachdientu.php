<?php
include "header.php";
include "slider.php";
?>

<div class="div-112">
    <div class="div-113">
        <h2>Sách miễn phí</h2>
        <div class="scrollbar">

            <?php while ($row1 = mysqli_fetch_assoc($sachmienphi)): ?>
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

<div class="div-112">
    <div class="div-113">
        <h2>Mới Nhất</h2>
        <div class="scrollbar">
            <?php while ($row1 = mysqli_fetch_assoc($MoiNhat)): ?>
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

<div class="div-112">
    <div class="div-113">
        <h2>Tác Phẩm Kinh Điển</h2>
        <div class="scrollbar">
            <?php while ($row2 = mysqli_fetch_assoc($TacPhamKinhDien)): ?>
                <div class="sach1">
                    <img src="admin/<?php echo $row2['HinhAnhBia']; ?>" alt="">
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

<?php
include "footer.php";
?>