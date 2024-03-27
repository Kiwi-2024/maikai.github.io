<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $Email = $_POST['Email'];
    $HoTen = $_POST['HoTen'];
    $SoDienThoai = $_POST['SoDienThoai'];
    $MatKhau = $_POST['MatKhau'];
    $confirm_password =$_POST['confirm_password'];
    // kết nối cơ sở dữ liệu
    require_once('../db/db.php');
    // kiểm tra kết nối
    if($conn->connect_error){
        die('Kết nối Không thành công'. $conn->connect_error);
    }
    // Kiểm tra xem địa chỉ email đã tồn tại trong cơ sở dữ liệu chưa
    $check_query = "select * from khach_hang where Email = '$Email'";
    $result = $conn->query($check_query);
    if($result->num_rows > 0){
        // địa chỉ email đã tồn tại hiển thị thông báo người dùng
        echo "Địa chỉ email đã được sử dụng. Vui lòng chọn 1 địa chỉ email khác.";
    }else{
        if($MatKhau === $confirm_password){
            $hashed_password = password_hash($MatKhau, PASSWORD_DEFAULT);
            // thực hiện truy vấn đăng ký
            $sql = "insert into khach_hang (Email, MatKhau, HoTen, SoDienThoai) values('$Email', '$hashed_password', '$HoTen', '$SoDienThoai')";
    
        if($conn->query($sql) == TRUE){
            echo 'Đăng ký tài khoản thành công';
            }else{
                echo 'Lỗi: '. $conn->error;
            }
        }else{
            echo "Nhập lại mật khẩu không đúng";
        }
    }
    // đóng kết nối
    $conn->close();
}
