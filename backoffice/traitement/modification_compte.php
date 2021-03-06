<?php 
    require_once('../../frontoffice/connexionBD.php');
    if(empty($_SESSION['statut'])or $_SESSION['statut']!="Admin") 
    {
        header('Location: ../frontoffice/authentification.php');
    }
    $id = htmlentities($_POST["id"]);
    $select_informations = ("Select * from etudiant, compte where compte.idEtud=etudiant.id and etudiant.id = ".$id.";");
    $query_select = $connexion->query($select_informations);
    $ligne = $query_select->fetch();
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
        <!--- Zone fil ariane --->
        <div class="filAriane">
            <a href="../frontoffice/accueil.php">Accueil</a> » <a href="../choix_gestion_compte.php">Gestion des comptes</a> » Modification du compte
        </div>
        <div class="box-gestion">
            <form method="post" action="modif_compte.php">
                    <h1>Informations du compte à modifier</h1>
                    <?php
                        if($ligne["statut"] != "Admin")
                        {
                            echo '<h2>Type du compte</h2>';
                            echo '<select class="select" name="statut">';
                            echo '<option value="Utilisateur" selected>Utilisateur</option>';
                            echo '<option value="Administrateur">Administrateur</option>';
                            echo '</select>';
                        }
                    ?>
                    <p id="erreurtitre"></p>
                    <input placeholder="Login : <?php echo $ligne["login"] ?>" name="login" type="text" class="titre" onblur="verifTitre(this);" />
                    <?php
                        if($_SESSION["idEtud"] == $id)
                        {
                    ?>
                    <p id="erreurtitre"></p>
                    <input placeholder="Mot de passe" name="mdp" type="text" class="titre" onblur="verifTitre(this);" />
                    <?php
                        }
                        if($ligne["statut"] == "Util")
                        {
                    ?>
                    <p id="erreurtitre"></p>
                    <input placeholder="Mot de passe" name="mdp" type="text" class="titre" onblur="verifTitre(this);" />
                    <?php
                        }
                    ?>
                    <p id="erreurtitre"></p>
                    <input placeholder="Nom : <?php echo str_replace("-"," ",$ligne["nom"]) ?>" name="nom" type="text" class="titre" onblur="verifTitre(this);" />
                    
                    <p id="erreurtitre"></p>
                    <input placeholder="Prénom : <?php echo str_replace("-"," ",$ligne["prenom"]) ?>" name="prenom" type="text" class="titre" onblur="verifTitre(this);" />
                    
                    <p id="erreurtitre"></p>
                    <input placeholder="Date de naissance : <?php echo $ligne["dateNaissance"] ?>" name="dateN" type="text" class="titre" onblur="verifTitre(this);" />
                    
                    <input name="id" type="hidden" value="'.$id.'">
                    
                    <input class='bouton' type="submit" value="Appliquer les modifications"/>
                    <br>
                    <a href="../choix_gestion_compte.php"><input class='bouton' type="button" name="nom" value="Retourner à la gestion"></a>
            </form>
	</div>
    </body>
</html>