<?php 
    require_once('../../frontoffice/connexionBD.php');
    if(empty($_SESSION['statut'])or $_SESSION['statut']!="Admin") 
    {
        header('Location: ../frontoffice/authentification.php');
    }
    $id = htmlentities($_POST["id"]);
    $select_informations = ("Select * from etudiant, compte where compte.idEtud=etudiant.id and etudiant.id = ".$id.";");
    $query_select = $connexion->query($select_informations);
    /*$ligne = $query_select->fetch();
    if($ligne["statut"] == "Util")
    {
        $statut = "Utilisateur";
    }*/
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../../css/style.css" />
        <link rel="stylesheet" href="../../css/styleGestionCompte.css">
        <title></title>
    </head>
    <body>
        <?php include 'header.php'; ?>
        <?php include 'menu.php'; ?>      
        <div class="form-style-5">
            <fieldset>
                <legend>Le compte suivant sera supprimé :</legend>
                <label for="statut"><?php echo "Statut : ".$statut; ?></label>
                <label for="nom"><?php echo "Nom : ".$ligne["nom"]; ?></label>
                <label for="prenom"><?php echo "Prénom : ".$ligne["prenom"]; ?></label>
                <label for="dateN"><?php echo "Date de naissance : ".$ligne["dateNaissance"]; ?></label>
                <label for="login"><?php echo "Identifiant : ".$ligne["login"]; ?></label>
            </fieldset>
            <a href="../supp.php"><input type="button" name="nom" value="Supprimer ce compte"></a>
	</div>
    </body>
</html>