<?php 
function connect_db(){
    $conn = mysqli_connect('localhost','root','phamngoctam','du_an_1_2024');
if(!$conn){
    die('Kết nối cơ sở dữ liệu thất bại');
}
return $conn;
}

function addDanhMuc() {
    // Kiểm tra xác thực và xử lý dữ liệu từ biểu mẫu HTML
    if(isset($_POST['TenDM']) && isset($_POST['MoTa'])) {
        // Kết nối tới cơ sở dữ liệu
        $conn = connect_db();
        if($conn->connect_error) {
            die("Kết nối không thành công: ".$conn->connect_error);
        }
    
        $TenDM = $_POST['TenDM'];
        $MoTa = $_POST['MoTa'];
    
        // Thực hiện truy vấn để thêm dữ liệu vào cơ sở dữ liệu
        $sql = "INSERT INTO danhmuc (TenDM, MoTa) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $TenDM, $MoTa);
    
        if($stmt->execute()) {
            echo "Danh mục đã được thêm thành công!";
        } else {
            echo "Lỗi: " . $sql . "<br>" . $conn->error;
        }
    
        $stmt->close();
    
        // Đóng kết nối tới cơ sở dữ liệu
        $conn->close();
    }
    
}
function updateDM(){
    $conn = connect_db();
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["MaDM"])) {
        // Khởi tạo kết nối tới cơ sở dữ liệu
    
        // Kiểm tra kết nối
        if ($conn->connect_error) {
            die("Kết nối không thành công: " . $conn->connect_error);
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
    
    } else{
        // echo 'Yêu cầu không hợp lệ';
    }
}

// thêm sách
function addSach() {
    // Kiểm tra nếu có dữ liệu được gửi từ form
    if (isset($_POST['DanhMuc']) && isset($_POST['TenSach']) && isset($_POST['TacGia']) && isset($_POST['MoTa']) && isset($_POST['LoaiSach']) && isset($_POST['NamXuatBan']) && isset($_FILES['HinhAnhBia'])) {
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
                echo '<a href="sach_dientu/list_sach.php">Xem tất cả Quyển Sách</a>';
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


?>