@include('vendor/autoload.php')
@servers(['web' => '94.154.14.27'])


@setup
    $repository = 'git@bitbucket.org:alfamart24/crm.alfamart24.ru.git';

    $path=[
    'web' => 'www/crm.alfamart24.ru'
    ];

    $branch=[
    'web' => 'master'
    ];

    $env = isset($env) ? $env : "web";
@endsetup

@task('update', ['on'=> $env, 'confirm' => true])
    cd {{ $path[$env] }}
    git pull origin {{ $branch[$env] }}
    composer install
@endtask

@task('migrate', ['on'=> $env, 'confirm' => true])
    cd {{ $path[$env] }}
    php artisan migrate --force
@endtask

@task('test', ['on' => $env])
    cd {{ $path[$env] }}
    ls
@endtask

