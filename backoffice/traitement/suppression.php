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
        <title>Gestion des comptes</title>
    </head>
    <body>
        <?php include 'header.php'; ?>
        <?php include 'menu.php'; ?>
        <!--- Zone fil ariane --->
        <div class="filAriane">
            <a href="../frontoffice/accueil.php">Accueil</a> » <a href="../choix_gestion_compte.php">Gestion des comptes</a> » Suppression du compte
        </div>
        <div class="box-gestion">
            <form method="post" action="supp.php">
                <h1>Le compte suivant sera supprimé</h1>
                <input type="hidden" name="id" value="<?php echo $id ?>"/>
                <label><span class="recap">Statut : </span><?php echo $statut; ?></label>
                <label><span class="recap">Nom : </span><?php echo $ligne["nom"]; ?></label>
                <label><span class="recap">Prénom : </span><?php echo $ligne["prenom"]; ?></label>
                <label><span class="recap">Date de naissance : </span><?php echo $ligne["dateNaissance"]; ?></label>
                <label><span class="recap">Identifiant : </span><?php echo $ligne["login"]; ?></label>
                <input class='bouton' type="submit" value="Supprimer ce compte"/>
                <br>
                <a href="../choix_gestion_compte.php"><input class='bouton' type="button" value="Retourner à la gestion"></a>
            </form>
	</div>
    </body>
</html>