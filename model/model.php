<?php
function connect_db()
{
    $conn = mysqli_connect('localhost', 'root', 'phamngoctam', 'du_an_1_2024');
    if (!$conn) {
        die('Kết nối cơ sở dữ liệu thất bại');
    }
    return $conn;
}

function addDanhMuc()
{
    if (isset($_POST['TenDM']) && isset($_POST['MoTa'])) {

        $conn = connect_db();
        $TenDM = $_POST['TenDM'];
        $MoTa = $_POST['MoTa'];
        // Thực hiện truy vấn để thêm dữ liệu vào cơ sở dữ liệu
        $sql = "INSERT INTO danhmuc (TenDM, MoTa) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $TenDM, $MoTa);

        if ($stmt->execute()) {
            echo "<div id='success-message' class='success-message'>Thêm danh mục thành công</div>";
        } else {
            echo "Lỗi: " . $sql . "<br>" . $conn->error;
        }

        $stmt->close();


        $conn->close();
    }

}

function updateDM()
{
    $conn = connect_db();
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["MaDM"])) {

        // Kiểm tra kết nối
        if ($conn->connect_error) {
            die("Kết nối không thành công: " . $conn->connect_error);
        }

        $MaDM = $_POST['MaDM'];
        $TenDM = $_POST['TenDM'];
        $MoTa = $_POST['MoTa'];

        $sql = "UPDATE danhmuc SET TenDM = '$TenDM', MoTa = '$MoTa' WHERE MaDM = '$MaDM'";
        if ($conn->query($sql) === true) {
            echo "<script>alert('Cập nhật thông tin sách thành công!');</script>";
            echo "<script>window.location.href = 'index.php?act=listdm';</script>";
            exit();
        } else {
            echo 'Lỗi cập nhật thông tin danh mục:' . $conn->error;
        }

        $conn->close();

    } else {
        // echo 'Yêu cầu không hợp lệ';
    }
}
// sach hiệu sồi
function addDanhMucHieuSoi()
{
    if (isset($_POST['TenDM']) && isset($_POST['MoTa'])) {

        $conn = connect_db();
        $TenDM = $_POST['TenDM'];
        $MoTa = $_POST['MoTa'];
        // Thực hiện truy vấn để thêm dữ liệu vào cơ sở dữ liệu
        $sql = "INSERT INTO danhmuc_sachsoi (TenDM, MoTa) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $TenDM, $MoTa);

        if ($stmt->execute()) {
            echo "<div id='success-message' class='success-message'>Thêm danh mục thành công</div>";
        } else {
            echo "Lỗi: " . $sql . "<br>" . $conn->error;
        }

        $stmt->close();


        $conn->close();
    }

}


function updateDMSachHieuSoi()
{
    $conn = connect_db();
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["MaDM"])) {

        // Kiểm tra kết nối
        if ($conn->connect_error) {
            die("Kết nối không thành công: " . $conn->connect_error);
        }

        $MaDM = $_POST['MaDM'];
        $TenDM = $_POST['TenDM'];
        $MoTa = $_POST['MoTa'];


        $sql = "UPDATE danhmuc_sachsoi SET TenDM = '$TenDM', MoTa = '$MoTa' WHERE MaDM = '$MaDM'";
        if ($conn->query($sql) === true) {
            echo "<script>alert('Cập nhật thông tin danh mục thành công!');</script>";
            echo "<script>window.location.href = 'index.php?act=listdmhieusoi';</script>";
            exit();
        } else {
            echo 'Lỗi cập nhật thông tin danh mục:' . $conn->error;
        }

        $conn->close();

    } else {
        // echo 'Yêu cầu không hợp lệ';
    }
}

function deleteDMSachHieusoi()
{
    $conn = connect_db();

    if (isset($_POST['MaDM'])) {
        $maDMcanxoa = $_POST['MaDM'];
        $sql_delete_book = "DELETE FROM danhmuc_sachsoi WHERE MaDM = $maDMcanxoa";
        if (mysqli_query($conn, $sql_delete_book)) {
            header('Location: index.php?act=listdmhieusoi');
            exit;
        } else {
            echo "Lỗi khi xóa sách: " . mysqli_error($conn);
        }

        mysqli_close($conn);
    }
}

