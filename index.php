<?php
session_start();
require 'src/Config.php';
require 'src/routes.php';

//Um autoload para indentificar em qual pasta estará nossa classe; Controllers, models ou Core;
spl_autoload_register(function($c) {
    if(file_exists('src/controllers/'.$c.'.php')) {
        
        require 'src/controllers/'.$c.'.php';
    } 
    
    else if (file_exists('src/models/'.$c.'.php')) {
        
        require 'src/models/'.$c.'.php';

    } 
    
    else if(file_exists('core/'.$c.'.php')) {
        require 'core/'.$c.'.php';
    }
}); 

$core = new Core();
$core->run();

