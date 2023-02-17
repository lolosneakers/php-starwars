<?php

$bdd = new PDO('mysql:host=localhost;dbname=starwars', 'root', 'root');

$result = $bdd->query("DELETE FROM planets");


?>
<!DOCTYPE html> 
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Comfortaa">
    
    <title>Starwars Info</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>

  <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">StarWars Info</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Accueil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Planete Aléatoire</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Espece Aléatoire</a>
        </li>
      </ul>
      <span class="navbar-text">
        1er sur les informations StarWars.
      </span>
    </div>
  </div>
</nav>
  <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <div class="allsite">
<br>
    <div class="planet">
        <div class="container text-center">
            <br>
            <h2>Planètes</h2>
            <br>
        <div class="row">

        <?php 

        // FETCH API PLANET 

        for ($i=1; $i <= 2; $i++) { //6 D'ORIGINE

            $url_planet = "https://swapi.dev/api/planets/?page=".$i; 
            $ch = curl_init();  
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
            curl_setopt($ch, CURLOPT_URL, $url_planet); 
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            
            $result = curl_exec($ch);
            $planets = json_decode($result, true);
            
            
            foreach($planets["results"] as $planete) {


                ?> 
                <div class="col">
            <div class="card">
                <img src="https://img.planete-starwars.com/upload/databank/75964-jedha.png" class="card-img-top" alt="Photo de la planete">
                <div class="card-body">
                     <h5 class="card-title"><?php print $planete["name"]; ?></h5>
                     <p class="card-text"> Diamètre : <?php print $planete["diameter"];?> km3 <br>
                     Population : <?php print $planete["population"];?>.</p>
                     <a href="#" class="btn btn-primary">En savoir plus</a>
                </div>
            </div>
            </div>
                <?php } }?>


        </div>
    </div>

    <br>

    <div class="espece">
        <div class="container text-center">
            <h2>Espèces</h2>
            <br>
        <div class="row">
           <?php 

        // FETCH API ESPECE 

        for ($i=1; $i <= 2; $i++) {

            $url_species = "https://swapi.dev/api/species/?page=".$i; 
            $ch = curl_init();  
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
            curl_setopt($ch, CURLOPT_URL, $url_species); 
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            
            $result = curl_exec($ch);
            $especes = json_decode($result, true);
            
            
            foreach($especes["results"] as $espece) {


                ?> 
                <div class="col">
            <div class="card">
                <img src="https://static.tvtropes.org/pmwiki/pub/images/the_mandalorian_1.jpg" class="card-img-top" alt="Photo de l'espece">
                <div class="card-body">
                     <h5 class="card-title"><?php print $espece["name"]; ?></h5>
                     <p class="card-text"> Type : <?php print $espece["classification"];?>.<br>
                     Taille moyenne : <?php print $espece["average_height"];?>cm</p>
                     <a href="#" class="btn btn-primary">En savoir plus</a>
                </div>
            </div>
            </div>

                <?php } }?>

        </div>
    </div>

    <br>

    <div class="film">
        <div class="container text-center">
            <h2>Films</h2>
            <br>
        <div class="row">
            <?php 

        // FETCH API FILM 

        for ($i=1; $i <= 1; $i++) {

            $url_film = "https://swapi.dev/api/films/?page=".$i; 
            $ch = curl_init();  
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
            curl_setopt($ch, CURLOPT_URL, $url_film); 
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            
            $result_film = curl_exec($ch);
            $films = json_decode($result_film, true);
            
            
            foreach($films["results"] as $film) {


                ?> 
                <div class="col">
            <div class="card">
                <img src="..." class="card-img-top" alt="Photo de l'espece">
                <div class="card-body">
                     <h5 class="card-title"><?php print $film["title"]; ?></h5>
                     <p class="card-text"> Episode : <?php print $film["episode_id"];?>de la saga.<br>
                     Sortie en : <?php print $film["release_date"];?>.</p>
                     <a href="#" class="btn btn-primary">En savoir plus</a>
                </div>
            </div>
            </div>

                <?php } }?>

            

        </div>
    </div>
    </div>

    <br>
    

  </body>
</html>