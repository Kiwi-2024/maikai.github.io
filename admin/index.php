<?php
include "../model/model.php";
include "header.php";
?>
<div class="user-info">
    <?php
    session_start();
    if (isset ($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        echo "<div class='user-info1'>";
        echo "" . $_SESSION['HoTen'] . " đã đăng nhập!";
        echo "<a href='../index.php'>Trang chủ</a>";
        echo "<a href='../taikhoan/logout.php'>Đăng xuất</a>";
        echo "</div>";
        // ======================================
    
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

                case 'deletedanhmuc':
                    deleteDM();
                    include "danhmuc/delete.php";
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

                case 'deletesach':
                    deleteSach();
                    include "sach_dientu/delete.php";
                    break;

                case 'addchuong':
                    addChuong();
                    include "chuongsach/addchuong.php";
                    break;

                case 'listchuong':
                    include "chuongsach/list_chuong.php";
                    break;

                case 'listtaikhoan':
                    include "../taikhoan/list_taikhoan.php";
                    break;

                case 'deletechuong':
                    deleteChuong();
                    include "chuongsach/delete_chuong.php";
                    break;

                case 'listnoidung':
                    include "chuongsach/noidung.php";
                    break;
                
                case 'updatenoidung':
                    updateNoiDung();
                    include "chuongsach/form_update.php";
                    break;
                case 'nhanxet':
                    NhanXet();
                    break;
                default:
                    break;
            }
        } else {
            echo "Yêu cầu không hợp lệ!";
        }
    } else {
        echo "<a href='../index.php'>Đăng nhập</a>";
    }
    ?>


</div>

<?php
include "footer.php";
?>