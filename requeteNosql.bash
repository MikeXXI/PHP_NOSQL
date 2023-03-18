
#list des restrautants 

 $cursor = $collection->find();

#liste des  favoris par "user_id"
    $favori = $collection->find(["user_id" => $_SESSION['user_id']]);

#suppresion d'un favori par "user_id" et "restaurant_id"
   $favori =  $collection->deleteOne([("user_id" => $_SESSION['user_id']), ("restaurant_id" => new MongoDB\BSON\ObjectI($id))]);


#liste des restaurant trier par ordre alphabeique  croissant    
    $restaurent = $collection->find()->sort(["name" => 1]);

#liste des restaurant trier par ordre alphabeique  décroissant
    $restaurent = $collection->find()->sort(["name" => -1]);

#liste des restaurant trier par restaurant_id croissant
    $restaurent = $collection->find()->sort(["restaurant_id" => 1]);

#liste des restaurant trier par restaurant_id décroissant
    $restaurent = $collection->find()->sort(["restaurant_id" => -1]);

#liste des restaurant trier par ordre d’insertion croissant
    $restaurent = $collection->find()->sort(["_id" => 1]);

#liste des restaurant trier par ordre d’insertion décroissant
    $restaurent = $collection->find()->sort(["_id" => -1]);
   
#liste des restaurant trier par  type de cuisine
    $restaurent = $collection->find()->sort(["cuisine" => 1]);

#liste des restaurant trier par arrondissement
    $restaurent = $collection->find()->sort(["address.street" => 1]);

#liste des restaurant trier par code postal
    $restaurent = $collection->find()->sort(["address.zipcode" => 1]);

#insert des restaurant en favoris
    $favori = $collection->insertOne([("user_id" => $_SESSION['user_id']), ("restaurant_id" => new MongoDB\BSON\ObjectI($id))]);







    



