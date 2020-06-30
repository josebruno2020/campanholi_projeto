<?php 
class CompraController extends Controller {

    public function __construct() {
        $usuarios = new Usuarios();

        if($usuarios->isLogged() == false) {
            header("Location: ".BASE_URL."login");
        }
    }
    
    public function index() {
        $flash = '';
        if(isset($_SESSION['flash'])) {
            $flash = $_SESSION['flash'];
            $_SESSION['flash'] = '';
        }

        $produtos = new Produtos();
        $produtos->getTodos();
        $usuario = new Usuarios();
        $usuario->getOne($_SESSION['lgusuario']);
        

        $categorias = new Categorias();
        $categorias->getCategorias();

        $this->loadTemplate('compra-cadastrar', [
            'categorias' => $categorias,
            'flash' => $flash,
            'produtos' => $produtos,
            'usuario' => $usuario
            
        ]);
        
    }

    public function action() {
        $pedidos = new Pedidos();
        $compras = new Historico();
        $produtos = new Produtos();
        
        $produto = $_POST['produto'];
        $qt = $_POST['qt'];
        $kg = $_POST['kg'];
        //Substituir a virgula em cada elemento do array;
        for($i=0;$i<count($produto);$i++) {
            $kg[$i] = str_replace(',', '.', $kg[$i]); 
        }
        $total = filter_input(INPUT_POST, 'total');
        $total = str_replace(',', '.', $total);
        
        
        if($total && $produto[0]) {
            //Primeiro cadastramos a compra, e já obtemos o id dela, que armazenamos numa variável;
            $tipo = 1;
            $id_compra = $compras->cadastrar(-$total, $tipo);

            //Pegar o id correspondente de cada produto do array segundo o nome dele;
            for($i=0;$i<count($produto);$i++){
                
                $id_produto = $produtos->getId($produto[$i]);
                $pedidos->cadastrar($id_compra, $id_produto['id'], $qt[$i], $kg[$i]);

                //Pegando as informaçoes de cada produto para que possa ser realizada o update do estoque
                $produtos->getOne($id_produto['id']);
                
                //Definindo numero de unidades
                $unidades[$i] = intval($produtos->info['unidades']) + intval($qt[$i]);

                //Se vender mais kg do que a ração tem por unidade, vai descontar como unidade inteira no estoque;
                if($kg[$i] >= $produtos->info['unidade_kg']) {

                    $n = intdiv($kg[$i] , $produtos->info['unidade_kg']);
                    
                    $unidades[$i] = $unidades[$i] + $n;
                    //Temo que verificar se o calculo das unidades * o kg_unidade der maior que o registrado no banco, quer dizer que foi acrescentada uma unidade, assim, marcamos como unidade + 1;
                }elseif ($kg[$i] < $produtos->info['unidade_kg']) {
                    
                    if(($produtos->info['unidades'] * $produtos->info['unidade_kg']) > $produtos->info['kg']) {
                        $n = 1;
                        $unidades[$i] = $unidades[$i] + $n;
                    }
                } 
                //Caso seja comprada apenas unidades inteiras, o valor da unidade acrescenta os kg do estoque;
                if($kg[$i]==null || $kg[$i]==0) {
                    $kg[$i] = intval($unidades[$i]) * intval($produtos->info['unidade_kg']);
                } else{
                    //Valor dos quilos;
                    $kg[$i] = intval($produtos->info['kg']) + intval($kg[$i]);
                }
                //Após cadastrar o pedido, temos que dar um update em cada produto, no numero de uniadades no estoque e em kilos;
                ob_start();
                $produtos->updateEstoque($id_produto['id'], intval($unidades[$i]), intval($kg[$i]));
                ob_end_clean();
                //Após fazer o update do Produto, temos que verificar se as unidades está abaixo do nivel minimo;
                if($unidades[$i] > $produtos->info['min_estoque']){
                    $estoque_avisar = 0;
                    $produtos->updateMinimo($id_produto['id'], $estoque_avisar);
                    
                }

            }
            header("Location: ".BASE_URL."compra/");
            $_SESSION['flash'] = 'Compra Cadastrada com sucesso! Estoque atualizado!';
            
        } else {
            header("Location: ".BASE_URL."compra/");
            $_SESSION['flash'] = 'Preencha o nome de algum produto';
        }
        
    }

    
}