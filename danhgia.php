<?php 
require "db/db.php";
if(isset($_POST['rate'], $_POST['NhanXet'], $_SESSION['MaKH'], $_POST['MaSach'])){
    $NhanXet = $_POST['NhanXet'];
    $DanhGia = $_POST['rate'];
    $nguoi_dung_id = $_SESSION['MaKH'];
    $sach_id = $_POST['MaSach'];
    
    // Xây dựng câu lệnh SQL
    $sql = "INSERT INTO danhgia_nhanxet (nguoi_dung_id, sach_id, NhanXet, DanhGia) VALUES ('$nguoi_dung_id', '$sach_id', '$NhanXet', '$DanhGia')";
    
    // Thực thi câu lệnh SQL
    if($conn->query($sql) === true){
        echo "<div id='success-message' class='success-message'>Thêm danh mục thành công</div>";
exit;
        
    } else {
        echo "Lỗi: " . $conn->error;
    }
    
    // Đóng kết nối
    $conn->close();
}
?>