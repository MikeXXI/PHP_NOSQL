<?php include('header.php'); ?>
<?php include('menu.php'); ?>



<body>

    <?php
    // if(isset($_POST["restaurant_id"])){
    // $delete_resto = $db->favori->deleteOne([
    //     "user_id" => $_SESSION['user_id'],
    //     "favori" => $_POST['restaurant_id'],
    // ]);
    // echo "Ce restaurant a été supprimé de vos favoris";
    // }
    ?>

    <br />
    <br />
    <br />

    <?php
    if (isset($_SESSION['user_id'])) {
        if (isset($_POST['selection'])) {
            if ($_POST["selection"] == "nameasc") {
                $_SESSION["selecttri"] = "nameasc";
                $liste_restaurant = $db->restaurants->find(array(), array('limit' => 100, 'sort' => array("name" => 1)));
            } elseif ($_POST["selection"] == "namedesc") {
                $_SESSION["selecttri"] = "namedesc";
                $liste_restaurant = $db->restaurants->find(array(), array('limit' => 100, 'sort' => array("name" => -1)));
            } elseif ($_POST["selection"] == "restaurant_idasc") {
                $_SESSION["selecttri"] = "restaurant_idasc";
                $liste_restaurant = $db->restaurants->find(array(), array('limit' => 100, 'sort' => array("restaurant_id" => 1)));
            } elseif ($_POST["selection"] == "restaurant_iddesc") {
                $_SESSION["selecttri"] = "restaurant_iddesc";
                $liste_restaurant = $db->restaurants->find(array(), array('limit' => 100, 'sort' => array("restaurant_id" => -1)));
            } elseif ($_POST["selection"] == "cuisine") {
                $_SESSION["selecttri"] = "cuisine";
                $liste_restaurant = $db->restaurants->find(array(), array('limit' => 100, 'sort' => array("cuisine" => 1)));
            } elseif ($_POST["selection"] == "borought") {
                $_SESSION["selecttri"] = "borought";
                $liste_restaurant = $db->restaurants->find(array(), array('limit' => 100, 'sort' => array("borough" => 1)));
            } elseif ($_POST["selection"] == "zipcode") {
                $_SESSION["selecttri"] = "zipcode";
                $liste_restaurant = $db->restaurants->find(array(), array('limit' => 100, 'sort' => array("address.zipcode" => 1)));
            }
        } else {
            $liste_restaurant = $db->restaurants->find(array(), array('limit' => 100));
        }

    ?>
        <form method="POST" action="" name="formtri">
            <select onchange="formtri.submit()" name="selection" style="position:left; max-width: 150px; max-height: 50px;">
                <option value="nameasc" <?php if (isset($_SESSION["selecttri"]) && $_SESSION["selecttri"] == "nameasc") {
                                            echo 'selected="selected"';
                                        } else {
                                            echo "";
                                        } ?>>Nom (croissant)</option>
                <option value="namedesc" <?php if (isset($_SESSION["selecttri"]) && $_SESSION["selecttri"] == "namedesc") {
                                                echo 'selected="selected"';
                                            } else {
                                                echo "";
                                            } ?>>Nom (décroissant)</option>
                <option value="restaurant_idasc" <?php if (isset($_SESSION["selecttri"]) && $_SESSION["selecttri"] == "restaurant_idasc") {
                                                        echo 'selected="selected"';
                                                    } else {
                                                        echo "";
                                                    } ?>>ID (croissant)</option>
                <option value="restaurant_iddesc" <?php if (isset($_SESSION["selecttri"]) && $_SESSION["selecttri"] == "restaurant_iddesc") {
                                                        echo 'selected="selected"';
                                                    } else {
                                                        echo "";
                                                    } ?>>ID (décroissant)</option>
                <option value="cuisine" <?php if (isset($_SESSION["selecttri"]) && $_SESSION["selecttri"] == "cuisine") {
                                            echo 'selected="selected"';
                                        } else {
                                            echo "";
                                        } ?>>Cuisine</option>
                <option value="borought" <?php if (isset($_SESSION["selecttri"]) && $_SESSION["selecttri"] == "borought") {
                                                echo 'selected="selected"';
                                            } else {
                                                echo "";
                                            } ?>>Arrondissement</option>
                <option value="zipcode" <?php if (isset($_SESSION["selecttri"]) && $_SESSION["selecttri"] == "zipcode") {
                                            echo 'selected="selected"';
                                        } else {
                                            echo "";
                                        } ?>>Code Postal</option>
            </select>
        </form>
        <div class="restaurant_container">
            <?php foreach ($liste_restaurant as $restaurant) {
                echo '
                <form action="favori.php" method="POST">
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
                        <button type="submit">Ajouter dans vos favoris ♥</button>
                        </form>
                    </div>                    
                ';
            }
        } else {
            ?>

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
                                            <!-- <a href="inscription.php"><button class="btn btn-outline-light btn-lg px-5">Inscription</button></a> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </body>
        <?php
        }

        ?>
        </div>
</body>

</html>