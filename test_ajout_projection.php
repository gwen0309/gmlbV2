<?php


function test_ajout($cat,$salle,$heureproj,$jourproj,$tr) {//teste si toutes les conditions sont rénuies pour ajouter dans la table projection

include("connexion_bdd.php");
include("entete_deconnexion.php");
session_start();

$z=0;
$querytest= "SELECT TIME(DATE_DEBUT_PROJECTION), DATE(DATE_DEBUT_PROJECTION) FROM projeter WHERE ID_SALLE like '$salle'";
 $resulttest = mysqli_query($con, $querytest);

 if($resulttest==true){
	 while($array2 = mysqli_fetch_array($resulttest)){
	$heuretest[$z] = $array2['TIME(DATE_DEBUT_PROJECTION)'];
	$jourtest[$z] = $array2['DATE(DATE_DEBUT_PROJECTION)'];
	$z++;
	}
 }

$test=0;
if($cat=="LM"&&$salle=="1"){ $test=900;}
if($cat=="LM"&&$salle=="4"){ $test=900;}
if($cat=="CM"&&$salle=="2"){ $test=900;}
if($cat=="CM"&&$salle=="3"){ $test=900;}
if($cat=="UCR"&&$salle=="2"){ $test=900;}
if($cat=="UCR"&&$salle=="5"){ $test=900;}

if( $heureproj>= "08:00:00" && $heureproj<= "17:00:00" && $tr=="oui"){
$test=9000;
}
if($test>0){
	for($a=0;$a<$z;$a++)//teste avec toutes les projections de la salle
	{
		if( $jourproj==$jourtest[$a]){		
			if( $heureproj>= "08:00:00" && $heureproj<= "12:00:00")
			{
				
				if( $heuretest[$a]>= "08:00:00" && $heuretest[$a]<= "12:00:00")
				{
				$test+=1;
				}

			}
			else if( $heureproj>= "13:00:00" && $heureproj<= "17:00:00")
			{
				if( $heuretest[$a]>= "13:00:00" && $heuretest[$a]<= "17:00:00")
				{
				$test+=1;
				}		
			}
				else if( $heureproj>= "18:00:00" && $heureproj<= "23:59:00")
			{
				if( $heuretest[$a]>= "18:00:00" && $heuretest[$a]<= "23:59:00")
				{
				$test+=1;
				}		
			}
		}
	}
}
return($test);

}

function date_eclat($datej)
{
	$tabDate = explode('/' , $datej);
	$date_conv = $tabDate[2].'-'.$tabDate[1].'-'.$tabDate[0];
	return $date_conv;
}

function date_debut($datej){
$tabDate = explode('/' , $datej);
$date_conv = $tabDate[2].'-'.$tabDate[1].'-'.$tabDate[0];
$heure=$_POST['heure'];
$min=$_POST['min'];
$datej= $date_conv." ".$heure.":".$min.":00";
$date = strtotime($datej);
return $date;
}

function traitement_heure($date){

 $heureproj = date('H:i:s',$date);
 
 return $heureproj;

}

function traitement_jour($date){

 $jourproj = date('Y-m-d', $date);
 return $jourproj;

}

function date_fest($date){

 $datej = date('Y-m-d H:i:s', $date);
 return $datej;

}

function date_fin($date,$tr,$duree){

//30 minutes de présentation, 60 si tapis rouge
if($tr=="oui")
{
$date2 = strtotime("+60 minutes", $date);
}
else
{
$date2 = strtotime("+30 minutes", $date);
}
$date = strtotime("+$duree minutes", $date2);
$datefin = date('Y-m-d H:i:s', $date);

return $datefin;
}
?>