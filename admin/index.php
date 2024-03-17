<?php
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

        default:
            break;
    }
}

?>