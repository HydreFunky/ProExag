<?php if (isset($_POST['email']))
{
	$username = NULL;
	$email = $_POST['email'];
	$motdepasse = md5($_POST['motdepasse']);
	
	$Membre = new Membre($username, $email, $motdepasse);
	echo $Membre->connexion_member();
}
?>
<div class="jumbotron">
<form method="POST">
  <div class="form-group">
    <label for="exampleInputEmail1">Adresse E-mail</label>
    <input type="email" name="email" class="form-control" placeholder="Email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Mot de passe</label>
    <input type="password" name="motdepasse" class="form-control" placeholder="Password">
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>
</div>