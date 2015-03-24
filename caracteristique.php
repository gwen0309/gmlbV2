<!DOCTYPE html>
<html lang="fr">  
    <head>
    		<meta charset="utf-8">	 
            <link rel="stylesheet" type="text/css" href="styles/general.css" media="all"> <!-- A modifier par menuhorizontal.css-->
            <link rel="stylesheet" type="text/css" href="styles/menuhorizontal.css" media="all"> 
			<link rel="stylesheet" type="text/css" href="styles/styles.css" media="all"> 
			<title> Saisie Caractéristiques Hébergement</title>	

    </head>

    <body>

        <?php 	if ($_SESSION['login'] != null)
			include("entete_deconnexion.php");
		else{		
		include("entete.php");}
		include("connexion_bdd.php");
		include("menuverticalhebergement.php");
		session_start();?>
		<nav> 
			<ul id="menu">
				<li> <a href="caracteristique.php">Gestion des hébergements</a></li>
			</ul>
		</nav>
		
        <?php 

        $query = "SELECT ID_SERVICE, NOM_SERVICE FROM SERVICE;"; 
		$result = mysqli_query($con,$query) or die ('Erreur SQL !'.$query.'<br />'. mysqli_error($query));
        ?>
        <div id="caracteristics">
                <div id="general">
                        <h3> Veuillez saisir les caractéistiques du nouvel hébergement </h3>
                        <form action="ajout_caracteristique.php" method="POST">     	
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
            while ($row = mysqli_fetch_array($result))
                {
                        echo"<input type='checkbox' name='service[]' value='{$row['ID_SERVICE']}'>"  .$row['NOM_SERVICE'];
                        echo"<br/>";
            	}
                
        // Libère la mémoire associée au résultat
		mysqli_free_result($result);
		// Fermeture de la connexion a la base de donnée
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
       </div>

    </body>
</html>