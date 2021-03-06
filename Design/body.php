<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>ProExag - Entrainement E-Sport</title>
	
    <link href="/Style/boostrap.min.css" rel="stylesheet">
    <link href="/Style/proexag.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
  </head>

  <body>

    <div class="container">

      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">ProExag</a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
			<?php
			if (isset($_SESSION['username']))
			{
				if($_SESSION['username'] == TRUE)
				{
					echo '<li><a href="index.php">Accueil</a></li>
				  <li><a href="?load=training">Entrainement</a></li>
				  <li><a href="?load=statistique">Statistique</a></li>
				  <li><a href="?load=deconnexion">Déconnexion</a></li>';
				}
			}
			else
			{
				echo '<li><a href="index.php">Accueil</a></li>
              <li><a href="?load=register">Inscription</a></li>
              <li><a href="?load=connexion">Connexion</a></li>';
			}

			?>
            </ul>
          </div>
        </div>
      </nav>