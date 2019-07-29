<?php
namespace App\Controller;
use App\Model\User;
use Core\Auth\Auth;
use Core\Utils\Utils;

class AuthController extends AppController {
    /**
     *  this is for displayling the login form
     */
    function renderLogin() {
        // if not logued redirect
        if (Auth::isConnected()) {
            return Utils::redirect('home.html');
        }
        $this->render('pages.login');            
    }
    /**
     *  Hired when user submit the form
     */
    function postLogin() {
        if (!isset($_POST['email']) || !isset($_POST['password'])) {
            // display error
            $error = 'Veuillez remplir toutes les champs';
            return $this->render('pages.login', compact('error'));    
        }
        // check user from model
        $result = User::checkCredential($_POST['email'], $_POST['password']);
        
        if ($result) {
            // $result is the user's data, we set the session
            $_SESSION["user"] = $result;
            Utils::redirect('home.html');       
            die;
        } else {
            $error = 'Veuillez vérifier votre identifiant';
            $this->render('pages.login', compact('error'));            
           
        }
    }

}