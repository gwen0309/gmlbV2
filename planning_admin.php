
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="styles/general.css" media="all">
<link rel="stylesheet" type="text/css" href="styles/styles.css" media="all">
<link rel="stylesheet" type="text/css" href="styles/menuhorizontal.css" media="all">
		
  <script type="text/javascript" src="scripts/jquery.min.js"></script> 	
  <script type="text/javascript" src="scripts/ProjectionJS.js"></script>  
  <link rel="stylesheet" href="styles/StylesProj.css" type="text/css" />
<title>Planning des projections</title>
           
</head>

<body>
 
  <?php 
  include("connexion.php");	
if ($_SESSION['login'] != null)
			include("entete_deconnexion.php");
		else
			include("entete.php");
		
		include("menuverticalprojection.php");
		include("connexion_bdd.php");
		session_start();
		?>

<nav> 
	<ul id="menu">
		<li> <a href="caracteristique_admin.php">Gestion des hébergements</a></li>
		<li> <a href="planning_admin.php">Gestion des projections</a></li>
	</ul>
</nav>

<?php

// Déclaration des paramètres de connexion


if (isset($_POST['value']))
{
echo $ida=$_POST['value'];
}
 /*--------A modifier chaque année-------*/
$anneeD=15;
$moisD=05;
$jourD=13;
$jourDS="jeudi";
$duree=16;

/*-------------Jours du festival--------------*/
$dateD  = $anneeD.'-'.$moisD.'-'.$jourD;
$date =  strtotime($dateD);

for($jj=0;$jj<$duree;$jj++)
{
$date2 = strtotime("+$jj days", $date);
$atamp=date('Y', $date2);
$mtamp=date('m', $date2);
$jtamp=date('d', $date2);
$jourF[$jj] = $atamp.'-'.$mtamp.'-'.$jtamp;
}

//calcul du dimanche de relache
if($jourDS=="lundi"){
$date3 = strtotime("+6 days", $date);
}
else if ($jourDS=="mardi")
{$date3 = strtotime("+5 days", $date);
}
else if ($jourDS=="mercredi")
{$date3 = strtotime("+11 days", $date);
}
else if ($jourDS=="jeudi")
{$date3 = strtotime("+10 days", $date);
}
else if ($jourDS=="vendredi")
{$date3 = strtotime("+9 days", $date);
}
else if ($jourDS=="samedi")
{$date3 = strtotime("+8 days", $date);
}
else if ($jourDS=="dimanche")
{$date3 = strtotime("+7 days", $date);
}

$atamp=date('Y', $date3);
$mtamp=date('m', $date3);
$jtamp=date('d', $date3);
$DR = $atamp.'-'.$mtamp.'-'.$jtamp;

$querydate= "select NOM_FILM, NOM_SALLE, TIME(DATE_DEBUT_PROJECTION), TIME(DATE_FIN_PROJECTION), DATE(DATE_DEBUT_PROJECTION), f.ID_FILM, ID_PROJECTION, CATEGORIE FROM projeter p 
INNER JOIN films f ON f.ID_FILM = p.ID_FILM  INNER JOIN salle s ON s.ID_SALLE = p.ID_SALLE ORDER BY NOM_FILM";
$result = mysqli_query($con, $querydate);

$querysalle= "select NOM_SALLE, ID_SALLE FROM salle";
$resultsalle = mysqli_query($con, $querysalle);

$i = 0;
$b =0;
$compteur=0;

while($rowsalle = mysqli_fetch_array($resultsalle)){
$ids[$b] = $rowsalle['ID_SALLE'];
$Noms[$b] = $rowsalle['NOM_SALLE'];
$b++;
}

while($row = mysqli_fetch_array($result)){
$idp[$i] = $row['ID_PROJECTION'];
$idf[$i] =	$row['ID_FILM'];
$resultfilm = mysqli_query($con, "SELECT N__JURY FROM jury j INNER JOIN juger j2 ON j.ID_INDIVIDU = j2.ID_INDIVIDU WHERE ID_FILM = '$idf[$i]'");

while($array = mysqli_fetch_array($resultfilm)){
$jury[$i] = $array['N__JURY'];
}
$Nomsp[$i] = $row['NOM_SALLE'];
$Nomf[$i] = $row['NOM_FILM'];
$DateDeb[$i] = $row['TIME(DATE_DEBUT_PROJECTION)'];
$DateFin[$i] = $row['TIME(DATE_FIN_PROJECTION)'];
$jourDebut[$i] = $row['DATE(DATE_DEBUT_PROJECTION)'];
$datetamp =  strtotime($jourDebut[$i]);
$jourDebut[$i] = date('Y-m-d', $datetamp);
$cat[$i] = $row['CATEGORIE'];
$i++;
}
?>

