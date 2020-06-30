<?php
class Historico extends Model {
    public $info;

    //Função para retornar todos os elementos do banco de dados, de acordo com as paginas;
    public function getAll($page, $perPage){
        $offset = ($page - 1) * $perPage;

        $sql = $this->db->prepare("SELECT * FROM historico ORDER BY data DESC LIMIT $offset, $perPage");
        $sql->execute();

        if($sql->rowCount() > 0) {
            $this->info = $sql->fetchAll();

        }

        return $this->info;
    }

    public function getTodos(){
        $sql= $this->db->query("SELECT * FROM historico");
        if($sql->rowCount()>0){
            return $this->info = $sql->fetchAll();
        }
    }

    //Função que retorna o numero dos registros no historico
    public function getTotalHistorico(){
        $sql = $this->db->query("SELECT COUNT(*) FROM historico");
        if($sql->rowCount()>0){
            return $this->info = $sql->fetch();
        }
    }

    public function cadastrar($total, $tipo){
        $sql = $this->db->prepare("INSERT INTO historico SET total = :total, tipo = :tipo, data = NOW()");
        $sql->bindValue(":total", $total);
        $sql->bindValue(":tipo", $tipo);
        $sql->execute();

       return $this->info = $this->db->lastInsertId();
    }
    
}