<?php
$root = $_SERVER['DOCUMENT_ROOT'];
require_once($root . "./components/head.php");
?>

<body>
    <header>
        <?php require_once($root . '/components/navbar.php'); ?>
    </header>
    <main>
        <?php
            if(isset($_GET["id"]) && in_array($_GET["id"],req("SELECT boutique_id FROM boutiques"))){

            }else{
                
            }
        ?>
    </main>
    <?php require_once($root . '/components/footer.php'); ?>
</body>

</html>