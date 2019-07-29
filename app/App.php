<?php
namespace App;
require ROOT . 'app/Autoloader.php';
use App\Model\Model;

class App {
    private static $database;

    public static function loadDb() {
        $conf = include(ROOT . 'config/config.php');
        if (self::$database === null) {
            self::$database = new Database(
                $conf['DB_NAME'],
                $conf['DB_USER'], 
                $conf['DB_PASSWORD'], 
                $conf['DB_HOST']
            );
        }
        return self::$database;
    }
    public static function notFound() {
        header('HTTP/1.0 404 Not Found');
    }
    /**
     *  this is for loading our app
     */
    public static function load() {
        // load autoloader
        $loader = new Autoloader();
        $loader->register();
        // register namespace
        $loader->addNamespace('Core', ROOT . '/core');
        $loader->addNamespace('App', ROOT . '/app');
        // load database
        $db = self::loadDb();
        Model::$pdo =  $db->getPdo();
        // start session
        session_start();
    }
}