// thêm sách
function addSach()
{
    if (isset($_POST['DanhMuc']) && isset($_POST['TenSach']) && isset($_POST['TacGia']) && isset($_POST['MoTa']) && isset($_POST['LoaiSach']) && isset($_POST['NamXuatBan']) && isset($_FILES['HinhAnhBia'])) {
        $conn = connect_db();

        $DanhMuc = $_POST['DanhMuc'];
        $TenSach = $_POST['TenSach'];
        $TacGia = $_POST['TacGia'];
        $MoTa = $_POST['MoTa'];
        $LoaiSach = $_POST['LoaiSach'];
        $NamXuatBan = $_POST['NamXuatBan'];

        $hinhanhpath = basename($_FILES['HinhAnhBia']['name']);
        $target_dir = "sach_dientu/uploads/";
        $target_file = $target_dir . $hinhanhpath;

        if (move_uploaded_file($_FILES["HinhAnhBia"]["tmp_name"], $target_file)) {
            $HinhAnhBia = $target_file;
            $sql = "INSERT INTO sach (danhMucID, TenSach, TacGia, MoTa, LoaiSach, NamXuatBan, HinhAnhBia) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssssss", $DanhMuc, $TenSach, $TacGia, $MoTa, $LoaiSach, $NamXuatBan, $HinhAnhBia);

            if ($stmt->execute()) {
                echo "<div id='success-message' class='success-message'>Thêm sách thành công</div>";
            } else {
                echo "Lỗi: " . $sql . "<br>" . $conn->error;
            }

            $stmt->close();
        } else {
            echo "Hình ảnh không được tải lên thành công";
        }

        $conn->close();
    }

}

// Update sách điện tử

function updateSach()
{
    $conn = connect_db();
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['MaSach'])) {
        $MaSach = $_POST['MaSach'];
        $DanhMuc = $_POST['DanhMuc'];
        $TenSach = $_POST['TenSach'];
        $TacGia = $_POST['TacGia'];
        $MoTa = $_POST['MoTa'];
        $LoaiSach = $_POST['LoaiSach'];
        $NamXuatBan = $_POST['NamXuatBan'];

        $targetDir = 'sach_dientu/uploads/';
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($_FILES["HinhAnhBia"]["name"], PATHINFO_EXTENSION));
        $targetFile = $targetDir . uniqid() . "." . $imageFileType;
        if ($_FILES['HinhAnhBia']['tmp_name']) {
            // Kiểm tra kích thước file 
            if ($_FILES['HinhAnhBia']['size'] > 500000) {
                echo "Xin lỗi, hình ảnh của bạn quá lớn.";
                $uploadOk = 0;
            }
            $allowedFormats = array("jpg", "png", "jpeg", "gif");
            if (!in_array($imageFileType, $allowedFormats)) {
                echo "Chỉ chấp nhận các định dạng JPG, JPEG, PNG and GIF.";
                $uploadOk = 0;
            }

            if ($uploadOk && move_uploaded_file($_FILES["HinhAnhBia"]["tmp_name"], $targetFile)) {
                $sql_update = "UPDATE sach SET danhMucID = '$DanhMuc', TenSach = '$TenSach', TacGia = '$TacGia', MoTa = '$MoTa', LoaiSach = '$LoaiSach', NamXuatBan = '$NamXuatBan', HinhAnhBia = '$targetFile' WHERE MaSach = '$MaSach'";
                if ($conn->query($sql_update) === true) {
                    echo "<script>alert('Cập nhật thông tin sách thành công!');</script>";
                    echo "<script>window.location.href = 'index.php?act=listsach';</script>";
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
                echo "<script>alert('Cập nhật thông tin sách thành công!');</script>";
                echo "<script>window.location.href = 'index.php?act=listsach';</script>";
            } else {
                echo 'Lỗi cập nhật thông tin Sách:' . $conn->error;
            }
            $conn->close();
        }
    } else {
        // echo 'Yêu cầu không hợp lệ';
    }

}

