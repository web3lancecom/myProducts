<?php
namespace Core\Controller;

class Controller {

    protected $viewPath;
    protected $template;

    public function render($view, $arguments = []) {
        ob_start();
        extract($arguments);
        require $this->viewPath . str_replace('.', '/', $view) .'.php';
        $content = ob_get_clean();
        require($this->viewPath . 'templates/' . $this->template . '.php');
    }
}