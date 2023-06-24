<?php
    require_once($root . "./components/head.php");
    $boutiqueInfo = req("SELECT * FROM boutiques WHERE utilisateur_id = ".$user_data["utilisateur_id"].";")[0];
    $confiseries = req("SELECT * FROM stocks WHERE boutique_id = ".$boutiqueInfo["boutique_id"]);
    echo('<h2>Bienvenue, '.$user_data["prenom"].' '.$user_data["nom"].'</h2>');
    /* print_r($user_data); */
?>

<h3>Gérez ici votre boutique <?php echo("<span>".$boutiqueInfo["nom"]."</span>.") ?></h3>
<ul class="bonbon-liste" style="margin-top: 2.5rem">
        <?php
        foreach($confiseries as $confiserie){
            $info = req("SELECT * from confiseries WHERE confiserie_id = $confiserie[0];");
            echo('
            <li class="bonbon-type">
                <img class="bonbon-miniature" src="https://images.unsplash.com/photo-1499195333224-3ce974eecb47?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1051&q=80">
                <div class="bonbon-info">
                    <h3>'.$info[0]["nom"].'</h3 >
                    <p class="info">'.$info[0]["prix"].'€/unité</p>
                </div>
                <form class="delete" action="remove-bonbon.php?bonbon="'.$info[0]["confiserie_id"].'" method="get">
                        <button class="delete" type="submit" name="bonbon" value="'.$info[0]["confiserie_id"].'">
                </form>
            </li>
            ');
        }?>
</ul>