<?php 
    if(empty($_SESSION['statut']) or $_SESSION['statut']!="Admin") 
    {
        header('Location:  ../frontoffice/authentification.php');
    }
?>
<html>
    <head>
        <meta charset='utf-8'>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../css/styleNavigation.css">
        <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
        <script src="script.js"></script>
        <title>CSS MenuMaker</title>
    </head>
    <body>
        <div id='cssmenu'>
            <ul>
                <li class='active'><a href='accueil.php'><span>Accueil</span></a></li>
                <li><a href='#'><span>Stats</span></a></li>
                <li><a href='#'><span>Propositions de stages</span></a></li>
                <li><a href='#'><span>Contacter un étudiant</span></a></li>
                <li><a href='choix_gestion.php'><span>Gestion des comptes</span></a></li>
                <li><a href='../frontoffice/accueil.php'><span>FrontOffice</span></a></li>
                <li class='last'><a href='../frontoffice/authentification.php'><span>Deconnexion</span></a></li>
            </ul>
        </div>
    </body>
</html>
