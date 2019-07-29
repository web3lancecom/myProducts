<?php

namespace App;
use \PDO;

class Database {
    private $db_name;
    private $db_user;
    private $db_password;
    private $db_host;
    private $pdo;

    public function __construct($db_name, $db_user, $db_password, $db_host) {
        $this->db_name = $db_name;
        $this->db_host = $db_host;
        $this->db_password = $db_password;
        $this->db_user = $db_user;
        return $this->getPdo();
    }
    public function getPdo() {
        if (!$this->pdo) {
            $pdo = new PDO(
                "mysql:dbname=$this->db_name;host=$this->db_host",
                $this->db_user,
                $this->db_password,
                array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
            );
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo = $pdo;
        }
        return $this->pdo;
    }

}