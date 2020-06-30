<?php 
class HistoricoController extends Controller {

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
        $historicos = new Historico();
        $usuario->getOne($_SESSION['lgusuario']);
        
        $total_produtos = $historicos->getTotalHistorico();
        
        $p = 1;
        if(isset($_GET['p']) && !empty($_GET['p'])) {
            $p = addslashes($_GET['p']);
        }
        $por_pagina = 10;
        $total_paginas = ceil($total_produtos[0] / $por_pagina);
        $historicos->getAll($p, $por_pagina);

        $historico = new Historico();
        $historico->getTodos();
        $total_caixa = 0;
        for($i=0;$i<count($historico->info);$i++){
            $total_caixa = $total_caixa + intval($historico->info[$i]['total']);
        }
        
        

        $this->loadTemplate('historico', [
            'categorias' => $categorias,
            'usuario' => $usuario,
            'historicos' => $historicos,
            'total_paginas' =>$total_paginas,
            'total_caixa' => $total_caixa
        ]);
        
    }

    
}