<?php
namespace App\Controller;
use App\Model\Category;
use App\Model\SubCategory;
use Core\Auth\Auth;
use Core\Utils\Utils;


class CategoryController extends AppController {
    function allCategories() {
        // if not logued redirect
        if (!Auth::isConnected()) {
            return Utils::redirect('login.html');
        }
        $categories = Category::getAll();
        header('Content-type: application/json');
        echo json_encode($categories);
        exit();
    }
    /**
     *  sub categorie by categoryId
     */
    function subCategoryById($id) {
        $categories = SubCategory::getByCategoryId($id);
        header('Content-type: application/json');
        echo json_encode($categories);
        exit();
    }
}