<div id="onglet">
	<div id="patate">											           
          <ul id="menu_onglet" class="menu-vertical">												             
            <li class="active, mv-item">              
              <a href="#onglet1">Planning</a>            
            </li>												             
            <li class="mv-item">            
            <a href="#onglet2">Long Métrage</a>            
            </li>												             
            <li class="mv-item">            
            <a href="#onglet3">Court Métrage</a>            
            </li>	
			 <li class="mv-item">            
            <a href="#onglet4">Un Certain Regard</a>            
            </li>
     	</ul>		
     </div>								           
          <div id="contenu_onglet">												             
            <div id="onglet1" class="contenu active">	
			
<?php
echo " <table width='800' ><tr>
    <td>Heures</td>";
	for($h=0;$h<$b;$h++){
		echo "<td>Salle $Noms[$h]</td>";
	}
echo "</tr>";



for($jour=0;$jour<$duree;$jour++){//nombre de jours de festival

	echo "<tr><td>Projection matin du $jourF[$jour]</td>";
		for($h=0;$h<$b;$h++){	
			$compt=0;
			if($jourF[$jour]==$DR){
				echo "<td>Jour de relache</td>";
			}
			else {
				for( $j=0;$j<$i;$j++){
					if($jourF[$jour]==$jourDebut[$j]){
						if( $Nomsp[$j]==$Noms[$h]){
							if($DateDeb[$j]>= "08:00:00" && $DateDeb[$j]<= "12:00:00"){
								$compt++;
								if(isset($jury[$j]))
								{
									echo  "<td class='case' id='$idp[$j]'>$Nomf[$j]<br>Heure debut: $DateDeb[$j] Heure fin: $DateFin[$j]<br> Numèro jury :  $jury[$j]</td>"; 
								}else{
									echo  "<td class='case' id='$idp[$j]'>$Nomf[$j]<br>Heure debut: $DateDeb[$j] Heure fin: $DateFin[$j]</td>"; 
								}
							}
						}
					}
				}
				if($compt==0){
				echo "<td></td>";
				}
			}
		}
	echo "</tr><tr>";
		
	echo "<td>Projection après-midi du $jourF[$jour]</td>";
		for($h=0;$h<$b;$h++){	
			$compt=0;
			if($jourF[$jour]==$DR){
				echo "<td>Jour de relache</td>";
			}
			else {
				for( $j=0;$j<$i;$j++){
					if($jourF[$jour]==$jourDebut[$j]){
						if( $Nomsp[$j]==$Noms[$h]){
							if($DateDeb[$j]>= "13:00:00" && $DateDeb[$j]<= "17:00:00"){
								$compt++;
								if(isset($jury[$j]))
								{
									echo  "<td class='case' id='$idp[$j]'>$Nomf[$j]<br>Heure debut: $DateDeb[$j] Heure fin: $DateFin[$j]<br> Numèro jury :  $jury[$j]</td>"; 
								}else{
									echo  "<td class='case' id='$idp[$j]'>$Nomf[$j]<br>Heure debut: $DateDeb[$j] Heure fin: $DateFin[$j]</td>"; 
								}
							}
						}
					}
				}
				if($compt==0){
				echo "<td></td>";
				}
			}
		}


	echo "</tr><tr>";

	echo "<td>Projection soir du $jourF[$jour]</td>";
	for($h=0;$h<$b;$h++){	
	$compt=0;
				if($jourF[$jour]==$DR){
				echo "<td>Jour de relache</td>";
				}
				
				else {for( $j=0;$j<$i;$j++){
					
						if($jourDebut[$j]==$jourF[$jour]){ 
							
							if( $Nomsp[$j]==$Noms[$h]){
								
								if($DateDeb[$j]>= "18:00:00" && $DateDeb[$j]<= "23:59:00" ){
									$compt++;
									if(isset($jury[$j]))
									{
									echo  "<td class='case' id='$idp[$j]'>$Nomf[$j]<br>Heure debut: $DateDeb[$j] Heure fin: $DateFin[$j]<br> Numèro jury :  $jury[$j]</td>"; 
									}else{
									echo  "<td class='case' id='$idp[$j]'>$Nomf[$j]<br>Heure debut: $DateDeb[$j] Heure fin: $DateFin[$j]</td>"; 
									}
												}
					
							}
							
						}
					}
				if($compt==0){
					echo "<td></td>";
					}
				}
	}

echo "</tr>";
}
	echo "</table>";

