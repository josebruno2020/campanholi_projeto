<h1>Cadastro de produto</h1>
<div class="row">
    <div class="col-sm produto-cadastro">
        <form action="<?=BASE_URL;?>produto/cadastro" method="post" class="form" enctype="multipart/form-data">
            <?php if(isset($flash)):?>
                <div class="alert-info"><?=$flash;?></div>
            <?php endif;?>
            <div class="form-group">
                <label for="nome"></label>
                <input type="text" name="nome" class="form-control form-check-inline" placeholder="Nome*">
            
                <label for="codigo">Foto:</label>
                <input type="file" name="img" class="form-check-inline form-control-file">
            
                <label for="codigo"></label>
                <select name="categoria" id="" class="form-control form-check-inline">
                    <option value="">Escolha uma categoria*</option>
                <?php foreach($categorias->info as $item):?>
                    <option value="<?=$item['id'];?>"><?=$item['nome'];?></option>
                <?php endforeach;?>
                </select>   
            </div><br>
            <div class="form-group">
                <label for="codigo"></label>
                <input type="text" name="unidades" class="form-control form-check-inline" placeholder="Unidades Ativas*">
            
                <label for="codigo"></label>
                <input type="text" name="unidade_kg" class="form-control form-check-inline" placeholder="Kg por Unidade">
            
                <label for="codigo"></label>
                <input type="text" name="min_estoque" class="form-control form-check-inline" placeholder="Mínimo no estoque*">
            </div><br>
            <div class="form-group">
                <label for="codigo"></label>
                <input type="text" name="preco_compra" class="form-control form-check-inline" placeholder="Preço de Compra">
            
                <label for="codigo"></label>
                <input type="text" name="preco_venda" class="form-control form-check-inline" placeholder="Preço de Venda">
            </div><br>
            <div class="form-group">
                <label for="codigo">OBS:</label><br>
                <textarea name="obs" id="" cols="30" rows="10" class="form-control"></textarea>
            </div>

            <div class="form-group">
                
                <input type="submit" value="Cadastrar Produto" class="btn btn-success">
            </div>
                
        </form>
    </div>
</div>


    