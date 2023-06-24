<?php 
     $id = $_GET["id"];
     $boutique = req("SELECT * FROM boutiques WHERE boutique_id = $id ;")[0];
     $stock = req("SELECT * FROM stocks WHERE boutique_id = $id ;")[0];
     $confiseries = req("SELECT confiserie_id FROM stocks WHERE boutique_id = $id;");
    ?>


        <div class="boutique-card">
            <h2><?= $boutique["nom"] ?></h2>
            <p class="info">
                <?php
                if(count($confiseries) > 1){
                    echo(count($confiseries)." confiseries disponibles");
                }
                else{
                    echo (count($confiseries)." confiserie disponible");
                }
                ?>
            </p>
            <a class="boutique-action">Aller à la boutique</a>
        </div>
        <ul class="bonbon-liste">
        <?php
        foreach($confiseries as $confiserie){
            $info = req("SELECT * from confiseries WHERE confiserie_id = $confiserie[confiserie_id];");
            echo('
            <li class="bonbon-type">
                <img class="bonbon-miniature" src="https://images.unsplash.com/photo-1499195333224-3ce974eecb47?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1051&q=80">
                <div class="bonbon-info">
                    <h3>'.$info[0]["nom"].'</h3 >
                    <p class="info">'.$info[0]["prix"].'€/unité</p>
                </div>
            </li>
            ');
        }?>
        </ul>
        </div>