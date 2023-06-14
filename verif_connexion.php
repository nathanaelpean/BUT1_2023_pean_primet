<?php

require_once("db.php")

$usr = $_POST["username"];
$mdp = $_POST["password"];

$a = check_login($usr, $mdp);

if ($a != 0){
    session_start();
    $_SESSION["loggedin"] = true;
    $_SESSION["id"] = $a["id"];
    $_SESSION["username"] = $a["username"];
    echo("id : ".$_SESSION["id"]." <br>username : ".$_SESSION["username"]);
    
    // header("location: ".MON_URL_SERVER."/index.php");
}


?>