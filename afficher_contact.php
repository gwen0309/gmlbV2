<!DOCTYPE html>
<html lang="fr"> 
    <head>
        <meta charset="utf-8">	       
        <link rel="stylesheet" type="text/css" href="general.css" media="all">
        <link rel="stylesheet" type="text/css" href="styles.css" media="all"> <!-- Qui sera a supprimer-->
        <title> Liste contact</title>	
    </head>  

    <body>

        <?php /*?><?php include("entete.php");?><?php */?>
        <?php include("menuappli.php");?>
        <?php include("menuverticalhebergement.php");?>

        <div id="caracteristics">
            <?php
            $host = "localhost";  
            $user = "root";
            $bdd = "filrouge";
            $password  = "";
            //Récupération de la variable
            $ID=($_GET['ID_H']);
            // Connexion au serveur
            $con = mysqli_connect($host, $user, $password) or die ("Erreur de connexion au serveur");
            mysqli_select_db($con, $bdd) or die("Erreur lors de la selection de la bd");
            // Creation et envoi de la requete
            $query = "SELECT NOM_CONTACT, PRENOM_CONTACT, MAIL_CONTACT, TEL_CONTACT FROM HEBERGEMENT WHERE ID_HEBERGEMENT LIKE '".$ID."'";
            ?>
            <table id="liste_contact">
                    <tr>
                    <th>Nom du contact</th>
                    <th>Prénom du contact </th>
                    <th>Mail du contact</th>
                    <th>Téléphone du contact</th>
                    </tr>
            <?php
            if ($result=mysqli_query($con,$query))
              {
              while ($row=mysqli_fetch_row($result))
                {
                            $Nom_contact = $row[0]; 
                            $Prenom_contact = $row[1];
                            $Tel_contact = $row[2];
                            $Mail_contact = $row[3];
                            echo "
                            <tr>
                            <td>$Nom_contact</td>
                            <td>$Prenom_contact</td>
                            <td>$Tel_contact</td>
                            <td>$Mail_contact</td>
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