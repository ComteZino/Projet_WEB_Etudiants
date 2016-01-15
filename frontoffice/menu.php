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
                <?php
                    if($_SESSION["page"] == "accueil")
                    {
                        echo "<li class='active'><a href='accueil.php'><span>Accueil</span></a></li>";
                    }
                    else
                    {
                        echo "<li><a href='accueil.php'><span>Accueil</span></a></li>";
                    }
                    
                    if($_SESSION["page"] == "forum")
                    {
                        echo "<li class='active'><a href='#'><span>Forum</span></a></li>";
                    }
                    else
                    {
                        echo "<li><a href='#'><span>Forum</span></a></li>";
                    }
                    if($_SESSION["statut"] == "Util")
                    {
                        if($_SESSION["page"] == "profil")
                        {
                            echo "<li class='active'><a href='profil.php'><span>Profil</span></a></li>";
                        }
                        else
                        {
                            echo "<li><a href='profil.php'><span>Profil</span></a></li>";
                        }

                        if($_SESSION["page"] == "contact")
                        {
                            echo "<li class='active'><a href='contact.php'><span>Contact</span></a></li>";
                        }
                        else
                        {
                            echo "<li><a href='contact.php'><span>Contact</span></a></li>";
                        } 
                    }
                    if($_SESSION["statut"] == "Admin")
                    {
                        echo "<li><a href='#'<span>Gestion</span></a></li>";
                        echo "<li><a href='#'><span>Stats</span></a></li>";
                        echo "<li><a href='#'><span>Recherche</span></a></li>";
                        echo "<li><a href='../backoffice/contact_etudiant.php'><span>Contacter un étudiant</span></a></li>";
                    }
                ?>
                <li class='last'><a href='authentification.php'><span>Deconnexion</span></a></li>
            </ul>
        </div>
    </body>
</html>
