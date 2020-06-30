<h1>Produtos cadastrados - Mínimo</h1>

<div class="col-sm">
    
    <div id="filtro-resultado">
        <table class="table table-striped table-hover table-responsive-sm">
            <thead class="thead-dark">
                <tr class="">
                    <th scope="col" >Imagem</th>
                    <th scope="col" >Código</th>
                    <th scope="col" >Nome</th>
                    <th scope="col" >Categoria</th>
                    <th scope="col" >Unidades em estoque</th>
                    <th scope="col" >Kg por Unidade</th>
                    <th scope="col" >Kg em estoque</th>
                    <th scope="col" >Deletar</th>
                </tr>
            </thead>
            <?php if($produtos->info[0]==0):?>
                Nada encontrado!
            <?php else:?>
            <?php foreach($produtos->info as $produto):?>
            <tbody>
                <tr>
                    <td><img src="<?=BASE_URL;?>assets/images/produtos/<?=$produto['img'];?>" alt="" height="70"></td>
                    <td><?=$produto['id'];?></td>
                    <td><a href="<?=BASE_URL;?>produto/listar/<?=$produto['id'];?>">
                        <?=$produto['nome'];?>
                    </a></td>
                    <td><?=$categorias->getCategoriasProduto($produto['id_categoria'])['nome'];?></td>
                    <td><?=$produto['unidades'];?></td>
                    <td><?=$produto['unidade_kg'];?></td>
                    <td><?=$produto['kg'];?></td>
                    <td><a onclick="return confirm('Tem certeza que deseja deletar?');" href="<?=BASE_URL;?>produto/deletar/<?=$produto['id'];?>">
                        <img src="<?=BASE_URL;?>assets/images/deletar.png" alt="" width="30">
                    </a></td>
                </tr>
                
            </tbody>
            <?php endforeach;?>
            <?php endif;?>
        </table>
        <ul class="pagination">
            <?php for($q=1;$q<=$total_paginas;$q++): ?>
            <li class="<?php echo ($p==$q)?'active':''; ?>"><a href="<?=BASE_URL;?>?<?php
            $w = $_GET;
            $w['p'] = $q;
            echo http_build_query($w);
            ?>"><?php echo $q; ?></a></li>
            <?php endfor; ?>
        </ul>
    </div>
</div>

