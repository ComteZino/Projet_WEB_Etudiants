<?php 
    require_once('../../frontoffice/connexionBD.php');
    if(empty($_SESSION['statut'])) 
    {
        header('Location: authentification.php');
    }
    $id = htmlentities($_POST["id"]);
    // Select de toutes les infos de l'étudiant
    $select_poursuite = ("Select * from poursuiteetudes where idEtud =".$id);
    
    $select_passage = ("Select * from passage where idEtud =".$id);
    
    $select_parcourspro = ("Select * from parcourspro where idEtud =".$id);
    
    $select_infoetudiant = ("Select * from infoetudiant where id =".$id);
    
    $select_etudiant = ("Select * from etudiant where id =".$id);
    echo $select_etudiant;
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
        <aside><!-- Les à-cotés de la page --></aside>
        <article>
            <!-- Contenu textuel de la page -->
            <!--<meta http-equiv="refresh" content="4;../choix_gestion.php" />-->
            <p id="rediriger">Le compte a été correctement supprimé, vous allez être redirigé vers la page de gestion des comptes.</p>
        </article>
        <footer><!-- Pied-de-page de la page -> site --></footer>
    </body>
</html>
