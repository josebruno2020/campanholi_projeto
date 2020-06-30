<div class="form-group">
                
    <label for="">Nome:</label>
    <input type="text" name="produto[]" class="form-control form-check-inline produto-campo" autofocus="true">
    <div class="venda-produto">
        <?php if($produtos->info==null):?>
        
            Nada encontrado!
            <?php else:?>

            <?php foreach($produtos->info as $produto): ?>
            <div class="item-produto"><?=$produto['nome'];?></div>
            <?php endforeach;?>

        <?php endif;?>
    </div>
    
    
    <label for="qt">Unidades:</label>
    <input type="text" name="qt[]" id="" class="form-control form-check-inline" >
    <label for="kg">Kg:</label>
    <input type="text" name="kg[]" id="" class="form-control form-check-inline" >
    
    
</div>