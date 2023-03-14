<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="../style.css">

    <title>Tp NO SQL</title>

</head>

<body>
    <?php
    $json = file_get_contents('restaurants.json');
    $data = json_decode($json, true);
    include('menu.php');
    ?>
    <br><br><br>
    <?php
    echo "Restaurants : ".$data. "<br>"; ?>
</body>

</html>