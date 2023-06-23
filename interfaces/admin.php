Panneau à afficher : 
<form class="form_section" action="">
    <select name="section" class="select_section">
        <option value="users" <?php if($_GET["section"] === "users"){echo "selected";} ?>>Utilisateurs</option>
        <option value="confiseries" <?php if($_GET["section"] === "confiseries"){echo "selected";} ?>>Confiseries</option>
        <option value="shops" <?php if($_GET["section"] === "shops"){echo "selected";} ?>>Boutiques</option>
        <option value="adresses" <?php if($_GET["section"] === "adresses"){echo "selected";} ?>>Adresses</option>
    </select>
</form>
<script>
    document.querySelector(".select_section").addEventListener("change",e=>{
        document.querySelector(".form_section").submit();
    });
</script>
<?php 
    if(isset($_GET["section"]) && $_GET["section"] === "shops"){
        if(isset($_POST["update"])){
            if($_POST["delete"]){
                req("DELETE FROM boutiques WHERE boutique_id = '".$_POST["update"]."';");
            }else{
                $collected_data = array(
                    $id => $_POST["update"],
                    $adresse => $_POST["adresse"],
                    $gerant => $_POST["gerant"]
                );

            }
        }

        foreach(req("SELECT * FROM boutiques;") as $shop){ ?>
        <form method="post" action="dashboard?section=shops">
            <input type="hidden" name="update" value="<?= $shop["boutique_id"] ?>">
            <h3><?= $shop["nom"] ?></h3>
            <p>Adresse : 
            <select name="adresse" id="">
                <?php
                    foreach(req("SELECT * FROM adresses") as $adresse){ ?>
                        <option value="<?= $adresse["adresse_id"] ?>" <?php if($shop["adresse_id"] === $adresse["adresse_id"]){echo "selected";} ?>><?= $adresse["numero_rue"].",".$adresse["nom_adresse"]." ".$adresse["code_postal"]." ".$adresse["ville"] ?></option>
                    <?php }
                ?>
            </select> 
            </p>
            <p>Gérant :
                <select name="gerant" id="">
                <?php
                    foreach(req("SELECT * FROM utilisateurs;") as $user){
                        if($user["role"] === "gerant" || $user["role"] === "admin"){
                        ?>
                            <option value="<?= $user["utilisateur_id"] ?>" <?php if($shop["utilisateur_id"] === $user["utilisateur_id"]){echo "selected";} ?>><?= $user["username"] ?></option>
                        <?php
                        }
                    }
                ?>
                </select> 
            </p>
            <p>
                <input type="checkbox" name="delete" id="del_<?= $shop["boutique_id"] ?>">
                <label for="del_<?= $shop["boutique_id"] ?>">Supprimer cette boutique</label>
            </p>
            <button>Mettre à jour</button>
            </form>
        <?php }
    }elseif(isset($_GET["section"]) && $_GET["section"] === "confiseries"){
        
    }else{

    }
?>