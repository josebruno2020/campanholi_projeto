<?php 
class UsuariosController extends Controller {

    public function __construct() {
        $usuarios = new Usuarios();

        if($usuarios->isLogged() == false) {
            header("Location: ".BASE_URL."login");
        }
    }
    
    public function index() {
        $categorias = new Categorias();
        $categorias->getCategorias();
        $usuarios = new Usuarios();
        $usuarios->getAll();
        $usuario = new Usuarios();
        $usuario->getOne($_SESSION['lgusuario']);

        $this->loadTemplate('usuarios-listar', [
            'categorias' => $categorias,
            'usuarios' => $usuarios,
            'usuario' => $usuario
        ]);


    }
    public function cadastrar() {
        $usuario = new Usuarios();
        $usuario->getOne($_SESSION['lgusuario']);
        $flash = '';
        if(isset($_SESSION['flash'])) {
            $flash = $_SESSION['flash'];
            $_SESSION['flash'] = '';
        }
        $categorias = new Categorias();
        $categorias->getCategorias();
        $this->loadTemplate('usuarios-cadastrar', [
            'categorias' => $categorias,
            'flash' => $flash,
            'usuario' => $usuario
        ]);
    }
    public function action() {
        $nome = filter_input(INPUT_POST, 'nome');
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $senha = filter_input(INPUT_POST, 'senha');
        $tel = filter_input(INPUT_POST, 'tel');

        if($nome && $email && $senha) {
            $usuarios = new Usuarios();
            $usuarios->cadastrar($nome, $email, $senha, $tel);
            header("Location: ".BASE_URL."usuarios/cadastrar");
            $_SESSION['flash'] = 'Usuário cadastrado com sucesso!';

        } else {
            header("Location: ".BASE_URL."usuarios/cadastrar");
            $_SESSION['flash'] = 'Preencha os campos obrigatórios';
        }

    }

    public function listar($id){
        $usuario = new Usuarios();
        $usuario->getOne($_SESSION['lgusuario']);
        $categorias = new Categorias();
        $categorias->getCategorias();
        $flash = '';
        if(isset($_SESSION['flash'])) {
            $flash = $_SESSION['flash'];
            $_SESSION['flash'] = '';
        }
        $this->loadTemplate('usuarios-atualizar', [
            'usuario' => $usuario,
            'flash' => $flash,
            'categorias' =>$categorias
        ]);
    }

    public function atualizar($id){
        $usuarios = new Usuarios();
        $nome = filter_input(INPUT_POST, 'nome');
        $tel = filter_input(INPUT_POST, 'tel');
        $senha1 = filter_input(INPUT_POST, 'senha1');
        $senha2 = filter_input(INPUT_POST, 'senha2');
        

        if(!empty($senha1)){
            if($senha1 == $senha2){
                $usuarios->atualizarSenha($id, $senha1);
                
            } else {
                header("Location: ".BASE_URL."usuarios/listar/".$id);
                $_SESSION['flash'] = 'As senhas devem ser iguais!';

            }
        }

        
        $usuarios->atualizar($id, $nome, $tel);
        header("Location: ".BASE_URL."usuarios/listar/".$id);
        $_SESSION['flash'] = 'Usuário atualizado com sucesso!';
            
         

        

    }

    public function deletar($id) {
        $usuarios = new Usuarios();
        $usuarios->deletar($id);
        header("Location: ".BASE_URL."usuarios/");
    }

    
}