<!DOCTYPE html>
<html lang="fr"> 
<head>
<meta charset="utf-8">	       
<link rel="stylesheet" href="styles.css" type="text/css" />	
<title> Saisie Caractéristiques Hébergement</title>	
</head>  

<body>

<header>
            <div id="logoCannes">
                <a href="index.php" > <img src="images/logofestival.png" alt="logoCannes"> </a>
            </div>
            
            <div id="banniere">
                <img src="images/bannerblanc.png" alt="Banner" />
            </div>
</header>

<nav> 
	<ul id="menu">
    	<li> <a href="#">Gestion des hébergements</a></li>
        <li> <a href="#"></a></li>
        <li> <a href="#"></a></li>
        <li> <a href="#"></a></li>
    </ul>
</nav>

<div>
<ul class="menu-vertical">
    <li class="mv-item"><a href="caracteristique.php">Ajouter</a></li>
    <li class="mv-item"><a href="#">Modifier</a></li>
    <li class="mv-item"><a href="lister_hebergement.php">Lister</a></li>
    <li class="mv-item"><a href="#">test4</a></li>
</ul>
</div>

<?php 

// Déclaration des paramètres de connexion
$host = "localhost";  
$user = "root";
$bdd = "filrouge";
$password  = "";

// Connexion au serveur
$con = mysqli_connect($host, $user, $password);
mysqli_select_db($con, $bdd) or die("erreur lors de la selection de la bd");
$query = "SELECT ID_SERVICE, NOM_SERVICE FROM SERVICE;"; 

?>

<div id="caracteristics">
	<div id="general">
		<h3> Veuillez saisir les caractéistiques du nouvel hébergement </h3>
		<form action="ajout_caracteristique.php" method="GET">     	
        	<h3>Caractéristiques générales</h3>
			<label>Nom de l'hébergement :</label>  <input type="text" name="nom_hebergement" required/><br/>
        	<label>Numéros de téléphone :</label>  <input type="tel" name="telephone" required/><br/>
        	<label>Nombre de places disponible :</label> <input type="number" name="capacite" required/><br/>
        	<label>Nombre d'étoile :</label> <input type="number" name="etoile" required/><br/>
        
        	<select name="type" required>
          	<option value="">-Choisir un type d'hébergement-</option>
         	<option value="hotel">Hôtel</option>
          	<option value="chambre">Chambre d'hôte</option>
          	<option value="appartement">Appartement</option>
          	<option value="villa">Villa</option>
     		</select><br/>
        	<label>RIB :</label> <input type="text" name="RIB" required/><br/>
</div>
        <br>
<div id="service">
<h3>Ajout service</h3>        
<?php
$result=mysqli_query($con,$query);
    while ($row = mysqli_fetch_array($result))
	{
		echo"<input type='checkbox' name='service[]' value='{$row['ID_SERVICE']}'>"  .$row['NOM_SERVICE'];
		echo"<br/>";
    }
	
	mysqli_free_result($result);
	mysqli_close($con);
?>
</div>
    <br>
<div id="adresse">
        <h3> Adresse de l'hébergement </h3>
        <label>Numéro de rue :</label> <input type="number" name="numero_rue" required/><br/>
        <label>Nom de la rue :</label> <input type="text" name="nom_rue" required/><br/>
        <label>Code postal :</label> <input type="number" name="CP" required/><br/>
        <label>Ville :</label> <input type="text" name="ville" required/><br/>
</div>
        <br>
<div id="contact">
        <h3> Contact de l'hébergement </h3>
        <label>Nom du contact :</label> <input type="text" name="nom_contact" required/><br/>
        <label>Prénom du contact :</label> <input type="text" name="prenom_contact" required/><br/>
        <label>Adresse mail du contact :</label> <input type="email" name="mail_contact" required/><br/>
        <label>Téléphone du contact :</label> <input type="tel" name="telephone_contact" required/><br/>
        <label><input type="submit" value="Envoyer">
        </form>
<div>
     	


</div>

</body>
</html>