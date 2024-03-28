<script  type = "module"  src = "https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"> </script> 
<script> 
    const voboclogin = document.querySelector('.voboclogin');
const linkdangnhap = document.querySelector('.linkdangnhap');
const linkdangky = document.querySelector('.linkdangky');
const iconclose = document.querySelector('.icon-close');
const btnCuaso = document.querySelector('.btnLogin-popup');
const btnCuaso2 = document.querySelector('.btnLogin-popup2');

//-------------------------------------------------
btnCuaso2.addEventListener('click', () => {
    voboclogin.classList.add('active-popup');
});

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

// Xử lý sự kiện chuột di chuyển

</script>

</body>

</html>