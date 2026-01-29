# Hướng Dẫn Deploy Laravel Lên VPS Ubuntu

## Thông Tin Server
- **IP**: 103.146.23.17
- **Domain**: testflightios.com
- **Username**: root
- **Password**: ducvh2000

---

## BƯỚC 1: Kết Nối VPS

### Cách 1: Dùng PuTTY (Windows)
1. Tải PuTTY: https://www.putty.org/
2. Mở PuTTY, nhập IP: `103.146.23.17`
3. Click "Open", nhập username: `root`
4. Nhập password: `ducvh2000`

### Cách 2: Dùng Terminal (Mac/Linux)
```bash
ssh root@103.146.23.17
# Nhập password khi được hỏi
```

---

## BƯỚC 2: Cài Đặt Phần Mềm Cần Thiết

### 2.1 Cập nhật hệ thống
```bash
apt update && apt upgrade -y
```

### 2.2 Cài Nginx
```bash
apt install nginx -y
systemctl start nginx
systemctl enable nginx
```

### 2.3 Cài PHP 8.2
```bash
apt install software-properties-common -y
add-apt-repository ppa:ondrej/php -y
apt update
apt install php8.2 php8.2-fpm php8.2-mysql php8.2-mbstring php8.2-xml php8.2-bcmath php8.2-curl php8.2-zip php8.2-gd -y
```

### 2.4 Cài MySQL
```bash
apt install mysql-server -y
systemctl start mysql
systemctl enable mysql
```

### 2.5 Cài Composer
```bash
curl -sS https://getcomposer.org/installer | php
mv composer.phar /usr/local/bin/composer
chmod +x /usr/local/bin/composer
```

### 2.6 Cài Git
```bash
apt install git -y
```

---

## BƯỚC 3: Tạo Database

```bash
mysql -u root -p
```

Trong MySQL, chạy các lệnh:
```sql
CREATE DATABASE testflight_db;
CREATE USER 'testflight_user'@'localhost' IDENTIFIED BY 'Ducvh2000@@';
GRANT ALL PRIVILEGES ON testflight_db.* TO 'testflight_user'@'localhost';
FLUSH PRIVILEGES;
EXIT;
```

---

## BƯỚC 4: Upload Code Lên Server

### Cách 1: Dùng Git (Khuyên dùng)
```bash
cd /var/www
git clone https://github.com/your-repo/myproject1.git testflightios.com
```

### Cách 2: Dùng WinSCP/FileZilla
1. Tải WinSCP: https://winscp.net/
2. Kết nối với thông tin:
   - Host: 103.146.23.17
   - Username: root
   - Password: ducvh2000
3. Upload toàn bộ project vào `/var/www/testflightios.com`

---

## BƯỚC 5: Cấu Hình Laravel

```bash
cd /var/www/testflightios.com

# Cài dependencies
composer install --optimize-autoloader --no-dev

# Copy file .env
cp .env.example .env

# Chỉnh sửa .env
nano .env
```

### Nội dung file .env cần sửa:
```
APP_NAME="TestFlight IOS"
APP_ENV=production
APP_DEBUG=false
APP_URL=http://testflightios.com

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=testflight_db
DB_USERNAME=testflight_user
DB_PASSWORD=Ducvh2000@@
```

Lưu file: `Ctrl+X`, rồi `Y`, rồi `Enter`

### Tiếp tục cấu hình:
```bash
# Generate key
php artisan key:generate

# Chạy migrations
php artisan migrate --force

# Chạy seeder (nếu có)
php artisan db:seed --force

# Cache configuration
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Set permissions
chown -R www-data:www-data /var/www/testflightios.com
chmod -R 755 /var/www/testflightios.com
chmod -R 775 storage bootstrap/cache
```

---

## BƯỚC 6: Cấu Hình Nginx

```bash
nano /etc/nginx/sites-available/testflightios.com
```

Paste nội dung sau:
```nginx
server {
    listen 80;
    listen [::]:80;
    server_name testflightios.com www.testflightios.com;
    root /var/www/testflightios.com/public;

    add_header X-Frame-Options "SAMEORIGIN";
    add_header X-Content-Type-Options "nosniff";

    index index.php;
    charset utf-8;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location = /favicon.ico { access_log off; log_not_found off; }
    location = /robots.txt  { access_log off; log_not_found off; }

    error_page 404 /index.php;

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.2-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ /\.(?!well-known).* {
        deny all;
    }
}
```

Lưu file và kích hoạt:
```bash
ln -s /etc/nginx/sites-available/testflightios.com /etc/nginx/sites-enabled/
nginx -t
systemctl reload nginx
```

---

## BƯỚC 7: Cài SSL (HTTPS)

```bash
apt install certbot python3-certbot-nginx -y
certbot --nginx -d testflightios.com -d www.testflightios.com
```

Làm theo hướng dẫn:
- Nhập email của bạn
- Đồng ý điều khoản (Y)
- Chọn redirect HTTP to HTTPS (2)

---

## BƯỚC 8: Kiểm Tra

1. Mở trình duyệt: https://testflightios.com
2. Kiểm tra xem website có hoạt động không

### Nếu có lỗi, kiểm tra logs:
```bash
# Laravel logs
tail -f /var/www/testflightios.com/storage/logs/laravel.log

# Nginx logs
tail -f /var/log/nginx/error.log
```

---

## Các Lệnh Hữu Ích Sau Này

### Cập nhật code mới:
```bash
cd /var/www/testflightios.com
git pull origin main
composer install --optimize-autoloader --no-dev
php artisan migrate --force
php artisan config:cache
php artisan route:cache
php artisan view:cache
chown -R www-data:www-data /var/www/testflightios.com
```

### Clear cache:
```bash
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
```

### Restart services:
```bash
systemctl restart nginx
systemctl restart php8.2-fpm
```

---

## Xử Lý Lỗi Thường Gặp

### 1. Permission Denied
```bash
chown -R www-data:www-data storage bootstrap/cache
chmod -R 775 storage bootstrap/cache
```

### 2. 500 Internal Server Error
```bash
tail -50 storage/logs/laravel.log
php artisan config:clear
php artisan cache:clear
```

### 3. Database Connection Error
```bash
# Kiểm tra MySQL đang chạy
systemctl status mysql

# Kiểm tra credentials
cat .env | grep DB_
```

---

**🎉 Xong! Website của bạn đã online tại https://testflightios.com**
