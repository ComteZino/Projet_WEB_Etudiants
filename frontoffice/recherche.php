<?php 
    session_start();
    if(empty($_SESSION['statut'])) 
    {
        header('Location: ../frontoffice/authentification.php');
    }
    $_SESSION["page"] = "recherche";
    require_once('../frontoffice/connexionBD.php');
    $select_entreprises = ('Select entreprise from parcourspro');
    $query_select = $connexion->query($select_entreprises);
    /*$select_entreprises = ('Select  from etudiant');
    $query_select = $connexion->query($select_entreprises);*/
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
            <a href="../frontoffice/accueil.php">Accueil</a> » Recherche
        </div>
        <div id="divPrincipal" class="box-gestion">
            <form method="post" action="traitement/">
                <h1>Rechercher par entreprise</h1>
                <select class="select" name="id">
                    <?php
                        while($ligne_ent = $query_select->fetch())
                        {
                            echo '<option value="'.$ligne_ent["entreprise"].'">'.$ligne_ent["entreprise"].'</option>';
                        }
                    ?>
                </select>
                <input class='bouton' type="submit" value="Lancer la recherche"/>
            </form>
	</div>
        <div id="divPrincipal" class="box-gestion">
            <form method="post" action="traitement/">
                <h1>Rechercher par section de BTS, année de promotion</h1>
                <select class="select" name="id">
                    <?php
                        while($ligne_nom = $query_select->fetch())
                        {
                            echo '<option value="'.$ligne_nom["entreprise"].'">'.$ligne_nom["entreprise"].'</option>';
                        }
                    ?>
                </select>
                <input class='bouton' type="submit" value="Lancer la recherche"/>
            </form>
	</div>
    </body>
</html>