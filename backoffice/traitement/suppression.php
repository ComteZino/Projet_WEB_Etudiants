<?php 
    require_once('../../frontoffice/connexionBD.php');
    if(empty($_SESSION['statut'])or $_SESSION['statut']!="Admin") 
    {
        header('Location: ../frontoffice/authentification.php');
    }
    $id = htmlentities($_POST["id"]);
    $select_informations = ("Select * from etudiant, compte where compte.idEtud=etudiant.id and etudiant.id = ".$id.";");
    $query_select = $connexion->query($select_informations);
    $ligne = $query_select->fetch();
    if($ligne["statut"] == "Util")
    {
        $statut = "Utilisateur";
    }
    else
    {
        $statut = "Administrateur";
    }
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
            <form method="post" action="supp.php">
                <fieldset>
                    <legend>Le compte suivant sera supprimé :</legend>
                    <input type="hidden" name="id" value="<?php echo $id ?>"/>
                    <label for="statut"><?php echo "Statut : ".$statut; ?></label>
                    <label for="nom"><?php echo "Nom : ".$ligne["nom"]; ?></label>
                    <label for="prenom"><?php echo "Prénom : ".$ligne["prenom"]; ?></label>
                    <label for="dateN"><?php echo "Date de naissance : ".$ligne["dateNaissance"]; ?></label>
                    <label for="login"><?php echo "Identifiant : ".$ligne["login"]; ?></label>
                    <input id="voir" type="submit" value="Supprimer ce compte"/>
                    <a href="../choix_gestion_compte.php"><input type="button" name="nom" value="Retourner à la gestion"></a>
                </fieldset>
            </form>
	</div>
    </body>
</html>