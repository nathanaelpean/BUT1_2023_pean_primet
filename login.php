<?php
$root = $_SERVER['DOCUMENT_ROOT'];
require_once($root . "./components/head.php");
?>

<body>
    <header>
        <?php require_once($root . '/components/navbar.php'); ?>
    </header>
    <main>
        <form method="post" action="verif_connexion.php">
            <div>
                <label for="id">Identifiant</label>
                <input id="id" type="text" name="username" requiered>
            </div>
            <div>
                <label for="mdp">Mot de passe</label>
                <input id="mdp" type="password" name="password">
            </div>
            <div>
                <button class="fill">Se connecter</button>
                <a href="javascript:alert('Dommage !')">Mot de passe oublié ?</a>
            </div>
        </form>
    </main>
    <?php require_once($root . '/components/footer.php'); ?>
</body>

</html>