<script  type = "module"  src = "https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"> </script> 
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

const scrollContainer = document.getElementById('scroll-container');
let startX;
let scrollLeft;
let isDragging = false;

// Xử lý sự kiện touchstart
scrollContainer.addEventListener('touchstart', (e) => {
  if (!isMouseOverScrollContainer(e)) return;
  isDragging = true;
  startX = e.touches[0].clientX - scrollContainer.offsetLeft;
  scrollLeft = scrollContainer.scrollLeft;
});

// Xử lý sự kiện touchend
document.addEventListener('touchend', () => {
  isDragging = false;
});

// Xử lý sự kiện touchmove
document.addEventListener('touchmove', (e) => {
  if (!isDragging) return;
  const x = e.touches[0].clientX - scrollContainer.offsetLeft;
  const walk = (x - startX) * 3; // Thay đổi hệ số 3 để điều chỉnh tốc độ kéo
  scrollContainer.scrollLeft = scrollLeft - walk;
});

// Xử lý sự kiện chuột
scrollContainer.addEventListener('mousedown', (e) => {
  if (!isMouseOverScrollContainer(e)) return;
  isDragging = true;
  startX = e.pageX - scrollContainer.offsetLeft;
  scrollLeft = scrollContainer.scrollLeft;
});

document.addEventListener('mouseup', () => {
  isDragging = false;
});

// Xử lý sự kiện chuột di chuyển
document.addEventListener('mousemove', (e) => {
  if (!isDragging) return;
  const x = e.pageX - scrollContainer.offsetLeft;
  const walk = (x - startX) * 1; // Thay đổi hệ số 3 để điều chỉnh tốc độ kéo
  scrollContainer.scrollLeft = scrollLeft - walk;
});

// Hàm kiểm tra xem con trỏ chuột có ở trên vùng scroll container hay không
function isMouseOverScrollContainer(event) {
  const rect = scrollContainer.getBoundingClientRect();
  const mouseX = event.clientX || event.touches[0].clientX;
  const mouseY = event.clientY || event.touches[0].clientY;
  return mouseX >= rect.left && mouseX <= rect.right && mouseY >= rect.top && mouseY <= rect.bottom;
}
</script>

</body>

</html>