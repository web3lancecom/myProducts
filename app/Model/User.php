<?php

namespace App\Model;
use App\App;
use PDO;

class User extends Model {
    public static $table = 'user';
    /**
     *  check if user exist by email and password, return false of the user data
     */
    public static function checkCredential($email, $password) {
        $stmt = parent::$pdo->prepare('SELECT * FROM ' . self::$table. ' WHERE email=? AND password=?');
        $stmt->bindParam(1, $email, PDO::PARAM_STR);
        $stmt->bindParam(2, $password, PDO::PARAM_STR);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$row) {
            return false;
        } else {
            return $row;
        }
    }

}