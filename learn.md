php artisan make:migration create_users_table
php artisan make:migration create_daily_work_calories_table
php artisan make:migration create_role_table
php artisan migrate
php artisan migrate:rollback

### seeder
php artisan make:seeder DailyWorkCaloriesSeeder
php artisan db:seed --class=DailyWorkCaloriesSeeder
php artisan make:seeder UsersTableSeeder
php artisan db:seed --class=UsersTableSeeder


## auto load 
composer dump-autoload
