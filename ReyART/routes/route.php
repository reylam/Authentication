<?php

$uri = $_SERVER['REQUEST_URI'];
$routes = [
    '/register' => 'register',
    '/login'    => 'login',
    '/home'     => 'home',
    '/not-found' => 'notFound',
    '/logout'    => 'logOut'
];

if(empty($routes[$uri])){
    call_user_func($routes['/not-found']);
}
else{   
    call_user_func($routes[$uri]);
}