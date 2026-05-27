# 🌍 Tour Du Lịch — Travel Booking Website

Website đặt tour và khách sạn xây dựng bằng Laravel, hỗ trợ đầy đủ luồng từ khách hàng tìm kiếm đến admin quản lý đơn hàng.

## 📸 Demo

> Chạy local — xem ảnh chụp màn hình bên dưới

<!-- Thêm ảnh screenshot vào đây sau khi chụp -->
<!-- ![Trang chủ](screenshots/home.png) -->
<!-- ![Admin panel](screenshots/admin.png) -->

## ✨ Tính năng

### Phía khách hàng
- Xem danh sách tour và khách sạn theo địa điểm
- Đặt tour / đặt phòng khách sạn
- Đăng ký, đăng nhập, quản lý tài khoản cá nhân
- Xem lịch sử đặt tour / phòng
- Bình luận và đánh giá tour

### Phía quản trị (Admin panel)
- Quản lý tour, khách sạn, địa điểm, danh mục
- Quản lý đơn đặt tour và đặt phòng
- Quản lý người dùng
- Phân quyền theo Role & Permission
- Quản lý bài viết / tin tức

## 🛠️ Tech Stack

| Layer | Công nghệ |
|-------|-----------|
| Backend | PHP / Laravel |
| Frontend | Bootstrap, JavaScript |
| Database | MySQL |
| Auth | Laravel Auth + Middleware |
| Permission | Role-based Access Control |

## ⚙️ Cài đặt và chạy local

### Yêu cầu
- PHP >= 7.4
- Composer
- MySQL
- Node.js & npm

### Các bước

```bash
# 1. Clone repo
git clone https://github.com/vin433195-boop/TOUR_DU_LICH.git
cd TOUR_DU_LICH

# 2. Cài dependencies
composer install
npm install

# 3. Tạo file .env
cp .env.example .env

# 4. Sinh APP_KEY
php artisan key:generate

# 5. Cấu hình database trong .env
# DB_DATABASE=tourdulich
# DB_USERNAME=root
# DB_PASSWORD=

# 6. Chạy migration và seed dữ liệu mẫu
php artisan migrate --seed

# 7. Chạy server
php artisan serve
```

Truy cập: `http://127.0.0.1:8000`

### Tài khoản demo

| Role | Email | Password |
|------|-------|----------|
| Admin | admin@gmail.com | 123456 |
| User | user@gmail.com | 123456 |

> ⚠️ Thay đổi thông tin này nếu seed data khác

## 📁 Cấu trúc thư mục chính

```
app/
├── Http/
│   ├── Controllers/
│   │   ├── Admin/       # Controllers cho admin panel
│   │   └── Page/        # Controllers cho trang người dùng
│   ├── Middleware/       # Auth, role check
│   └── Requests/         # Form validation
├── Helpers/              # Hàm tiện ích dùng chung
database/
├── migrations/           # Cấu trúc database
└── seeders/              # Dữ liệu mẫu
routes/
├── web.php               # Routes người dùng
└── admin.php             # Routes admin
```

## 👤 Tác giả

**vin433195-boop**
- GitHub: [@vin433195-boop](https://github.com/vin433195-boop)
