<?php
	class Exercice {
		
		public $username;
		public $exercice;
		public $score;
		
		public function __construct($username, $exercice, $score) 
		{
			$this->username = $username;
			$this->exercice = $exercice;
			$this->score = $score;
		}
		
		public function register_exercice()
		{
			include 'Class/Mysql.php';
			$stmt = $connexion->prepare("INSERT INTO resultat (username, exercice, score) VALUES (:username, :exercice, :score)");
			$stmt->bindParam(':username', $this->username);
			$stmt->bindParam(':exercice', $this->exercice);
			$stmt->bindParam(':score', $this->score);
			$stmt->execute();
		}
		
		public function statistique_exercice()
		{
			include 'Class/Mysql.php';
			$requete = "SELECT * FROM resultat WHERE username = :username ORDER BY score DESC limit 0,2";  
			$req_prep = $connexion->prepare($requete);
			$req_prep->execute(array(':username'=>$this->username));
			while ($donnees = $req_prep->fetch())
			echo 'Exercice N°'.$donnees['exercice'].' Score : '.$donnees['score'].'<br>';
		}
	}
	