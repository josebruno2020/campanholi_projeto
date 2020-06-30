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
        $filtro = $_GET['produto'];
        for($i=0;$i<count($filtro);$i++){
            $produtos->getByFilter($filtro[$i]);
            
        }
        
        $this->render('filtro-venda', [
            'produtos' => $produtos
        ]);
        
    }

    public function filtro(){
        $filtro = filter_input(INPUT_GET, 'produto-filtro');

        $produtos = new Produtos();
        $produtos->getByFilter($filtro);
        $categorias = new Categorias();


        $this->render('filtro-produto', [
            'produtos' => $produtos,
            'categorias' => $categorias
        ]);
    }

    
}