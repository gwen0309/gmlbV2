<!DOCTYPE html>
<html lang="fr"> 
    <head>
        <meta charset="utf-8">	       
        <link rel="stylesheet" type="text/css" href="general.css" media="all">
        <link rel="stylesheet" type="text/css" href="menuvertical.css" media="all">
        <link rel="stylesheet" type="text/css" href="menuhorizontal.css" media="all">
        <link rel="stylesheet" type="text/css" href="styles.css" media="all"> <!-- Qui sera a supprimer-->       
        <title> Liste des Services</title>	
    </head>  

    <body>

        <?php include("entete.php");?>
        <?php include("menuappli.php");?>

        <div>
            <ul class="menu-vertical">
                <li class="mv-item"><a href="caracteristique.php">Ajouter</a></li>
    			<li class="mv-item"><a href="lister_hebergement.php">Lister</a></li>
            </ul>
        </div>
        <div id="caracteristics">
            <?php
            $host = "localhost";  
            $user = "root";
            $bdd = "filrouge";
            $password  = "";
            //Récupération de la variable
            $ID= mysqli_real_escape_string($con, $_POST['ID_H']);
            // Connexion au serveur
            $con = mysqli_connect($host, $user, $password) or die ("Erreur de connexion au serveur");
            mysqli_select_db($con, $bdd) or die("Erreur lors de la selection de la bd");
            // Creation et envoi de la requete
            $query = "SELECT NOM_SERVICE FROM PROPOSER P
            INNER JOIN HEBERGEMENT H ON H.ID_HEBERGEMENT = P.ID_HEBERGEMENT
            INNER JOIN SERVICE S ON S.ID_SERVICE = P.ID_SERVICE 
            WHERE P.ID_HEBERGEMENT LIKE '".$ID."'";
            ?>
            <table id="liste_service">
                    <tr>
                    <th>Services proposés</th>
                    </tr>
            <?php
            if ($result=mysqli_query($con,$query))
              {
              while ($row=mysqli_fetch_row($result))
                {
                            $Nom_service = $row[0]; 
                            echo "
                            <tr>
                            <td>$Nom_service</td>
                            </tr>
                            ";
                }
              }
            else
                    {
                            printf("Erreur lors de l'execution de la requète");
                    }
            // Libère la mémoire associée au résultat
			mysqli_free_result($result);
			// Fermeture de la connexion a la base de donnée
			mysqli_close($con);
            ?> 
            </table>

        </div>

    </body>
</html>