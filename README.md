# 🌍 Tour Du Lịch — Travel Booking Website

Website đặt tour du lịch và khách sạn được xây dựng bằng Laravel, hỗ trợ người dùng tìm kiếm, đặt tour/phòng và quản lý thông tin cá nhân. Hệ thống có trang quản trị dành cho Admin để quản lý tour, khách sạn, người dùng, đơn đặt hàng và phân quyền.

## 📸 Demo

> Project chạy local. Một số screenshot giao diện sẽ được bổ sung tại thư mục `screenshots/`.

<!--
![Trang chủ](screenshots/home.png)

![Danh sách tour](screenshots/tours.png)

![Chi tiết tour](screenshots/tour-detail.png)

![Admin panel](screenshots/admin.png)
-->

---

## ✨ Tính năng

### 👤 Phía khách hàng

- Đăng ký và đăng nhập tài khoản
- Quản lý thông tin cá nhân
- Xem danh sách tour du lịch
- Tìm kiếm tour theo địa điểm
- Xem thông tin chi tiết tour
- Đặt tour
- Xem lịch sử đặt tour
- Hủy đơn đặt tour
- Xem danh sách và chi tiết khách sạn
- Đặt phòng khách sạn
- Xem lịch sử đặt phòng
- Bình luận và đánh giá tour
- Xem bài viết / tin tức du lịch

### 🛠️ Phía quản trị

- Đăng nhập Admin
- Quản lý người dùng
- Quản lý tour
- Quản lý khách sạn
- Quản lý địa điểm
- Quản lý danh mục
- Quản lý đơn đặt tour
- Quản lý đơn đặt phòng
- Quản lý bình luận
- Quản lý bài viết / tin tức
- Phân quyền người dùng theo Role & Permission

---

## 🛠️ Tech Stack

| Layer | Công nghệ |
|---|---|
| Backend | PHP, Laravel 8 |
| Frontend | HTML, CSS, Bootstrap, JavaScript |
| Database | MySQL |
| ORM | Eloquent ORM |
| Authentication | Laravel Authentication, Middleware |
| Authorization | Role & Permission |
| Development Tools | Composer, npm, Git, GitHub |

---

## 🏗️ Kiến trúc

Project được xây dựng theo mô hình **MVC (Model - View - Controller)** của Laravel.

```text
User
 │
 ▼
Routes
 │
 ▼
Middleware
 │
 ▼
Controller
 │
 ▼
Model / Eloquent
 │
 ▼
MySQL Database
 │
 ▼
View

##Các thành phần chính
app/
├── Http/
│   ├── Controllers/
│   │   ├── Admin/
│   │   └── Page/
│   ├── Middleware/
│   └── Requests/
│
├── Models/
└── Helpers/

database/
├── migrations/
└── seeders/

resources/
└── views/

routes/
└── web.php

public/
└── assets/

🔐 Authentication & Authorization

Hệ thống sử dụng Authentication để xác thực người dùng và Middleware để kiểm soát quyền truy cập.

Khu vực Admin được bảo vệ bằng các middleware và permission tương ứng.

Mô hình phân quyền:
User
 │
 ├── Customer
 │
 └── Admin
      │
      ├── Quản lý người dùng
      ├── Quản lý tour
      ├── Quản lý khách sạn
      ├── Quản lý đơn hàng
      ├── Quản lý bài viết
      └── Quản lý quyền truy cập

🗄️ Database

Một số nhóm dữ liệu chính của hệ thống:
Users
 ├── Thông tin tài khoản
 └── Phân quyền

Tours
 ├── Thông tin tour
 ├── Địa điểm
 └── Danh mục

Hotels
 ├── Thông tin khách sạn
 └── Địa điểm

Bookings
 ├── Đặt tour
 └── Đặt phòng

Comments
 └── Bình luận / đánh giá

Articles
 └── Bài viết / tin tức

Roles & Permissions
 └── Phân quyền hệ thống
📚 Kiến thức áp dụng

Thông qua project, các kiến thức được áp dụng gồm:

PHP OOP
Laravel MVC
Routing
Middleware
Authentication
Authorization
Role-Based Access Control (RBAC)
CRUD
Form Validation
Eloquent ORM
MySQL
Session
Frontend integration
Git & GitHub
⚙️ Cài đặt và chạy Local
Yêu cầu
PHP
Composer
MySQL
Node.js & npm
1. Clone repository
git clone <YOUR_GITHUB_REPOSITORY_URL>
cd TOUR_DU_LICH
2. Cài đặt dependencies
composer install
npm install
**🚀 Hướng phát triển
Tích hợp thanh toán trực tuyến
Xây dựng REST API cho ứng dụng Mobile
Bổ sung tìm kiếm và lọc nâng cao
Bổ sung dashboard thống kê cho Admin
Cải thiện hệ thống quản lý Booking
Deploy hệ thống lên môi trường Cloud**
👨‍💻 Tác giả

Phạm Vi Ngọc

GitHub: vin433195-boop

