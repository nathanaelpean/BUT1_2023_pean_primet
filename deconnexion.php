<?php
$root = $_SERVER['DOCUMENT_ROOT'];
require_once($root . "./components/head.php");
$user_data = user_data($_SESSION["id"]);
$_SESSION["loggedin"] = false;
$_SESSION["id"] = null;
$_SESSION["username"] = null;
$_SESSION["role"] = null;
header("location: ./");
?>