function deleteSach()
{
    $conn = connect_db();
    if (isset($_POST['MaSach'])) {
        $maSachcanxoa = $_POST['MaSach'];

        // Xóa tất cả các chương thuộc sách đó từ bảng chuong_sach
        $sql_delete_chapters = "DELETE FROM chuong_sach WHERE sach_id = $maSachcanxoa";
        if (mysqli_query($conn, $sql_delete_chapters)) {
            $sql_delete_book = "DELETE FROM sach WHERE MaSach = $maSachcanxoa";
            if (mysqli_query($conn, $sql_delete_book)) {
                header('Location: index.php?act=listsach');
                exit;
            } else {
                echo "Lỗi khi xóa sách: " . mysqli_error($conn);
            }
        } else {
            echo "Lỗi khi xóa chương: " . mysqli_error($conn);
        }

        mysqli_close($conn);
    }
}



function deleteDM()
{
    $conn = connect_db();

    if (isset($_POST['MaDM'])) {
        $maDMcanxoa = $_POST['MaDM'];
        $sql_delete_book = "DELETE FROM danhmuc WHERE MaDM = $maDMcanxoa";
        if (mysqli_query($conn, $sql_delete_book)) {
            header('Location: index.php?act=listdm');
            exit;
        } else {
            echo "Lỗi khi xóa sách: " . mysqli_error($conn);
        }

        mysqli_close($conn);
    }
}

// add Chương Mới
function addChuong()
{
    $conn = connect_db();
    if (isset($_POST['MaSach'], $_POST['TenChuong'], $_POST['NoiDung'])) {
        // Lấy dữ liệu từ form
        $MaSach = $_POST['MaSach'];
        $TenChuong = $_POST['TenChuong'];
        $NoiDung = $_POST['NoiDung'];

        // Kiểm tra bảng liên kết là sach hay sach_soi
        $sql_check_sach = "SELECT * FROM sach WHERE MaSach = $MaSach";
        $sql_check_sach_soi = "SELECT * FROM sach_soi WHERE MaSach = $MaSach";

        $result_check_sach = mysqli_query($conn, $sql_check_sach);
        $result_check_sach_soi = mysqli_query($conn, $sql_check_sach_soi);

        if (mysqli_num_rows($result_check_sach) > 0) {
            $table_name = 'chuong_sach';
            $id_column = 'sach_id';
        } elseif (mysqli_num_rows($result_check_sach_soi) > 0) {
            $table_name = 'chuong_sach';
            $id_column = 'sach_soi_id';
        } else {
            echo "Không tìm thấy sách hoặc sách_soi.";
            exit();
        }

        // Đếm số chương hiện có
        $sql_count = "SELECT COUNT(*) as SoChuong FROM $table_name WHERE $id_column = '$MaSach'";
        $result_count = mysqli_query($conn, $sql_count);
        $row_count = mysqli_fetch_assoc($result_count);

        if ($row_count) {
            $SoChuong = $row_count['SoChuong'] + 1;
            $sql = "INSERT INTO $table_name (TenChuong, NoiDung, $id_column, SoChuong) VALUES ('$TenChuong', '$NoiDung', '$MaSach', '$SoChuong')";
            if (mysqli_query($conn, $sql)) {
                echo "<script>alert('Thêm chương mới thành công!');</script>";
                echo "<script>window.location.href = 'index.php?act=listchuong&MaSach=" . $MaSach . "';</script>";
                exit();
            } else {
                echo "Lỗi: " . $sql . "<br>" . mysqli_error($conn);
            }
        } else {
            echo "Không thể đếm số chương hiện có.";
        }
    } else {
        // echo "Vui lòng điền đầy đủ thông tin chương.";
        // exit();
    }

    // Đóng kết nối
    mysqli_close($conn);
}

