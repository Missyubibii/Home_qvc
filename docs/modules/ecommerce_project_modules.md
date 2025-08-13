
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
- Sử dụng Tailwind CSS để thiết kế giao diện form cho đẹp và responsive.
- Có thể bổ sung middleware phân quyền theo role để bảo vệ các route cần thiết cho nhân viên hoặc admin.



# Module 2: Quản lý Danh mục và Sản phẩm

## 1. Mục tiêu
Quản lý danh mục sản phẩm và sản phẩm gồm:
- Tạo, sửa, xóa danh mục
- Tạo, sửa, xóa sản phẩm
- Hiển thị danh sách sản phẩm theo danh mục
- Hiển thị chi tiết sản phẩm

## 2. Cơ sở dữ liệu

### Bảng categories
| Tên cột   | Kiểu dữ liệu                  | Ghi chú                               | 
|-----------|---------------                |-----------------------                |
| id        | bigIncrements                 | Khóa chính                            |
| name      | string                        | Tên danh mục                          |
| slug      | string, unique                | Đường dẫn thân thiện                  |
| parent_id | unsignedBigInteger, nullable  | Khóa ngoại tự liên kết (danh mục cha) |
| created_at| timestamp                     |                                       |
| updated_at| timestamp                     |                                       |

### Bảng products
| Tên cột     | Kiểu dữ liệu            | Ghi chú                         |
|-------------|------------------------ |---------------------------      |
| id          | bigIncrements           | Khóa chính                      |
| category_id | unsignedBigInteger      | Khóa ngoại đến bảng categories  |
| name        | string                  | Tên sản phẩm                    |
| slug        | string, unique          | Đường dẫn thân thiện            |
| description | text                    | Mô tả sản phẩm                  |
| price       | decimal(10,2)           | Giá sản phẩm                    |
| stock       | integer                 | Số lượng trong kho              |
| image       | string, nullable        | Đường dẫn ảnh                   |
| created_at  | timestamp               |                                 |
| updated_at  | timestamp               |                                 |

## 3. Models

- **Category**
  - Quan hệ: `hasMany` Products, `belongsTo` Parent Category (nếu có)
- **Product**
  - Quan hệ: `belongsTo` Category

## 4. Routes

| URI                           | Phương thức | Controller@Method             | Middleware  | Mô tả                               |
|------------------------------ |-------------|---------------------------    |------------ |-----------------------------------  |
| /categories                   | GET         | CategoryController@index      | auth        | Hiển thị danh sách danh mục         |
| /categories/create            | GET         | CategoryController@create     | auth        | Form tạo danh mục                   |
| /categories                   | POST        | CategoryController@store      | auth        | Lưu danh mục mới                    |
| /categories/{id}/edit         | GET         | CategoryController@edit       | auth        | Form sửa danh mục                   |
| /categories/{id}              | PUT/PATCH   | CategoryController@update     | auth        | Cập nhật danh mục                   |
| /categories/{id}              | DELETE      | CategoryController@destroy    | auth        | Xóa danh mục                        |
| /products                     | GET         | ProductController@index       | auth        | Hiển thị danh sách sản phẩm         |
| /products/create              | GET         | ProductController@create      | auth        | Form tạo sản phẩm                   |
| /products                     | POST        | ProductController@store       | auth        | Lưu sản phẩm mới                    |
| /products/{id}/edit           | GET         | ProductController@edit        | auth        | Form sửa sản phẩm                   |
| /products/{id}                | PUT/PATCH   | ProductController@update      | auth        | Cập nhật sản phẩm                   |
| /products/{id}                | DELETE      | ProductController@destroy     | auth        | Xóa sản phẩm                        |
| /categories/{slug}/products   | GET         | ProductController@byCategory  | guest       | Hiển thị sản phẩm theo danh mục     |
| /products/{slug}              | GET         | ProductController@show        | guest       | Hiển thị chi tiết sản phẩm          |

## 5. Controllers

- **CategoryController**

  - `index()`: Hiển thị danh sách danh mục.
  - `create()`: Hiển thị form tạo danh mục.
  - `store(Request $request)`: Lưu danh mục mới.
  - `edit($id)`: Hiển thị form sửa danh mục.
  - `update(Request $request, $id)`: Cập nhật danh mục.
  - `destroy($id)`: Xóa danh mục.

