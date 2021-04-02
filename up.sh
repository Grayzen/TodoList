cd $1
php artisan cache:clear
php artisan view:cache
php artisan optimize
