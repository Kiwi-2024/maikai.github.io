<?php
function connect_db()
{
    $conn = mysqli_connect('localhost', 'root', 'phamngoctam', 'du_an_1_2024');
    if (!$conn) {
        die ('Kết nối cơ sở dữ liệu thất bại');
    }
    return $conn;
}

function addDanhMuc()
{
    // Kiểm tra xác thực và xử lý dữ liệu từ biểu mẫu HTML
    if (isset ($_POST['TenDM']) && isset ($_POST['MoTa'])) {
        // Kết nối tới cơ sở dữ liệu
        $conn = connect_db();
        if ($conn->connect_error) {
            die ("Kết nối không thành công: " . $conn->connect_error);
        }
        $TenDM = $_POST['TenDM'];
        $MoTa = $_POST['MoTa'];
        // Thực hiện truy vấn để thêm dữ liệu vào cơ sở dữ liệu
        $sql = "INSERT INTO danhmuc (TenDM, MoTa) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $TenDM, $MoTa);

        if ($stmt->execute()) {
            echo "Danh mục đã được thêm thành công!";
        } else {
            echo "Lỗi: " . $sql . "<br>" . $conn->error;
        }

        $stmt->close();

        // Đóng kết nối tới cơ sở dữ liệu
        $conn->close();
    }

}
function updateDM()
{
    $conn = connect_db();
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset ($_POST["MaDM"])) {

        // Kiểm tra kết nối
        if ($conn->connect_error) {
            die ("Kết nối không thành công: " . $conn->connect_error);
        }

        $MaDM = $_POST['MaDM'];
        $TenDM = $_POST['TenDM'];
        $MoTa = $_POST['MoTa'];

        // Cập nhật thông tin danh mục trong cơ sở dữ liệu
        $sql = "UPDATE danhmuc SET TenDM = '$TenDM', MoTa = '$MoTa' WHERE MaDM = '$MaDM'";
        if ($conn->query($sql) === true) {
            echo 'Cập nhật thông tin danh mục thành công';
            echo '<br>';
            echo '<a href="index.php?act=listdm">Xem tất cả danh mục</a>';
        } else {
            echo 'Lỗi cập nhật thông tin danh mục:' . $conn->error;
        }

        // Đóng kết nối tới cơ sở dữ liệu
        $conn->close();

    } else {
        // echo 'Yêu cầu không hợp lệ';
    }
}

// thêm sách
function addSach()
{
    // Kiểm tra nếu có dữ liệu được gửi từ form
    if (isset ($_POST['DanhMuc']) && isset ($_POST['TenSach']) && isset ($_POST['TacGia']) && isset ($_POST['MoTa']) && isset ($_POST['LoaiSach']) && isset ($_POST['NamXuatBan']) && isset ($_FILES['HinhAnhBia'])) {
        // Kết nối cơ sở dữ liệu
        $conn = connect_db();

        // Lấy dữ liệu từ form
        $DanhMuc = $_POST['DanhMuc'];
        $TenSach = $_POST['TenSach'];
        $TacGia = $_POST['TacGia'];
        $MoTa = $_POST['MoTa'];
        $LoaiSach = $_POST['LoaiSach'];
        $NamXuatBan = $_POST['NamXuatBan'];

        // Xử lý tệp hình ảnh
        $hinhanhpath = basename($_FILES['HinhAnhBia']['name']);
        $target_dir = "sach_dientu/uploads/";
        $target_file = $target_dir . $hinhanhpath;

        if (move_uploaded_file($_FILES["HinhAnhBia"]["tmp_name"], $target_file)) {
            // Hình ảnh đã được tải lên thành công, tiếp tục thêm vào cơ sở dữ liệu
            $HinhAnhBia = $target_file;

            // Thực hiện truy vấn để thêm dữ liệu vào cơ sở dữ liệu
            $sql = "INSERT INTO sach (danhMucID, TenSach, TacGia, MoTa, LoaiSach, NamXuatBan, HinhAnhBia) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssssss", $DanhMuc, $TenSach, $TacGia, $MoTa, $LoaiSach, $NamXuatBan, $HinhAnhBia);

            if ($stmt->execute()) {
                echo "Sách '$TenSach' được thêm thành công!";
                echo '<a href="index.php?act=listsach">Xem tất cả Quyển Sách</a>';
            } else {
                echo "Lỗi: " . $sql . "<br>" . $conn->error;
            }

            $stmt->close();
        } else {
            echo "Hình ảnh không được tải lên thành công";
        }

        // Đóng kết nối tới cơ sở dữ liệu
        $conn->close();
    }
}

