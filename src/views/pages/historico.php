<h1>Histórico de Caixa</h1>

<div class="col-sm">
    
    <div id="filtro-resultado">
        <table class="table table-striped table-hover table-responsive-sm">
            <thead class="thead-dark">
                <tr class="">
                    <th scope="col" >Data</th>
                    <th scope="col" >Tipo</th>
                    <th scope="col" >Valor</th>
                </tr>
            </thead>
            <?php if($historicos->info==null || $historicos->info==0):?>
                Nada encontrado!
            <?php else:?>
            <?php foreach($historicos->info as $historico):?>
            <tbody>
                <tr>
                    <td>
                        <?=date('d/m/Y H:i:s', strtotime($historico['data']));?>
                    </td>
                    <td>
                        <?php if($historico['tipo'] == '0'): ?>
                            <span style="color:green;">Venda</span> 
                        <?php else:?>
                            <span style="color:red;">Compra</span> 
                        <?php endif;?>
                    </td>
                    <td>
                        <strong> <?=number_format(str_replace('-', '', $historico['total']), 2, ',', ' ');?></strong>
                    </td>
                    
                </tr>
                <?php endforeach;?>
                <tr>
                    <td class="total_caixa">TOTAL EM CAIXA: </td>
                    <td class="total_caixa"></td>
                    <td class="total_caixa"><?=number_format($total_caixa, 2, ',', ' ');?></td>
                </tr>
                
            </tbody>
            
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

    
