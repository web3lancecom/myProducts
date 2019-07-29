<?php
use App\App;
// define the ROOT
define('ROOT', __DIR__ . '/');
// require the APP for loading our app
require ROOT . 'app/App.php';
App::load(); // load app => Autoload, DB, session

// now we bind the parameter ?p=home or ?p=login, by default to login
if (isset($_GET['p'])) {
    $page = $_GET['p'];
} else {
    $page = 'login';
}
ob_start();

// home page
if ($page === 'home') {
    $controller = new \App\Controller\HomeController();
    $controller->index();
}
// login page
if ($page === 'login') {
    // render login page when without post
    if (empty($_POST)) {
        $controller = new \App\Controller\AuthController();
        $controller->renderLogin();
    } else {
        // action post to login
        $controller = new \App\Controller\AuthController();
        $controller->postLogin();
    }

}
// logout
if ($page === 'logout') {
    // destroy the session 
    session_unset(); 
    session_destroy(); 
    header('Location: login.html');
    exit();
}
// export csv
if ($page === 'export') {
    $controller = new \App\Controller\ProductController();
    $controller->export();
}
// get categories
if ($page === 'categories') {
    $controller = new \App\Controller\CategoryController();
    $controller->allCategories();
}
// post to subcategories by category Id
if ($page === 'subcategories' && !empty($_POST) ) {
    $controller = new \App\Controller\CategoryController();
    $controller->subCategoryById($_POST['id']);
}