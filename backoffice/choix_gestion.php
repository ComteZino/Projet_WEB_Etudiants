<?php 
    session_start();
    if(empty($_SESSION['statut'])or $_SESSION['statut']!="Admin") 
    {
        header('Location: ../frontoffice/authentification.php');
    }
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../css/style.css" />
        <link rel="stylesheet" href="../css/styleGestionCompte.css">
        <title>Gestion anciens étudiants</title>
    </head>
    <body>
        <?php include 'header.php'; ?>
        <?php include 'menu.php'; ?>      
        <div class="form-style-5">
            <form method="post" action="ajouter.php">
		<input id="voir" type="submit" value="Créer un compte"  />           
            </form>
            <form method="post" action="modifier.php"> 
                <input id="edit" type="submit" value="Modifier un compte" />
            </form>
            <form method="post" action="supprimer.php">
                <input id="edit" type="submit" value="Supprimer un compte" />
            </form>
	</div>
    </body>
</html>