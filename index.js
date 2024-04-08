
document.addEventListener('DOMContentLoaded', function () {
    const voboclogin = document.querySelector('.voboclogin');
    const linkdangnhap = document.querySelector('.linkdangnhap');
    const linkdangky = document.querySelector('.linkdangky');
    const iconclose = document.querySelector('.icon-close');
    const btnCuaso = document.querySelector('.btnLogin-popup');

    if (linkdangnhap && linkdangky && iconclose && btnCuaso && voboclogin) {
        linkdangky.addEventListener('click', () => {
            voboclogin.classList.add('active');
        });

        linkdangnhap.addEventListener('click', () => {
            voboclogin.classList.remove('active');
        });

        btnCuaso.addEventListener('click', () => {
            voboclogin.classList.add('active-popup');
        });

        iconclose.addEventListener('click', () => {
            voboclogin.classList.remove('active-popup');
        });
    } else {
        console.error("Không thể tìm thấy một hoặc nhiều phần tử!");
    }
});
//============================================================================
 // Bình luận
 const danhgia = document.querySelector('.danhgia');
 const iconclose1 = document.querySelector('.icon-close1');
 const btn113 = document.querySelector('.btn113');

 //-------------------------------------------------


 btn113.addEventListener('click', () => {
     danhgia.classList.add('activebtn');
 });

 iconclose1.addEventListener('click', () => {
     danhgia.classList.remove('activebtn');
 });
//============================================================================
function saveAudioToSession(audioUrl) {
    // Tạo một yêu cầu AJAX
    var xhr = new XMLHttpRequest();
    var url = "luu_audio.php";
    var params = "MaSach=" + audioUrl;
    xhr.open("POST", url, true);

    // Thiết lập tiêu đề yêu cầu
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    // Xử lý khi yêu cầu hoàn thành
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            // Yêu cầu hoàn thành, có thể thực hiện các hành động khác ở đây (nếu cần)
            // Ví dụ: Hiển thị thông báo rằng URL đã được lưu thành công
            alert("URL của sách đã được lưu thành công!");
            window.location.reload();
        }
    }

    // Gửi yêu cầu
    xhr.send(params);
}

//============================================================================
function xoaSession() {
    var xhr = new XMLHttpRequest();
    var url = "unset.php";
    xhr.open("POST", url, true);

    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            // Xử lý kết quả từ yêu cầu AJAX nếu cần
            alert(xhr.responseText);
            window.location.reload();
        }
    }

    xhr.send();
}