// Update sách điện tử

function updateSach()
{
    $conn = connect_db();

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset ($_POST['MaSach'])) {
        $MaSach = $_POST['MaSach'];
        $DanhMuc = $_POST['DanhMuc'];
        $TenSach = $_POST['TenSach'];
        $TacGia = $_POST['TacGia'];
        $MoTa = $_POST['MoTa'];
        $LoaiSach = $_POST['LoaiSach'];
        $NamXuatBan = $_POST['NamXuatBan'];
        // xử lý hình ảnh

        $targetDir = 'sach_dientu/uploads/';
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($_FILES["HinhAnhBia"]["name"], PATHINFO_EXTENSION));
        // tạo tên file duy nhất để tránh việc ghi đè các tệp tin tồn tại
        $targetFile = $targetDir . uniqid() . "." . $imageFileType;
        // Kiểm tra hình ảnh có tồn tại không
        if ($_FILES['HinhAnhBia']['tmp_name']) {
            // Kiểm tra kích thước file 
            if ($_FILES['HinhAnhBia']['size'] > 500000) {
                echo "Xin lỗi, hình ảnh của bạn quá lớn.";
                $uploadOk = 0;
            }

            // Cho phép các định dạng file nhất định
            $allowedFormats = array("jpg", "png", "jpeg", "gif");
            if (!in_array($imageFileType, $allowedFormats)) {
                echo "Chỉ chấp nhận các định dạng JPG, JPEG, PNG and GIF.";
                $uploadOk = 0;
            }

            // Di chuyển  hình ảnh đến thư mục lưu trữ
            if ($uploadOk && move_uploaded_file($_FILES["HinhAnhBia"]["tmp_name"], $targetFile)) {
                // Cập nhật thông tin danh mục trong cơ sở dữ liệu
                $sql_update = "UPDATE sach SET danhMucID = '$DanhMuc', TenSach = '$TenSach', TacGia = '$TacGia', MoTa = '$MoTa', LoaiSach = '$LoaiSach', NamXuatBan = '$NamXuatBan', HinhAnhBia = '$targetFile' WHERE MaSach = '$MaSach'";
                if ($conn->query($sql_update) === true) {
                    echo 'Cập nhập thông tin Sách thành công';
                    echo '<a href="index.php?act=listsach">Xem tất cả Sách</a>';
                } else {
                    echo 'Lỗi Cập nhật thông tin Sách:' . $conn->error;
                }
            } else {
                echo "Lỗi khi tải hình ảnh.";
            }
        } else {
            // nếu người dùng không tải lên hình ảnh mới, chỉ cập nhật thông tin khác
            $sql_update = "UPDATE sach SET danhMucID = '$DanhMuc', TenSach = '$TenSach', TacGia = '$TacGia', MoTa = '$MoTa', LoaiSach = '$LoaiSach', NamXuatBan = '$NamXuatBan' WHERE MaSach = '$MaSach'";
            if ($conn->query($sql_update) === true) {
                echo 'Cập nhật thông tin danh mục thành công';
                echo '<br>';
                echo '<a href="index.php?act=listsach">Xem tất cả Sách</a>';
            } else {
                echo 'Lỗi cập nhật thông tin Sách:' . $conn->error;
            }
            // Đóng kết nối tới cơ sở dữ liệu
            $conn->close();
        }
    } else {
        // echo 'Yêu cầu không hợp lệ';
    }

}

function deleteDM()
{
    $conn = connect_db();
    
    if (isset($_POST['MaDM'])) {
        $maDMcanxoa = $_POST['MaDM'];

        // Thực hiện câu lệnh xóa sách từ bảng sach
        $sql_delete_book = "DELETE FROM danhmuc WHERE MaDM = $maDMcanxoa";

        if (mysqli_query($conn, $sql_delete_book)) {
            // Chuyển hướng người dùng đến trang danh sách sách sau khi xóa thành công
            header('Location: index.php?act=listdm');
            exit;
        } else {
            echo "Lỗi khi xóa sách: " . mysqli_error($conn);
        }

        // Đóng kết nối với cơ sở dữ liệu
        mysqli_close($conn);
    }
}


