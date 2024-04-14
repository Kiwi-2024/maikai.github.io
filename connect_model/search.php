<?php
// Kết nối tới cơ sở dữ liệu
require_once "db/db.php";

// Kiểm tra xem đã gửi từ khóa tìm kiếm chưa
if (isset($_GET['keyword'])) {
    $keyword = mysqli_real_escape_string($conn, $_GET['keyword']);

    // Truy vấn SQL để tìm kiếm sản phẩm dựa trên từ khóa
    $query = "SELECT * FROM sach WHERE TenSach LIKE '%$keyword%'";
    $result = mysqli_query($conn, $query);

    // Kiểm tra xem có kết quả trả về không
    if (mysqli_num_rows($result) > 0) {
        // Redirect đến trang hiển thị kết quả
        // header("Location: search_result_display.php?keyword=$keyword");
        exit();
    } else {
        echo "Không tìm thấy sản phẩm nào phù hợp.";
    }

    // Giải phóng kết quả và đóng kết nối
    mysqli_free_result($result);
    mysqli_close($conn);
} else {
    echo "Không có từ khóa tìm kiếm được cung cấp.";
}
?>
