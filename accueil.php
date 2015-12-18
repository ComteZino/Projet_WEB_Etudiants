<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/style.css" />
        <title></title>
    </head>
    <body>
        <header>
            <!-- Entête de la zone considérée -->
            <a href="accueil.php">
                <img src="images/logostpaul.png" alt="logo" title="logo" id="logo" /> 
            </a>
        </header>
        <nav><!-- Nav. principale de la page -> site -->
            <ul id="nav">
                <li><a href="#">Profil</a></li>
                <li><a href="#">Forum</a></li>
                <li><a href="#">News</a></li>
                <li><a href="#">Contact</a></li>
                <li> 
            <form action="/search" id="searchthis" method="get"> 
                <input id="search" name="q" type="text" placeholder="Rechercher" /> 
                <input id="search-btn" type="submit" value="Rechercher" /> 
            </form> 
        </li>
          </ul>
         
        </nav>        
        <aside><!-- Les à-cotés de la page --></aside>
        <article><!-- Contenu textuel de la page --></article>
        <footer><!-- Pied-de-page de la page -> site --></footer>
    </body>
</html>
