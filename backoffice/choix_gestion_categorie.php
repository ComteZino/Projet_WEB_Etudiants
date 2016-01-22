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
            <a href="../frontoffice/accueil.php">Accueil</a> » Gestion des catégories
        </div>
        <div id="divPrincipal" class="box-gestion">
            <h1>Création d'une catégorie</h1>
            <form method="post" action="traitement/ajout_categorie.php">
                <p>Quel type de catégorie va être créé ?</p>
                <select class="select" name="statut">
                    <option value="Article">Article</option>
                    <option value="Section">Section de BTS</option>
                </select>
                <p id="erreurtitre"></p>
                <input placeholder="Titre de la catégorie" name="nomCat" type="text" class="titre" onblur="verifTitre(this);" />
                <input class='bouton' type="submit" value="Créer la catégorie"/> 
            </form>
        </div>
        <div id="divPrincipal" class="box-gestion">
            <form method="post" action="traitement/modification.php">
                <h1>Modification d'une catégorie</h1>
                <p>Quelle catégorie va être modifiée ? </p>
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
            <form method="post" action="traitement/suppression.php">
                <h1>Suppression d'une catégorie</h1>
                <p>Quelle catégorie va être supprimée ?</p>
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