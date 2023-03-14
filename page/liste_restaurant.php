<?php include('header.php'); ?>
<?php include('menu.php'); ?>

<body>
    <?php
    $file = 'restaurants.json';
    $data = file_get_contents($file);
    $obj = json_decode($data);
    echo $obj[1]->address->building;
    ?>
</body>

</html>