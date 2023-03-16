<?php
     $client   =   new   MongoDB\Client  (  'mongodb://mongodb-deployment:27017'  ); 
    $collection = (new MongoDB\Client)->test->restaurants;
    $cursor = $collection->find();
    foreach ($cursor as $document) {
        echo $document["name"] . "\n";
    }

    //     $manager = new MongoDB\Driver\Manager("mongodb://mongo:27017");

// $manager = new MongoDB\Driver\Manager("mongodb://mongodb:27017");
//     $query = new MongoDB\Driver\Query([]);
//     $rows = $manager->executeQuery('tests.restaurants', $query);
//     foreach ($rows as $row) {
//         echo $row->name, "\n";
//     }
?>

