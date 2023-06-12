<style>
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
    }
</style>

<?php

require_once("db.php");
$test = req("SELECT * FROM utilisateurs");

echo ("<table>");
foreach ($test as $t){
    echo("<tr>");
    echo ("<td>".$t["utilisateur_id"]."</td>");
    echo ("<td>".$t["username"]."</td>");
    echo ("<td>".$t["password"]."</td>");
    echo ("<td>".$t["email"]."</td>");
    echo ("<td>".$t["num_tel"]."</td>");
    echo ("<td>".$t["role"]."</td>");
    echo ("<td>".$t["nom"]."</td>");
    echo ("<td>".$t["prenom"]."</td>");
    echo ("<td>".$t["ddn"]."</td>");
    echo("</tr>");
}
echo ("</table>");

?>