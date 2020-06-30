<html>
    <header>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Agropecuária Campanholi</title>
        <link rel="stylesheet" type="text/css" href="<?=BASE_URL;?>assets/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="<?=BASE_URL;?>assets/css/style.css">
    </header>
    <body>
        
        <div class="topo">
            <ul class="ul-topo">
                <li>
                    <a href="<?=BASE_URL;?>">Home</a>
                </li>
                <li>
                    <div id="menu-dropdown">
                        <a href="<?=BASE_URL;?>produto/cadastrar">Cadastrar Produto</a>
                        <img id="img-dropdown" src="<?=BASE_URL;?>assets/images/arrow-down.png" alt="">
                    </div>
                    
                    <div id="dropdown">
                        <a href="<?=BASE_URL;?>categoria/cadastrar">
                            Cadastrar Categoria
                        </a>
                    </div>
                </li>
                <li>
                    <div id="menu-dropdown">
                        <a href="<?=BASE_URL;?>produto/listar">Listar Produtos</a>
                        <img id="img-dropdown" src="<?=BASE_URL;?>assets/images/arrow-down.png" alt="">
                    </div>
                    <div id="dropdown">
                        <?php foreach($viewData['categorias']->info as $categoria):?>
                        <a href="<?=BASE_URL;?>produto/listar_categoria/<?=$categoria['id'];?>"><?=$categoria['nome'];?></a><br>
                        <?php endforeach;?>
                        <a href="<?=BASE_URL;?>produto/minimo">
                            Estoque Minimo
                        </a>
                        
                    </div>
                </li>
                <li>
                    <div id="menu-dropdown">
                        <a href="<?=BASE_URL;?>venda/">Cadastrar venda</a>
                        <img id="img-dropdown" src="<?=BASE_URL;?>assets/images/arrow-down.png" alt="">
                    </div>
                    <div id="dropdown">
                        <a href="<?=BASE_URL;?>compra/">Cadastrar Compra</a>
                    </div>
                </li>
                <li>
                    <div id="menu-dropdown">
                        <a href="<?=BASE_URL;?>usuarios/">Usuários</a>
                        <img id="img-dropdown" src="<?=BASE_URL;?>assets/images/arrow-down.png" alt="">
                    </div>
                    <div id="dropdown">
                        <a href="<?=BASE_URL;?>usuarios/cadastrar">Cadastrar Usuário</a>
                    </div>
                </li>
                <li>
                    <a href="<?=BASE_URL;?>sair">Sair</a>
                </li>   
            </ul>
            <div class="usuario">
                <a href="<?=BASE_URL;?>usuarios/listar/<?=$viewData['usuario']->info['id'];?>"><?=$viewData['usuario']->info['nome'];?></a>
            </div>
        </div>
        <div class="container-fluid">
            <?=$this->render($viewName, $viewData);?>
        </div>
        
    </body>
    <footer>
        <script type="text/javascript" src="<?=BASE_URL;?>assets/js/jquery-3.5.1.min.js"></script>
        <script type="text/javascript" src="<?=BASE_URL;?>assets/js/script.js"></script>
    </footer>

