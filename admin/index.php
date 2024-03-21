<?php

?>
<div class="user-info">
    <?php
    session_start();
    if (isset ($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        echo "" . $_SESSION['HoTen'] . " đã đăng nhập!";
        echo "<a href='../index.php'>Trang chủ</a>";
        echo "<a href='../taikhoan/logout.php'>Đăng xuất</a>";
        // ======================================
        include "../model/model.php";
        include "header.php";
        // controller
        if (isset ($_GET['act'])) {
            $act = $_GET['act'];
            switch ($act) {
                case 'adddm':
                    // Kiểm tra xem người dùng click vào hay không
                    addDanhMuc();
                    include "danhmuc/add_dm.php";
                    break;
                case 'listdm':
                    include "danhmuc/list_dm.php";
                    break;

                case 'updatedm':
                    updateDM();
                    include "danhmuc/form_update.php";
                    break;

                case 'addsach':
                    addSach();
                    include "sach_dientu/add_sach.php";
                    break;

                case 'listsach':
                    include "sach_dientu/list_sach.php";
                    break;

                case 'updatesach':
                    updateSach();
                    include "sach_dientu/form_update.php";
                    break;

                case 'addchuong':
                    addChuong();
                    include "chuongsach/addchuong.php";
                    break;

                    case 'listchuong':
                        include "chuongsach/list_chuong.php";
                        break;

                default:
                    break;
            }
        }
    } else {
        echo "<a href='taikhoan/login.php'>Đăng nhập</a>";
    }
    ?>


</div>

<?php
include "footer.php";
?>