<?php

const DB_DRIVER = 'mysql'; // pgsql pour les machines IUT, mysql si machine perso avec wamp, xamp, mamp
const DB_HOST = 'localhost'; // servbdd.iutlan.etu.univ-rennes1.fr pour les machines IUT, localhost si machine perso
const DB_PORT = 3306; // 5433 pour les machines IUT, 3306 pour machine perso, 8889 pour mac
const DB_USERNAME = 'root'; // votre login linux pour les machines IUT, root pour wamp, xamp, mamp
const DB_PASSWORD = ''; // votre mdp linux pour les machines IUT, rien pour wamp, xamp et root pour mamp
const DB_DATABASE = 'confiz'; // pg_VOTRELOGIN pour les machines IUT, le nom de votre base sinon

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

function req($sql){
    global $PDO;
    $stmt = $PDO->query($sql);
    return $stmt->fetchAll();
}

function check_login($user, $mdp){
    $tab = req("SELECT * FROM utilisateurs WHERE username = '$user'");
    if (md5($mdp) === $tab[0]["password"]){
        return $tab[0];
    }
    else{
        return 0;
    }
}

function search($array,$param,$value){
    echo "Array : ";
    print_r($array);
    echo "<br>Param : ";
    print_r($param);
    echo "<br>Valeur : ";
    print_r($value);

    foreach($array as $line){
        if($line[$param] === $value){
            return $line;
            break;
        }else{
            return null;
        }
    }
}
