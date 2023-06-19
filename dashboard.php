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
        <p>Bonjour <?= $user_data["prenom"] ?></p>
    </main>
    <?php require_once($root . '/components/footer.php'); ?>
</body>

</html>