<?php
namespace App\Controller;
use App\Model\Product;
use Core\Auth\Auth;
use Core\Utils\Utils;


class HomeController extends AppController {
    function index() {
        // if not logued redirect
        if (!Auth::isConnected()) {
            return Utils::redirect('login.html');
        }
        $products = Product::getAll();
        $this->render('pages.home', compact('products'));
    }
}