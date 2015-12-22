<?php 
    require_once('../frontoffice/connexionBD.php');
    if(empty($_SESSION['statut'])or $_SESSION['statut']!="Admin") 
    {
        header('Location: ../frontoffice/authentification.php');
    }
    $select_idCompte = ('Select * from compte');
    $query_select = $connexion->query($select_idCompte);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../css/style.css" />
        <link rel="stylesheet" href="../css/styleGestionCompte.css">
        <title></title>
    </head>
    <body>
        <?php include 'header.php'; ?>
        <?php include 'menu.php'; ?>      
        <div class="form-style-5">
            <form method="post" action="suppression.php">
		<fieldset>
                    <legend>Suppression d'un compte</legend>
                    <label for="statut">Quel compte va être supprimé ? <span id='login'>(Affichage du login) ?!</span></label>
                    <select id="comptes" name="field4">
                        <?php
                            while($ligne = $query_select->fetch())
                            {
                                echo '<option value="'.$ligne["idEtud"].'">'.$ligne["login"].'</option>';
                            }
                        ?>
                    </select>
                    <input id="voir" type="submit" value="Supprimer ce compte"/>
		</fieldset>
            </form>
	</div>
    </body>
</html>