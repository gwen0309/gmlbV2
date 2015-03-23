<?php

// Déclaration des paramètres de connexion
$host = "localhost";
$user = "root";
$bdd = "filrouge";
$password  = "";

// Connexion au serveur
$con = mysqli_connect($host, $user, $password);
mysqli_select_db($con, $bdd) or die("erreur lors de la selection de la bd");

	if(isset($_POST) && !empty($_POST['login']) && !empty($_POST['password'])) {
	  extract($_POST);
	  // on recupère le password de la table qui correspond au login du visiteur
	  $sql = "select PASSWORD from UTILISATEUR where login='".$login."';";
	  $req = mysqli_query($con, $sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());

	   $data = $req->fetch_assoc();
	//$i = 1 (initialisation) si la connexion est OK
	 
	  if($data['PASSWORD'] != $password) {
		echo '<p>Mauvais login / password. Merci de recommencer</p>';
		//include('login.php'); On inclut le formulaire d'identification pour que l'utilisateur puisse tenter de se reconnecter
		exit;
	  }
	  else {
		session_start();
		$_SESSION['login'] = $login;
			header('Location:menuappli.php');
		
		// ici vous pouvez afficher un lien pour renvoyer
		// vers la page d'accueil de votre espace membres 
	  }    
	}
	else {
	  echo '<p>Vous avez oublié de remplir un champ.</p>';
	  header ('location : login.php');
	  exit;
	}
?>