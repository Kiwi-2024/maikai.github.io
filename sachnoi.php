<?php
include "header.php";
include "slider.php";
?>


<div class="div-112">
    <div class="div-113">
        <h2>Mới Nhất</h2>
        <div class="scrollbar">
            <?php while ($row8 = mysqli_fetch_assoc($MoiNhat_sn)): ?>
                <div class="sach1">
                    <img src="admin/<?php echo $row8['HinhAnhBia']; ?>" alt="">
                    <a href="mota.php?MaSach=<?php echo $row8['MaSach']; ?>">

                        <p>
                            <?php echo $row8['TenSach']; ?>
                        </p>
                    </a>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</div>

<div class="div-112">
    <div class="div-113">
        <h2>Ngôn tình</h2>
        <div class="scrollbar">
            
            <?php while ($row9 = mysqli_fetch_assoc($NgonTinh_sn)): ?>
                <div class="sach1">
                    <img src="admin/<?php echo $row9['HinhAnhBia']; ?>" alt="">
                    <a href="mota.php?MaSach=<?php echo $row9['MaSach']; ?>">
                        <p>
                            <?php echo $row9['TenAudio']; ?>
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