<?php include('header.php'); ?>
<?php include('menu.php'); ?>

<body>

    <?php
    // $manager = new MongoDB\Driver\Manager("mongodb://root:secret@0.0.0.0:27017/?authSource=rest_nosql");
    // $query = new MongoDB\Driver\Query([]);
    // $rows = $manager->executeQuery('rest_nosql.restaurants', $query);
    // foreach ($rows as $row) {
    //     echo $row->name, "\n";
    // }
    $_SESSION['user_id'] = 0;
    ?>

    <br />
    <br />
    <br />

    <?php
    if (isset($_SESSION['user_id']))
    {
    $user_id = $_SESSION['user_id'];
    $file = 'favori.json';
    $data = file_get_contents($file);
    $restaurant = json_decode($data);
    

    
    ?>
    <div class="restaurant_container">
    <select id=tri style="position:left; max-width: 150px; max-height: 50px;">
            <option value="nameasc">Nom croissant</option>
            <option value="namedesc">Nom décroissant</option>
            <option value="restaurant_id">ID</option>
            <option value="cuisine">Cuisine</option>
            <option value="zipcode">Code Postal</option>
        </select>
        <?php for ($i = 0; $i < 2; $i++){
            echo'
            <div class="restaurant_cards">
                <i class="restaurant_id">N° '.$restaurant[$user_id]->favori[$i]->restaurant_id.'</i>
                <div class="restaurant_cards_top">
                    <h3>'.$restaurant[$user_id]->favori[$i]->name.'</h3>
                    <i>'.$restaurant[$user_id]->favori[$i]->cuisine.'</i>
                </div>
                <p>'.$restaurant[$user_id]->favori[$i]->address->building.' '.$restaurant[$user_id]->favori[$i]->address->street.', '.$restaurant[$user_id]->favori[$i]->address->zipcode.' - '.$restaurant[$user_id]->favori[$i]->borough.'</p>
                <button>Supprimer de vos favoris</button>
            </div>';
        } }else{
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

</html>