<?php

namespace App\Model;
use App\App;
class Product extends Model {
    public static $table = 'products';
    private function __construct() {
        $table = 'products';
    }
    public static function getAll() {
        $stm = parent::$pdo->query(
            "SELECT p.*, c.title as categoryTitle, sc.title as subcategoryTitle " .
            "FROM products as p JOIN categories as c ON c.id = p.categoryId ".
            "JOIN subcategories as sc ON sc.id = p.subCategoryId"
        );
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }
}