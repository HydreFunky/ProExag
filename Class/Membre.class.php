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
			include 'Class/Mysql.php';
			$requete = $sql->query('SELECT email, username FROM compte');  
			while($result = $requete->fetch())
			if($result['email'] == $this->email OR $result['username'] == $this->username)
			{
				echo 'ERREUR : Adresse E-mail ou Nom d\'utilisateur déjà utilisée ';
			}
			else
			{
				include 'Class/Mysql.php';
				$stmt = $sql->prepare("INSERT INTO compte (username, motdepasse, email) VALUES (:username, :motdepasse, :email)");
				$stmt->bindParam(':username', $this->username);
				$stmt->bindParam(':motdepasse', $this->motdepasse);
				$stmt->bindParam(':email', $this->email);
				$stmt->execute();
				return '<b>Inscription réussite, vous pouvez maintenant vous connectez <a href="?load=connexion">Se connecter</a></b>';
			}
		}
		
		public function connexion_member()
		{
			include 'Class/Mysql.php';
			$requete = "SELECT * FROM compte WHERE email = :email";  
			$req_prep = $sql->prepare($requete);
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
	