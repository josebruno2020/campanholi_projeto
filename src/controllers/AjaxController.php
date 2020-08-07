<?php 
class AjaxController extends Controller {

    public function __construct() {
        $usuarios = new Usuarios();

        if($usuarios->isLogged() == false) {
            header("Location: ".BASE_URL."login");
        }
    }
    
    public function index() {
        $produtos = new Produtos();
        $filtro = filter_input(INPUT_POST, 'produto');
        $produtos->getByfilter($filtro);
        $this->render('filtro-venda', [
            'produtos' => $produtos
        ]);
        
    }

    public function filtro(){
        if(!empty($_POST['produto-filtro'])){
            $filtro = $_POST['produto-filtro'];
        
        } else{
            $filtro = '';
        }
        $produtos = new Produtos();
        $categorias = new Categorias();
        $produtos->getByFilter($filtro);
        
        
        $this->render('filtro-produto', [
            'produtos' => $produtos,
            'categorias' => $categorias
        ]);
    }

    
}