
<script> 
    const voboclogin = document.querySelector('.voboclogin');
const linkdangnhap = document.querySelector('.linkdangnhap');
const linkdangky = document.querySelector('.linkdangky');
const iconclose = document.querySelector('.icon-close');
const btnCuaso = document.querySelector('.btnLogin-popup');

//-------------------------------------------------
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


// bottom search
let input = document.querySelector(".input");
let btn = document.querySelector(".btn1");
let parent = document.querySelector(".parent");

btn.addEventListener("click", () => {
    parent.classList.toggle("active1");
    input.focus();
});

</script>

</body>

</html>