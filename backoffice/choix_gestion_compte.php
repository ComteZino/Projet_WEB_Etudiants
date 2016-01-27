<?php 
    require_once('../frontoffice/connexionBD.php');
    if(empty($_SESSION['statut'])or $_SESSION['statut']!="Admin") 
    {
        header('Location: ../frontoffice/authentification.php');
    }
    $_SESSION["page"] = "gestion";
    $select_comptes = ('Select id,nom,prenom from etudiant');
    $query_select = $connexion->query($select_comptes);
    $query_select2 = $connexion->query($select_comptes);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../css/style.css" />
        <link rel="stylesheet" href="../css/styleGestionCompte.css">
        <title>Gestion anciens étudiants</title>
    </head>
    <body>
        <?php include 'header.php'; ?>
        <?php include 'menu.php'; ?> 
        <!--- Zone fil ariane --->
        <div class="filAriane">
            <a href="../frontoffice/accueil.php">Accueil</a> » Gestion des comptes
        </div>
        <div id="divPrincipal" class="box-gestion">
            <h1>Création d'un compte</h1>
            <form method="post" action="traitement/ajout_compte.php">
                <p>Quel type de compte va être créé ?</p>
                <select class="select" name="statut">
                    <option value="Utilisateur">Utilisateur</option>
                    <option value="Administrateur">Administrateur</option>
                </select>
                <p id="erreurtitre"></p>
                <input placeholder="Identifiant *" name="login" type="text" class="titre" onblur="verifTitre(this);" />
                <p id="erreurtitre"></p>
                <input placeholder="Mot de passe *" name="mdp" type="text" class="titre" onblur="verifTitre(this);" />
                <p id="erreurtitre"></p>
                <input placeholder="Nom *" name="nom" type="text" class="titre" onblur="verifTitre(this);" />
                <p id="erreurtitre"></p>
                <input placeholder="Prénom *" name="prenom" type="text" class="titre" onblur="verifTitre(this);" />
                <p id="erreurtitre"></p>
                <input placeholder="Date de naissance(A/M/J) *" name="dateN" type="text" class="titre" onblur="verifTitre(this);" />
                <input class='bouton' type="submit" value="Créer le compte"/> 
            </form>
        </div>
        <div id="divPrincipal" class="box-gestion">
            <form method="post" action="traitement/modification_compte.php">
                <h1>Modification d'un compte</h1>
                <p>Quel compte va être modifié ? </p>
                <select class="select" name="id">
                    <?php
                        while($ligne = $query_select->fetch())
                        {
                            echo '<option value="'.$ligne["id"].'">'.str_replace("-"," ",$ligne["nom"]).' '.str_replace("-"," ",$ligne["prenom"]).'</option>';
                        }
                    ?>
                </select>
                <input class='bouton' type="submit" value="Modifier ce compte"/>
            </form>
        </div>
        <div id="divPrincipal" class="box-gestion">
            <form method="post" action="traitement/suppression_compte.php">
                <h1>Suppression d'un compte</h1>
                <p>Quel compte va être supprimé ?</p>
                <select class="select" name="id">
                    <?php
                        while($lgn = $query_select2->fetch())
                        {
                            // N'affiche pas le compte courant
                            if($_SESSION["idEtud"] != $lgn["id"])
                            {
                                echo '<option value="'.$lgn["id"].'">'.str_replace("-"," ",$lgn["nom"]).' '.str_replace("-"," ",$lgn["prenom"]).'</option>';
                            }
                        }
                    ?>
                </select>
                <input class='bouton' type="submit" value="Supprimer ce compte"/>
            </form>
	</div>
    </body>
</html>