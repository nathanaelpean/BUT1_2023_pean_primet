<?php
$root = $_SERVER['DOCUMENT_ROOT'];
require_once($root . "./components/head.php");
if($_SESSION["loggedin"]){
    header("location: dashboard");
    exit();
}
?>

<body>
    <header>
        <?php require_once($root . '/components/navbar.php'); ?>
    </header>
    <main>
        <form method="post" action="verif_connexion.php">
            <div>
                <label for="id">Identifiant</label>
                <input id="id" type="text" name="username" value="<?php if(isset($_POST["username"])){echo $_POST["username"];} ?>" requiered>
            </div>
            <div>
                <label for="mdp">Mot de passe</label>
                <input id="mdp" type="password" name="password" value="<?php if(isset($_POST["password"])){echo $_POST["password"];} ?>">
            </div>
            <div>
                <?php if(isset($_POST["username"])){echo "<span class='verif-info-login'>Vérifiez vos identifiants de connexion<span>";} ?>
                <button class="fill">Se connecter</button>
                <a href="javascript:alert('Dommage !')">Mot de passe oublié ?</a>
            </div>
        </form>
    </main>
    <?php require_once($root . '/components/footer.php'); ?>
</body>

</html>