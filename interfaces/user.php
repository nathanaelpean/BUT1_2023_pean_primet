<?php
$data = req("SELECT * FROM utilisateurs WHERE utilisateur_id = ".$_SESSION["id"].";")[0];
if(isset($_POST["update_user"]) && $_POST["update_user"] === "true"){
    $id = $_SESSION["id"];
    $collected_data = array(
        "username" => $_POST["username"],
        "role" => $_POST["role"],
        "nom" => $_POST["nom"],
        "prenom" => $_POST["prenom"],
        "ddn" => $_POST["ddn"],
        "email" => $_POST["email"],
        "num_tel" => $_POST["num_tel"],
        "password" => md5($_POST["password"])
    );
    foreach($collected_data as $key=>$value){
        if($value == ""){
            $value = null;
        }
        if(req("SELECT $key FROM utilisateurs WHERE utilisateur_id = '$id';")[0][$key] !== $value){
            req("UPDATE utilisateurs SET $key='$value' WHERE utilisateur_id=$id;");
        }
    }
    echo '<script>window.location.href=window.location.href;</script>';
}
?>

<form action="" method="post">
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
        <input name="nom" id="nom" value="<?= $data["nom"] ?>">
    </div>
    <div>
        <label for="prenom">Prénom</label>
        <input name="prenom" id="prenom" value="<?= $data["prenom"] ?>">
    </div>
    <div>
        <label for="ddn">Date de naissance</label>
        <input type="date" name="ddn" id="ddn" value="<?= $data["ddn"] ?>">
    </div>
    <div>
        <label for="email">Adresse mail</label>
        <input type="mail" name="email" id="email" value="<?= $data["email"] ?>">
    </div>
    <div>
        <label for="num_tel">Numéro de téléphone</label>
        <input type="tel" name="num_tel" id="num_tel" value="<?= $data["num_tel"] ?>">
    </div>
    <div>
        <label for="password">Mot de passe</label>
        <input name="password" id="password">
    </div>
    <div>
        <button>Sauvegarder</button>
    </div>
</form>