# Module 1: Thiết lập dự án và Xác thực người dùng

## 1. Mục tiêu
Xây dựng hệ thống xác thực người dùng với các chức năng:
- Đăng ký tài khoản
- Đăng nhập
- Đăng xuất
- Phân quyền cơ bản theo 3 role: `user`, `staff`, `admin`

## 2. Cơ sở dữ liệu

### Bảng users (mở rộng)
| Tên cột    | Kiểu dữ liệu                 | Ghi chú                                       |
|------------|----------------------------  |---------------------------------------------- |
| id         | bigIncrements                | Khóa chính                                    |
| name       | string                       | Tên người dùng                                |
| email      | string, unique               | Email, duy nhất                               |
| password   | string                       | Mật khẩu                                      |
| phone      | string, nullable             | Số điện thoại                                 |
| address    | text, nullable               | Địa chỉ                                       |
| role       | enum('user','staff','admin') | Vai trò người dùng, mặc định là 'user'        |
| created_at | timestamp                    |                                               |
| updated_at | timestamp                    |                                               |

## 3. Models

- **User**

  - Thuộc tính mở rộng: `phone`, `address`, `role`
  - Các mối quan hệ (nếu có) sẽ được phát triển ở các module tiếp theo.

## 4. Routes

| URI         | Phương thức | Controller@Method                 | Middleware        | Mô tả                     |
|-------------|-------------|-----------------------------      |-------------------|---------------------------|
| /register   | GET         | AuthController@showRegisterForm   | guest             | Hiển thị form đăng ký     |
| /register   | POST        | AuthController@register           | guest             | Xử lý đăng ký             |
| /login      | GET         | AuthController@showLoginForm      | guest             | Hiển thị form đăng nhập   |
| /login      | POST        | AuthController@login              | guest             | Xử lý đăng nhập           |
| /logout     | POST        | AuthController@logout             | auth              | Đăng xuất người dùng      |

## 5. Controllers

- **AuthController**

  - `showRegisterForm()`: Hiển thị form đăng ký.
  - `register(Request $request)`: Xử lý đăng ký người dùng mới, gán role mặc định là `user`.
  - `showLoginForm()`: Hiển thị form đăng nhập.
  - `login(Request $request)`: Xử lý đăng nhập, kiểm tra thông tin hợp lệ.
  - `logout()`: Đăng xuất người dùng.

## 6. Middleware đề xuất (không bắt buộc bước này trong module 1 nhưng cần thiết về sau)

- Middleware kiểm tra phân quyền theo role:
  - Ví dụ: `CheckRole` nhận tham số role cần truy cập (`admin`, `staff`, `user`) để cho phép hoặc từ chối truy cập.
  
## 7. Views

- `auth/register.blade.php`: Form đăng ký người dùng sử dụng Tailwind CSS.
- `auth/login.blade.php`: Form đăng nhập người dùng sử dụng Tailwind CSS.
- `layouts/app.blade.php`: Layout chính, nhúng `@vite`, dùng Tailwind CSS.

## 8. Ghi chú

- Sử dụng Laravel Breeze để khởi tạo nhanh hệ thống xác thực cơ bản, sau đó mở rộng thêm các cột `phone`, `address`, `role` trong migration.
- Vai trò mặc định khi đăng ký là `user`.
- Sử dụng Tailwind CSS để thiết kế giao diện form cho đẹp, đáp ứng xu hướng hiện tại, nhưng vẫn đạt hiệu suất cao và responsive.
- Có thể bổ sung middleware phân quyền theo role để bảo vệ các route cần thiết cho nhân viên hoặc admin.
