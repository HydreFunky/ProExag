<div class="jumbotron">

<?php if (isset($_POST['clicks']))
{
	$username = $_SESSION['username'];
	$exercice = 1;
	$score = $_POST['clicks'];
	$Resultat = new Exercice($username, $exercice, $score);
	$Resultat->register_exercice();
}
?>
Exercice 2
</div>
</body></html>

</div>
