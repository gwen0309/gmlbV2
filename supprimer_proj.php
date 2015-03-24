
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ajout des projections</title>
</head>

<body>

  <?php 
include("connexion_bdd.php");
include("entete_deconnexion.php");
session_start();

echo $ids=$_POST['ids'];
$query=("DELETE FROM projeter WHERE ID_PROJECTION = '$ids'");
 $result = mysqli_query($con, $query);
 
 	echo'<script>
alert("Projection supprimée");
document.location.href="planning.php";
</script>';
  ?>
  </body>
  </html>