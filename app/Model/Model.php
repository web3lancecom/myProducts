<?php
namespace App\Model;

use App\App;


class Model {
    public static $table = 'table';
    public static $pdo;

    public static function getAll() {
        return self::$pdo->query("SELECT * FROM " . self::$table);
    }
}