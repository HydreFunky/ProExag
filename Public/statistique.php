<div class="jumbotron">
<b>Affichage des deux meilleurs scores de vos exercices</b>
<br>
       <?php
	$username = $_SESSION['username'];
	$exercice = Null;
	$score = Null;
	$Resultat = new Exercice($username, $exercice, $score);
	echo $Resultat->statistique_exercice();
			?>
		
</div>