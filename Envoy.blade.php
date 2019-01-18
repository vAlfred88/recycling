@servers(['web' => 'root@37.228.118.147'])

@task('deploy')
cd /var/www/html/vtorservice-laravel/
git pull origin master
@endtask
