<h1>Nova venda</h1>
<div class="row">
    <div class="col-sm">
        <h4>Preencha os campos de ao menos um produto</h4>
        <form action="<?=BASE_URL;?>venda/action" method="POST" class="form" id="venda">
            <?php if(isset($flash)):?>
                <div class="alert-info"><?=$flash;?></div>
            <?php endif;?>
            <?=$this->render('venda-tabela');?>
            <?=$this->render('venda-tabela');?>
            <?=$this->render('venda-tabela');?>
            <?=$this->render('venda-tabela');?>
            <?=$this->render('venda-tabela');?>
            <?=$this->render('venda-tabela');?>
            <?=$this->render('venda-tabela');?>
            
            
            
            <div class="form-group">
                <label for="total">Total da venda:</label><br>
                <input type="text" name="total"  class="form-control form-check-inline" required>       
            </div>
            <div class="form-group">
                <input type="submit" value="Cadastrar venda" class="form-check-inline btn btn-success">
            </div>
            
            
        </form>
    </div>
</div>

