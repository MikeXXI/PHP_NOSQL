<?php include('header.php'); ?>
<?php include('menu.php'); ?>

<body>

    <?php
    // $verif_resto = $db->favori->findOne([
    //     "user_id" => $_SESSION['user_id'],
    //     "favori" => $_POST['restaurant_id'],
    // ]);
    // if ($verif_resto != null) {
        $favori = $db->favori->insertOne([
            "user_id" => $_SESSION['user_id'],
            "favori" => $_POST['restaurant_id'],
        ]);
    // } else{
    // echo "Ce restaurant est déjà dans vos favoris";
    // }
    ?>

    <br />
    <br />
    <br />

    <?php
    if (isset($_SESSION['user_id'])) {

    ?>
        <div class="restaurant_container">
        <?php
        $liste_fav = $db->favori->find(["user_id" => $_SESSION['user_id']]);
        foreach ($liste_fav as $recup_fav) {
            $liste_restaurant = $db->restaurants->find(["restaurant_id" => $recup_fav["favori"]]);
            foreach ($liste_restaurant as $restaurant) {
                echo '
                <form action="index.php" method="POST">
                    <div class="restaurant_cards">
                        <i class="restaurant_id">N° ' . $restaurant["restaurant_id"] . '</i>
                        <div class="restaurant_cards_top">
                            <h3>' . $restaurant["name"] . '</h3>
                             <i>' . $restaurant["cuisine"] . '</i>
                        </div>
                        <p><a href="https://www.google.com/maps/place/' . $restaurant["address"]["building"] .
                    '+' . $restaurant["address"]["street"] .
                    '+' . $restaurant["address"]["zipcode"] .
                    '+' . $restaurant["borough"] .
                    '"> ' . $restaurant["address"]["building"] .
                    ' ' . $restaurant["address"]["street"] .
                    ' ' . $restaurant["address"]["zipcode"] .
                    ' ' . $restaurant["borough"] . ' </a></p>
                            <input type="hidden" id="restaurant_id" name="restaurant_id" value=' . $restaurant["restaurant_id"] . ' />                
                        <button type="submit">Supprimer de vos favoris</button>
                        </form>
                    </div>                    
                ';
            }
        }
    } else {
        echo '
            <body>
            <br />
            <section class="gradient-custom" style="width: 100%;">
                <div class="container py-5">
                    <div class="row d-flex justify-content-center align-items-center">
                        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                            <div class="card bg-dark text-white" style="border-radius: 1rem;">
                                <div class="card-body p-5 text-center">
                                    <div class="mb-md-5 mt-md-4 pb-5">
                                        <h2 class="fw-bold mb-2 text-uppercase">Access Denied</h2>
                                        <p class="text-white-50 mb-5">Il est nécessaire de vous connectez pour accèder à notre site !</p>                                        
                                        <a href="connexion.php"><button class="btn btn-outline-light btn-lg px-5">Connexion</button></a>
                                        <a href="inscription.php"><button class="btn btn-outline-light btn-lg px-5">Inscription</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </body>';
    }
        ?>
        </div>
</body>

</html>