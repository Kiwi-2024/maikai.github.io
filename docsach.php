<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css.css">
    <title>Chương sách</title>
</head>

<body>
    <?php
    require "connect_model/model.php";

    ?>
    <div class="header_chuong">
        <a href="mota.php?MaSach=<?php echo $MaSach; ?>">
            <ion-icon name="chevron-back"></ion-icon></a>
        <p>
            <?php echo $row_sach ? $row_sach['TenSach'] : $row_sach_soi['TenSach']; ?>
        </p>
    </div>
    <div class="container_chuong">
        <div class="content_ad">
            <?php
            if (isset($_GET['MaKH'])) {





                // Truy vấn để lấy thông tin lịch sử của người dùng
                if (isset($_GET['MaChuong'])) {
                    $MaChuong = $_GET['MaChuong'];

                    // Truy vấn để lấy thông tin chương từ MaChuong
                    $sql_chapter = "SELECT * FROM chuong_sach WHERE MaChuong = '$MaChuong'";
                    $result_chapter = mysqli_query($conn, $sql_chapter);

                    if ($result_chapter && mysqli_num_rows($result_chapter) > 0) {
                        $row_chapter = mysqli_fetch_assoc($result_chapter);
                        echo "<p>" . $row_chapter['TenChuong'] . " - " . $row_chapter['NoiDung'] . "</p>";
                    } else {
                        echo "Không có thông tin chương cho mã chương này.";
                    }
                } else {
                    // Lấy thông tin chương từ bảng lịch sử
                    $sql_default_chapter = "SELECT * FROM lich_su WHERE nguoi_dung_id = '$MaKH'";
                    $result_default_chapter = mysqli_query($conn, $sql_default_chapter);

                    if ($result_default_chapter && mysqli_num_rows($result_default_chapter) > 0) {
                        $row_default_chapter = mysqli_fetch_assoc($result_default_chapter);

                        // Lấy thông tin chương từ bảng chuong_sach
                        $MaChuong = $row_default_chapter['chuong_id'];
                        $sql_chapter = "SELECT * FROM chuong_sach WHERE MaChuong = '$MaChuong'";
                        $result_chapter = mysqli_query($conn, $sql_chapter);

                        if ($result_chapter && mysqli_num_rows($result_chapter) > 0) {
                            $row_chapter = mysqli_fetch_assoc($result_chapter);
                            echo "<p><strong>Chương Mặc Định:</strong> " . $row_chapter['TenChuong'] . " - " . $row_chapter['NoiDung'] . "</p>";
                        } else {
                            echo "Không có thông tin chương mặc định.";
                        }
                    } else {
                        echo "Không có thông tin chương mặc định.";
                    }
                }






                ?>
            </div>


            <div class="chuong-ppc">
                <h3 class="">Danh Sách Chương:</h3>
                <?php
                $stt_chuong = 1; // Biến đếm số chương
            
                // Sử dụng câu lệnh if-else để chọn kết quả truy vấn phù hợp
                if ($row_sach) {
                    while ($row_chuong = mysqli_fetch_assoc($result_chuong)) { ?>
                        <a
                            href="docsach.php?MaSach=<?php echo $MaSach; ?>&MaChuong=<?php echo $row_chuong['MaChuong']; ?>&MaKH=<?php echo $MaKH; ?>">
                            Chương
                            <?php echo $stt_chuong++; ?>
                        </a>
                        <?php


                    }
                    $MaSach = $_GET['MaSach'];
                    $MaChuong = $_GET['MaChuong'];
                    $MaKH = $_GET['MaKH'];

                    // Kiểm tra nếu có dữ liệu MaSach và MaChuong
                    if (!empty($MaSach) && !empty($MaChuong)) {
                        // Xóa bất kỳ bản ghi nào của người dùng cho chương đó trước tiên
                        $sql_delete = "DELETE FROM lich_su WHERE nguoi_dung_id = $MaKH AND sach_id = $MaSach";
                        if ($conn->query($sql_delete) === TRUE) {
                            // Thêm bản ghi mới vào lịch sử
                            $sql_insert = "INSERT INTO lich_su (nguoi_dung_id, sach_id, chuong_id) VALUES ($MaKH, $MaSach, $MaChuong)";
                            if ($conn->query($sql_insert) === TRUE) {
                                // echo "Lưu lịch sử thành công";
                            } else {
                                echo "Lỗi: " . $sql_insert . "<br>" . $conn->error;
                            }
                        } else {
                            echo "Lỗi: " . $sql_delete . "<br>" . $conn->error;
                        }
                    } else {
                        echo "Dữ liệu không hợp lệ";
                    }
                } else {
                    while ($row_chuong_soi = mysqli_fetch_assoc($result_chuong_soi)) { ?>
                        <a
                            href="docsach.php?MaSach=<?php echo $MaSach; ?>&MaChuong=<?php echo $row_chuong_soi['MaChuong']; ?>&MaKH=<?php echo $MaKH; ?>">
                            Chương
                            <?php echo $stt_chuong++; ?>
                        </a>


                        <?php
                    }

                    $MaSach = $_GET['MaSach'];
                    $MaChuong = $_GET['MaChuong'];
                    $MaKH = $_GET['MaKH'];

                    // Kiểm tra nếu có dữ liệu MaSach và MaChuong
                    if (!empty($MaSach) && !empty($MaChuong)) {
                        // Xóa bất kỳ bản ghi nào của người dùng cho chương đó trước tiên
                        $sql_delete = "DELETE FROM lich_su WHERE nguoi_dung_id = $MaKH AND sach_soi_id = $MaSach";
                        if ($conn->query($sql_delete) === TRUE) {
                            // Thêm bản ghi mới vào lịch sử
                            $sql_insert = "INSERT INTO lich_su (nguoi_dung_id, sach_soi_id, chuong_id) VALUES ($MaKH, $MaSach, $MaChuong)";
                            if ($conn->query($sql_insert) === TRUE) {
                                // echo "Lưu lịch sử thành công";
                            } else {
                                echo "Lỗi: " . $sql_insert . "<br>" . $conn->error;
                            }
                        } else {
                            echo "Lỗi: " . $sql_delete . "<br>" . $conn->error;
                        }
                    } else {
                        echo "Dữ liệu không hợp lệ";
                    }
                }

            } else {

                echo "<script>alert('Vui lòng đăng nhập để đọc sách!');</script>";
            // echo "<script>window.location.href = 'index.php?act=listdm';</script>";

            }
            ?>
        </div>
    </div>


    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</body>

</html>
<?php
// Đóng kết nối
mysqli_close($conn);
?>