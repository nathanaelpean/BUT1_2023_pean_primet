Panneau à afficher : 
<form class="form_section" action="">
    <select name="section" class="select_section">
        <option value="users">Utilisateurs</option>
        <option value="confiseries">Confiseries</option>
        <option value="shops">Boutiques</option>
    </select>
</form>
<script>
    document.querySelector(".select_section").addEventListener("change",e=>{
        document.querySelector(".form_section").submit();
    });
</script>
<?php 
    if(isset($_GET["section"]) && $_GET["section"] === "shops"){
        $shops = req("SELECT * FROM boutiques;");
        foreach($shops as $shop){ ?>
        <form>
            <h3><?= $shop["nom"] ?></h3>
            <p>Adresse : 
            <?php
                $adresse = req("SELECT * FROM adresses WHERE adresse_id = '".$shop["adresse_id"]."';")[0];
                print_r($adresse);
            ?>
            </p>
            <p>Gérant :
                <?php
                    $gerant = req("SELECT username FROM utilisateurs WHERE utilisateur_id = '".$shop["utilisateur_id"]."';")[0];
                    print_r($gerant);
                ?>
                <select name="gerant" id="">
                <?php
                    foreach(req("SELECT username FROM utilisateurs;") as $user){
                        echo $user["role"];
                        // if($user["role"] === "gerant" || $user["role"] === "admin"){
                        //  ?>
                        <!--    <option value="<?= $user["utilisateur_id"] ?>"><?= $user["username"] ?></option>
                            <?php -->
                        // }
                    }
                ?>
                </select> 
            </p>
            </form>
        <?php }
    }elseif(isset($_GET["section"]) && $_GET["section"] === "confiseries"){
        
    }else{

    }
?>