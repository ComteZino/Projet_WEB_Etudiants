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
        <title></title>
    </head>
    <body>
        <?php include 'header.php'; ?>
        <?php include 'menu.php'; ?>      
        <aside><!-- Les à-cotés de la page --></aside>
        <article><!-- Contenu textuel de la page --></article>
        <footer><!-- Pied-de-page de la page -> site --></footer>
    </body>
</html>
