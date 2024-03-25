</div>
<script>
        // JavaScript để hiển thị thông báo và ẩn sau 3 giây
        window.onload = function() {
            var successMessage = document.getElementById('success-message');
            if(successMessage) {
                successMessage.classList.add('show');
                setTimeout(function() {
                    successMessage.style.opacity = '0';
                }, 5000); // 3000 milliseconds = 3 giây
            }
        };
    </script>
</body>

</html>
