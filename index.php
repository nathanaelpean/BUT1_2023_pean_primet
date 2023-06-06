<?php
$root = $_SERVER['DOCUMENT_ROOT'];
require_once($root . "./components/head.php");
?>

<body>
    <header>
        <?php require_once($root . '/components/navbar.php'); ?>
    </header>
    <main>
        <div class="flex">
            <div>
                <img src="./cdn/svg/logo-3col.svg" width="100%">
                <div class="form-compact">
                    <form action="/boutiques" method="get">
                        <div class="box">
                            <legend>Recherchez une boutique</legend>
                            <input type="text" name="q" required>
                            <button class="search"></button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="image img-index">

            </div>
        </div>
    </main>
    <?php require_once($root . '/components/footer.php'); ?>
</body>

</html>