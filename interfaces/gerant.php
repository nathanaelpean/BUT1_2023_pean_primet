<?php
    require_once($root . "./components/head.php");
    $boutiqueInfo = req("SELECT * FROM boutiques WHERE utilisateur_id = ".$user_data["utilisateur_id"].";")[0];
    $confiseries = req("SELECT * FROM stocks WHERE boutique_id = ".$boutiqueInfo["boutique_id"]);
    $bonbons = req("SELECT * FROM confiseries");
    echo('<h2>Bienvenue, '.$user_data["prenom"].' '.$user_data["nom"].'</h2>');
    /* print_r($user_data); */
?>

<h3>Gérez ici votre boutique <?php echo("<span>".$boutiqueInfo["nom"]."</span>.") ?></h3>
<form class="add flex" action="">
    <select>
        <?php
            foreach($bonbons as $bonbon){
                $infobonbon = req("SELECT * from confiseries WHERE confiserie_id = $bonbon[0];");
                print_r($bonbon[0]);
                echo('<option value="'.$infobonbon[0]["confiserie_id"].'">'.$infobonbon[0]["nom"].'</option>');
            }
        ?>
    </select>
    <button type="submit">Ajouter</button>
</form>
<ul class="bonbon-liste" style="margin-top: 2.5rem">
        <?php
        foreach($confiseries as $confiserie){
            $infoconf = req("SELECT * from confiseries WHERE confiserie_id = $confiserie[0];");
            echo('
            <li class="bonbon-type">
                <img class="bonbon-miniature" src="https://images.unsplash.com/photo-1499195333224-3ce974eecb47?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1051&q=80">
                <div class="bonbon-info">
                    <h3>'.$infoconf[0]["nom"].'</h3 >
                    <p class="info">'.$infoconf[0]["prix"].'€/unité</p>
                </div>
                <form class="delete" action="remove-bonbon.php?bonbon="'.$infoconf[0]["confiserie_id"].'" method="get">
                        <button class="delete" type="submit" name="bonbon" value="'.$infoconf[0]["confiserie_id"].'">
                </form>
            </li>
            ');
        }?>
</ul>