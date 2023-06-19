<?php
$root = $_SERVER['DOCUMENT_ROOT'];
require_once("db.php");
require_once($root . "./components/head.php");
$user_data = user_data($_SESSION["id"]);
?>

<body>
    <header>
        <?php require_once($root . '/components/navbar.php'); ?>
    </header>
    <main>
        <div class="flex ext">
            <p>Bonjour <?= $user_data["prenom"] ?></p>
            <a href="deconnexion">Déconnexion</a>
        </div>
    </main>
    <?php require_once($root . '/components/footer.php'); ?>
</body>

</html>