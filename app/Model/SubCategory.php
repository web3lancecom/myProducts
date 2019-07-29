<?php

namespace App\Model;
use App\App;
use PDO;

class SubCategory extends Model {
    public static $table = 'subcategories';
    private function __construct() {
        $table = 'subcategories';
    }
    public static function getByCategoryId($id) {
        $stm = parent::$pdo->prepare(
            "SELECT * from " . self::$table ." WHERE categoryId = ?"
        );
        $stm->bindParam(1, $id, PDO::PARAM_INT);
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }
}