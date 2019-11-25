<html>
	<head>
		<title>Netflix</title>
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
		crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./style.css">
  </head>
	<body>
		<section class="jumbotron text-center">
		  <div class="container">	
		    <h1>
          <?php
            $site = "Bonsoir";
            echo $site;
          ?>
        </h1>
		    <p class="lead text-muted">Description</p>
		  </div>
	  </section>
		
		<div id="demo" class="carousel slide" data-ride="carousel">

  <!-- Indicators -->
    <ul class="carousel-indicators">
      <li data-target="#demo" data-slide-to="0" class="active"></li>
    </ul>

  <!-- The slideshow -->
      <div class="carousel-inner">
        <div class="carousel-item active">
          <center><img width="1000" height="600" src="https://vivrebordeaux.fr/wp-content/uploads/2019/03/cap-cinema-Montauban-sd-1604074501-S-6436B.jpg" alt="Los Angeles"></center>
        </div>
      </div>

  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
      </a>
      <a class="carousel-control-next" href="#demo" data-slide="next">
        <span class="carousel-control-next-icon"></span>
      </a>

    </div>

    <br>

		<div class="container">
			<div class="row">
      <?php

function card($titre, $image, $description) {
  echo "<div class=\"col-lg-4 col-sm-12 col-md-6\">
    <div class=\"card\">
      <img class=\"card-img-top\" src=\"$image\" alt=\"Card image\">
      <div class=\"card-body\">
        <h4 class=\"card-title\">$titre</h4>
        <p class=\"card-text\">$description</p>
      <a href=\"#\" class=\"btn btn-primary\">Voir</a>
    </div>
    </div>
  </div>";
}

// listes films
$film1 = [
  "titre" => "Joker",
  "image" => "https://resize-parismatch.lanmedia.fr/r/625,844,center-middle,ffffff/img/var/news/storage/images/paris-match/culture/cinema/joker-de-todd-philips-la-critique-1651634/26950048-1-fre-FR/Joker-de-Todd-Philips-la-critique.jpg",
  "description" => "description"
];

$film2 = [
  "titre" => "Gemini Man",
  "image" => "http://fr.web.img2.acsta.net/pictures/19/09/06/09/24/1577721.jpg",
  "description" => "description"
];

$film3 = [
  "titre" => "Avengers",
  "image" => "http://fr.web.img3.acsta.net/r_1280_720/pictures/18/04/05/16/25/3438394.jpg",
  "description" => "description"
];

// Connexion sql
require("parametres.php");

$dbh = new PDO ("mysql:host=$host; dbname=$dbname", $login, $password);

// index.php?annee=
if (array_key_exists ("annee", $_GET)) {
  $annee = $_GET["annee"];
  $req = $dbh -> prepare("SELECT * FROM film WHERE annee = :annee");
  $req -> bindParam(":annee", $annee);
  $req -> execute();
  $films = $req;
}

else {
  $req = $dbh -> query("SELECT * FROM film");
  $films = $req;
}

// generateur de cards
foreach ($films as $element) {
  card($element["titre"], $element["image"], $element["description"]);
}

?>
      </div> 
    </div>

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	
	</body>
  </html>