function deleteChuong()
{
    if (isset($_POST['submit'])) {
        if ($_POST['submit'] == 'xoa') {
            $conn = connect_db();

            $maChuongcanxoa = $_POST['MaChuong'];
            // Đảm bảo biến $MaSach đã được gán giá trị từ URL
            $MaSach = $_POST['MaSach']; // Giả sử đã lấy giá trị MaSach từ URL

            if (mysqli_query($conn, "DELETE FROM chuong_sach WHERE MaChuong = $maChuongcanxoa")) {

                $sql_count = "SELECT COUNT(*) as SoChuong FROM chuong_sach WHERE sach_id = $MaSach";
                $result_count = mysqli_query($conn, $sql_count);
                $row_count = mysqli_fetch_array($result_count);
                $SoChuongMoi = $row_count['SoChuong'];

                $sql_update_sach = "UPDATE chuong_sach set SoChuong = $SoChuongMoi where sach_id = $MaSach";
                if (mysqli_query($conn, $sql_update_sach)) {
                    echo "<div id='success-message' class='success-message'>Xóa chương thành công!</div>";
                } else {
                    echo "Lỗi khi cập nhật số chương!";
                }
                mysqli_close($conn);
                header("Location: index.php?act=listchuong&MaSach=$MaSach");
                exit;
            } else {
                echo "Xóa không thành công!";
            }
        } else {

        }
    }
}

function updateNoiDung()
{
    $conn = connect_db();
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["MaChuong"])) {
        $MaSach = $_POST['MaSach'];
        $MaChuong = $_POST['MaChuong'];
        $TenChuong = $_POST['TenChuong'];
        $NoiDung = $_POST['NoiDung'];
        $sql = "UPDATE chuong_sach SET TenChuong = '$TenChuong', NoiDung = '$NoiDung' WHERE MaChuong = '$MaChuong'";
        if ($conn->query($sql) === true) {
            echo "<script>alert('Cập Nhật nội dung thành công!');</script>";
            echo "<script>window.location.href = 'index.php?act=listchuong&MaSach=" . $MaSach . "';</script>";

        } else {
            echo 'Lỗi cập nhật thông nội dung chương:' . $conn->error;
        }

        $conn->close();

    } else {
        // echo 'Yêu cầu không hợp lệ';
    }
}

function NhanXet() {
    $conn = connect_db();
    if (isset($_POST['rate'], $_POST['NhanXet'], $_SESSION['MaKH'], $_POST['MaSach'])) {
        $NhanXet = $_POST['NhanXet'];
        $DanhGia = $_POST['rate'];
        $nguoi_dung_id = $_SESSION['MaKH'];
        $sach_id = $_POST['MaSach'];
        $sql = ""; // Khởi tạo biến $sql
        // Kiểm tra xem liệu sách này là sách thường hay sách soi hay sách nối
        if (isset($_POST['sach_soi_id'])) {
            $sach_soi_id = $_POST['sach_soi_id'];
            $sql = "INSERT INTO danhgia_nhanxet (nguoi_dung_id, sach_soi_id, NhanXet, DanhGia) VALUES ('$nguoi_dung_id', '$sach_soi_id', '$NhanXet', '$DanhGia')";
        } elseif (isset($_POST['sach_noi_id'])) {
            // Sách nối
            $sach_noi_id = $_POST['sach_noi_id'];
            $sql = "INSERT INTO danhgia_nhanxet (nguoi_dung_id, sach_noi_id, NhanXet, DanhGia) VALUES ('$nguoi_dung_id', '$sach_noi_id', '$NhanXet', '$DanhGia')";
        } else {
            // Sách thường
            $sach_id = $_POST['MaSach'];
            $sql = "INSERT INTO danhgia_nhanxet (nguoi_dung_id, sach_id, NhanXet, DanhGia) VALUES ('$nguoi_dung_id', '$sach_id', '$NhanXet', '$DanhGia')";
        }

        if (!empty($sql)) { // Kiểm tra xem biến $sql có giá trị không trống
            if ($conn->query($sql) === true) {
                echo "<script>alert('Nhận xét thành công!');</script>";
                echo "<script>window.location.href = '../mota.php?MaSach=" . $sach_id . "';</script>";
                exit;
            } else {
                echo "Lỗi: " . $conn->error;
            }
        } else {
            echo "Lỗi: Biến \$sql không được gán giá trị.";
        }

        $conn->close();
    }
}


