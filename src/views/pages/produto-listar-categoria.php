<h1>Produtos cadastrados - Em estoque - <?=$categorias->getCategoriasProduto($id_categoria)['nome'];?></h1>

<?=$this->render('usuario-tabela', ['produtos' => $produtos, 'categorias' => $categorias, 'total_paginas'=> $total_paginas, 'p' => $p]);?>

