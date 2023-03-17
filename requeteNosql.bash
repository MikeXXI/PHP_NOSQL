
#list des restrautants
db.restaurants.find()

#liste des  favoris par "user_id"
db.favoris.find({"user_id":?})

#lsuppresion d'un favori par "user_id" et "restaurant_id"
db.favoris.deleteOne({"user_id":?,"restaurant_id":?})

#liste des restaurant trier par ordre alphabeique  croissant 
db.restaurants.find().sort({"name":1})

#liste des restaurant trier par ordre alphabeique  décroissant
db.restaurants.find().sort({"name":-1})

#liste des restaurant trier par restaurant_id croissant
db.restaurants.find().sort({"restaurant_id":1})

#liste des restaurant trier par restaurant_id décroissant
db.restaurants.find().sort({"restaurant_id":-1})

#liste des restaurant trier par ordre d’insertion croissant
db.restaurants.find().sort({"_id":1})

#liste des restaurant trier par ordre d’insertion décroissant
db.restaurants.find().sort({"_id":-1})
   
#liste des restaurant trier par  type de cuisine
db.restaurants.find().sort({"cuisine":1})

#liste des restaurant trier par arrondissement
db.restaurants.find().sort({"borough":1})

#liste des restaurant trier par code postal
db.restaurants.find().sort({"address.zipcode":1})









    



