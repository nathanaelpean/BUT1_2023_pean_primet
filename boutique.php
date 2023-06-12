<?php
$root = $_SERVER['DOCUMENT_ROOT'];
require_once($root . "./components/head.php");
?>

<body>
    <header>
        <?php require_once($root . '/components/navbar.php'); ?>
    </header>
    <main>
        <div class="boutique card">
            <h2>Nom de la marque</h2>
            <p class="boutique info">3 confiseries disponibles</p>
            <a class="boutique action">Aller à la boutique</a>
        </div>
        <ul class="bonbon liste">
            <li class="bonbon type">
                <img class="bonbon miniature" src="https://images.unsplash.com/photo-1499195333224-3ce974eecb47?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1051&q=80">
                <div class="bonbon info">
                    <h2>Dragicamion</h2>
                    <p class="info">6.5euros/unité</p>
                </div>
            </li>
        </ul>
    </main>
    <?php require_once($root . '/components/footer.php'); ?>
</body>

</html>