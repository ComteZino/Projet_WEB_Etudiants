<?php 
    require_once('../frontoffice/connexionBD.php');
    if(empty($_SESSION['statut'])or $_SESSION['statut']!="Admin") 
    {
        header('Location: ../frontoffice/authentification.php');
    }
    $select_comptes = ('Select id,nom,prenom from etudiant');
    $query_select = $connexion->query($select_comptes);
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
            <form method="post" action="traitement/suppression.php">
		<fieldset>
                    <legend>Suppression d'un compte</legend>
                    <label for="statut">Quel compte va être supprimé ?</label>
                    <select id="id" name="id">
                        <?php
                            while($ligne = $query_select->fetch())
                            {
                                echo '<option value="'.$ligne["id"].'">'.$ligne["nom"].' '.$ligne["prenom"].'</option>';
                            }
                        ?>
                    </select>
                    <input type='hidden' name='id' value='<?php echo $ligne["id"]?>'/>
                    <input id="voir" type="submit" value="Supprimer ce compte"/>
		</fieldset>
            </form>
	</div>
    </body>
</html>