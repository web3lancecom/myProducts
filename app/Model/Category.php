<?php

namespace App\Model;
use App\App;

class Category extends Model {
    public static $table = 'categories';
    private function __construct() {
        $table = 'categories';
    }
    public static function getAll() {
        $stm = parent::$pdo->query(
            "SELECT * from " . self::$table
        );
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }
}