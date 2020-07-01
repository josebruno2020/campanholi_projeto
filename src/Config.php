<?php
require 'environment.php';

$config = array();

if(ENVIRONMENT == 'development') {
    define("BASE_URL", "http://localhost/campanholi_projeto/public/");
    $config['dbname'] = 'campanholi_projeto';
    $config['host'] = 'localhost';
    $config['dbuser'] = 'root';
    $config['dbpass'] = '';
} else {
    define("BASE_URL", "http://6dd8bac4cbae.ngrok.io/campanholi_projeto/public/");
    $config['dbname'] = 'campanholi_projeto';
    $config['host'] = 'localhost';
    $config['dbuser'] = 'root';
    $config['dbpass'] = '';
}

global $db;
try {

    $db = new PDO("mysql:dbname=".$config['dbname'].";host=".$config['host'], $config['dbuser'], $config['dbpass']);

}catch(PDOException $e) {
    echo "ERRO: ".$e->getMessage();
    exit;
}