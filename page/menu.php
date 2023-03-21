<div class="navigation">
    <div class="nav-container">
        <div class="brand">
            <a href="index.php">Logo</a>
        </div>
        <nav>
            <div class="nav-mobile"><a id="nav-toggle" href="#!"><span></span></a></div>
            <ul class="nav-list">
                <li>
                    <a href="index.php">Restaurants</a>
                </li>
                <li>
                    <a href="favori.php">Favoris</a>
                </li>
                <li>
                    <?php
                    if (isset($_SESSION['user_id'])) {
                        echo '<a href="deconnexion.php">Deconnexion</a>';
                    } else {
                        echo '<a href="connexion.php">Connexion</a>';
                    }
                    ?>
                </li>
            </ul>
        </nav>
    </div>
</div>