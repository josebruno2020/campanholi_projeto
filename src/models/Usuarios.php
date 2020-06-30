<?php
class Usuarios extends Model {
    public $info;
    
    public function isLogged() {
        if(empty($_SESSION['lgusuario'])) {
            return false;
        } else {
            return true;
        }
    }

    public function fazerLogin($email, $senha) {
        
        $sql = $this->db->prepare("SELECT * FROM usuarios WHERE email = :email");
        $sql->bindValue(":email", $email);
        $sql->execute();

        if($sql->rowCount() > 0) {
            $row = $sql->fetch();
            
            if(password_verify($senha, $row['senha'])) {
                $_SESSION['lgusuario'] = $row['id'];
                return true;
            }
        } else {
            return false;
        }
    }

    public function getAll(){
        $sql = $this->db->prepare("SELECT * FROM usuarios");
        $sql->execute();

        if($sql->rowCount() > 0) {
            $this->info = $sql->fetchAll();
        }
        return $this->info;
    }

    public function getOne($id){
        $sql = $this->db->prepare("SELECT * FROM usuarios WHERE id = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();

        if($sql->rowCount()>0) {
            return $this->info = $sql->fetch();
        }
    }

    public function cadastrar($nome, $email, $senha, $tel) {
        $hash = password_hash($senha, PASSWORD_DEFAULT);
        $sql = $this->db->prepare("INSERT INTO usuarios SET nome = :nome, email = :email, senha = :senha, tel = :tel");
        $sql->bindValue(":nome", $nome);
        $sql->bindValue(":email", $email);
        $sql->bindValue(":senha", $hash);
        $sql->bindValue(":tel", $tel);
        $sql->execute();
    }

    public function atualizar($id, $nome, $tel) {
        $sql = $this->db->prepare("UPDATE usuarios SET nome = :nome, tel = :tel WHERE id = :id");
        $sql->bindValue(":nome", $nome);
        $sql->bindValue(":tel", $tel);
        $sql->bindValue(":id", $id);
        $sql->execute();
    }

    public function atualizarSenha($id, $senha) {
        $hash = password_hash($senha, PASSWORD_DEFAULT);
        $sql = $this->db->prepare("UPDATE usuarios SET senha = :senha WHERE id = :id");
        $sql->bindValue(":senha", $hash);
        $sql->bindValue(":id", $id);
        $sql->execute();
    }

    public function deletar($id) {
        $sql = $this->db->prepare("DELETE FROM usuarios WHERE id = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();
    }

}