function deleteSach()
{
    $conn = connect_db();
    // Lấy MaSach từ tham số GET

    // Lấy MaSach từ tham số POST
    if (isset ($_POST['MaSach'])) {
        $maSachcanxoa = $_POST['MaSach'];

        // Xóa tất cả các chương thuộc sách đó từ bảng chuong_sach
        $sql_delete_chapters = "DELETE FROM chuong_sach WHERE sach_id = $maSachcanxoa";
        if (mysqli_query($conn, $sql_delete_chapters)) {
            // Tiến hành xóa sách từ bảng sach sau khi đã xóa hết các chương
            $sql_delete_book = "DELETE FROM sach WHERE MaSach = $maSachcanxoa";
            if (mysqli_query($conn, $sql_delete_book)) {
                // Chuyển hướng người dùng đến trang danh sách sách sau khi xóa thành công
                header('Location: index.php?act=listsach');
                exit;
            } else {
                echo "Lỗi khi xóa sách: " . mysqli_error($conn);
            }
        } else {
            echo "Lỗi khi xóa chương: " . mysqli_error($conn);
        }

        // Đóng kết nối với cơ sở dữ liệu
        mysqli_close($conn);
    }
}

// add Chương Mới
function addChuong()
{
    $conn = connect_db();
    // Kiểm tra xem các trường có được gửi từ form hay không
    if (isset ($_POST['MaSach'], $_POST['TenChuong'], $_POST['NoiDung'])) {
        // Lấy dữ liệu từ form
        $MaSach = $_POST['MaSach'];
        $TenChuong = $_POST['TenChuong'];
        $NoiDung = $_POST['NoiDung'];

        $sql_count = "SELECT COUNT(*) as SoChuong FROM chuong_sach WHERE sach_id = '$MaSach'";
        $result_count = mysqli_query($conn, $sql_count);
        $row_count = mysqli_fetch_assoc($result_count);

        if ($row_count) {

            $SoChuong = $row_count['SoChuong'] + 1;
            $sql = "INSERT INTO chuong_sach (TenChuong, NoiDung, sach_id, SoChuong) VALUES ('$TenChuong', '$NoiDung', '$MaSach', '$SoChuong')";

            // thực thi truy vấn
            if (mysqli_query($conn, $sql)) {
                echo "Thêm chương thành công!";
                header('Location: index.php?act=listchuong&MaSach=' . $MaSach);
                exit; //
            } else {
                echo "Lỗi: " . $sql . "<br>" . mysqli_error($conn);
            }
        } else {
            // Xử lý trường hợp không có kết quả trả về từ truy vấn
            echo "Không thể đếm số chương hiện có.";
        }

    } else {
        // // Nếu các trường không được gửi từ form, hiển thị thông báo lỗi
        // echo "Vui lòng điền đầy đủ thông tin chương.";
        // exit();
    }

    // Đóng kết nối
    mysqli_close($conn);

}

function deleteChuong()
{
    if (isset ($_POST['submit'])) {
        if ($_POST['submit'] == 'xoa') {
            $conn = connect_db();

            $maChuongcanxoa = $_POST['MaChuong'];
            // Đảm bảo biến $MaSach đã được gán giá trị từ URL
            $MaSach = $_POST['MaSach']; // Giả sử bạn đã lấy giá trị MaSach từ URL

            if (mysqli_query($conn, "DELETE FROM chuong_sach WHERE MaChuong = $maChuongcanxoa")) {

                $sql_count = "SELECT COUNT(*) as SoChuong FROM chuong_sach WHERE sach_id = $MaSach";
                $result_count = mysqli_query($conn, $sql_count);
                $row_count = mysqli_fetch_array($result_count);
                $SoChuongMoi = $row_count['SoChuong'];

                // cập nhật số chương mới trong quyến sách
                $sql_update_sach = "UPDATE chuong_sach set SoChuong = $SoChuongMoi where sach_id = $MaSach";
                if (mysqli_query($conn, $sql_update_sach)) {
                    echo "Xóa chương thành công";
                } else {
                    echo "Lỗi khi cập nhật số chương!";
                }
                mysqli_close($conn);
                // Sử dụng biến $MaSach trong câu lệnh header
                header("Location: index.php?act=listchuong&MaSach=$MaSach");
                exit;
            } else {
                echo "Xóa không thành công!";
            }
        } else {
            // Đảm bảo không có mã PHP nào được thực thi sau khi chuyển hướng
        }
    }
}

function updateChuong()
{

}
?>