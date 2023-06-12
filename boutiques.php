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
            if(isset($_GET["id"])){
                if(in_array($_GET["id"],req("SELECT boutique_id FROM boutiques"))){
                    require_once("boutique.php");
                }else{
                    require_once("404-frame.php");
                }
            }else{
                require_once("boutiques-liste.php");
            }
        ?>
    </main>
    <?php require_once($root . '/components/footer.php'); ?>
</body>

</html>