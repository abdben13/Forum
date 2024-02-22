<?php

//use App\Router;
require '../vendor/autoload.php';


if(isset($_GET['page']) && $_GET ['page'] === '1') {
    // réecrire l url sans le parametrage de page
    $uri = explode('?', $_SERVER['REQUEST_URI'])[0];
    $get = $_GET;
    unset($get['page']);
    $query = http_build_query($get);
    if(!empty($query)) {
        $uri = $uri . '?' . $query;
    }
    http_response_code(301);
    header('Location: ' . $uri);
    exit();
}
$router = new App\Router(dirname(__DIR__) . '/views');
$router
    ->get('/', 'default', 'home')
    ->match('/contact', 'contact', 'contact')
    ->get('/chat', 'chat', 'chat')
    ->get('/articles_ressources', 'articles_ressources', 'articles_ressources')
    ->get('/article/[i:id]', 'article', 'article')
    ->get('/edit-question', 'edit-question', 'edit-question')
    ->get('/forgot_password', 'forgot_password', 'forgot_password')
    ->get('/forum', 'forum', 'forum')
    ->get('/my-questions', 'my-questions', 'my-questions')
    ->get('/profile', 'profile', 'profile')
    ->get('/publish-question', 'publish-question', 'publish-question')
    ->get('/reset_password', 'reset_password', 'reset_password')
    ->match('/signup', 'signup', 'signup')
    ->match('/login', 'login', 'login')
    ->post('/logout', 'logout', 'logout');