- **ProductController**

  - `index()`: Hiển thị danh sách sản phẩm.
  - `create()`: Hiển thị form tạo sản phẩm.
  - `store(Request $request)`: Lưu sản phẩm mới.
  - `edit($id)`: Hiển thị form sửa sản phẩm.
  - `update(Request $request, $id)`: Cập nhật sản phẩm.
  - `destroy($id)`: Xóa sản phẩm.
  - `byCategory($slug)`: Hiển thị sản phẩm theo danh mục.
  - `show($slug)`: Hiển thị chi tiết sản phẩm.

## 6. Views

- Danh mục: index, create, edit.
- Sản phẩm: index, create, edit, show.
- Sử dụng component Card Tailwind CSS để hiển thị sản phẩm.



# Module 3: Giỏ hàng (Shopping Cart)

## 1. Mục tiêu
Xây dựng chức năng giỏ hàng với các tính năng:
- Thêm sản phẩm vào giỏ
- Xem giỏ hàng
- Cập nhật số lượng sản phẩm trong giỏ
- Xóa sản phẩm khỏi giỏ

Giỏ hàng sẽ lưu trong Session.

## 2. Routes

| URI               | Phương thức | Controller@Method     | Middleware | Mô tả                    |
|----------------   |-------------|---------------------- |------------|--------------------------|
| /cart             | GET         | CartController@index  | auth       | Hiển thị giỏ hàng        |
| /cart/add/{id}    | POST        | CartController@add    | auth       | Thêm sản phẩm vào giỏ    |
| /cart/update      | POST        | CartController@update | auth       | Cập nhật số lượng        |
| /cart/remove/{id} | POST        | CartController@remove | auth       | Xóa sản phẩm khỏi giỏ    |

## 3. Controllers

- **CartController**

  - `index()`: Hiển thị giỏ hàng hiện tại.
  - `add($id)`: Thêm sản phẩm vào giỏ hàng.
  - `update(Request $request)`: Cập nhật số lượng sản phẩm.
  - `remove($id)`: Xóa sản phẩm khỏi giỏ.

## 4. Views

- `cart/index.blade.php`: Hiển thị danh sách sản phẩm trong giỏ, tổng tiền.
- Sử dụng Tailwind CSS để thiết kế giao diện.



# Module 4: Đặt hàng (Checkout & Orders)

## 1. Mục tiêu
Xây dựng quy trình đặt hàng với các bước:
- Thanh toán
- Lưu thông tin đơn hàng và chi tiết đơn hàng
- Hiển thị trang xác nhận đặt hàng thành công

## 2. Cơ sở dữ liệu

### Bảng orders
| Tên cột    | Kiểu dữ liệu          | Ghi chú                  |
|------------|----------------------|--------------------------|
| id         | bigIncrements        | Khóa chính               |
| user_id    | unsignedBigInteger   | Khóa ngoại đến bảng users |
| total      | decimal(10,2)        | Tổng tiền                |
| status     | string               | Trạng thái đơn hàng      |
| created_at | timestamp            |                          |
| updated_at | timestamp            |                          |

### Bảng order_items
| Tên cột    | Kiểu dữ liệu          | Ghi chú                        |
|------------|----------------------|--------------------------       |
| id         | bigIncrements        | Khóa chính                      |
| order_id   | unsignedBigInteger   | Khóa ngoại đến bảng orders      |
| product_id | unsignedBigInteger   | Khóa ngoại đến bảng products    |
| quantity   | integer              | Số lượng sản phẩm               |
| price      | decimal(10,2)        | Giá sản phẩm tại thời điểm đặt  |
| created_at | timestamp            |                                 |
| updated_at | timestamp            |                                 |

## 3. Routes

| URI           | Phương thức | Controller@Method                 | Middleware  | Mô tả                      |
|---------------|-------------|-------------------------          |------------ |----------------------------|
| /checkout     | GET         | OrderController@showCheckoutForm  | auth        | Hiển thị form thanh toán   |
| /checkout     | POST        | OrderController@placeOrder        | auth        | Xử lý đặt hàng             |
| /order/success| GET         | OrderController@success           | auth        | Trang đặt hàng thành công  |

## 4. Controllers

- **OrderController**

  - `showCheckoutForm()`: Hiển thị form thanh toán.
  - `placeOrder(Request $request)`: Xử lý lưu đơn hàng và chi tiết đơn hàng, xóa giỏ hàng.
  - `success()`: Hiển thị trang xác nhận đặt hàng thành công.

## 5. Views

- `checkout.blade.php`: Form thanh toán.
- `order-success.blade.php`: Trang thông báo đặt hàng thành công.
- Sử dụng Tailwind CSS để thiết kế giao diện.
