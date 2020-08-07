<?php
class Controller {

    public function render($viewName, $viewData = array()) {

        extract($viewData);
        require 'src/views/pages/'.$viewName.'.php';
    }

    public function loadTemplate($viewName, $viewData = array()) {
        require 'src/views/partials/Template.php';
    }

}