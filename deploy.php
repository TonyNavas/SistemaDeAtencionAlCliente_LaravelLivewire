<?php
namespace Deployer;

require 'recipe/laravel.php';

// Config

set('repository', 'git@github.com:TonyNavas/Proyecto_Atencion_Al_Cliente.git');

add('shared_files', []);
add('shared_dirs', []);
add('writable_dirs', []);

// Hosts

host('157.245.10.198')
    ->set('remote_user', 'deployer')
    ->set('deploy_path', '~/Proyecto_Atencion_Al_Cliente');

// Hooks

after('deploy:failed', 'deploy:unlock');
