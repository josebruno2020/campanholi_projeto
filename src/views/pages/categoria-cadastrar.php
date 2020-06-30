<h1>Cadastrar Categoria</h1>
<div class="row">
    <div class="col-sm">
        <form action="<?=BASE_URL;?>categoria/action" method="post" class="form">
            <?php if(isset($flash)):?>
                <div class="alert-info"><?=$flash;?></div>
            <?php endif;?> 
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" name="nome" id="" class="form-control" required>
            </div>
            <div class="form-group">
                <input type="submit" value="Cadastrar" id="" class="btn btn-success">
            </div>
        </form>
    </div>
</div>