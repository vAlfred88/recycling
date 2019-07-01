@servers(['web' => 'root@37.228.118.147'])

@story('fresh-deploy')
git
composer
migrate-fresh
seed
@endstory

@story('deploy')
git
composer
@endstory

@story('prod')
git
composer-optimize
cache
@endstory

@story('fast-deploy')
git
composer
migrate
@endstory

@task('git')
cd /var/www/html/vtorservice-laravel/
git pull origin master
@endtask

@task('cache')
cd /var/www/html/vtorservice-laravel/
php artisan config:cache
{{--php artisan route:cache--}}
@endtask

@task('composer-optimize')
cd /var/www/html/vtorservice-laravel/
composer install --optimize-autoloader --no-dev
@endtask

@task('composer')
cd /var/www/html/vtorservice-laravel/
composer update
@endtask

@task('migrate')
cd /var/www/html/vtorservice-laravel/
php artisan migrate
@endtask

@task('migrate-fresh')
cd /var/www/html/vtorservice-laravel/
php artisan migrate:fresh
@endtask

@task('seed')
cd /var/www/html/vtorservice-laravel/
php artisan db:seed
@endtask
