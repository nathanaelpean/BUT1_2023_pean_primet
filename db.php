<?php

require_once("constants.php");
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

try {
    $PDO = new PDO(
        DB_DRIVER . ':host=' . DB_HOST . ';dbname=' . DB_DATABASE . ';port=' . DB_PORT,
        DB_USERNAME,
        DB_PASSWORD
    );
} catch (Exception $ex) {
    echo ($ex->getMessage());
    die;
}

/*
* requete() est une fonction basique pour interroger la base de donnée définie au dessus.
* Il vous est demandé d'utiliser les fonctions préparées avec PDO, voir la doc officielle
* donc cette fonction ne sera pas suffisante, vous devrez en créer d'autres plus pertinentes.
*/

function requete($sql){
    global $PDO;
    $stmt = $PDO->query($sql);
    return $stmt->fetchAll();
}