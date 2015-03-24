<!DOCTYPE html>
<?php
session_start();
?>
<html lang="fr"> 
    <head>
        <meta charset="utf-8">	       
        <link rel="stylesheet" type="text/css" href="general.css" media="all">
        <link rel="stylesheet" type="text/css" href="menuvertical.css" media="all">
        <link rel="stylesheet" type="text/css" href="menuhorizontal.css" media="all">
        <link rel="stylesheet" type="text/css" href="styles.css" media="all"> <!-- Qui sera a supprimer-->         	
        <script type="text/javascript" src="scripts/calendrier.js"></script>
		<script type="text/javascript" src="scripts/ProjectionJS.js"></script>

         <title> Saisie Projection</title>	
    </head>  

    <body>
		<?php include("date_festival.php");?>
        <?php //include("menuappli.php");?>

    <?php 
    $host = "localhost";  
    $user = "root";
    $bdd = "filrouge";
    $password  = "";

    $con = mysqli_connect($host, $user,$password) or die("erreur de connexion au serveur");
    mysqli_select_db($con, $bdd) or die("erreur de connexion a la base de donnees");
	
	$val=$_POST['value'];
	
	if($val=="ratatouille")
	{
		echo'<script>alert("Selectionnez une projection"); document.location.href="planning.php";</script>';
		exit;
	}
	
		
	$query= "SELECT NOM_FILM, NOM_SALLE, DATE_DEBUT_PROJECTION, DATE_FIN_PROJECTION FROM projeter p INNER JOIN films f ON f.ID_FILM = p.ID_FILM INNER JOIN salle s ON s.ID_SALLE = p.ID_SALLE WHERE ID_PROJECTION = '$val'";
    $result = mysqli_query($con, $query);

	while($array = mysqli_fetch_array($result)){
    $Noms[0] = $array['NOM_SALLE'];
    $Nomf[0] = $array['NOM_FILM'];
    $ddeb[0] = $array['DATE_DEBUT_PROJECTION'];
    $dfin[0] = $array['DATE_FIN_PROJECTION'];
    }
	?>
	 <div id="caracteristics">
    <div id="general">
	<label>Nom du film : <?php echo $Noms[0]; ?></label> </br>
	<label>Nom de salle : <?php echo $Nomf[0]; ?></label> </br>
	<label>Date et heure debut : <?php echo $ddeb[0]; ?></label> </br>
	<label>Date et heure fin: <?php echo $dfin[0]; ?></label> </br>
		
	<form action='supprimer_proj.php' method="POST" > 
	<input type='submit' value='Supprimer'/>
	<?php echo "<input type='hidden' name='ids' value='$val'/>";?>
	</form>

	<form action='modif_proj.php' method="POST"  > 
	<input type='submit' value='Modifier'/>
	<?php echo "<input type='hidden' name='ids' value='$val'/>"; ?>
	</form>

	</div>
    </div>

    </form>
    </body>
</html>