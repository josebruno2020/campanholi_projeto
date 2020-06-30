<h1>Usuários Cadastrados</h1>

<div class="row">
    <div class="col-sm">
        <table class="table table-striped table-hover table-responsive-sm">
            <thead class="thead-dark">
                <tr class="">
                    <th scope="col" >Nome</th>
                    <th scope="col" >E-mail</th>
                    <th scope="col" >Telefone</th>
                    <th scope="col" >Deletar</th>
                </tr>
            </thead>
            
            <?php foreach($usuarios->info as $usuario):?>
            <tbody>
                
                <tr>
                    <td>
                        <?=$usuario['nome'];?>
                    </td>
                    <td><?=$usuario['email'];?></td>
                    <td><?=$usuario['tel'];?></td>
                    <td><a onclick="return confirm('Tem certeza que deseja deletar?');" href="<?=BASE_URL;?>usuarios/deletar/<?=$usuario['id'];?>">
                        <img src="<?=BASE_URL;?>assets/images/deletar.png" alt="" width="30">
                    </a></td>
                </tr>
                
            </tbody>
            <?php endforeach;?>
        </table>
    </div>
</div>