<?php
class Historico extends Model {
    public $info;

    public function cadastrar($total, $tipo){
        $sql = $this->db->prepare("INSERT INTO historico SET total = :total, tipo = :tipo, data = NOW()");
        $sql->bindValue(":total", $total);
        $sql->bindValue(":tipo", $tipo);
        $sql->execute();

       return $this->info = $this->db->lastInsertId();
    }
    
}