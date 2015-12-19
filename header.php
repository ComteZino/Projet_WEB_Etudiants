<?php 
   if(!empty($_SESSION)) 
    {
        if($_SESSION['statut']=="0")
	{
            header('Location: authentification.php');
	}
    }
    else 
    {
        session_start(); 
        if($_SESSION['statut']=="0" or $_SESSION['statut']=="Admin" or $_SESSION['statut']=="Util")
	{
            header('Location: authentification.php');
	}
    }
?>
<header>
    <!-- Entête de la zone considérée -->
    <a href="accueil.php">
        <img src="images/logostpaul.png" alt="logo" title="logo" id="logo" /> 
    </a>
</header>