?>

</div>
<div id="onglet2" class="contenu">

<?php
echo " <table width='800' ><tr>
    <td>Heures</td>
	<td>Salle $Noms[0]</td>
	<td>Salle $Noms[3]</td></tr>";

for($jour=0;$jour<$duree;$jour++){//nombre de jours de festival

	echo "<tr><td>Projection matin du $jourF[$jour]</td>";
		for($h=0;$h<4;$h+=3){	
			$compt=0;
			if($jourF[$jour]==$DR){
				echo "<td>Jour de relache</td>";
			}
			else {
				for( $j=0;$j<$i;$j++){
					if($jourF[$jour]==$jourDebut[$j]){
						if( $Nomsp[$j]==$Noms[$h]){
							if($DateDeb[$j]>= "08:00:00" && $DateDeb[$j]<= "12:59:00"&& $cat[$j]=="LM"){
								$compt++;
								if(isset($jury[$j]))
								{
									echo  "<td class='case' id='$idp[$j]'>$Nomf[$j]<br>Heure debut: $DateDeb[$j] Heure fin: $DateFin[$j]<br> Numèro jury :  $jury[$j]</td>"; 
								}else{
									echo  "<td class='case' id='$idp[$j]'>$Nomf[$j]<br>Heure debut: $DateDeb[$j] Heure fin: $DateFin[$j]</td>"; 
								}
							}
						}
					}
				}
				if($compt==0){
				echo "<td></td>";
				}
			}
		}


	echo "</tr><tr>";

	echo "<td>Projection AM du $jourF[$jour]</td>";
	for($h=0;$h<4;$h+=3){	
	$compt=0;
				if($jourF[$jour]==$DR){
				echo "<td>Jour de relache</td>";
				}
				
				else {for( $j=0;$j<$i;$j++){
					
						if($jourDebut[$j]==$jourF[$jour]){ 
							
							if( $Nomsp[$j]==$Noms[$h]){
								
								if($DateDeb[$j]>= "16:00:00" && $DateDeb[$j]<= "23:59:00"&& $cat[$j]=="LM"){
									$compt++;
									if(isset($jury[$j]))
									{
									echo  "<td class='case' id='$idp[$j]'>$Nomf[$j]<br>Heure debut: $DateDeb[$j] Heure fin: $DateFin[$j]<br> Numèro jury :  $jury[$j]</td>"; 
									}else{
									echo  "<td class='case' id='$idp[$j]'>$Nomf[$j]<br>Heure debut: $DateDeb[$j] Heure fin: $DateFin[$j]</td>"; 
									}
												}
					
							}
							
						}
					}
				if($compt==0){
					echo "<td></td>";
					}
				}
	}

echo "</tr>";
}
	echo "</table>";

?>


</div>
<div id="onglet3" class="contenu">

<?php
echo " <table width='800' ><tr>
    <td>Heures</td>
	<td>Salle $Noms[1]</td>
	<td>Salle $Noms[2]</td></tr>";

