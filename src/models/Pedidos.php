<?php
class Pedidos extends Model {
    public $info;

    public function cadastrar($id_venda, $id_produto, $unidade_qt, $kg_qt) {
        $sql = $this->db->prepare("INSERT INTO pedidos SET id_venda = :id_venda, id_produto = :id_produto, unidade_qt = :unidade_qt, kg_qt = :kg_qt");
        $sql->bindValue(":id_venda", $id_venda);
        $sql->bindValue(":id_produto", $id_produto);
        $sql->bindValue(":unidade_qt", $unidade_qt);
        $sql->bindValue(":kg_qt", $kg_qt);
        $sql->execute();
    }
    
}