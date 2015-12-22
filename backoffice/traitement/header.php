<?php 
    if(empty($_SESSION['statut'])or $_SESSION['statut']!="Admin") 
    {
        header('Location:  ../frontoffice/authentification.php');
    }
?>
<header>
    <!-- Entête de la zone considérée -->
    <a href="accueil.php">
        <img src="../../images/logostpaul.png" alt="logo" title="logo" id="logo" /> 
    </a>
</header>