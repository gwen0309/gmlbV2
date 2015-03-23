<!DOCTYPE html>
<html lang="fr"> 
    <head>
        <meta charset="utf-8">	       
        <link rel="stylesheet" type="text/css" href="general.css" media="all">
        <link rel="stylesheet" type="text/css" href="menuvertical.css" media="all">
        <link rel="stylesheet" type="text/css" href="styles.css" media="all"> <!-- Qui sera a supprimer-->         	
        <script type="text/javascript" src="scripts/calendrier.js"></script>
		<script type="text/javascript" src="scripts/ProjectionJS.js"></script>

         <title> Saisi Projection</title>	
    </head>  

    <body>

            <?php include("entete.php");?>
            <?php include("menuappli.php");?>

    <?php 
    $host = "localhost";  
    $user = "root";
    $bdd = "filrouge";
    $password  = "";

    $con = mysqli_connect($host, $user,$password) or die("erreur de connexion au serveur");
    mysqli_select_db($con, $bdd) or die("erreur de connexion a la base de donnees");
	
	  $queryfilms = "SELECT NOM_FILM, ID_FILM FROM films WHERE id_film <> ALL (SELECT ID_FILM FROM juger)";
	  $resultfilms=mysqli_query($con,$queryfilms);
	  
	$queryjury = "SELECT N__JURY, count(id_film) AS NB_FILM FROM jury j inner join juger jj on j.id_individu = jj.id_individu where j.id_individu = jj.id_individu group by j.id_individu  ";
	$resultjury=mysqli_query($con,$queryjury);
	
	$p=0;
	while($array = mysqli_fetch_array($resultfilms)){
    $Nomf[$p] = $array['NOM_FILM'];
	$idf[$p] = $array['ID_FILM'];
    $p++;
    }
	
	$r=0;
	while($array2 = mysqli_fetch_array($resultjury)){
    $Numj[$r] = $array2['N__JURY'];
	$nbfilm[$r] = $array2['NB_FILM'];
    $r++;
    }
	?>
	<div id="caracteristics">
    <div id="general">
	<form method='post' action='ajouter_jury.php' > 

    <label>Nom des film qui n'ont pas jury associé :</label> 
    <select name='film' required >"
    <?php
    for($o =0; $o< $p ;$o++){
             echo "<option value='$idf[$o]'>$Nomf[$o]</option>";
    }?>
    </select></br>

    <label>Numèro de jury disponible :</label> 
    <select name='jury'  >
    <?php
    for($e =0; $e< $r ;$e++){
             echo "<option value='$Numj[$e]'>Jury $Numj[$e] avec $nbfilm[$e] films à juger</option>";
    }?>
    </select></br>
	
    <input type='submit' value='Ajouter'>
	<input type="button" value="Annuler" onclick="location.href='ajout_projection.php'" />
    </div>
    </div>
	
	    </form>
    </body>
</html>