for($jour=0;$jour<$duree;$jour++){//nombre de jours de festival
	echo "<tr><td>Projection matin du $jourF[$jour]</td>";
		for($h=1;$h<3;$h++){	
			$compt=0;
			if($jourF[$jour]==$DR){
				echo "<td>Jour de relache</td>";
			}
			else {
				for( $j=0;$j<$i;$j++){
					if($jourF[$jour]==$jourDebut[$j]){
						if( $Nomsp[$j]==$Noms[$h]){
							if($DateDeb[$j]>= "08:00:00" && $DateDeb[$j]<= "12:59:00"&& $cat[$j]=="CM"){
								$compt++;
								if(isset($jury[$j]))
								{
									echo  "<td class='case' id='$idp[$j]'>$Nomf[$j]<br>Heure debut: $DateDeb[$j] Heure fin: $DateFin[$j]<br> Numèro jury :  $jury[$j]</td>"; 
								}else{
									echo  "<td class='case' id='$idp[$j]'>$Nomf[$j]<br>Heure debut: $DateDeb[$j] Heure fin: $DateFin[$j]</td>"; 
								}
							}
						}
					}
				}
				if($compt==0){
				echo "<td></td>";
				}
			}
		}


	echo "</tr><tr>";

	echo "<td>Projection AM du $jourF[$jour]</td>";
	for($h=1;$h<3;$h++){	
	$compt=0;
				if($jourF[$jour]==$DR){
				echo "<td>Jour de relache</td>";
				}
				
				else {for( $j=0;$j<$i;$j++){
					
						if($jourDebut[$j]==$jourF[$jour]){ 
							
							if( $Nomsp[$j]==$Noms[$h]){
								
								if($DateDeb[$j]>= "16:00:00" && $DateDeb[$j]<= "23:59:00"&& $cat[$j]=="CM"){
									$compt++;
									if(isset($jury[$j]))
									{
									echo  "<td class='case' id='$idp[$j]'>$Nomf[$j]<br>Heure debut: $DateDeb[$j] Heure fin: $DateFin[$j]<br> Numèro jury :  $jury[$j]</td>"; 
									}else{
									echo  "<td class='case' id='$idp[$j]'>$Nomf[$j]<br>Heure debut: $DateDeb[$j] Heure fin: $DateFin[$j]</td>"; 
									}
												}
					
							}
							
						}
					}
				if($compt==0){
					echo "<td></td>";
					}
				}
	}

echo "</tr>";
}
	echo "</table>";

?>

</div>
<div id="onglet4" class="contenu">

<?php
echo " <table width='800' ><tr>
    <td>Heures</td>
	<td>Salle $Noms[1]</td>
	<td>Salle $Noms[4]</td></tr>";

for($jour=0;$jour<$duree;$jour++){//nombre de jours de festival
	echo "<tr><td>Projection matin du $jourF[$jour]</td>";
		for($h=1;$h<5;$h+=3){	
			$compt=0;
			if($jourF[$jour]==$DR){
				echo "<td>Jour de relache</td>";
			}
			else {
				for( $j=0;$j<$i;$j++){
					if($jourF[$jour]==$jourDebut[$j]){
						if( $Nomsp[$j]==$Noms[$h]){
							if($DateDeb[$j]>= "08:00:00" && $DateDeb[$j]<= "12:59:00"&& $cat[$j]=="UCR"){
								$compt++;
								if(isset($jury[$j]))
								{
									echo  "<td class='case' id='$idp[$j]'>$Nomf[$j]<br>Heure debut: $DateDeb[$j] Heure fin: $DateFin[$j]<br> Numèro jury :  $jury[$j]</td>"; 
								}else{
									echo  "<td class='case' id='$idp[$j]'>$Nomf[$j]<br>Heure debut: $DateDeb[$j] Heure fin: $DateFin[$j]</td>"; 
								}
							}
						}
					}
				}
				if($compt==0){
				echo "<td></td>";
				}
			}
		}


	echo "</tr><tr>";

	echo "<td>Projection AM du $jourF[$jour]</td>";
	for($h=1;$h<5;$h+=3){	
	$compt=0;
				if($jourF[$jour]==$DR){
				echo "<td>Jour de relache</td>";
				}
				
				else {for( $j=0;$j<$i;$j++){
					
						if($jourDebut[$j]==$jourF[$jour]){ 
							
							if( $Nomsp[$j]==$Noms[$h]){
								
								if($DateDeb[$j]>= "16:00:00" && $DateDeb[$j]<= "23:59:00"&& $cat[$j]=="UCR"){
									$compt++;
									if(isset($jury[$j]))
									{
									echo  "<td id='$idp[$j]'>$Nomf[$j]<br>Heure debut: $DateDeb[$j] Heure fin: $DateFin[$j]<br> Numèro jury :  $jury[$j]</td>"; 
									}else{
									echo  "<td id='$idp[$j]'>$Nomf[$j]<br>Heure debut: $DateDeb[$j] Heure fin: $DateFin[$j]</td>"; 
									}
												}
					
							}
							
						}
					}
				if($compt==0){
					echo "<td></td>";
					}
				}
	}

echo "</tr>";
}
	echo "</table>";

?>

</div>
   </div> 
</div>

<div id ="bouton">	
    <form action='form_ajout_projection.php' > 
    <input type='submit' value='Ajouter une projection'/>
    </form>
    
    <button id="modifier">Modifier</button>
</div>
</body>
</html>