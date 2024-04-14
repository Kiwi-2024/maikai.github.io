<?php
include "../model/model.php";
include "header.php";
?>
<div class="user-info">
    <?php
    session_start();
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        echo "<div class='user-info1'>";
        echo "" . $_SESSION['HoTen'] . " đã đăng nhập!";
        echo "<a href='../index.php'>Trang chủ</a>";
        echo "<a href='../taikhoan/logout.php'>Đăng xuất</a>";
        echo "</div>";
        // ======================================
    
        // controller
        if (isset($_GET['act'])) {
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

                case 'addaudiofile':
                    audioFile();
                    include "audio/audios.php";
                    break;

                case 'listaudio':
                    include "audio/list_audio.php";
                    break;

                case 'deletesachnoi':
                    deleteSachNoi();
                    include "audio/form_delete.php";
                    break;

                case 'updatesachnoi':
                    updateSachNoi();
                    include "audio/form_update.php";
                    break;

                case 'adddmhieusoi':
                    addDanhMucHieuSoi();
                    include "dmhieusoi/adddmsachsoi.php";
                    break;

                case 'listdmhieusoi':
                    include "dmhieusoi/list_dm.php";
                    break;

                case 'deletedmhieusoi':
                    deleteDMSachHieusoi();
                    include "dmhieusoi/form_delete.php";
                    break;

                case 'updatedmhieusoi':
                    updateDMSachHieuSoi();
                    include "dmhieusoi/form_update.php";
                    break;
                // sách hiệu sồi
    
                case 'addsachhieusoi':
                    addSachHieuSoi();
                    include "sach_hieusoi/add_sach.php";
                    break;

                case 'listsachhieusoi':
                    include "sach_hieusoi/list_sach.php";
                    break;

                case 'updatesachhieusoi':
                    updateSachHieuSoi();
                    include "sach_hieusoi/form_update.php";
                    break;

                case 'deletesachhieusoi':
                    deleteSachHieuSoi();
                    include "sach_hieusoi/delete.php";
                    break;

                    case 'listnhanxet':
                        include "binhluan/list_nhanxet.php";
                        break;

                        case 'deletebinhluan':
                            deleteBinhLuan();
                            include "binhluan/delete_bl.php";
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