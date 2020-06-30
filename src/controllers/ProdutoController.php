<?php 
class ProdutoController extends Controller {

    public function __construct() {
        $usuarios = new Usuarios();

        if($usuarios->isLogged() == false) {
            header("Location: ".BASE_URL."login");
        }
    }
    
    public function cadastrar() {
        $flash = '';
        if(isset($_SESSION['flash'])) {
            $flash = $_SESSION['flash'];
            $_SESSION['flash'] = '';
        }
        $categorias = new Categorias();
        $categorias->getCategorias();
        $usuario = new Usuarios();
        $usuario->getOne($_SESSION['lgusuario']);

        $this->loadTemplate('produto-cadastro', [
            'categorias' => $categorias,
            'flash' => $flash,
            'usuario' => $usuario
        ]);
    }

    public function cadastro() {
        $nome = filter_input(INPUT_POST, 'nome');
        $img = $_FILES['img'];
        $id_categoria = filter_input(INPUT_POST, 'categoria');
        $unidades = intval(filter_input(INPUT_POST, 'unidades'));
        $unidade_kg = intval(filter_input(INPUT_POST, 'unidade_kg'));
        $unidade_kg = str_replace(',', '.', $unidade_kg);
        $min_estoque = filter_input(INPUT_POST, 'min_estoque');
        $preco_compra = filter_input(INPUT_POST, 'preco_compra');
        $preco_compra = str_replace(',', '.', $preco_compra);
        $preco_venda = filter_input(INPUT_POST, 'preco_venda');
        $preco_venda = str_replace(',', '.', $preco_venda);
        $obs = filter_input(INPUT_POST, 'obs');
        if(!isset($unidade_kg)) {
            $unidade_kg = 1;
        }
        $kg = ($unidades * $unidade_kg);
        if($nome && $id_categoria && $unidades && $min_estoque) {
            
            if(isset($_FILES['img'])) {
                $tipo = $img['type'];
                $permitidos = array('image/jpeg', 'image/png');
                $extensao = strtolower(substr($img['name'], -4));
                $novo_nome = md5(time().rand(0,999).time()).$extensao;
                if(in_array($tipo, $permitidos)) {
                    
                    move_uploaded_file($img['tmp_name'], 'assets/images/produtos/'.$novo_nome);
                } else {
                    $_SESSION['flash'] = 'Apenas permitido em JPG ou PNG!';
                }

            }
            $produtos = new Produtos();
            
            
            $produtos->cadastrarProduto($nome, $novo_nome, $id_categoria, $unidades, $unidade_kg, $kg, $min_estoque, $preco_compra, $preco_venda, $obs);
            $_SESSION['flash'] = 'Produto cadastrado com sucesso!';
            header("Location: ".BASE_URL."produto/cadastrar");
            
            

        } else {
            $_SESSION['flash'] = 'Preencha todos os campos obrigatórios!';
            header("Location: ".BASE_URL."produto/cadastrar");
        }
    }

    //Função para listar todos os produtos, ou, se passado o id, ele mostra a ficha do produto respectivo;
    public function listar($id = '') {
        $produtos = new Produtos();
        
        $produto = new Produtos();
        $categorias = new Categorias();
        $categorias->getCategorias();
        $usuario = new Usuarios();
        $usuario->getOne($_SESSION['lgusuario']);
        $flash = '';
        if(isset($_SESSION['flash'])) {
            $flash = $_SESSION['flash'];
            $_SESSION['flash'] = '';
        }
        $total_produtos = $produtos->getTotalProdutos();
        
        $p = 1;
        if(isset($_GET['p']) && !empty($_GET['p'])) {
            $p = addslashes($_GET['p']);
        }
        $por_pagina = 10;
        $total_paginas = ceil($total_produtos[0] / $por_pagina);
        $produtos->getAll($p, $por_pagina);
        if(empty($id)) {
            $view = 'produto-listar';
        } else {
            
            //Uma proteção contra ID de produto não existe no banco;
            if($produto->getOne($id) == false) {
                header("Location: ".BASE_URL."produto/listar");
            } else {
                $categorias->getCategorias();
                $view = 'produto-listar-id';
            }
        }
        $this->loadTemplate($view, [
            'produtos' => $produtos,
            'produto' => $produto,
            'categorias' => $categorias,
            'flash' => $flash,
            'usuario' => $usuario,
            'total_produtos' => $total_produtos,
            'total_paginas' => $total_paginas
        ]);
    }

