<?php 
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

