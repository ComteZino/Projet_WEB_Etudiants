<?php 
   session_start();
    if(empty($_SESSION['statut'])) 
    {
        header('Location: authentification.php');
    }
?>
<html>
    <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
      <title></title>
      <link rel="stylesheet" href="../css/style.css">
      <link rel="stylesheet" href="../css/styleProfil.css">
    </head>
    <body id="ajout">
        <?php include 'header.php'; ?>
        <?php include 'menu.php'; ?>  
	<div class="form-style-6">
            <form>
		<input id="voir" type="submit" value="Voir mes informations"  />           
            </form>
            <form method="post" action="formulaire.php">
                <input id="edit" type="submit" value="Editer mes informations" />
            </form>
	</div>
    </body>
</html>