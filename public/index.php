<?php 
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);

require_once '../vendor/autoload.php';
include_once '../include/config.php';

$baseDir = str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);
$baseUrl = 'http://' . $_SERVER['HTTP_HOST'] . $baseDir;
define('BASE_URL', $baseUrl);

$route = $_GET['route'] ?? '/';

function renderAdmin($fileName, $params = []){
    ob_start();
    extract($params);
    include '../views/admin-header.php';
    include '../views/admin-blog-menu.php';
    include $fileName;
    include '../views/admin-footer.php';
    return ob_get_clean();
}

function renderHome($fileName, $params = []){
    ob_start();
    extract($params);
    include '../views/home-header.php';
    include '../views/home-blog-menu.php';
    include $fileName;
    include '../views/home-footer.php';
    return ob_get_clean();
}

use Phroute\Phroute\RouteCollector;

$router = new RouteCollector();

$router->controller('/', App\Controllers\IndexController::class);

$router->controller('/admin', App\Controllers\Admin\IndexController::class);

$router->controller('/post-list', App\Controllers\Admin\PostController::class);


$dispatcher = new Phroute\Phroute\Dispatcher($router->getData());
$response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'],$route);

echo $response;