<?php
$root = $_SERVER['DOCUMENT_ROOT'];
require_once($root . "./components/head.php");
?>

<body>
    <header>
        <?php require_once($root . '/components/navbar.php'); ?>
    </header>
    <main>
        <center>
            <h1>404</h1>
            <p>Vous avez découvert une page qui n'existe pas, bravo !</p>
        </center>
    </main>
    <?php require_once($root . '/components/footer.php'); ?>
</body>

</html>