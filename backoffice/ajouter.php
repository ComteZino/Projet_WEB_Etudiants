<?php 
    session_start();
    if(empty($_SESSION['statut'])or $_SESSION['statut']!="Admin") 
    {
        header('Location: ../frontoffice/authentification.php');
    }
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../css/style.css" />
        <link rel="stylesheet" href="../css/styleGestionCompte.css">
        <title></title>
    </head>
    <body>
        <?php include 'header.php'; ?>
        <?php include "menu.php" ?>   
        <div class="form-style-5">
            <form method="post" action="traitement/ajout.php">
		<fieldset>
                    <legend>Création d'un compte</legend>
                    <label for="statut">Quel type de compte va être créé ?</label>
                    <select id="statut" name="statut">
                        <option value="Utilisateur">Utilisateur</option>
                        <option value="Administrateur">Administrateur</option>
                    </select>   
                    <input name="login" type="login" placeholder="Identifiant *">
                    <input name="mdp" type="mdp" placeholder="Mot de passe *">
                    <input name="nom" type="nom" placeholder="Nom *">
                    <input name="prenom" type="prenom" placeholder="Prénom *">
		</fieldset>
                <input id="voir" type="submit" value="Créer le compte"/>  
            </form>
	</div>
    </body>
</html>