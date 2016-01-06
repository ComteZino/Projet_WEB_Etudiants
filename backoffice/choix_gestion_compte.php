<?php 
    require_once('../frontoffice/connexionBD.php');
    if(empty($_SESSION['statut'])or $_SESSION['statut']!="Admin") 
    {
        header('Location: ../frontoffice/authentification.php');
    }
    $select_comptes = ('Select id,nom,prenom from etudiant');
    $query_select = $connexion->query($select_comptes);
    $query_select2 = $connexion->query($select_comptes);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../css/style.css" />
        <link rel="stylesheet" href="../css/styleGestionCompte.css">
        <title>Gestion anciens étudiants</title>
    </head>
    <body>
        <?php include 'header.php'; ?>
        <?php include 'menu.php'; ?>      
        <div class="form-style-5">
            <form method="post" action="traitement/ajout.php">
                <fieldset>
                    <legend>Création d'un compte</legend>
                    <label for="statut">Quel type de compte va être créé ?</label>
                    <select id="statut" name="statut">
                        <option value="Utilisateur">Utilisateur</option>
                        <option value="Administrateur">Administrateur</option>
                    </select>   
                    <input name="login" type="login" placeholder="Identifiant *">
                    <input name="mdp" type="mdp" placeholder="Mot de passe *">
                    <input name="nom" type="nom" placeholder="Nom *">
                    <input name="prenom" type="prenom" placeholder="Prénom *">
                    <input name="dateN" type="prenom" placeholder="Date de naissance(A/M/J) *">
                    <input id="voir" type="submit" value="Créer le compte"/> 
                </fieldset>
            </form>
            <form method="post" action="traitement/modification.php">
                <fieldset>
                    <legend>Modification d'un compte</legend>
                    <label for="statut">Quel compte va être modifié ? </label>
                    <select id="id" name="id">
                        <?php
                            while($ligne = $query_select->fetch())
                            {
                                echo '<option value="'.$ligne["id"].'">'.$ligne["nom"].' '.$ligne["prenom"].'</option>';
                            }
                        ?>
                    </select>
                    <input id="voir" type="submit" value="Modifier ce compte"/>
                </fieldset>
            </form>
            <form method="post" action="traitement/suppression.php">
                <fieldset>
                    <legend>Suppression d'un compte</legend>
                    <label for="statut">Quel compte va être supprimé ?</label>
                    <select id="id" name="id">
                        <?php
                            while($lgn = $query_select2->fetch())
                            {
                                // N'affiche pas le compte courant
                                if($_SESSION["idEtud"] != $lgn["id"])
                                {
                                    echo '<option value="'.$lgn["id"].'">'.$lgn["nom"].' '.$lgn["prenom"].'</option>';
                                }
                            }
                        ?>
                    </select>
                    <input id="voir" type="submit" value="Supprimer ce compte"/>
                </fieldset>
            </form>
	</div>
    </body>
</html>