    //Função que mostra a listagem de produtos por categoria;
    public function listar_categoria($id_categoria) {
        $categorias = new Categorias();
        $categorias->getCategorias();
        $produtos = new Produtos();
        //Proteção contra ID de categoria que não existe;

        $usuario = new Usuarios();
        $usuario->getOne($_SESSION['lgusuario']);

        $total_produtos = $produtos->getTotalCategoria($id_categoria);
        
        $p = 1;
        if(isset($_GET['p']) && !empty($_GET['p'])) {
            $p = addslashes($_GET['p']);
        }
        $por_pagina = 10;
        $total_paginas = ceil($total_produtos[0] / $por_pagina);

        if($produtos->getPorCategoria($p, $por_pagina, $id_categoria) == false){
            header("Location: ".BASE_URL."produto/listar");
        } else {
            $produtos->getPorCategoria($p, $por_pagina, $id_categoria);
            $this->loadTemplate('produto-listar-categoria', [
                'categorias' => $categorias,
                'produtos' => $produtos,
                'id_categoria' => $id_categoria,
                'usuario' => $usuario,
                'total_produtos' => $total_produtos,
                'total_paginas' => $total_paginas
            ]);
        }
        
    }

    public function atualizar($id) {
        //Recebendo os dados do produto;
        $nome = filter_input(INPUT_POST, 'nome');
        $id_categoria = filter_input(INPUT_POST, 'categoria');
        $unidades = intval(filter_input(INPUT_POST, 'unidades'));
        $unidade_kg = intval(filter_input(INPUT_POST, 'unidade_kg'));
        $unidade_kg = str_replace(',', '.', $unidade_kg);
        $min_estoque = filter_input(INPUT_POST, 'min_estoque');
        $preco_compra = filter_input(INPUT_POST, 'preco_compra');
        $preco_compra = str_replace(',', '.', $preco_compra);
        $preco_venda = filter_input(INPUT_POST, 'preco_venda');
        $preco_venda = str_replace(',', '.', $preco_venda);
        $obs = filter_input(INPUT_POST, 'obs');
        if(!isset($unidade_kg)) {
            $unidade_kg = 1;
        }
        $kg = ($unidades * $unidade_kg);
        echo $id_categoria;
        if($nome ||  $unidades) {
            $produtos = new Produtos();
            $produtos->updateProduto($id, $nome, $id_categoria, $unidades, $unidade_kg, $kg, $min_estoque, $preco_compra, $preco_venda, $obs);

            //Verificar se ele saiu do grupo de 'estoque_min';
            if($unidades > $min_estoque) {
                $estoque_avisar = 0;
                $produtos->updateMinimo($id, $estoque_avisar);
            }
            header("Location: ".BASE_URL."produto/listar/".$id);
            $_SESSION['flash'] = 'Produto atualizado com sucesso!';
        }
    }

    public function minimo(){
        $categorias = new Categorias();
        $categorias->getCategorias();
        $produtos = new Produtos();
       
        $usuario = new Usuarios();
        $usuario->getOne($_SESSION['lgusuario']);

        $total_produtos = $produtos->getTotalMinimo();
        
        $p = 1;
        if(isset($_GET['p']) && !empty($_GET['p'])) {
            $p = addslashes($_GET['p']);
        }
        $por_pagina = 10;
        $total_paginas = ceil($total_produtos[0] / $por_pagina);

        $produtos->getMinimos($p, $por_pagina);

        $this->loadTemplate('produto-minimo', [
            'categorias' => $categorias,
            'produtos' => $produtos,
            'usuario' => $usuario,
            'total_paginas' => $total_paginas
        ]);
    }

    public function deletar($id) {
        $produtos = new Produtos();
        $produtos->getOne($id);
        //Deletar a imagem do produto que está no servidor;
        unlink("assets/images/produtos/".$produtos->info['img']);
        $produtos->deletar($id);
        header("Location: ".BASE_URL."produto/listar");
    }

    
}