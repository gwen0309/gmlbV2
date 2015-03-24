<!DOCTYPE html>
<html lang="fr">  
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="styles/general.css" media="all">
        <link rel="stylesheet" type="text/css" href="styles/connexion.css" media="all">	
    </head>  
    
    <body>
    
        <?php include("entete.php");
        include("menuaccueil.php");
        include("connexion_bdd.php");
		include("entete_deconnexion.php");
		session_start();
		?>
        
            <div id="login">
                <div id="EspaceConnexion"> 
                    <h1> Connexion </h1>
                    <form action="connexion.php" method="post">
                        <label> Login : </label>
                        <input type ="text" name="login" placeholder="Saisir votre login" />  <br/>
                        
                        <label> Mot de passe : </label>
                        <input type ="password" name="password" placeholder="Saisir votre mot de passe" /> <br/>
                    
                        <input type="submit" value="Connexion" name="validationConnexion"/>
                    </form>
                
                </div>
                
                <div id="EspaceInscription"> 
                    <h1> Demande de partenariat</h1>
                    <p>Si vous souhaitez faire partie de nos partenaires Hébergement, merci de remplir ce formulaire. </p>
                    <p>Vous serez recontactés prochainement par l'organisation.</p> </br>
                    
                    <form method="get" action="envoiMail.php">
                        <label>Nom de l'hébergement : </label> <input type="text" name="nom_hebergement" required/><br/>

                        <label>Numéro de téléphone :  </label><input type="tel" name="telephone" required/><br/>
                        <label>Type d'hébergement : </label><select name="type" required > 
                          <option value="">-Choisir un type d'hébergement-</option>
                          <option value="hotel">Hôtel</option>
                          <option value="chambre">Chambre d'hôte</option>
                          <option value="appartement">Appartement</option>
                          <option value="villa">Villa</option>
                        </select><br/>
                        <label>Nombre de places disponible : <input type="number" name="place_dispo" required/>
                        <br/><br/>
                        
                        <h2> Adresse de l'hébergement </h2>
                        <label>Numéro de rue : </label><input type="number" name="numero_rue" required/><br/>
                        <label>Nom de la rue : </label><input type="text" name="nom_rue" required/><br/>
                        <label>Code postal : </label><input type="number" name="CP" required/><br/>
                        <label>Ville : </label><input type="text" name="ville" required/><br/>
                        <br/>

                        <h2> Contact de l'hébergement </h2>
                        <label>Nom du contact : </label><input type="text" name="nom_contact" required/><br/>
                        <label>Prénom du contact : </label><input type="text" name="prenom_contact" required/><br/>
                        <label>Adresse mail du contact : </label><input type="email" name="mail_contact" required/><br/>
                        <label>Téléphone du contact :</label> <input type="tel" name="telephone_contact" required/><br/>
                        
                        <input type="submit" value="Valider votre demande" name="ValidationDemande"/>
                    </form>
                </div> 
        <?php include("footer.php");?>
              
    </body>
    
</html>