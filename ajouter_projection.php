
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
</head>

<body>
  


  <?php 
$host = "localhost";  
$user = "root";
$bdd = "filrouge";
$password  = "";

mysql_connect($host, $user,$password) or die("erreur de connexion au serveur");
mysql_select_db($bdd) or die("erreur de connexion a la base de donnees");


$film=$_POST['film'];
$salle=$_POST['salle'];
 $datej=$_POST['datejour'];

 $tabDate = explode('/' , $datej);
 $date_conv  = $tabDate[2].'-'.$tabDate[1].'-'.$tabDate[0];
 
 $heure=$_POST['heure'];
 $min=$_POST['min'];
 echo $datej= $date_conv." ".$heure.":".$min.":00";

 $date =  strtotime($datej);

echo $datej = date('Y-m-d H:i:s', $date);


 $queryproj= "INSERT INTO projeter (ID_FILM, ID_SALLE, DATE_DEBUT_PROJECTION) VALUES ($film,$salle,'".$datej."')";
  $insertion = mysql_query($queryproj);

  ?>
  </body>
  </html>