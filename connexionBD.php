<?php
    if(!empty($_SESSION)) {
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
    try
    {
        $dns ='mysql:host=localhost;dbname=anciens_etudiants';
        $utilisateur='root';
        $motdepasse='';
        $connexion = new PDO($dns,$utilisateur,$motdepasse);
        $connexion->query("SET NAMES utf8");
    }
    catch (Exception $e)
    {
        echo('connexion impossible');
        die();
    }
?>