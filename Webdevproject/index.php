<?php

// On démarre la session AVANT d'écrire du code HTML

session_start();

// On s'amuse à créer quelques variables de session dans $_SESSION

$_SESSION['prenom'] = 'Sarah';

$_SESSION['nom'] = 'BOUMERBAA';

?>


<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php 
try {
    $bdd = new PDO ('mysql: host = localhost ; dbname=annonces; charset=utf8', 'roor','');

} catch (Exception $ex) {
    die('Erreur:' .$e->getMessage());
}



$reponse = $bdd->query('SELECT * FROM `annonces` WHERE 1');
while ($donnees = $reponse -> fetch())
{
?>
<html>
<head>
  <title>MeetBand</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap.min.css">
  <script src="jquery.min.js"></script>
  <script src="bootstrap.min.js"></script>
  <style>
      input[type="range"] {
    position: relative;
    margin-left: 1em;
}
input[type="range"]:after,
input[type="range"]:before {
    position: absolute;
    top: 1em;
    color: #aaa;
}
input[type="range"]:before {
    left:0em;
    content: attr(min);
}
input[type="range"]:after {
    right: 0em;
    content: attr(max);
}

.item h4 {
    font-size: 19px;
    line-height: 1.375em;
    font-weight: 400;
    font-style: italic;
    margin: 15px 0;
}

.item span {
    font-style: normal;
} 
  .navbar {
    padding-top: 15px;
    padding-bottom: 0px;
    border: 0;
    border-radius: 0;
    margin-bottom: 0;
    font-size: 12px;
    letter-spacing: 5px;
}

.navbar-nav li a:hover {
    color: #1abc9c !important;
} 
  
    /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
    .row.content {height: 1500px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 500px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height: auto;} 
    }
  </style>
</head>
<body>
    
   <?php
  require("../infoBDD.php");
  
   //si le mdp est correct on accède à la page d'accueil
if(isset($_POST["user"]) && isset($_POST["pass"])){

    $id = $_POST["user"];

    $pass = $_POST["pass"];
}

/*Le mot de passe n'a pas été envoyé 
if (!isset($_POST['user']) OR $_POST['pass'] )
{
	//<link rel="stylesheet" href="connexion.php">
}

else
{
	<link rel="stylesheet" href="index.php">
}*/

?> 
    
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">MeetBand</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#myPage">Accueil</a></li>
        <li><a href="#band">Profil</a></li>
        <li><a href="#tour">Chat</a></li>
        <li><a href="#contact">Menu</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3 sidenav">
    </br>
    </br>
    </br>
    </br>
    </br>
      <h4>Recherche</h4>
      </br>
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Lieu..">
        <span class="input-group-btn">
          <button class="btn btn-default" type="button">
            <span class="glyphicon-search"></span>
          </button>
        </span>
      </div>
      </br>
      
       <form>
        <label for="instruments">Instruments :</label>
    <div class="checkbox">
      <label><input type="checkbox" value="">Guitare</label>
    </div>
    <div class="checkbox">
      <label><input type="checkbox" value="">Saxophone</label>
    </div>
    <div class="checkbox ">
      <label><input type="checkbox" value="">Chant</label>
    </div>
    <div class="checkbox ">
      <label><input type="checkbox" value="">Batterie</label>
    </div>
    <div class="checkbox ">
      <label><input type="checkbox" value="">Flûte</label>
    </div>
  </form>
  
  <label for="sel1">Niveau de performance:</label>
  <input type="range" value="1" max="5" min="0" step="1"  style="width:85px">
      <br>
      
       
            </br>
            </br>
            </br>
            </br>
            <a href="#" class="btn btn-default btn-lg">
  		      <span class="glyphicon-search"></span> Search
		    </a>
            
    </div>

    <div class="col-sm-9">
    </br>
    </br>
    </br>
    </br>
    
      <h4><small>Annonces</small></h4>
      <hr>
      <h2><?php echo $donnees['titre']; ?></h2>
      
      <div class="media">
        <div class="media-left">
          <img src="img_avatar2.png" class="media-object" style="width:45px">
        </div>
        

      
      <h5><span class=" glyphicon-calendar"></span> Post by Jane Dane, Sep 27, 2018.</h5>
      <h5><span class="label label-danger">sing</span> <span class="label label-primary">voice</span></h5><br>
      <p><?php echo $donnees['contenu']; ?></p>
      <?php 
      }
      $reponse -> closeCursor();
      ?>
      
      <br><br> 
      
      <h4><small>RECENT POSTS</small></h4>
      <hr>
      <h2>Besoin d'un batteur</h2>
      
       <div class="media-left">
      <img src="img_avatar1.png" class="media-object" style="width:45px">
    </div>
    
      <h5><span class="glyphicon-calendar"></span> Post by John Doe, June 24, 2018.</h5>
      <h5><span class="label label-success">Batterie</span></h5><br>
      <p>HELP NEED un batteur dans les plus brefs delais !!!!.</p>
      <hr>
     
       <h2>Saxophoniste expérimenté</h2>
       <div class="media-left">
              <img src="img_avatar3.png" class="media-object" style="width:45px">
            </div>
      <h5><span class="glyphicon-calendar"></span> Post by John Doe, June 24, 2018.</h5>
      <h5><span class="label label-success">Saxo</span></h5><br>
      <p>Bonjour je propose mes talents en tant que saxophoniste , je dispose d'un très bon niveau</p>
 
   <input type="range" value="1" max="5" min="0" step="1"style="width:85px">
      
      <hr>

  
     
            
          </div>
        </div>
      </div>
    </div>
 

<footer class="container-fluid">
 <h2>Ce que pensent les internautes </h2>
<div id="myCarousel" class="carousel slide text-center" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
    <h4>"Excellent site!"<br><span style="font-style:normal;">Michael Roe, Vice President, Comment Box</span></h4>
    </div>
    <div class="item">
      <h4>"Un mot... WOW!!"<br><span style="font-style:normal;">John Doe, Salesman, Rep Inc</span></h4>
    </div>
    <div class="item">
      <h4>"J'ai rencontré un très bon chanteur qui est aujourd'huui l'amour de ma vie Zidane !"<br><span style="font-style:normal;">Julie , chanteuse</span></h4>
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
    <span class="fa fa-arrow-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
    <span class="fa fa-arrow-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div> 
</footer>
        
    </body>
</html>