<?php 
    require_once('../../frontoffice/connexionBD.php');
    if(empty($_SESSION['statut'])or $_SESSION['statut']!="Admin") 
    {
        header('Location: ../frontoffice/authentification.php');
    }
    $statut = htmlentities($_POST["statut"]);
    // $ok vaut 1 si tous les test sont ok 
    // sinon il sera passé à 0 et l'ajout ne sera pas effectué
    $ok = 1;
    //test des variables
    if((isset($_POST["login"])) && (strlen(trim($_POST["login"])) > 0))
    {
        $login = htmlentities($_POST["login"]);
    }
    else
    {
        $login = "Il faut renseigner un identifiant.";
        $ok = 0;
    }
    if((isset($_POST["mdp"])) && (strlen(trim($_POST["mdp"])) > 0))
    {
        $mdp = htmlentities($_POST["mdp"]);
    }
    else
    {
        $mdp = "Il faut renseigner un mot de passe.";
        $ok = 0;
    }
    if((isset($_POST["nom"])) && (strlen(trim($_POST["nom"])) > 0))
    {
        $nom = htmlentities($_POST["nom"]);
        $nom=str_replace(" ","-",$nom);
    }
    else
    {
        $nom = "Il faut renseigner un nom.";
        $ok = 0;
    }
    if((isset($_POST["prenom"])) && (strlen(trim($_POST["prenom"])) > 0))
    {
        $prenom = htmlentities($_POST["prenom"]);
        $prenom=str_replace(" ","-",$prenom);
    }
    else
    {
        $prenom = "Il faut renseigner un prénom.";
        $ok = 0;
    }
    if((isset($_POST["dateN"])) && (strlen(trim($_POST["dateN"])) > 0))
    {
        $dateN = htmlentities($_POST["dateN"]);
    }
    else
    {
        $dateN = "Il faut renseigner une date de naissance.";
        $ok = 0;
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
        <!--- Zone fil ariane --->
        <div class="filAriane">
            <a href="../frontoffice/accueil.php">Accueil</a> » <a href="../choix_gestion_compte.php">Gestion des comptes</a> » Ajout du compte
        </div>
        <div id="divPrincipal" class="box-gestion">
            <h1>
                <?php 
                if($ok == 0)
                {
                    echo "Le compte n'a pas été créé";
                }
                else
                {
                    echo "Compte créé";
                }
                ?>              
            </h1>
            <label><span class="recap">Statut du compte : </span><?php echo $statut; ?></label>
            <label><span class="recap">Nom : </span><?php echo $nom; ?></label>
            <label><span class="recap">Prénom : </span><?php echo $prenom; ?></label>
            <label><span class="recap">Date de naissance : </span><?php echo $dateN; ?></label>
            <label><span class="recap">Identifiant : </span><?php echo $login; ?></label>
            <label><span class="recap">Mot de passe : </span><?php echo $mdp; ?></label>
            <a href="../choix_gestion_compte.php"><input class='bouton' type="button" name="nom" value="Ajouter un compte"></a>
	</div>
    </body>
</html>

<?php 
    if($ok == 1)
    {
        $selectid = $connexion->query('Select * from compte');
        while($lgnid = $selectid->fetch()) // créé un nouvel id pour l'utilisateur
        {
            $id = $lgnid["idEtud"];
        }
        $id = $id + 1;
        // Affectation du statut correspondant à la base de données
        if($statut == "Utilisateur")
        {
            $statut = "Util";
        }
        else
        {
           $statut = "Admin";
        }
        $ajout_compte = ('INSERT INTO compte VALUES ("'.$id.'","'.$login.'", "'.MD5($mdp).'", "'.$statut.'")');
        $exec_compte = $connexion->exec($ajout_compte);
        
        $ajout_etud = ('INSERT INTO etudiant VALUES ("'.$id.'","'.$nom.'", "'.$prenom.'", "'.$dateN.'", null, null)');
        $exec_etud = $connexion->exec($ajout_etud);
    }
?>