function audioFile()
{
    if (isset($_POST['submit']) && isset($_FILES['MyAudio'])) {
        // Kết nối đến cơ sở dữ liệu
        $conn = connect_db();

        // Xử lý upload file âm thanh
        $MyAudio = $_FILES['MyAudio']['name'];
        $tmp_name = $_FILES['MyAudio']['tmp_name'];
        $error = $_FILES['MyAudio']['error'];
        $DanhMuc = $_POST['DanhMuc'];
        $TenSach = $_POST['TenSach'];
        $NamXuatBan = $_POST['NamXuatBan'];
        $MoTa = $_POST['MoTa'];

        if ($error === 0) {
            $audio_ex = pathinfo($MyAudio, PATHINFO_EXTENSION);
            $audio_ex_lc = strtolower($audio_ex);
            $allowed_exs = array("aac", 'alac', 'aiff', 'dsd', 'flac', 'mp3', 'wav', 'wma');

            if (in_array($audio_ex_lc, $allowed_exs)) {
                $new_MyAudio = uniqid("audio-", true) . '.' . $audio_ex_lc;
                $audio_upload_path = 'audio/uploads/' . $new_MyAudio;
                move_uploaded_file($tmp_name, $audio_upload_path);

                // Xử lý upload hình ảnh bìa
                $hinhanhpath = basename($_FILES['HinhAnhBia']['name']);
                $target_dir = "audio/uploads/";
                $target_file = $target_dir . $hinhanhpath;

                if (move_uploaded_file($_FILES["HinhAnhBia"]["tmp_name"], $target_file)) {
                    $HinhAnhBia = $target_file;
                    // Thực hiện truy vấn để thêm dữ liệu vào cơ sở dữ liệu
                    $sql = "INSERT INTO sach_noi (danhMucID, TenSach, Sach_url, HinhAnhBia, MoTa, NamXuatBan) 
                            VALUES('$DanhMuc', '$TenSach', '$audio_upload_path', '$HinhAnhBia', '$MoTa', '$NamXuatBan')";

                    if (mysqli_query($conn, $sql)) {
                        echo "<script>alert('Thêm Thành Công!');</script>";
                        echo "<script>window.location.href = 'index.php?act=addaudiofile';</script>";
                        exit(); // Dừng thực hiện kịp thời sau khi chuyển hướng
                    } else {
                        echo "Lỗi: " . $sql . "<br>" . mysqli_error($conn);
                    }
                } else {
                    echo "Hình ảnh không được tải lên thành công";
                }
            } else {
                echo "Loại file không hợp lệ";
            }
        } else {
            echo "Có lỗi xảy ra khi upload file âm thanh";
        }


        $conn->close();
    } else {
        // echo "Lỗi: Form không được submit hoặc không có file âm thanh được gửi lên";
    }
}
function deleteSachNoi()
{
    $conn = connect_db();

    if (isset($_POST['MaSach'])) {
        $maSachcanxoa = $_POST['MaSach'];
        $sql_delete_book = "DELETE FROM sach_noi WHERE MaSach = $maSachcanxoa";
        if (mysqli_query($conn, $sql_delete_book)) {
            header('Location: index.php?act=listaudio');
            exit;
        } else {
            echo "Lỗi khi xóa sách: " . mysqli_error($conn);
        }
        mysqli_close($conn);
    }
}

