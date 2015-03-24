<!DOCTYPE html>
<html lang="fr"> 
    <head>
        <meta charset="utf-8">	       
        <link rel="stylesheet" type="text/css" href="styles/general.css" media="all">
        <link rel="stylesheet" type="text/css" href="styles/styles.css" media="all"> <!-- Qui sera a supprimer-->
        <title> Liste des hébergements</title>	
    </head>  

    <body>
        <?php include("menuappli.php");
        include("menuverticalhebergement.php");
		include("connexion_bdd.php");
		include("entete_deconnexion.php");
		session_start();
    ?>
        <div id="caracteristics">
            <?php
            // Creation et envoi de la requete
            $query = "SELECT ID_HEBERGEMENT, NOM_HEBERGEMENT, TEL_HEBERGEMENT, CAPACITE_HEBERGEMENT, NOMBRE_ETOILES FROM HEBERGEMENT ORDER BY ID_HEBERGEMENT";
            ?>

            <table id="liste_hebergement">
                    <tr>
                    <th>Nom de l'hébergement</th>
                    <th>Numéro de téléphone</th>
                    <th>Places disponible</th>
                    <th>Nombre d'étoile (*)</th>
                    <th>Services proposés</th>
                    <th>Information Contact</th>
                    <th>Adresse</th>
                    </tr>
            <?php
            if ($result=mysqli_query($con,$query))
              {
              while ($row=mysqli_fetch_row($result))
                {
                            $ID_H = $row[0]; 
                            $Nom_heberg = $row[1];
                            $Tel_heberg = $row[2];
                            $Capa_heberg = $row[3];
                            $etoile_heberg = $row[4];
                            echo "
                            <tr>
                            <td> $Nom_heberg</td>
                            <td>$Tel_heberg</td>
                            <td>$Capa_heberg</td>
                            <td>$etoile_heberg</td> 
                            <td><a href="."afficher_service.php?ID_H=".$ID_H.">Voir</td>	
                            <td><a href="."afficher_contact.php?ID_H=".$ID_H.">Voir</a></td>
                            <td><a href="."afficher_adresse.php?ID_H=".$ID_H.">Voir</a></td>	
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