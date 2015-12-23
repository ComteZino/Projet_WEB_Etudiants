<?php 
    require_once('../../frontoffice/connexionBD.php');
    if(empty($_SESSION['statut'])or $_SESSION['statut']!="Admin") 
    {
        header('Location: ../frontoffice/authentification.php');
    }
    $id = htmlentities($_POST["id"]);
    $select_informations = ("Select * from etudiant, compte where compte.idEtud=etudiant.id and etudiant.id = ".$id.";");
    $query_select = $connexion->query($select_informations);
    $ligne = $query_select->fetch()
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../../css/style.css" />
        <link rel="stylesheet" href="../../css/styleGestionCompte.css">
        <title>Gestion anciens étudiants</title>
    </head>
    <body>
        <?php include 'header.php'; ?>
        <?php include 'menu.php'; ?>      
        <div class="form-style-5">
            <fieldset>
                <legend>Informations du compte à modifier :</legend>
                <label for="statut">Type du compte</label>
                <select id="statut" name="statut">
                    <?php
                        if($ligne["statut"] == "Admin")
                        {
                           echo '<option value="Utilisateur">Utilisateur</option>';
                           echo '<option value="Administrateur" selected>Administrateur</option>';
                        }
                        else
                        {
                           echo '<option value="Utilisateur">Utilisateur</option>'; 
                           echo '<option value="Administrateur">Administrateur</option>';
                        }
                    ?>
                </select>   
                <input name="login" type="login" placeholder="<?php echo $ligne["login"]?>">
                <input name="mdp" type="mdp" placeholder="<?php echo $ligne["password"]?>">
                <input name="nom" type="nom" placeholder="<?php echo $ligne["nom"]?>">
                <input name="prenom" type="prenom" placeholder="<?php echo $ligne["prenom"]?>">
                <input name="dateN" type="prenom" placeholder="<?php echo $ligne["dateNaissance"]?>">
            </fieldset>
            <a href="modifier.php"><input type="button" name="nom" value="Modifier ce compte"></a>
            <a href="../choix_gestion.php"><input type="button" name="nom" value="Retourner à la gestion"></a>
	</div>
    </body>
</html>