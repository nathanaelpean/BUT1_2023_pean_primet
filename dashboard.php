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
            <?php if($_SESSION["role"] === "admin" || $_SESSION["role"] === "gerant"){ ?>
                Vue : 
                <form class="form_view" action="">
                    <select name="view" class="select_view">
                        <?php if($_SESSION["role"] === "admin"){ ?>
                            <option value="admin">Administrateur</option>
                        <?php } ?>
                        <option value="gerant" <?php if(isset($_GET["view"]) && $_GET["view"] == "gerant" || $_SESSION["role"] === "gerant"){echo "selected";} ?>>Gérant</option>
                        <option value="user" <?php if(isset($_GET["view"]) && $_GET["view"] == "user"){echo "selected";} ?>>Utilisateur</option>
                    </select>
                </form>
                <script>
                    document.querySelector(".select_view").addEventListener("change",e=>{
                        document.querySelector(".form_view").submit();
                    });
                </script>
            <?php } ?>
            <a href="deconnexion">Déconnexion</a>
        </div>
        <div style="padding-top: 2.5rem">
            <?php
                if(isset($_GET["view"])){
                    if($_GET["view"] == "admin" && $_SESSION["role"] == "admin"){
                        require_once("./interfaces/admin.php");
                    }elseif($_GET["view"] == "gerant" && ($_SESSION["role"] == "admin" || $_SESSION["role"] == "gerant")){
                        require_once("./interfaces/gerant.php");
                    }else{
                        require_once("./interfaces/user.php");
                    }
                }else{
                    if($_SESSION["role"] == "admin"){
                        require_once("./interfaces/admin.php");
                    }elseif($_SESSION["role"] == "gerant"){
                        require_once("./interfaces/gerant.php");
                    }else{
                        require_once("./interfaces/user.php");
                    }
                }
            ?>
        </div>
    </main>
    <?php require_once($root . '/components/footer.php'); ?>
</body>

</html>