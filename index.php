<?php
$root = $_SERVER['DOCUMENT_ROOT'];
require_once($root . "./components/head.php");
?>

<body>
    <header>
        <?php require_once($root . '/components/navbar.php'); ?>
    </header>
    <main>
        <div class="form-compact">
            <form action="/boutiques" method="get">
                <div class="box">
                    <legend>titre</legend>
                    <input type="text" name="search" required>
                </div>
            </form>
        </div>
    </main>
    <?php require_once($root . '/components/footer.php'); ?>
</body>

</html>