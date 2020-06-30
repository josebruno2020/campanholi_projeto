<?php 
class CategoriaController extends Controller {

    public function __construct() {
        $usuarios = new Usuarios();

        if($usuarios->isLogged() == false) {
            header("Location: ".BASE_URL."login");
        }
    }
    
    public function index() {
        
    }
    public function cadastrar() {
        $categorias = new Categorias();
        $categorias->getCategorias();
        $usuario = new Usuarios();
        $usuario->getOne($_SESSION['lgusuario']);
        $flash = '';
        if(isset($_SESSION['flash'])) {
            $flash = $_SESSION['flash'];
            $_SESSION['flash'] = '';
        }

        $this->loadTemplate('categoria-cadastrar', [
            'flash' => $flash,
            'categorias'=> $categorias,
            'usuario' => $usuario
        ]);
        
    }

    public function action() {
        $nome = filter_input(INPUT_POST, 'nome');

        $categorias = new Categorias();
        
        if(isset($nome)) {
            $categorias->cadastrar($nome);
            $_SESSION['flash'] = 'Cadastro feito com sucesso!';
            header("Location: ".BASE_URL."categoria/cadastrar");

        } else {    
            $_SESSION['flash'] = 'Insira os dados!';
            header("Location: ".BASE_URL."categoria/cadastrar");
        }
    }

    
}