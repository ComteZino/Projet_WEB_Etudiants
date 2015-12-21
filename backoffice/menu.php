<?php 
    if(empty($_SESSION['statut'])) 
    {
        header('Location: authentification.php');
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
                <li><a href='#'><span>News</span></a></li>
                <li><a href='#'><span>Profil</span></a></li>
                <li><a href='#'><span>Forum</span></a></li>
                <?php
                    if($_SESSION["statut"] == "Admin")
                    {
                        echo "<li><a href='../frontoffice/accueil.php'><span>FrontOffice</span></a></li>";
                    }
                ?>
                <li class='last'><a href='authentification.php'><span>Deconnexion</span></a></li>
            </ul>
        </div>
    </body>
</html>
