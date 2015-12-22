<?php 
    require_once('../../frontoffice/connexionBD.php');
    if(empty($_SESSION['statut'])or $_SESSION['statut']!="Admin") 
    {
        header('Location: ../frontoffice/authentification.php');
    }
    $statut = htmlentities($_POST["statut"]);
    $login = htmlentities($_POST["login"]);
    $mdp = htmlentities($_POST["mdp"]);
    $nom = htmlentities($_POST["nom"]);
    $prenom = htmlentities($_POST["prenom"]);
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
                <legend>Compte créé :</legend>
                <label for="statut"><?php echo "Statut du compte : ".$statut; ?></label>
                <label for="nom"><?php echo "Nom : ".$nom; ?></label>
                <label for="prenom"><?php echo "Prénom : ".$prenom; ?></label>
                <label for="login"><?php echo "Identifiant du compte : ".$login; ?></label>
                <label for="mdp"><?php echo "Mot de passe du compte : ".$mdp; ?></label>
            </fieldset>
            <input type="button" name="nom" value="Ajouter un autre compte">
	</div>
    </body>
</html>