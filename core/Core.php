<?php
class Core {

    public function run() {
        
        $url = '/';

        if(!empty($_GET['url'])) {
            $url .= $_GET['url'];
        }
        //Implementando rotas na estrutura MVC;
        $url = $this->checkRoutes($url);


        //Caso nenhum parâmetro seja enviado, ele já está pré-definido para ser um array vazio;
        $params = array();

        if(isset($url) && $url != '/') {

            $url = explode('/', $url);
            array_shift($url);
            //Definindo qual o controller que será acessado;
            $currentController = ucfirst($url[0]).'Controller';
            //Função que retira o primeiro elemento do array();
            array_shift($url);

            //Definindo qual a Action que será acionada. Caso o usuário não digite nada, será o prórpio 'index' do Controller correspondente;
            if(!empty($url[0]) && $url[0] != '/') {
                $currentAction = $url[0];
                array_shift($url);
                
            } else {
                $currentAction = 'index';
            }
            //Definindo os parâmetros (caso houver algum);
            if(count($url) > 0) {
                $params = $url;
            }
        } else {
            $currentController = 'HomeController';
            $currentAction = 'index';
        }

        if(!file_exists('src/controllers/'.$currentController.'.php') ||!method_exists($currentController, $currentAction)) {

            $currentController = 'NotfoundController';
            $currentAction = 'index';
        }

        $c = new $currentController();

        //Função auxiliar para executar uma função que não sabemos qual é... passamos o parâmetro da função como segundo parâmetro dela;
        call_user_func_array(array($c, $currentAction), $params);

    }

    public function checkRoutes($url) {
        global $routes;

        foreach ($routes as $pt => $newUrl) {
            
            //Identificar os elementos para substituir por expressões regulares;
            $pattern = preg_replace('(\{[a-z0-9]{1,}\})', '([a-z0-9-]{1,})', $pt);

            //Fazendo um MATCH da URL;
            if(preg_match('#^('.$pattern.')*$#i', $url, $matches) === 1) {
                array_shift($matches);
                array_shift($matches);

                // Pega todos os argumentos para associar
                $itens = array();
                if(preg_match_all('(\{[a-z0-9]{1,}\})', $pt, $m)) {
                   
                    $itens = preg_replace('(\{|\})', '', $m[0]);
                    
                }
                // Faz a associação
                $args = array();
                foreach($matches as $key => $match) {
                    $args[$itens[$key]] = $match;
                    
                }

                // Monta a nova URL;
                foreach($args as $argkey => $argvalue) {
                    $newUrl = str_replace(':'.$argkey, $argvalue, $newUrl);
                }

                $url = $newUrl;

                break;  
            }

        }

        return $url;

    }
}