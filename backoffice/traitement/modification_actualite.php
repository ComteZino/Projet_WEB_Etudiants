<?php 
    require_once('../../frontoffice/connexionBD.php');
    if(empty($_SESSION['statut'])or $_SESSION['statut']!="Admin") //Si le statut est vide ou différent de admin 
    {
        header('Location: ../frontoffice/authentification.php');//On renvoie sur la page d'authentification
    }
    $idNews = htmlentities($_POST["article_modif"]);
    $select_informations = ("Select * from news where news.idNews= ".$idNews.";");
    $query_select = $connexion->query($select_informations);
    $ligne = $query_select->fetch();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../../css/style.css" />
        <link rel="stylesheet" href="../../css/styleGestionActualite.css">
        <title>Gestion des actualités</title>
    </head>
    <body>
        <?php include 'header.php'; ?>
        <?php include 'menu.php'; ?>      
        <div id="divPrincipal" class="box-actu">
            <form method="post" action="modif_actualite.php">
                <fieldset>
                    <legend>Informations de l'actualité à modifier :</legend>
                    <?php
                        echo '<select id="type" name="type">';
                        echo '<option value="Lycée" selected>Lycée</option>';
                        echo '<option value="Mariage">Mariage</option>';
                        echo '<option value="Décés">Décés</option>';
                        echo '</select>';
                        
                        echo '<input name="auteur" type="auteur" placeholder="Auteur : '.$ligne["auteur"].'">';
                        echo '<input name="date" type="date" placeholder="Date : '.$ligne["date"].'">';
                        echo '<input name="titre" type="titre" placeholder="Titre : '.$ligne["titre"].'">';
                        echo '<input name="contenu" type="contenu" placeholder="Contenu : '.$ligne["contenu"].'">';
                        echo '<input name="idNews" type="hidden" value="'.$idNews.'">';
                    ?>
                    <input id="voir" type="submit" class='bouton' value="Appliquer les modifications"/>
                    <br>
                    <a href="../choix_gestion_actualite.php"><input type="button" name="nom" class='bouton' value="Retourner à la gestion"></a>
                </fieldset>
            </form>
	</div>
    </body>
</html>

