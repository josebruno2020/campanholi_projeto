<h1>Produto <?=$produto->info['nome'];?></h1>
<div class="row">
    <div class="col-sm">
        <form action="<?=BASE_URL;?>produto/atualizar/<?=$produto->info['id'];?>" method="post" class="form">
            <?php if(isset($flash)):?>
                <div class="alert-info"><?=$flash;?></div>
            <?php endif;?>
            <div class="form-group">
                <img class="img-thumbnail" src="<?=BASE_URL;?>assets/images/produtos/<?=$produto->info['img'];?>" alt="" width="200">
                <label for="nome">Nome:</label>
                <input class="form-check-inline form-control" type="text" name="nome" id="" value="<?=$produto->info['nome'];?>">
            
                <label for="codigo">Código:*</label>
                <input type="text" name="codigo" class="form-control form-check-inline" readonly value="<?=$produto->info['id'];?>">
            </div>
            <div class="form-group">
                <label for="codigo">Categoria:*</label><br>
                <select name="categoria" id="" class="form-control">
                    <option value="<?=$produto->info['id_categoria'];?>"><?=$categorias->getCategoriasProduto($produto->info['id_categoria'])['nome'];?></option>
                    <?php foreach($categorias->info as $item):?>
                        <option value="<?=$item['id'];?>"><?=$item['nome'];?></option>
                    <?php endforeach;?>
                </select>   
            </div>
            <div class="form-group">
                <label for="codigo">Unidades ativas:*</label><br>
                <input type="text" name="unidades" class="form-control" value="<?=$produto->info['unidades'];?>">
            </div>
            <div class="form-group">
                <label for="codigo">Kg por Unidade:</label><br>
                <input type="text" name="unidade_kg" class="form-control" value="<?=$produto->info['unidade_kg'];?>">
            </div>
            <div class="form-group">
                <label for="codigo">Mínimo no estoque:</label><br>
                <input type="text" name="min_estoque" class="form-control" value="<?=$produto->info['min_estoque'];?>">
            </div>
            <div class="form-group">
                <label for="codigo">Preço de Compra:</label><br>
                <input type="text" name="preco_compra" class="form-control" value="<?=$produto->info['preco_compra'];?>">
            </div>
            <div class="form-group">
                <label for="codigo">Preço de Venda:</label><br>
                <input type="text" name="preco_venda" class="form-control" value="<?=$produto->info['preco_venda'];?>">
            </div>
            <div class="form-group">
                <label for="codigo">OBS:</label><br>
                <textarea name="obs" id="" cols="30" rows="10" class="form-control" ><?=$produto->info['obs'];?></textarea>
            </div>

            <div class="form-group">
                    
                <input type="submit" value="Atualizar Produto" class="btn btn-success">
            </div>
        </form>
    </div>
</div>
