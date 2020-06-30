<?php
class Categorias extends Model {
    public $info;
    public function getCategorias() {
        
        $sql = $this->db->query("SELECT * FROM categorias");

        if($sql->rowCount() > 0) {
            $this->info = $sql->fetchAll();

        }
        return $this->info;
    }

    public function getCategoriasProduto($id_categoria){
        $sql = $this->db->prepare("SELECT nome FROM categorias WHERE id = :id_categoria");
        $sql->bindValue(":id_categoria", $id_categoria);
        $sql->execute();

        return $this->info['nome'] = $sql->fetch();
    }

    public function cadastrar($nome) {
        $sql = $this->db->prepare("INSERT INTO categorias SET nome = :nome, data = NOW()");
        $sql->bindValue(":nome", $nome);
        $sql->execute();
        
    }
}