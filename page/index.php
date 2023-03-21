<?php include('header.php'); ?>
<?php include('menu.php'); ?>



<body>

    <?php
    // $manager = new MongoDB\Driver\Manager("mongodb://root:secret@mongo:27017/?authSource=rest_nosql");
    // $query = new MongoDB\Driver\Query([]);
    // $rows = $manager->executeQuery('rest_nosql.restaurants', $query);
    // foreach ($rows as $row) {
    //     echo $row->name, "\n";
    // }
    ?>

    <br />
    <br />
    <br />

    <?php
    if (isset($_SESSION['user_id'])) {
        $liste_restaurant = $db->restaurants->find(array(), array('limit' => 100));
        if (isset($_POST['selection'])) {
            if ($_POST["selection"] == "nameasc") {
                $_SESSION["selecttri"] = "nameasc";
                $liste_restaurant = $db->restaurants->find(array(), array('limit' => 100, 'sort' => array("name" => 1)));
            } elseif ($_POST["selection"] == "namedesc") {
                $_SESSION["selecttri"] = "namedesc";
                $liste_restaurant = $db->restaurants->find(array(), array('limit' => 100, 'sort' => array("name" => -1)));
            } elseif ($_POST["selection"] == "restaurant_id") {
                $_SESSION["selecttri"] = "restaurant_id";
                $liste_restaurant = $db->restaurants->find(array(), array('limit' => 100, 'sort' => array("restaurant_id" => 1)));
            } elseif ($_POST["selection"] == "cuisine") {
                $_SESSION["selecttri"] = "cuisine";
                $liste_restaurant = $db->restaurants->find(array(), array('limit' => 100, 'sort' => array("cuisine" => 1)));
            } elseif ($_POST["selection"] == "zipcode") {
                $_SESSION["selecttri"] = "zipcode";
                $liste_restaurant = $db->restaurants->find(array(), array('limit' => 100, 'sort' => array("address.zipcode" => 1)));
            }
        }
    ?>
        <form method="POST" action="" name="formtri">
            <select onchange="formtri.submit()" name="selection" style="position:left; max-width: 150px; max-height: 50px;">
                <option value="nameasc" <?php if ($_SESSION["selecttri"] == "nameasc") {
                                            echo 'selected="selected"';
                                        } else {
                                            echo "";
                                        } ?>>Nom croissant</option>
                <option value="namedesc" <?php if ($_SESSION["selecttri"] == "namedesc") {
                                                echo 'selected="selected"';
                                            } else {
                                                echo "";
                                            } ?>>Nom décroissant</option>
                <option value="restaurant_id" <?php if ($_SESSION["selecttri"] == "restaurant_id") {
                                                    echo 'selected="selected"';
                                                } else {
                                                    echo "";
                                                } ?>>ID</option>
                <option value="cuisine" <?php if ($_SESSION["selecttri"] == "cuisine") {
                                            echo 'selected="selected"';
                                        } else {
                                            echo "";
                                        } ?>>Cuisine</option>
                <option value="zipcode" <?php if ($_SESSION["selecttri"] == "zipcode") {
                                            echo 'selected="selected"';
                                        } else {
                                            echo "";
                                        } ?>>Code Postal</option>
            </select>
        </form>

        <?php echo $_SESSION["selecttri"]; ?>
        <div class="restaurant_container">
            <?php foreach ($liste_restaurant as $restaurant) {
                echo '
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
                
                <button>Ajouter dans vos favoris ♥</button>
            </div>';
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
                                            <a href="inscription.php"><button class="btn btn-outline-light btn-lg px-5">Inscription</button></a>
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
<script>
    var select = document.getElementById("tri");

    select.addEventListener("change", function() {
        var selectedValue = this.value;
        console.log(selectedValue);

        var xhr = new XMLHttpRequest();
        xhr.open("POST", "changetri()", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        xhr.send(selectedValue);
    });
</script>

</html>