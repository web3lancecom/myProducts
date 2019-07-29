<?php
namespace App\Controller;
use Core\Controller\Controller;

class AppController extends Controller {
    
    protected $template = 'default';
    
    public function __construct() {
        // out template is placed in /Views/templates/default.php
        $this->template =  'default';
        $this->viewPath = ROOT . '/app/Views/';
    }
}