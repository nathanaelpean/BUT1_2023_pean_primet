<?php

require_once("db.php");

$user = $_POST["username"];
$mdp = $_POST["password"];

$infolog = check_login($user, $mdp);

if ($infolog != 0){
    session_start();
    $_SESSION["loggedin"] = true;
    $_SESSION["id"] = $infolog["utilisateur_id"];
    $_SESSION["username"] = $infolog["username"];
    $_SESSION["role"] = $infolog["role"];
    echo("id : ".$_SESSION["id"]." <br>username : ".$_SESSION["username"]);
    header("location: dashboard");
    exit();
}else{
    echo"<form id='form' method='post' action='login'><input type='hidden' name='username' value='$user'><input type='hidden' name='password' value='$mdp'></form>";
    echo "<script>document.querySelector('#form').submit();</script>";
}


?>