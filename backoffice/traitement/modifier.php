<?php 
    require_once('../../frontoffice/connexionBD.php');
    if(empty($_SESSION['statut'])or $_SESSION['statut']!="Admin") 
    {
        header('Location: ../frontoffice/authentification.php');
    }
    
    $id = htmlentities($_POST["id"]);
    if((isset($_POST["statut"])) && (strlen(trim($_POST["statut"])) > 0))
    {
        $statut = htmlentities($_POST["statut"]);
        if($statut == "Administrateur")
        {
            $statut_update = "Admin";
        }
        else
        {
            $statut_update = "Util";
        }
    }
    else
    {
        $select_statut = $connexion->query("Select statut from compte where idEtud =".$id.";");
        $ligne = $select_statut->fetch();
        $statut_update = $ligne["statut"];
        if($statut_update == "Admin")
        {
            $statut = "Administrateur";
        }
        else
        {
            $statut = "Utilisateur";
        }
    }
    
    if((isset($_POST["login"])) && (strlen(trim($_POST["login"])) > 0))
    {
        $login = htmlentities($_POST["login"]);
    }
    else
    {
        $select_login = $connexion->query("Select login from compte where idEtud =".$id.";");
        $ligne = $select_login->fetch();
        $login = $ligne["login"];
    }
    
    if((isset($_POST["mdp"])) && (strlen(trim($_POST["mdp"])) > 0))
    {
        $mdp = htmlentities($_POST["mdp"]);
        $change_mdp = 1;
    }
    else
    {
        $mdp = "Non changé";
        $change_mdp = 0;
    }
    
    if((isset($_POST["nom"])) && (strlen(trim($_POST["nom"])) > 0))
    {
        $nom = htmlentities($_POST["nom"]);
    }
    else
    {
        $select_nom = $connexion->query("Select nom from etudiant where id =".$id.";");
        $ligne = $select_nom->fetch();
        $nom = $ligne["nom"];
    }
    
    if((isset($_POST["prenom"])) && (strlen(trim($_POST["prenom"])) > 0))
    {
        $prenom = htmlentities($_POST["prenom"]);
    }
    else
    {
        $select_prenom = $connexion->query("Select prenom from etudiant where id =".$id.";");
        $ligne = $select_prenom->fetch();
        $prenom = $ligne["prenom"];
    }
    
    if((isset($_POST["dateN"])) && (strlen(trim($_POST["dateN"])) > 0))
    {
        $dateN = htmlentities($_POST["dateN"]);
    }
    else
    {
        $select_dateN = $connexion->query("Select dateNaissance from etudiant where id =".$id.";");
        $ligne = $select_dateN->fetch();
        $dateN = $ligne["dateNaissance"];
    }
    if($change_mdp == 0)
    {
        $update_compte = $connexion->exec("UPDATE compte 
            SET login = '".$login."',  
            statut = '".$statut_update."'
            WHERE idEtud = ".$id.";");
    }
    else
    {
        $update_compte = $connexion->exec("UPDATE compte 
            SET login = '".$login."', 
            password = '".MD5($mdp)."',
            statut = '".$statut_update."'
            WHERE idEtud = ".$id.";");
    }
    $update_etudiant = $connexion->exec("UPDATE etudiant 
            SET nom = '".$nom."', 
            prenom = '".$prenom."',
            dateNaissance = '".$dateN."'
            WHERE id = ".$id.";");
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
        <!--- Zone fil ariane --->
        <div class="filAriane">
            <a href="../frontoffice/accueil.php">Accueil</a> » <a href="../choix_gestion_compte.php">Gestion des comptes</a> » Modification du compte
        </div>
        <div class="form-style-5">
            <fieldset>
                <legend>Les modifications du compte : </legend>
                <label for="statut"><?php echo "Statut : ".$statut; ?></label>
                <label for="nom"><?php echo "Nom : ".$nom; ?></label>
                <label for="prenom"><?php echo "Prénom : ".$prenom; ?></label>
                <label for="dateN"><?php echo "Date de naissance : ".$dateN; ?></label>
                <label for="login"><?php echo "Identifiant : ".$login; ?></label>
                <label for="mdp"><?php echo "Mot de passe : ".$mdp; ?></label>
                <a href="../choix_gestion_compte.php"><input type="button" name="nom" value="Retourner à la gestion"></a>
            </fieldset>
	</div>
    </body>
</html>