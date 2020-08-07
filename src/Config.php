<?php
require 'environment.php';

$config = array();

if(ENVIRONMENT == 'development') {
    define("BASE_URL", "http://localhost/campanholi_projeto/");
    $config['dbname'] = 'campanholi_projeto';
    $config['host'] = 'localhost';
    $config['dbuser'] = 'root';
    $config['dbpass'] = '';
} else {
    define("BASE_URL", "http://www.autoiluminacao.com.br/");
    $config['dbname'] = 'autoil56_campanholi';
    $config['host'] = '127.0.0.1';
    $config['dbuser'] = 'autoil56_campanholi';
    $config['dbpass'] = 'campanholi500';
}

global $db;
try {

    $db = new PDO("mysql:dbname=".$config['dbname'].";host=".$config['host'], $config['dbuser'], $config['dbpass']);

}catch(PDOException $e) {
    echo "ERRO: ".$e->getMessage();
    exit;
}