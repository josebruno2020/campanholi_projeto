<?php if($produtos->info==null):?>
   
    Nada encontrado!
<?php else:?>

<?php foreach($produtos->info as $produto): ?>
    <div class="item-produto"><?=$produto['nome'];?></div>
<?php endforeach;?>

<?php endif;?>
