<?php

require 'vendor/autoload.php';

$client = new MongoDB\Client("mongodb://localhost:27017");

$db=$client->tests;

$restaurants = $db->restaurants;
$liste = $restaurants->find();
    foreach ($liste as $document) {
        echo $document["name"] . "\n";
    }

    //  $client   =   new   MongoDB\Client  (  'mongodb://root:secret@mongodb:27017/?authSource=rest_nosql'  ); 
    // $collection = (new MongoDB\Client)->rest_nosql->restaurants;
    // $cursor = $collection->find();
    // foreach ($cursor as $document) {
    //     echo $document["name"] . "\n";
    // }

    //     $manager = new MongoDB\Driver\Manager("mongodb://mongo:27017");

    // $manager = new MongoDB\Driver\Manager( 'mongodb://root:secret@mongodb:27017/?authSource=rest_nosql ');
    // $query = new MongoDB\Driver\Query([]);
    // $rows = $manager->executeQuery('rest_nosql.restaurants', $query);
    // foreach ($rows as $row) {
    //     echo $row->name, "\n";
    // }
    

// $manager = new MongoDB\Driver\Manager("mongodb://mongodb:27017");

// $collection = new MongoDB\Client;
//     $collection = $collection->tests->restaurants;
//     $cursor = $collection->find();
//     foreach ($cursor as $document) {
//         echo $document["name"] . "\n";
//     }
?>

