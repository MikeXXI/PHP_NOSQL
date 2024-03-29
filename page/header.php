<?php
if(session_status() == PHP_SESSION_NONE){
  session_start ();  
}
/* Vérifier si la session est déjà démarrée ou non.
Sinon, il démarrera la session. */

// Inclure le fichier `vendor/autoload.php` qui permet d'utiliser les classes de MongoDB.
require 'vendor/autoload.php';
// Connexion à la base de données version PROD (docker)
$client = new MongoDB\Client("mongodb://root:secret@mongodb:27017");
// Connexion à la base de données version DEV (local)
// $client = new MongoDB\Client("mongodb://localhost:27017");
/* Il crée une variable appelée `$db` et lui attribue la base de données `tests`. */
$db=$client->tests;?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
<head>
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
  <!-- MDB -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="style.css">
  <title>Tp NO SQL</title>
  <?php 
  // Inclure le fichier menu.php qui correspond au menu de notre site.
  include('menu.php'); 
  ?>
</head>
</br></br></br>