function updateSachNoi()
{
    $conn = connect_db();
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['MaSach'])) {
        $MaSach = $_POST['MaSach'];
        $DanhMuc = $_POST['DanhMuc'];
        $TenSach = $_POST['TenSach'];
        $MoTa = $_POST['MoTa'];
        $NamXuatBan = $_POST['NamXuatBan'];

        // Kiểm tra xem người dùng đã tải lên hình ảnh mới hay không
        if (isset($_FILES['HinhAnhBia']['tmp_name']) && !empty($_FILES['HinhAnhBia']['tmp_name'])) {
            $uploadOk = 1;
            $targetDir = 'audio/uploads/';
            $imageFileType = strtolower(pathinfo($_FILES["HinhAnhBia"]["name"], PATHINFO_EXTENSION));
            $targetFile = $targetDir . uniqid() . "." . $imageFileType;

            // Kiểm tra kích thước file hình ảnh
            if ($_FILES['HinhAnhBia']['size'] > 500000) {
                echo "Xin lỗi, hình ảnh của bạn quá lớn.";
                $uploadOk = 0;
            }

            $allowedFormats = array("jpg", "png", "jpeg", "gif");
            if (!in_array($imageFileType, $allowedFormats)) {
                echo "Chỉ chấp nhận các định dạng JPG, JPEG, PNG và GIF.";
                $uploadOk = 0;
            }

            if ($uploadOk && move_uploaded_file($_FILES["HinhAnhBia"]["tmp_name"], $targetFile)) {
                // Nếu hình ảnh mới được tải lên thành công, cập nhật thông tin sách
                $sql_update = "UPDATE sach_noi SET danhMucID = '$DanhMuc', TenSach = '$TenSach', MoTa = '$MoTa', NamXuatBan = '$NamXuatBan', HinhAnhBia = '$targetFile' WHERE MaSach = '$MaSach'";
                if ($conn->query($sql_update) === true) {
                    echo "<script>alert('Cập nhật thông tin sách thành công!');</script>";
                    echo "<script>window.location.href = 'index.php?act=listsachnoi';</script>";
                } else {
                    echo 'Lỗi Cập nhật thông tin Sách:' . $conn->error;
                }
            } else {
                echo "Lỗi khi tải hình ảnh.";
            }
        } else {
            // Nếu không có hình ảnh mới được tải lên, chỉ cập nhật các thông tin khác
            $sql_update = "UPDATE sach_noi SET danhMucID = '$DanhMuc', TenSach = '$TenSach', MoTa = '$MoTa', NamXuatBan = '$NamXuatBan' WHERE MaSach = '$MaSach'";
            if ($conn->query($sql_update) === true) {
                echo "<script>alert('Cập nhật thông tin sách thành công!');</script>";
                echo "<script>window.location.href = 'index.php?act=listaudio';</script>";
            } else {
                echo 'Lỗi cập nhật thông tin Sách:' . $conn->error;
            }
        }

        $conn->close();
    } else {
        // echo 'Yêu cầu không hợp lệ';
    }
}


function addSachHieuSoi()
{
    if (isset($_POST['DanhMuc']) && isset($_POST['TenSach']) && isset($_POST['TacGia']) && isset($_POST['MoTa']) && isset($_POST['Gia']) && isset($_POST['NamXuatBan']) && isset($_FILES['HinhAnhBia'])) {
        $conn = connect_db();

        $DanhMuc = $_POST['DanhMuc'];
        $TenSach = $_POST['TenSach'];
        $TacGia = $_POST['TacGia'];
        $MoTa = $_POST['MoTa'];
        $Gia = $_POST['Gia'];
        $NamXuatBan = $_POST['NamXuatBan'];

        $hinhanhpath = basename($_FILES['HinhAnhBia']['name']);
        $target_dir = "sach_hieusoi/uploads/";
        $target_file = $target_dir . $hinhanhpath;

        if (move_uploaded_file($_FILES["HinhAnhBia"]["tmp_name"], $target_file)) {
            $HinhAnhBia = $target_file;
            $sql = "INSERT INTO sach_soi (danhMucID, TenSach, TacGia, MoTa, Gia, NamXuatBan, HinhAnhBia) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssssss", $DanhMuc, $TenSach, $TacGia, $MoTa, $Gia, $NamXuatBan, $HinhAnhBia);

            if ($stmt->execute()) {
                echo "<div id='success-message' class='success-message'>Thêm sách thành công</div>";
            } else {
                echo "Lỗi: " . $sql . "<br>" . $conn->error;
            }

            $stmt->close();
        } else {
            echo "Hình ảnh không được tải lên thành công";
        }

        $conn->close();
    }

}

