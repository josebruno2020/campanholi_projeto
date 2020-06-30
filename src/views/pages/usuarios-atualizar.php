<h1>Atualizar Cadastro - <?=$usuario->info['nome'];?></h1>
<div class="row">
    <div class="col-sm produto-cadastro">
        <form action="<?=BASE_URL;?>usuarios/atualizar/<?=$usuario->info['id'];?>" method="post" class="form" enctype="multipart/form-data">
            <?php if(isset($flash)):?>
                <div class="alert-info"><?=$flash;?></div>
            <?php endif;?>
            <div class="form-group">
                <label for="nome">Nome:</label><br>
                <input type="text" name="nome" class="form-control" value="<?=$usuario->info['nome'];?>">
            </div>
            <div class="form-group">
                <label for="codigo">E-mail:</label><br>
                <input type="email" name="email" class="form-control" value="<?=$usuario->info['email'];?>" readonly>
            </div>
            <div class="form-group">
                <label for="codigo">Nova Senha:</label><br>
                <input type="password" name="senha1" class="form-control form-check-inline">
                <label for="codigo">Confirme sua Nova Senha:</label>
                <input type="password" name="senha2" class="form-control form-check-inline">
            </div>
            <div class="form-group">
                <label for="codigo">Telefone:</label><br>
                <input type="text" name="tel" class="form-control" value="<?=$usuario->info['tel'];?>">
            </div>
            <div class="form-group">
                
                <input type="submit" value="Atualizar Usuário" class="btn btn-success">
            </div>
                
        </form>
    </div>
</div>


    