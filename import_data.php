<?php

$bdd = new PDO('mysql:host=localhost;dbname=starwars', 'root', 'root');


//$result = $bdd->query("DELETE FROM planet");
//$result = $bdd->query("DELETE FROM film");
//$result = $bdd->query("DELETE FROM espece");

// PLANET

for ($i=1; $i <= 6; $i++) {

$url_planet = "https://swapi.dev/api/planets/?page=".$i; 
$ch = curl_init();  
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
curl_setopt($ch, CURLOPT_URL, $url_planet); 
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

$result = curl_exec($ch);
$planets = json_decode($result, true);


foreach($planets["results"] as $planete) {
    $planete_name = $planete["name"];
    $planete_diameter = $planete["diameter"];
    $planete_population = $planete["population"];
            $bdd->exec("INSERT INTO planet(nom, diametre,population) VALUES ('$planete_name','$planete_diameter','$planete_population')");
    }
}

// FILM 

for ($i=1; $i <= 1; $i++) {

    $url_film = "https://swapi.dev/api/films/?page=".$i; 
    $ch = curl_init();  
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
    curl_setopt($ch, CURLOPT_URL, $url_film); 
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    
    $result_film = curl_exec($ch);
    $films = json_decode($result_film, true);
    
    
    foreach($films["results"] as $film) {
        $film_name = $film["title"];
        $film_numero = $film["episode_id"];
        $film_desc = $film["opening_crawl"];
                $bdd->exec("INSERT INTO film(nom_film, numero_film, desc_film) VALUES ('$film_name','$film_numero','$film_desc')");
        }
    }

    for ($i=1; $i <= 4; $i++) {

        $url_species = "https://swapi.dev/api/species/?page=".$i; 
        $ch = curl_init();  
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
        curl_setopt($ch, CURLOPT_URL, $url_species); 
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        
        $result = curl_exec($ch);
        $especes = json_decode($result, true);
        
        
        foreach($especes["results"] as $espece) {
            $espece_name = $espece["name"];
            $espece_class = $espece["classification"];
            $espece_taille = $espece["average_height"];

                    $bdd->exec("INSERT INTO espece(nom_esp, classification, taille) VALUES ('$espece_name','$espece_class','$espece_taille')");
            }
        }
    
    

?>


