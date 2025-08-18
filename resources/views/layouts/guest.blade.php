<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập & Đăng Ký</title>
    <!-- Tải Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Tải font Inter từ Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <!-- Tải icon -->
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        /* Sử dụng font Inter làm font chữ mặc định */
        body {
            font-family: 'Roboto', sans-serif;
        }
        .form-container {
            transition: transform 0.5s ease-in-out, opacity 0.5s ease-in-out;
        }
        /* Giúp icon trong input không bị ảnh hưởng bởi sự kiện của input */
        .input-icon {
            pointer-events: none;
        }
        /* Cho phép click vào icon xem mật khẩu */
        .password-toggle {
            pointer-events: auto;
            cursor: pointer;
        }
        /* Thêm hiệu ứng chuyển động cho chiều cao của khung chính */
        #main-container {
            transition: height 0.5s ease-in-out;
        }
    </style>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen p-4">

    <div id="main-container" class="relative w-full max-w-md bg-white rounded-2xl shadow-lg overflow-hidden">
        {{ $slot }}
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Khởi tạo icon
            lucide.createIcons();
            
            const mainContainer = document.getElementById('main-container');
            const forms = {
                'login-form': document.getElementById('login-form'),
                'register-form': document.getElementById('register-form'),
                'forgot-form': document.getElementById('forgot-form')
            };

            // --- CÁC HÀM XỬ LÝ CHÍNH ---

            // Hàm hiển thị form và điều chỉnh chiều cao
            const showForm = (formIdToShow) => {
                const targetForm = forms[formIdToShow];
                // Chỉ thực hiện nếu form tồn tại
                if (!targetForm) return;

                mainContainer.style.height = `${targetForm.scrollHeight}px`;

                Object.values(forms).forEach(form => {
                    if(form) { // Kiểm tra xem form có tồn tại không
                        const isTarget = form.id === formIdToShow;
                        form.style.transform = isTarget ? 'translateX(0)' : 'translateX(100%)';
                        form.style.opacity = isTarget ? '1' : '0';
                        form.style.zIndex = isTarget ? '10' : '1';
                    }
                });
            };

            // Hàm điều chỉnh chiều cao khi thay đổi kích thước cửa sổ
            const adjustContainerHeight = () => {
                const visibleForm = Object.values(forms).find(form => form && form.style.zIndex === '10') || forms['login-form'];
                if (visibleForm) {
                    mainContainer.style.height = `${visibleForm.scrollHeight}px`;
                }
            };

            // Hàm chuyển đổi hiển thị mật khẩu
            const togglePasswordVisibility = (event) => {
                const toggleButton = event.currentTarget;
                const passwordInput = toggleButton.previousElementSibling;
                const icon = toggleButton.querySelector('i');

                if (passwordInput && passwordInput.type === 'password') {
                    passwordInput.type = 'text';
                    icon.setAttribute('data-lucide', 'eye-off');
                } else if (passwordInput) {
                    passwordInput.type = 'password';
                    icon.setAttribute('data-lucide', 'eye');
                }
                lucide.createIcons();
            };

            // --- GẮN CÁC SỰ KIỆN ---

            // Gắn sự kiện click cho tất cả các nút chuyển form
            document.querySelectorAll('[data-form-target]').forEach(button => {
                button.addEventListener('click', () => {
                    showForm(button.dataset.formTarget);
                });
            });

            // Gắn sự kiện click cho tất cả các nút xem/ẩn mật khẩu
            document.querySelectorAll('.password-toggle').forEach(toggle => {
                toggle.addEventListener('click', togglePasswordVisibility);
            });
            
            // Gắn sự kiện submit cho form đăng ký để kiểm tra mật khẩu
            const registrationForm = document.getElementById('registration-form-element');
            if (registrationForm) {
                registrationForm.addEventListener('submit', (event) => {
                    // Ngăn form gửi đi ngay lập tức để kiểm tra
                    event.preventDefault();
                    
                    const passwordInput = document.getElementById('register-password');
                    // Sửa lại ID cho đúng với form Laravel
                    const confirmPasswordInput = document.getElementById('password_confirmation'); 
                    const passwordError = document.getElementById('password-error');

                    // Reset lỗi
                    if(passwordError) passwordError.textContent = '';
                    confirmPasswordInput.classList.remove('border-red-500');

                    if (passwordInput.value !== confirmPasswordInput.value) {
                        if(passwordError) passwordError.textContent = 'Mật khẩu không khớp. Vui lòng thử lại.';
                        confirmPasswordInput.classList.add('border-red-500');
                        confirmPasswordInput.focus();
                    } else {
                        // THAY ĐỔI: Mật khẩu đã khớp, cho phép form gửi đi để Laravel xử lý
                        console.log('Mật khẩu đã khớp! Đang gửi form đến server...');
                        registrationForm.submit();
                    }
                });
            }

            // Lắng nghe sự kiện thay đổi kích thước cửa sổ
            window.addEventListener('resize', adjustContainerHeight);

            // --- KHỞI TẠO BAN ĐẦU ---
            // Xác định form nào đang hiển thị dựa trên URL hoặc logic khác nếu cần
            // Ở đây, ta giả định nếu có form đăng ký thì hiển thị nó, nếu không thì là đăng nhập
            if (document.getElementById('register-form')) {
                showForm('register-form');
            } else if (document.getElementById('login-form')) {
                showForm('login-form');
            }
        });
    </script>

</body>
</html>
