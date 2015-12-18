<?php
	
	if ($_POST)
	{
	$pseudo = htmlentities($_POST["Identifiant"]);
	$mdp = htmlentities($_POST["Password"]);
	
	}
	else
	{
	$pseudo = htmlentities($_GET["Identifiant"]);
	$mdp = htmlentities($_GET["Password"]);
	}
	require_once('connexionBD.php');
        $mdp=md5($mdp);
	$tableuser="SELECT * FROM compte WHERE login='".addslashes($pseudo)."' AND password='".addslashes($mdp)."'";
        echo $tableuser;
	$table = $connexion->query($tableuser);
	$ligne = $table->fetch();
        $statut=$ligne['statut'];
       
	if($pseudo==$ligne['login'] and $mdp==$ligne['password'] )
	{	
		if($statut=='Admin')
		{
			header('Location: accueil.php');    
		}
		else
		{
			header('Location: accueil.html');  
		}
	}
	else
	{
		header('Location: authentification.php');    
	}
	$table->closeCursor();
?>