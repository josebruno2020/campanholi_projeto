<?php 
class HomeController extends Controller {

    public function __construct() {
        $usuarios = new Usuarios();

        if($usuarios->isLogged() == false) {
            header("Location: ".BASE_URL."login");
        }
    }
    
    public function index() {
        $categorias = new Categorias();
        $categorias->getCategorias();
        $usuario = new Usuarios();
        $usuario->getOne($_SESSION['lgusuario']);
        


        $this->loadTemplate('home', [
            'categorias' => $categorias,
            'usuario' => $usuario
        ]);
        
    }

    
}