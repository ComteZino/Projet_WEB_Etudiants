<?php 
    require_once('../../frontoffice/connexionBD.php');
    if(empty($_SESSION['statut'])or $_SESSION['statut']!="Admin") 
    {
        header('Location: ../frontoffice/authentification.php');
    }
    $id = htmlentities($_POST["id"]);
    $select_informations = ("Select * from etudiant, compte where compte.idEtud=etudiant.id and etudiant.id = ".$id.";");
    $query_select = $connexion->query($select_informations);
    $ligne = $query_select->fetch()
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../../css/style.css" />
        <link rel="stylesheet" href="../../css/styleGestionCompte.css">
        <title>Gestion anciens étudiants</title>
    </head>
    <body>
        <?php include 'header.php'; ?>
        <?php include 'menu.php'; ?>      
        <div class="form-style-5">
            <fieldset>
                <legend>Informations du compte à modifier :</legend>
                <?php
                    if($ligne["statut"] != "Admin")
                    {
                        echo '<label for="statut">Type du compte</label>';
                        echo '<select id="statut" name="statut">';
                        echo '<option value="Utilisateur" selected>Utilisateur</option>';
                        echo '<option value="Administrateur">Administrateur</option>';
                        echo '</select>';
                    }
                    echo '<input name="login" type="login" placeholder="Login : '.$ligne["login"].'">';
                    if($_SESSION["idEtud"] == $id or $ligne["statut"] == "Util")
                    {
                        echo '<input name="mdp" type="mdp" placeholder="Mot de passe">';
                    }
                    echo '<input name="nom" type="nom" placeholder="Nom : '.$ligne["nom"].'">';
                    echo '<input name="prenom" type="prenom" placeholder="Prénom : '.$ligne["prenom"].'">';
                    echo '<input name="dateN" type="prenom" placeholder="Date de naissance : '.$ligne["dateNaissance"].'">';
                ?>
            </fieldset>
            <a href="modifier.php"><input type="button" name="nom" value="Appliquer les modifications"></a>
            <a href="../choix_gestion.php"><input type="button" name="nom" value="Retourner à la gestion"></a>
	</div>
    </body>
</html>