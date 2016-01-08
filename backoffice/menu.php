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
                <li><a href='../frontoffice/accueil.php'><span>Accueil</span></a></li>                            
                <li><a href='#'><span>Forum</span></a></li>
                
                <?php
                    if($_SESSION["statut"] == "Admin")
                    {
                        if($_SESSION["page"] == "choix_gestion_actualite")
                        {
                            echo "<li class='active'><a href='choix_gestion_actualite.php'><span>Gestion des actualités</span></a></li>";
                        }
                        else
                        {
                            echo "<li><a href='choix_gestion_actualite.php'><span>Gestion des actualités</span></a></li>";
                        }
                        
                        if($_SESSION["page"] == "stats")
                        {
                            echo "<li class='active'><a href='#'><span>Stats</span></a></li>";
                        }
                        else
                        {
                            echo "<li><a href='#'><span>Stats</span></a></li>";
                        }
                        
                        if($_SESSION["page"] == "stages")
                        {
                            echo "<li class='active'><a href='#'><span>Propositions de stages</span></a></li>";
                        }
                        else
                        {
                            echo "<li><a href='#'><span>Propositions de stages</span></a></li>";
                        }
                        
                        if($_SESSION["page"] == "contact_etudiant")
                        {
                            echo "<li class='active'><a href='contact_etudiant.php'><span>Contacter un étudiant</span></a></li>";
                        }
                        else
                        {
                            echo "<li><a href='contact_etudiant.php'><span>Contacter un étudiant</span></a></li>";
                        }
                        
                        if($_SESSION["page"] == "choix_gestion_compte")
                        {
                            echo "<li class='active'><a href='choix_gestion_compte.php'><span>Gestion des comptes</span></a></li>";
                        }
                        else
                        {
                            echo "<li><a href='choix_gestion_compte.php'><span>Gestion des comptes</span></a></li>";
                        }
                    }
                ?>
                <li class='last'><a href='../frontoffice/authentification.php'><span>Deconnexion</span></a></li>
            </ul>
        </div>
    </body>
</html>
