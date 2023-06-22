<?php
$data = req("SELECT * FROM utilisateurs WHERE utilisateur_id = ".$_SESSION["id"].";")[0];
print_r($data);
if(isset($_GET["update_user"]) && $_GET["update_user"] === "true"){
    $collected_data = array(
        ""
    );
}
?>

Array ( [utilisateur_id] => 1 [0] => 1 [username] => alice82 [1] => alice82 [password] => 81dc9bdb52d04dc20036dbd8313ed055 [2] => 81dc9bdb52d04dc20036dbd8313ed055 [email] => [3] => [num_tel] => [4] => [role] => admin [5] => admin [nom] => Dumoulin [6] => Dumoulin [prenom] => Alice [7] => Alice [ddn] => 1982-11-26 [8] => 1982-11-26 )

<form action="" action="post">
    <input type="hidden" name="update_user" value="true">
    <div>
        <label for="username">Nom d'utilisateur</label>
        <input name="username" id="username" value="<?= $data["username"] ?>" required>
    </div>
    <div>
        <label for="role">Rôle</label>
        <select name="role" id="role">
            <?php if($data["role"] === "admin"){ ?>
                <option value="admin">Administrateur</option>
            <?php }if($data["role"] === "admin" || $data["role"] === "gerant"){ ?>
                <option value="gerant">Gérant</option>
            <?php } ?>
                <option value="user">Utilisateur</option>
        </select>
    </div>
    <div>
        <label for="nom">Nom</label>
        <input name="nom" id="nom" value="<?= $data["nom"] ?>" required>
    </div>
    <div>
        <label for="prenom">Prénom</label>
        <input name="prenom" id="prenom" value="<?= $data["prenom"] ?>" required>
    </div>
    <div>
        <label for="ddn">Date de naissance</label>
        <input type="date" name="ddn" id="ddn" value="<?= $data["ddn"] ?>" required>
    </div>
    <div>
        <label for="email">Adresse mail</label>
        <input type="mail" name="email" id="email" value="<?= $data["email"] ?>" required>
    </div>
    <div>
        <label for="num_tel">Numéro de téléphone</label>
        <input type="tel" name="num_tel" id="num_tel" value="<?= $data["num_tel"] ?>" required>
    </div>
    <div>
        <label for="password">Mot de passe</label>
        <input name="password" id="password" required>
    </div>
    <div>
        <button>Sauvegarder</button>
    </div>
</form>