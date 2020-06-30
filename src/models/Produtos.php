<?php
class Produtos extends Model {
    public $info;
    //Função pública para cadastrar um novo produto
    public function cadastrarProduto($nome, $novo_nome, $id_categoria, $unidades, $unidade_kg, $kg, $min_estoque, $preco_compra, $preco_venda, $obs) {

        $sql = $this->db->prepare("INSERT INTO produtos SET 
            nome = :nome,
            img = :novo_nome,
            id_categoria = :id_categoria,
            unidades = :unidades,
            unidade_kg = :unidade_kg,
            kg = :kg,
            min_estoque = :min_estoque,
            preco_compra = :preco_compra,
            preco_venda = :preco_venda,
            obs = :obs,
            data_cadastro = NOW()");
        $sql->bindValue(":nome", $nome);
        $sql->bindValue(":novo_nome", $novo_nome);
        $sql->bindValue(":id_categoria", $id_categoria);
        $sql->bindValue(":unidades", $unidades);
        $sql->bindValue(":unidade_kg", $unidade_kg);
        $sql->bindValue(":kg", $kg);
        $sql->bindValue(":min_estoque", $min_estoque);
        $sql->bindValue(":preco_compra", $preco_compra);
        $sql->bindValue(":preco_venda", $preco_venda);
        $sql->bindValue(":obs", $obs);
        $sql->execute();

    }

    //Funcao que vai retornar o numero de produtos cadastrados;
    public function getTotalProdutos(){
        $sql = $this->db->prepare("SELECT COUNT(*) FROM produtos");
        $sql->execute();
        return $this->info = $sql->fetch();
    }
    //Retornar o total de produtos na categoria informada;
    public function getTotalCategoria($id_categoria){
        $sql = $this->db->prepare("SELECT COUNT(*) FROM produtos WHERE id_categoria = :id_categoria");
        $sql->bindValue(":id_categoria", $id_categoria);
        $sql->execute();
        return $this->info = $sql->fetch();
    }

    //Retorna o numero de produtos na tabela de estoque minimo
    public function getTotalMinimo(){
        $sql = $this->db->prepare("SELECT COUNT(*) FROM produtos WHERE estoque_avisar = 1");
        $sql->execute();
        return $this->info = $sql->fetch();
    }

    //Função que retorna todos os produtos registrados no banco de dados em ordem alfabética e pronto para a paginação;
    public function getAll($page, $perPage) {
        $offset = ($page - 1) * $perPage;

        $sql = $this->db->prepare("SELECT * FROM produtos ORDER BY nome ASC LIMIT $offset, $perPage");
        $sql->execute();

        if($sql->rowCount() > 0) {
            $this->info = $sql->fetchAll();

        }

        return $this->info;
    }

    //Retorna todos os registros
    public function getTodos(){
        $sql = $this->db->prepare("SELECT * FROM produtos");
        $sql->execute();

        if($sql->rowCount() > 0) {
            $this->info = $sql->fetchAll();

        }
    }

    //Função que retorna um produto do banco, de acordo com o id informado;
    public function getOne($id) {
        $array = array();
        $sql = $this->db->prepare("SELECT * FROM produtos WHERE id = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();

        if($sql->rowCount() > 0) {
            $this->info = $sql->fetch();
            return $this->info;
        } else {
            return false;
        }
        
    }

    public function getByFilter($filter) {
        $sql = $this->db->prepare("SELECT * FROM produtos WHERE nome like :filter ORDER BY nome ASC");
        $sql->bindValue(":filter", "%".$filter."%");
        $sql->execute();

        if($sql->rowCount() > 0) {
            return $this->info = $sql->fetchAll();
        }
        
    }

    //Função que retorna todos os produtos da categoria informada;
    public function getPorCategoria($page, $perPage, $id_categoria) {
        $offset = ($page - 1) * $perPage;

        $sql = $this->db->prepare("SELECT * FROM produtos WHERE id_categoria = :id_categoria ORDER BY nome ASC LIMIT $offset, $perPage");
        $sql->bindValue(":id_categoria", $id_categoria);
        $sql->execute();

        if($sql->rowCount() > 0) {
            return $this->info = $sql->fetchAll();
        } else {
            return false;
        }
         
    }

    public function getId($nome) {
        $sql = $this->db->prepare("SELECT id FROM produtos WHERE nome = :nome");
        $sql->bindValue(":nome", $nome);
        $sql->execute();

        if($sql->rowCount() > 0){
            return $this->info = $sql->fetch();
        }
    }

    public function getMinimos($page, $perPage){
        $offset = ($page - 1) * $perPage;

        $sql = $this->db->prepare("SELECT * FROM produtos WHERE estoque_avisar = 1 ORDER BY nome ASC LIMIT $offset, $perPage");
        $sql->execute();

        if($sql->rowCount() > 0){
            return $this->info = $sql->fetchAll();
        }
    }

    public function updateMinimo($id, $estoque_avisar){
        $sql = $this->db->prepare("UPDATE produtos SET estoque_avisar = :estoque_avisar WHERE id =:id");
        $sql->bindValue(":estoque_avisar", $estoque_avisar);
        $sql->bindValue(":id", $id);
        $sql->execute();
    }

    public function updateProduto($id, $nome, $id_categoria, $unidades, $unidade_kg, $kg, $min_estoque, $preco_compra, $preco_venda, $obs) {

        $sql = $this->db->prepare("UPDATE produtos SET 
            nome = :nome,
            id_categoria = :id_categoria,
            unidades = :unidades,
            unidade_kg = :unidade_kg,
            kg = :kg,
            min_estoque = :min_estoque,
            preco_compra = :preco_compra,
            preco_venda = :preco_venda,
            obs = :obs WHERE id = :id");
        $sql->bindValue(":nome", $nome);
        $sql->bindValue(":id_categoria", $id_categoria);
        $sql->bindValue(":unidades", $unidades);
        $sql->bindValue(":unidade_kg", $unidade_kg);
        $sql->bindValue(":kg", $kg);
        $sql->bindValue(":min_estoque", $min_estoque);
        $sql->bindValue(":preco_compra", $preco_compra);
        $sql->bindValue(":preco_venda", $preco_venda);
        $sql->bindValue(":obs", $obs);
        $sql->bindValue(":id", $id);
        $sql->execute();
    }


    public function updateEstoque($id_produto, $unidades, $kg) {
        $sql= $this->db->prepare("UPDATE produtos SET unidades = :unidades, kg = :kg WHERE id = :id_produto");
        $sql->bindValue(":unidades", $unidades);
        $sql->bindValue(":kg", $kg);
        $sql->bindValue(":id_produto", $id_produto);
        $sql->execute();
    }

    public function deletar($id) {
        $sql = $this->db->prepare("DELETE FROM produtos WHERE id = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();
    }

    
}