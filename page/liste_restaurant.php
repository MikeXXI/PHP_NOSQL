<?php include('header.php'); ?>
<?php include('menu.php'); ?>

<body>
    <br />
    <br />
    <br />

    <?php
    $file = 'restaurants.json';
    $data = file_get_contents($file);
    $restaurant = json_decode($data);
    ?>
    <div class="restaurant_container">
        <?php for ($i = 0; $i < 10; $i++) : ?>
            <div class="restaurant_cards">
                <i class="restaurant_id"><?php echo "N°" . $restaurant[$i]->restaurant_id; ?></i>
                <div class="restaurant_cards_top">
                    <h3><?php echo $restaurant[$i]->name; ?></h3>
                    <i><?php echo $restaurant[$i]->cuisine; ?> </i>
                </div>
                <p><?php echo $restaurant[$i]->address->building . " " . $restaurant[$i]->address->street . ", " . $restaurant[$i]->address->zipcode . " - " . $restaurant[$i]->borough; ?></p>
                <button>Voir plus</button>
            </div>
        <?php endfor ?>
    </div>
</body>

</html>