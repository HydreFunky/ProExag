<?php
	class Membre {
		
		public $username;
		public $email;
		public $motdepasse;
		
		public function __construct($username, $email, $motdepasse) 
		{
			$this->username = $username;
			$this->email = $email;
			$this->motdepasse = $motdepasse;
		}
		
		public function register_member()
		{
			$requete = "SELECT * FROM compte WHERE email = :email";  
			$req_prep = $connexion->prepare($requete);
			$req_prep->execute(array(':email'=>$this->email));
			$resultat = $req_prep->fetchAll(); 
			$result = $resultat[0];
			
			if($result['email'] != $this->email)
			{
			include 'Class/Mysql.php';
			$stmt = $connexion->prepare("INSERT INTO compte (username, motdepasse, email) VALUES (:username, :motdepasse, :email)");
			$stmt->bindParam(':username', $this->username);
			$stmt->bindParam(':motdepasse', $this->motdepasse);
			$stmt->bindParam(':email', $this->email);
			$stmt->execute();
			return '<b>Inscription réussite, vous pouvez maintenant vous connectez <a href="?load=connexion">Se connecter</a></b>';
			}
			else
			{
				echo 'ERREUR : Adresse E-mail déjà utilisée';
			}
		}
		
		public function connexion_member()
		{
			include 'Class/Mysql.php';
			$requete = "SELECT * FROM compte WHERE email = :email";  
			$req_prep = $connexion->prepare($requete);
			$req_prep->execute(array(':email'=>$this->email));
			$resultat = $req_prep->fetchAll(); 
			$result = $resultat[0];
			
				if($this->motdepasse == $result['motdepasse'])
				{
					session_start();
					$_SESSION['email'] = $result['email'];
					$_SESSION['username'] = $result['username'];
					header('Location: index.php');
				}
				else
				{
					echo 'Mauvais login ou mot de passe';
				}
		}
	}
	