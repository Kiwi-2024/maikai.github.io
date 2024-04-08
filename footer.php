<?php

if (isset($_SESSION['audio_url'])) {
    $audio_url = $_SESSION['audio_url'];
?>

<div class="div-audio">
    
    <audio id="audioPlayer" src="admin/<?php echo isset($_SESSION['audio_url']) ? $_SESSION['audio_url'] : ''; ?>" controls autoplay></audio>
    <button class="remove-session" type="button" onclick="xoaSession()"><ion-icon name="close-circle"></ion-icon></button>
</div>

<?php
} else {
    // echo "Không có audio được lưu trong session.";
}

?>

<div class="footer-clean">
        <footer>
            <div class="container">
                <div class="d-flex flex-nowrap">
                    <div class="col-sm-1 col-md-3 item">
                        <img src="img/logo.png" id="ftLogo" alt="" height=40px >
                        <ul>
                            <li><a href="#">Công ty cổ phần sách điện tử Waka</a></li>
                            <li><a href="#">SĐT: 0775138555</a></li>
                            <li><a href="#">Email: Support@waka.vn</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-4 col-md-3 item">
                        <h3>Về chúng tôi</h3>
                        <ul>
                            <li><a href="#">Giới thiệu</a></li>
                            <li><a href="#">Cơ cấu tổ chức</a></li>
                            <li><a href="#">Lĩnh vực hoạt động</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-4 col-md-3 item">
                        <h3>Thông tin hữu ích</h3>
                        <ul>
                            <li><a href="#">Quyền lợi</a></li>
                            <li><a href="#">Quy định riêng tư</a></li>
                            <li><a href="#">Câu hỏi thường gặp</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-4 col-md-3 item">
                        <h3>Tin tức</h3>
                        <ul>
                            <li><a href="#">Tin dịch vụ</a></li>
                            <li><a href="#">Review sách</a></li>
                            <li><a href="#">Lịch phát hành</a></li>
                        </ul>
                    </div>
                    <div class="qr">
                        <img src="img/qrFt.png" alt="">
                        <img src="img/app-store.png" alt="" id="anhFt1">
                        <img src="img/google-play.png" alt=""id="anhFt2">
                    </div>
                </div>
            </div>
        </footer>
    </div>


<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"> </script>
<script src="index.js"></script>

</body>

</html>