php artisan make:migration create_users_table
php artisan make:migration create_daily_work_calories_table
php artisan make:migration create_role_table
php artisan migrate
php artisan migrate:rollback

## auto load 
composer dump-autoload

### seeder
php artisan make:seeder DailyWorkCaloriesSeeder
php artisan db:seed --class=DailyWorkCaloriesSeeder
php artisan make:seeder UsersTableSeeder
php artisan db:seed --class=UsersTableSeeder
php artisan db:seed --class=DatabaseSeeder
php artisan make:seeder Role

### Create web form 
Laravel Breeze 
https://laravel.com/docs/11.x/starter-kits#laravel-breeze
composer require laravel/breeze --dev
php artisan breeze:install
php artisan migrate
npm install
npm run dev

## Admin Screens
php artisan make:controller UserController
mkdir resources/views/admin/users

# API
php artisan install:api
http://127.0.0.1:8000/api/users?per_page=20&page=2

# For CORS Origin
php artisan config:publish cors