// Update sách điện tử

function updateSachHieuSoi()
{
    $conn = connect_db();
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['MaSach'])) {
        $MaSach = $_POST['MaSach'];
        $DanhMuc = $_POST['DanhMuc'];
        $TenSach = $_POST['TenSach'];
        $TacGia = $_POST['TacGia'];
        $MoTa = $_POST['MoTa'];
        $Gia = $_POST['Gia'];
        $NamXuatBan = $_POST['NamXuatBan'];

        $targetDir = 'sach_dientu/uploads/';
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($_FILES["HinhAnhBia"]["name"], PATHINFO_EXTENSION));
        $targetFile = $targetDir . uniqid() . "." . $imageFileType;
        if ($_FILES['HinhAnhBia']['tmp_name']) {
            // Kiểm tra kích thước file 
            if ($_FILES['HinhAnhBia']['size'] > 500000) {
                echo "Xin lỗi, hình ảnh của bạn quá lớn.";
                $uploadOk = 0;
            }
            $allowedFormats = array("jpg", "png", "jpeg", "gif");
            if (!in_array($imageFileType, $allowedFormats)) {
                echo "Chỉ chấp nhận các định dạng JPG, JPEG, PNG and GIF.";
                $uploadOk = 0;
            }

            if ($uploadOk && move_uploaded_file($_FILES["HinhAnhBia"]["tmp_name"], $targetFile)) {
                $sql_update = "UPDATE sach_soi SET danhMucID = '$DanhMuc', TenSach = '$TenSach', TacGia = '$TacGia', MoTa = '$MoTa', Gia = '$Gia', NamXuatBan = '$NamXuatBan', HinhAnhBia = '$targetFile' WHERE MaSach = '$MaSach'";
                if ($conn->query($sql_update) === true) {
                    echo "<script>alert('Cập nhật thông tin sách thành công!');</script>";
                    echo "<script>window.location.href = 'index.php?act=listsachhieusoi';</script>";
                } else {
                    echo 'Lỗi Cập nhật thông tin Sách:' . $conn->error;
                }
            } else {
                echo "Lỗi khi tải hình ảnh.";
            }
            
        } else {
            // nếu người dùng không tải lên hình ảnh mới, chỉ cập nhật thông tin khác
            $sql_update = "UPDATE sach_soi SET danhMucID = '$DanhMuc', TenSach = '$TenSach', TacGia = '$TacGia', MoTa = '$MoTa', Gia = '$Gia', NamXuatBan = '$NamXuatBan' WHERE MaSach = '$MaSach'";
            if ($conn->query($sql_update) === true) {
                echo "<script>alert('Cập nhật thông tin sách thành công!');</script>";
                echo "<script>window.location.href = 'index.php?act=listsachhieusoi';</script>";
            } else {
                echo 'Lỗi cập nhật thông tin Sách:' . $conn->error;
            }
            $conn->close();
        }
    } else {
        // echo 'Yêu cầu không hợp lệ';
    }

}

function deleteSachHieuSoi()
{
    $conn = connect_db();
    if (isset($_POST['MaSach'])) {
        $maSachcanxoa = $_POST['MaSach'];

        // Xóa tất cả các chương thuộc sách đó từ bảng chuong_sach
        $sql_delete_chapters = "DELETE FROM chuong_sach WHERE sach_id = $maSachcanxoa";
        if (mysqli_query($conn, $sql_delete_chapters)) {
            $sql_delete_book = "DELETE FROM sach_soi WHERE MaSach = $maSachcanxoa";
            if (mysqli_query($conn, $sql_delete_book)) {
                header('Location: index.php?act=listsachhieusoi');
                exit;
            } else {
                echo "Lỗi khi xóa sách: " . mysqli_error($conn);
            }
        } else {
            echo "Lỗi khi xóa chương: " . mysqli_error($conn);
        }

        mysqli_close($conn);
    }
}


?>