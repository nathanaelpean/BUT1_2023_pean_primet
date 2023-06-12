<div class="flex">
    <div>
    <?php
    $boutiques = req("SELECT * FROM boutiques");
    $adresses = req("SELECT * FROM adresses");

    foreach($boutiques as $id -> $infos){ ?>
        <a class="boutique" href="?id=<?= $id ?>">
            <p><?php print_r($value) ?></p>
        </a>
    <?php } ?>
    </div>
    <div>
        CARTE
    </div>
</div>