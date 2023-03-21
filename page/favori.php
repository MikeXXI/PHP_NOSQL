<?php include('header.php'); ?>
<?php include('menu.php'); ?>

<body>

    <?php
    
    ?>

    <br />
    <br />
    <br />

    <?php
    if (isset($_SESSION['user_id']))
    {
      
    ?>
    <div class="restaurant_container">    
        <?php 
        $liste_restaurant = $db->favori->findOne(["user_id" => $_SESSION['user_id']]);
        var_dump($liste_restaurant);
        foreach ($liste_restaurant as $restaurant){
            
            echo'
            <div class="restaurant_cards">
                <i class="restaurant_id">N° '.$restaurant["favori"].'</i>
                <div class="restaurant_cards_top">
                    <h3>'.$restaurant["favori"]["name"].'</h3>
                    <i>'.$restaurant["favori"]["cuisine"].'</i>
                </div>
                <p>'.$restaurant["favori"]["address"]["building"].
                ' '.$restaurant["favori"]["address"]["street"].
                ', '.$restaurant["favori"]["address"]["zipcode"].
                ' - '.$restaurant["favori"]["borough"].'</p>
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