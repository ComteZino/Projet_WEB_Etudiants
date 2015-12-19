<?php 
  /* if(!empty($_SESSION)) {
        if($_SESSION['statut']=="0")
	{
		header('Location: authentification.php');
            
	}
    }
    else {
        session_start(); 
          if($_SESSION['statut']=="0" or $_SESSION['statut']=="Admin" or $_SESSION['statut']=="Util"   )
	{
		header('Location: authentification.php');
            
	}
    }*/
   
?>
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
