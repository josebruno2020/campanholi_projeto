<h1>Cadastrar novo Usuário</h1>
<div class="row">
    <div class="col-sm produto-cadastro">
        <form action="<?=BASE_URL;?>usuarios/action" method="post" class="form" enctype="multipart/form-data">
            <?php if(isset($flash)):?>
                <div class="alert-info"><?=$flash;?></div>
            <?php endif;?>
            <div class="form-group">
                <label for="nome">Nome:*</label><br>
                <input type="text" name="nome" class="form-control">
            </div>
            <div class="form-group">
                <label for="codigo">E-mail:*</label><br>
                <input type="email" name="email" class="form-control">
            </div>
            <div class="form-group">
                <label for="codigo">Senha:*</label><br>
                <input type="password" name="senha" class="form-control">
            </div>
            <div class="form-group">
                <label for="codigo">Telefone:</label><br>
                <input type="text" name="tel" class="form-control">
            </div>
            <div class="form-group">
                
                <input type="submit" value="Cadastrar Usuário" class="btn btn-success">
            </div>
                
        </form>
    </div>
</div>


    