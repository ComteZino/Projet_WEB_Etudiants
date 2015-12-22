<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<?php   
    //====================================
    // TRAITEMENT DE L'ENVOIE DE L'EMAIL
    //==================================== 
            
    //-----------------------------------
    // Verification des champs
    //-----------------------------------
            
    $nombreErreur = 0; // Variable qui compte le nombre d'erreur
    
    /* Définit toutes les erreurs possibles */
   
    #Verification du champ nom
    if (empty($_POST['nom']))
    {// Si la variable est vide
      $nombreErreur++;
      $erreur1 = '<p>Veuillez renseigner un nom.</p>';
    }

    #Verification du champ email
    if (empty($_POST['email']))
    { // Si la variable est vide
        $nombreErreur++; // On incrémente la variable qui compte les erreurs
        $erreur2 = '<p>Veuillez renseigner un email.</p>';
    } 
    else
    { //Sinon la variable existe
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) // On vérifie 
        {
            $nombreErreur++; // On incrémente la variable qui compte les erreurs
            $erreur3 = '<p>Veuillez renseigner un email valide.</p>';
        }
    }
 
    #Verification du champ message
    if (empty($_POST['message']))
    {// Si la variable est vide
      $nombreErreur++;
      $erreur4 = '<p>Veuillez renseigner un message.</p>';
    }
  
   
    // A coder : captcha anti-spam.
    
    //-----------------------------------
    // Mise en forme du message 
    //-----------------------------------
    
    // S'il n'y a pas d'erreur
    if ($nombreErreur==0)
    { 
      // Ici il faudra ajouter tout le code pour envoyer l'email.
      
    } 
    else
    { // S'il y a un moins une erreur
      echo '<div style="border:2px solid #109177; padding:5px;">';
      echo '<p style="color:#109177;">Désolé, il y a eu '.$nombreErreur.' erreur(s). Voici le détail des erreurs:</p>';
      if (isset($erreur1)) echo '<p>'.$erreur1.'</p>';
      if (isset($erreur2)) echo '<p>'.$erreur2.'</p>';
      if (isset($erreur3)) echo '<p>'.$erreur3.'</p>';
      if (isset($erreur4)) echo '<p>'.$erreur4.'</p>';
      // A coder : si un captcha anti-spam est erroné.
      echo '</div>';
    }
?>