<script>
        const sidebar = document.getElementById('sidebar');
        const menuToggle = document.getElementById('menu-toggle');
        const overlay = document.getElementById('overlay');

        menuToggle.addEventListener('click', () => {
            sidebar.classList.toggle('active');
            overlay.classList.toggle('active');
        });

        overlay.addEventListener('click', () => {
            sidebar.classList.remove('active');
            overlay.classList.remove('active');
        });

        document.querySelectorAll('.has-submenu > a').forEach(item => {
            item.addEventListener('click', (e) => {
                e.preventDefault();
                const parentLi = item.parentElement;
                document.querySelectorAll('.has-submenu').forEach(submenu => {
                    if (submenu !== parentLi) {
                        submenu.classList.remove('active');
                    }
                });
                parentLi.classList.toggle('active');
            });
        });

        document.querySelector('input[type="file"]').addEventListener('change', function (e) {
            const reader = new FileReader();
            reader.onload = function () {
                document.querySelector('.image-preview img').src = reader.result;
            }
            reader.readAsDataURL(e.target.files[0]);
        });
    </script> 