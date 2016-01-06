<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<?php
    
    //-----------------------------------
    // Verification des champs
    //-----------------------------------
            
    $nombreErreur = 0; // Variable qui compte le nombre d'erreur
    
    /* Définit toutes les erreurs possibles */
   
    #Verification du champ identifiant
    if (empty($_POST['Identifiant']))
    {// Si la variable est vide
      $nombreErreur++;
      $erreur1 = '<p>Veuillez renseigner votre identifiant.</p>';
    }
    
    #Verification du champ mot de passe
    if (empty($_POST['Password']))
    {// Si la variable est vide
      $nombreErreur++;
      $erreur2 = '<p>Veuillez renseigner votre mot de passe.</p>';
    }

    // S'il n'y a pas d'erreur
    if ($nombreErreur==0)
    { 
        if ($_POST)
        {
            $pseudo = htmlentities($_POST["Identifiant"]);
            $mdp = htmlentities($_POST["Password"]);
        }
        else
        {
            $pseudo = htmlentities($_GET["Identifiant"]);
            $mdp = htmlentities($_GET["Password"]);
        }
            require_once('connexionBD.php');
            $mdp=md5($mdp);
            $tableuser="SELECT * FROM compte WHERE login='".addslashes($pseudo)."' AND password='".addslashes($mdp)."'";

            $table = $connexion->query($tableuser);
            $ligne = $table->fetch();
            $statut=$ligne['statut'];
            $_SESSION['statut'] = $statut;
            $idEtud=$ligne['idEtud'];
            $_SESSION['idEtud'] = $idEtud;
            
            //récupération des données pour voir si c'est la première connexion de l'utilisateur
            $tablePassage="SELECT * FROM passage WHERE idEtud='".$idEtud."'";     
            $table2 = $connexion->query($tablePassage);
            $ligne2 = $table2->fetch();
            $anEntreBD=$ligne2['anneeEntre'];
            $anSortieBD=$ligne2['anneeSortie'];
            $cursusBD=$ligne2['cursus'];

            $tableInfoEtud="SELECT * FROM infoetudiant WHERE id='".$idEtud."'";     
            $table3 = $connexion->query($tableInfoEtud);
            $ligne3 = $table3->fetch();
            $adresseBD=$ligne3['adresse'];
            $cpBD=$ligne3['cp'];
            $villeBD=$ligne3['ville'];
            $fixeBD=$ligne3['fixe'];
            $mobileBD=$ligne3['mobile'];
            $mailBD=$ligne3['mail'];
            if($pseudo==$ligne['login'] and $mdp==$ligne['password'])
            {	
                 if($statut!="Admin" and empty($anEntreBD) and empty($anSortieBD) and empty($cursusBD) and empty($adresseBD) and empty($cpBD) and empty($villeBD) and empty($fixeBD) and empty($mobileBD) and empty($mailBD))
                 {
                     header('Location: profil.php');  
                 }
                 else
                 {
                    header('Location: accueil.php');   
                 }
                
            }
            else
            {
                header('Location: authentification.php');    
            }
            $table->closeCursor();
    }
    
    // S'il y a au moins une erreur
    else
    { 
      echo '<div style="border:2px solid #109177; padding:5px;">';
      echo '<p style="color:#109177;">Désolé, il y a eu '.$nombreErreur.' erreur(s). Voici le détail des erreurs:</p>';
      if (isset($erreur1)) echo '<p>'.$erreur1.'</p>';
      if (isset($erreur2)) echo '<p>'.$erreur2.'</p>';
      if (isset($erreur3)) echo '<p>'.$erreur3.'</p>';
      if (isset($erreur4)) echo '<p>'.$erreur4.'</p>';
      if (isset($erreur5)) echo '<p>'.$erreur5.'</p>';
      // A coder : si un captcha anti-spam est erroné.
      echo '</div>';
    }
?>