<div class="flex">
    <div>
    <?php
    $boutiques = req("SELECT * FROM boutiques");
    $adresses = req("SELECT * FROM adresses");
    foreach($boutiques as $boutique){ 
        $adresse = search($adresses,"adresse_id",$adresses[$boutique["adresse_id"]]);
        print_r($adresse);
    ?>
        <a class="boutique" href="?id=<?= $boutique["boutique_id"] ?>">
            <h2><?= $boutique["nom"] ?></h2>
            <p>adresse</p>
        </a>
    <?php } ?>
    Array ( [adresse_id] => 1 [0] => 1 [numero_rue] => 343 [1] => 343 [nom_adresse] => rue guilty spark [2] => rue guilty spark [code_postal] => 16807 [3] => 16807 [ville] => Anneaux-les-bains [4] => Anneaux-les-bains [pays] => France [5] => France )
    </div>
    <div>
        CARTE
    </div>
</div>