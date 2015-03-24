<!DOCTYPE html>
<html lang="fr"> 
    <head>
        <meta charset="utf-8">	       
        <link rel="stylesheet" type="text/css" href="styles/general.css" media="all">
        <link rel="stylesheet" type="text/css" href="styles/menuvertical.css" media="all">
        <link rel="stylesheet" type="text/css" href="styles/styles.css" media="all"> <!-- Qui sera a supprimer-->         	
        <script type="text/javascript" src="scripts/calendrier.js"></script>
		<script type="text/javascript" src="scripts/ProjectionJS.js"></script>

         <title> Saisi Projection</title>	
    </head>  

    <body>

            <?php 
            include("entete_deconnexion.php");
            include("connexion_bdd.php");
            session_start();
			?>

    <?php 
    $host = "localhost";  
    $user = "root";
    $bdd = "filrouge";
    $password  = "";

    $con = mysqli_connect($host, $user,$password) or die("erreur de connexion au serveur");
    mysqli_select_db($con, $bdd) or die("erreur de connexion a la base de donnees");
	
	  $queryfilms = "SELECT NOM_FILM, ID_FILM FROM films WHERE id_film <> ALL (SELECT ID_FILM FROM juger)";
	  $resultfilms=mysqli_query($con, $queryfilms);
	  
	$queryjury = "SELECT DISTINCT N__JURY, count(id_film) AS NB_FILM FROM jury j INNER JOIN juger jj ON j.id_individu = jj.id_individu WHERE j.id_individu = jj.id_individu GROUP BY j.id_individu  ";
	$resultjury=mysqli_query($con, $queryjury)or die(mysql_error());
	
	$p=0;
	while($array = mysqli_fetch_array($resultfilms)){
    $Nomf[$p] = $array['NOM_FILM'];
	$idf[$p] = $array['ID_FILM'];
    $p++;
	}
	
	$nbr =  mysqli_num_rows($resultjury);
 
	if ($nbr != 0){ 
		$r=0;
		while($array3 = mysqli_fetch_array($resultjury)){
		$Numj[$r] = $array3['N__JURY'];
		$nbfilm[$r] = $array3['NB_FILM'];	
		$r++;
		}
		$s=$r;
		$queryjury2 = "SELECT DISTINCT N__JURY FROM jury j  ";
		$resultjury2=mysqli_query($con, $queryjury2);
		while($array2 = mysqli_fetch_array($resultjury2)){
			$test=0;
			for($t=0;$t<$r;$t++){
				if($Numj[$t]==$array2['N__JURY']){
					$test++;
				}
			}
			if($test==0){
			$Numj[$s] = $array2['N__JURY'];
			$s++;
			}
		}
		
	}else if($nbr == 0)
	{
		$s=0;
		$queryjury2 = "SELECT DISTINCT N__JURY FROM jury j  ";
		$resultjury2=mysqli_query($con, $queryjury2);
		while($array2 = mysqli_fetch_array($resultjury2)){
			$Numj[$s] = $array2['N__JURY'];
			$s++;
		}		
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
    for($e =0; $e< $s ;$e++){
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