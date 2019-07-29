<?php
namespace Core\Auth;

class Auth {
    public static function isConnected() {
        return isset($_SESSION['user']) ? true : false;
    }
    public static function logout() {
        session_unset(); 
        session_destroy(); 
    }
}