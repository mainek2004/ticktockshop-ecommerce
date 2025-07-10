Nếu dùng Docker, đổi .env thành:
DB_HOST=mysql
DB_DATABASE=ticktockshop
DB_USERNAME=laravel
DB_PASSWORD=secret

docker compose exec app php artisan migrate:fresh
docker compose exec app php artisan migrate --seed


## Cách chạy project
### 🔹 Nếu bạn dùng XAMPP
1. Cài XAMPP + Composer
2. Copy `.env.example` → `.env`
4. Chạy:
```bash
composer install
php artisan key:generate
php artisan migrate
php artisan serve