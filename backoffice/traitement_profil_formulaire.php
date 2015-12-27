<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<?php   
    session_start();
    $part123NombreErreur = 0; // Variable qui compte le nombre d'erreur des parties 1,2,3
    $part4NombreErreur = 0; // Variable qui compte le nombre d'erreur de la partie 4
    $part5NombreErreur = 0; // Variable qui compte le nombre d'erreur de la partie 5
    
    /* Définit toutes les erreurs possibles */
   
    
    if (empty($_GET['nom']))
    {// Si la variable est vide
      $part123NombreErreur++;
    }
    if (empty($_GET['prenom']))
    {// Si la variable est vide
      $part123NombreErreur++;
    }
    if (empty($_GET['dtn']))
    {// Si la variable est vide
      $part123NombreErreur++;
    }
    if (empty($_GET['anEntre']))
    {// Si la variable est vide
      $part123NombreErreur++;
    }
    if (empty($_GET['anSortie']))
    {// Si la variable est vide
      $part123NombreErreur++;
    }
    if (empty($_GET['cursus']))
    {// Si la variable est vide
      $part123NombreErreur++;
    }
    if (empty($_GET['adresse']))
    {// Si la variable est vide
      $part123NombreErreur++;
    }
    if (empty($_GET['cp']))
    {// Si la variable est vide
      $part123NombreErreur++;
    }
    if (empty($_GET['ville']))
    {// Si la variable est vide
      $part123NombreErreur++;
    }
    if (empty($_GET['telfixe']))
    {// Si la variable est vide
      $part123NombreErreur++;
    }
    if (empty($_GET['mobile']))
    {// Si la variable est vide
      $part123NombreErreur++;
    }
    #Verification du champ email
    if (empty($_GET['email']))
    { // Si la variable est vide
        $part123NombreErreur++; // On incrémente la variable qui compte les erreurs
    } 
    else
    { //Sinon la variable existe
        if (!filter_var($_GET['email'], FILTER_VALIDATE_EMAIL)) // On vérifie 
        {
            $part123NombreErreur++; // On incrémente la variable qui compte les erreurs
        }
    }
    
    if (empty($_GET['formation']))
    { // Si la variable est vide
        $part4NombreErreur++; // On incrémente la variable qui compte les erreurs
    } 
    if (empty($_GET['annee']))
    { // Si la variable est vide
        $part4NombreErreur++; // On incrémente la variable qui compte les erreurs
    } 
    if (empty($_GET['discipline']))
    { // Si la variable est vide
        $part4NombreErreur++; // On incrémente la variable qui compte les erreurs
    } 

    if (empty($_GET['posteoccupe']))
    { // Si la variable est vide
        $part5NombreErreur++; // On incrémente la variable qui compte les erreurs
    } 
    if (empty($_GET['typecontrat']))
    { // Si la variable est vide
        $part5NombreErreur++; // On incrémente la variable qui compte les erreurs
    } 
    
    if (empty($_GET['entreprise']))
    { // Si la variable est vide
        $part5NombreErreur++; // On incrémente la variable qui compte les erreurs
    }
    if (empty($_GET['adresseentreprise']))
    { // Si la variable est vide
        $part5NombreErreur++; // On incrémente la variable qui compte les erreurs
    } 
    if (empty($_GET['secteuractivite']))
    { // Si la variable est vide
        $part5NombreErreur++; // On incrémente la variable qui compte les erreurs
    } 
    //récupération des données du formulaire
    $nom = htmlentities($_GET['nom']);
    $prenom = htmlentities($_GET['prenom']);
    $dtn = htmlentities($_GET['dtn']);
    $anEntre = htmlentities($_GET['anEntre']);
    $anSortie = htmlentities($_GET['anSortie']);
    $cursus = htmlentities($_GET['cursus']);
    $adresse = htmlentities($_GET['adresse']);
    $cp = htmlentities($_GET['cp']);
    $ville = htmlentities($_GET['ville']);
    $telfixe = htmlentities($_GET['telfixe']);
    $mobile = htmlentities($_GET['mobile']);
    $email = htmlentities($_GET['email']);
    $formation = htmlentities($_GET['formation']);
    $annee = htmlentities($_GET['annee']);
    $discipline = htmlentities($_GET['discipline']);
    $posteoccupe = htmlentities($_GET['posteoccupe']);
    $typecontrat = htmlentities($_GET['typecontrat']);
    $entreprise = htmlentities($_GET['entreprise']);
    $adresseentreprise= htmlentities($_GET['adresseentreprise']);
    $secteuractivite = htmlentities($_GET['secteuractivite']);
    
    //récupération des données de la base en fonction de l'idEtud pour gérer les cas UPDATE ou INSERT si des données sont déjà enregistrées ou non
    require_once('../frontoffice/connexionBD.php');
    $idEtud=$_SESSION['idEtud'];
    /*$tableEtudiant="SELECT * FROM etudiant WHERE id='".$idEtud."'";     
    $table1=$connexion->query($tableEtudiant);
    $ligne1 = $table1->fetch();
    $nomBD=$ligne1['nom'];
    $prenomBD=$ligne1['prenom'];
    $dateNaissanceBD=$ligne1['dateNaissance'];*/

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

    $tableParcoursPro="SELECT * FROM parcourspro WHERE idEtud='".$idEtud."'";     
    $table4 = $connexion->query($tableParcoursPro);
    $ligne4 = $table4->fetch();
    //$occupEmploi=$ligne4['occupEmploi'];
    $emploiBD=$ligne4['emploi'];
    $typeContratBD=$ligne4['typeContrat'];
    $entrepriseBD=$ligne4['entreprise'];
    $adresseEntBD=$ligne4['adresse'];
    $secteurActiviteBD=$ligne4['secteurActivite'];

    $tablePoursuiteEtude="SELECT * FROM poursuiteetudes WHERE idEtud='".$idEtud."'";     
    $table5 = $connexion->query($tablePoursuiteEtude);
    $ligne5 = $table5->fetch();
    $formationBD=$ligne5['formation'];
    $anneeFormationBD=$ligne5['anneeFormation'];
    $disciplineBD=$ligne5['discipline'];
    
    //incrémentation +1 sur le dernière id de la table passage pour le prochain insert
    $selectIdPassage = $connexion->query('Select * from passage');
    $idPassage=0;
    while($lgnIdPassage = $selectIdPassage->fetch()) // créé un nouvel id pour l'utilisateur
    {
        $idPassage = $lgnIdPassage["id"];
    }
    $idPassage = $idPassage + 1;
    
     //incrémentation +1 sur le dernière id de la table parcourspro pour le prochain insert
    $selectIdParcoursPro = $connexion->query('Select * from parcourspro');
    $idParcoursPro=0;
    while($lgnIdParcoursPro = $selectIdParcoursPro->fetch()) // créé un nouvel id pour l'utilisateur
    {
        $idParcoursPro = $lgnIdParcoursPro["id"];
    }
    $idParcoursPro = $idParcoursPro + 1;
    
     //incrémentation +1 sur le dernière id de la table poursuiteetudes pour le prochain insert
    $selectIdPoursuiteEtude = $connexion->query('Select * from poursuiteetudes');
    $idPoursuiteEtude=0;
    while($lgnIdPoursuiteEtude = $selectIdPoursuiteEtude->fetch()) // créé un nouvel id pour l'utilisateur
    {
        $idPoursuiteEtude = $lgnIdPoursuiteEtude["id"];
    }
    $idPoursuiteEtude = $idPoursuiteEtude + 1;
    
    //Gestion des différents cas en fonction des parties du formulaire remplit
    if($part123NombreErreur==0 && $part4NombreErreur==3 && $part5NombreErreur==5)
    {
        echo"cas 1 ok";
        if(empty($anEntreBD) and empty($anSortieBD) and empty($cursusBD) and empty($adresseBD) and empty($cpBD) and empty($villeBD) and empty($fixeBD) and empty($mobileBD) and empty($mailBD))
        {
            //insert
            $sql="INSERT INTO passage(id,anneeEntre,anneeSortie,cursus,idEtud ) VALUES('$idPassage', '$anEntre', '$anSortie','".str_replace(" ","-",$cursus)."','$idEtud')";
            $insertCas1 = $connexion->exec($sql);
            $sql="INSERT INTO infoetudiant(id,adresse,cp,ville,fixe,mobile,mail) VALUES('$idEtud', '".str_replace(" ","-",$adresse)."', '$cp','".str_replace(" ","-",$ville)."','$telfixe','$mobile','$email')";
            $insertCas1 = $connexion->exec($sql);
            $sql="UPDATE etudiant SET nom='".str_replace(" ","-",$nom)."', prenom='".str_replace(" ","-",$prenom)."', dateNaissance='".$dtn."'  WHERE id ='".$idEtud."' ";
            $updatecas1 = $connexion->exec($sql);
            header('Location: ../frontoffice/profil_formulaire_envoye.php');
        }
        else
        {
            //update
            $sql="UPDATE etudiant SET nom='".str_replace(" ","-",$nom)."', prenom='".str_replace(" ","-",$prenom)."', dateNaissance='".$dtn."'  WHERE id ='".$idEtud."' ";
            $updatecas1 = $connexion->exec($sql);
            $sql="UPDATE passage SET anneeEntre='".$anEntre."', anneeSortie='".$anSortie."',cursus='".str_replace(" ","-",$cursus)."'  WHERE idEtud ='".$idEtud."' ";
            $updatecas1 = $connexion->exec($sql);
            $sql="UPDATE infoetudiant SET adresse='".str_replace(" ","-",$adresse)."', cp='".$cp."', ville='".str_replace(" ","-",$ville)."' , fixe='".$telfixe."' , mobile='".$mobile."' , mail='".$email."'   WHERE id ='".$idEtud."' ";
            $updatecas1 = $connexion->exec($sql);
            header('Location: ../frontoffice/profil_formulaire_envoye.php');
        }
    }
    else
    {
        if($part123NombreErreur==0 && $part4NombreErreur==0 && $part5NombreErreur==5)
        {
            echo"cas 2 ok";
            if(empty($anEntreBD) and empty($anSortieBD) and empty($cursusBD) and empty($adresseBD) and empty($cpBD) and empty($villeBD) and empty($fixeBD) and empty($mobileBD) and empty($mailBD) and empty($formationBD) and empty($anneeFormationBD) and empty($disciplineBD))
            {
                //insert
                $sql="INSERT INTO passage(id,anneeEntre,anneeSortie,cursus,idEtud ) VALUES('$idPassage', '$anEntre', '$anSortie','".str_replace(" ","-",$cursus)."','$idEtud')";
                $insertCas2 = $connexion->exec($sql);
                $sql="INSERT INTO infoetudiant(id,adresse,cp,ville,fixe,mobile,mail) VALUES('$idEtud', '".str_replace(" ","-",$adresse)."', '$cp','".str_replace(" ","-",$ville)."','$telfixe','$mobile','$email')";
                $insertCas2 = $connexion->exec($sql);
                $sql="UPDATE etudiant SET nom='".str_replace(" ","-",$nom)."', prenom='".str_replace(" ","-",$prenom)."', dateNaissance='".$dtn."'  WHERE id ='".$idEtud."' ";
                $updatecas2 = $connexion->exec($sql);
                $sql="INSERT INTO poursuiteetudes(id,formation,anneeFormation,discipline,idEtud ) VALUES('$idPoursuiteEtude', '".str_replace(" ","-",$formation)."', '$annee','".str_replace(" ","-",$discipline)."','$idEtud')";
                $insertCas2 = $connexion->exec($sql);
                header('Location: ../frontoffice/profil_formulaire_envoye.php');
            }
            else
            {
                //update
                $sql="UPDATE etudiant SET nom='".str_replace(" ","-",$nom)."', prenom='".str_replace(" ","-",$prenom)."', dateNaissance='".$dtn."'  WHERE id ='".$idEtud."' ";
                $updatecas2 = $connexion->exec($sql);
                $sql="UPDATE passage SET anneeEntre='".$anEntre."', anneeSortie='".$anSortie."',cursus='".str_replace(" ","-",$cursus)."'  WHERE idEtud ='".$idEtud."' ";
                $updatecas2 = $connexion->exec($sql);
                $sql="UPDATE infoetudiant SET adresse='".str_replace(" ","-",$adresse)."', cp='".$cp."', ville='".str_replace(" ","-",$ville)."' , fixe='".$telfixe."' , mobile='".$mobile."' , mail='".$email."'   WHERE id ='".$idEtud."' ";
                $updatecas2 = $connexion->exec($sql);
                if(empty($formationBD) and empty($anneeFormationBD) and empty($disciplineBD))
                {
                    $sql="INSERT INTO poursuiteetudes(id,formation,anneeFormation,discipline,idEtud ) VALUES('$idPoursuiteEtude', '".str_replace(" ","-",$formation)."', '$annee','".str_replace(" ","-",$discipline)."','$idEtud')";
                    $insertCas2 = $connexion->exec($sql);
                }
                else
                {
                   
                    $sql="UPDATE poursuiteetudes SET formation='".str_replace(" ","-",$formation)."', anneeFormation='".$annee."', discipline='".str_replace(" ","-",$discipline)."' WHERE idEtud ='".$idEtud."' ";
                     echo $sql;
                    $updatecas2 = $connexion->exec($sql);
                }
                header('Location: ../frontoffice/profil_formulaire_envoye.php');
            }
        }
        else
        {
            if($part123NombreErreur==0 && $part4NombreErreur==3 && $part5NombreErreur==0)
            {
                echo"cas 3 ok";
                if(empty($anEntreBD) and empty($anSortieBD) and empty($cursusBD) and empty($adresseBD) and empty($cpBD) and empty($villeBD) and empty($fixeBD) and empty($mobileBD) 
                   and empty($mailBD) and empty($emploiBD) and empty($typeContratBD) and empty($entrepriseBD) and empty($adresseEntBD) and empty($secteurActiviteBD))
                {
                    //insert
                    $sql="INSERT INTO passage(id,anneeEntre,anneeSortie,cursus,idEtud ) VALUES('$idPassage', '$anEntre', '$anSortie','".str_replace(" ","-",$cursus)."','$idEtud')";
                    $insertCas3 = $connexion->exec($sql);
                    $sql="INSERT INTO infoetudiant(id,adresse,cp,ville,fixe,mobile,mail) VALUES('$idEtud', '".str_replace(" ","-",$adresse)."', '$cp','".str_replace(" ","-",$ville)."','$telfixe','$mobile','$email')";
                    $insertCas3 = $connexion->exec($sql);
                    $sql="UPDATE etudiant SET nom='".str_replace(" ","-",$nom)."', prenom='".str_replace(" ","-",$prenom)."', dateNaissance='".$dtn."'  WHERE id ='".$idEtud."' ";
                    $updatecas3 = $connexion->exec($sql);
                    $sql="INSERT INTO parcourspro(id,emploi,typeContrat,entreprise,adresse,secteurActivite,idEtud ) VALUES('$idParcoursPro', '".str_replace(" ","-",$posteoccupe)."', '$typecontrat','".str_replace(" ","-",$entreprise)."','".str_replace(" ","-",$adresseentreprise)."','".str_replace(" ","-",$secteuractivite)."','$idEtud')";
                    $insertCas3 = $connexion->exec($sql);
                    header('Location: ../frontoffice/profil_formulaire_envoye.php');
                }
                else
                {
                    //update
                    $sql="UPDATE etudiant SET nom='".str_replace(" ","-",$nom)."', prenom='".str_replace(" ","-",$prenom)."', dateNaissance='".$dtn."'  WHERE id ='".$idEtud."' ";
                    $updatecas2 = $connexion->exec($sql);
                    $sql="UPDATE passage SET anneeEntre='".$anEntre."', anneeSortie='".$anSortie."',cursus='".str_replace(" ","-",$cursus)."'  WHERE idEtud ='".$idEtud."' ";
                    $updatecas2 = $connexion->exec($sql);
                    $sql="UPDATE infoetudiant SET adresse='".str_replace(" ","-",$adresse)."', cp='".$cp."', ville='".str_replace(" ","-",$ville)."' , fixe='".$telfixe."' , mobile='".$mobile."' , mail='".$email."'   WHERE id ='".$idEtud."' ";
                    $updatecas2 = $connexion->exec($sql);
                    if(empty($emploiBD) and empty($typeContratBD) and empty($entrepriseBD) and empty($adresseEntBD) and empty($secteurActiviteBD))
                    {
                       $sql="INSERT INTO parcourspro(id,emploi,typeContrat,entreprise,adresse,secteurActivite,idEtud ) VALUES('$idParcoursPro', '".str_replace(" ","-",$posteoccupe)."', '$typecontrat','".str_replace(" ","-",$entreprise)."','".str_replace(" ","-",$adresseentreprise)."','".str_replace(" ","-",$secteuractivite)."','$idEtud')";
                        $insertCas2 = $connexion->exec($sql);
                    }
                    else
                    {
                        $sql="UPDATE parcourspro SET emploi='".str_replace(" ","-",$posteoccupe)."', typeContrat='".$typecontrat."', entreprise='".str_replace(" ","-",$entreprise)."', adresse='".str_replace(" ","-",$adresseentreprise)."',secteurActivite='".str_replace(" ","-",$secteuractivite)."' WHERE idEtud ='".$idEtud."' ";
                        $updatecas2 = $connexion->exec($sql);
                    }
                    header('Location: ../frontoffice/profil_formulaire_envoye.php');
                }
            }
            else
            {
                if($part123NombreErreur==0 && $part4NombreErreur==0 && $part5NombreErreur==0)
                {
                    echo"cas 4 ok";
                    if(empty($anEntreBD) and empty($anSortieBD) and empty($cursusBD) and empty($adresseBD) and empty($cpBD) and empty($villeBD) and empty($fixeBD) 
                       and empty($mobileBD) and empty($mailBD) and empty($formationBD) and empty($anneeFormationBD) and empty($disciplineBD) and empty($emploiBD) 
                       and empty($typeContratBD) and empty($entrepriseBD) and empty($adresseEntBD) and empty($secteurActiviteBD))
                    {
                        //insert
                        $sql="INSERT INTO passage(id,anneeEntre,anneeSortie,cursus,idEtud ) VALUES('$idPassage', '$anEntre', '$anSortie','".str_replace(" ","-",$cursus)."','$idEtud')";
                        $insertCas4 = $connexion->exec($sql);
                        $sql="INSERT INTO infoetudiant(id,adresse,cp,ville,fixe,mobile,mail) VALUES('$idEtud', '".str_replace(" ","-",$adresse)."', '$cp','".str_replace(" ","-",$ville)."','$telfixe','$mobile','$email')";
                        $insertCas4 = $connexion->exec($sql);
                        $sql="UPDATE etudiant SET nom='".str_replace(" ","-",$nom)."', prenom='".str_replace(" ","-",$prenom)."', dateNaissance='".$dtn."'  WHERE id ='".$idEtud."' ";
                        $updatecas4 = $connexion->exec($sql);
                        $sql="INSERT INTO parcourspro(id,emploi,typeContrat,entreprise,adresse,secteurActivite,idEtud ) VALUES('$idParcoursPro', '".str_replace(" ","-",$posteoccupe)."', '$typecontrat','".str_replace(" ","-",$entreprise)."','".str_replace(" ","-",$adresseentreprise)."','".str_replace(" ","-",$secteuractivite)."','$idEtud')";
                        $insertCas4 = $connexion->exec($sql);
                        $sql="INSERT INTO poursuiteetudes(id,formation,anneeFormation,discipline,idEtud ) VALUES('$idPoursuiteEtude', '".str_replace(" ","-",$formation)."', '$annee','".str_replace(" ","-",$discipline)."','$idEtud')";
                        $insertCas4 = $connexion->exec($sql);
                        header('Location: ../frontoffice/profil_formulaire_envoye.php');
                    }
                    else
                    {
                        //update
                        $sql="UPDATE etudiant SET nom='".str_replace(" ","-",$nom)."', prenom='".str_replace(" ","-",$prenom)."', dateNaissance='".$dtn."'  WHERE id ='".$idEtud."' ";
                        $updatecas4 = $connexion->exec($sql);
                        $sql="UPDATE passage SET anneeEntre='".$anEntre."', anneeSortie='".$anSortie."',cursus='".str_replace(" ","-",$cursus)."'  WHERE idEtud ='".$idEtud."' ";
                        $updatecas4 = $connexion->exec($sql);
                        $sql="UPDATE infoetudiant SET adresse='".str_replace(" ","-",$adresse)."', cp='".$cp."', ville='".str_replace(" ","-",$ville)."' , fixe='".$telfixe."' , mobile='".$mobile."' , mail='".$email."'   WHERE id ='".$idEtud."' ";
                        $updatecas4 = $connexion->exec($sql);
                        if(empty($emploiBD) and empty($typeContratBD) and empty($entrepriseBD) and empty($adresseEntBD) and empty($secteurActiviteBD))
                        {
                            $sql="INSERT INTO parcourspro(id,emploi,typeContrat,entreprise,adresse,secteurActivite,idEtud ) VALUES('$idParcoursPro', '".str_replace(" ","-",$posteoccupe)."', '$typecontrat','".str_replace(" ","-",$entreprise)."','".str_replace(" ","-",$adresseentreprise)."','".str_replace(" ","-",$secteuractivite)."','$idEtud')";
                             $insertCas4 = $connexion->exec($sql);
                        }
                        else
                        {
                             $sql="UPDATE parcourspro SET emploi='".str_replace(" ","-",$posteoccupe)."', typeContrat='".$typecontrat."', entreprise='".str_replace(" ","-",$entreprise)."', adresse='".str_replace(" ","-",$adresseentreprise)."',secteurActivite='".str_replace(" ","-",$secteuractivite)."' WHERE idEtud ='".$idEtud."' ";
                             $updatecas4 = $connexion->exec($sql);
                        }
                        if(empty($formationBD) and empty($anneeFormationBD) and empty($disciplineBD))
                        {
                            $sql="INSERT INTO poursuiteetudes(id,formation,anneeFormation,discipline,idEtud ) VALUES('$idPoursuiteEtude', '".str_replace(" ","-",$formation)."', '$annee','".str_replace(" ","-",$discipline)."','$idEtud')";
                            $insertCas4 = $connexion->exec($sql);
                        }
                        else
                        {

                            $sql="UPDATE poursuiteetudes SET formation='".str_replace(" ","-",$formation)."', anneeFormation='".$annee."', discipline='".str_replace(" ","-",$discipline)."' WHERE idEtud ='".$idEtud."' ";
                             echo $sql;
                            $updatecas4 = $connexion->exec($sql);
                        }
                        header('Location: ../frontoffice/profil_formulaire_envoye.php');
                    }
                }
                else
                {
                    
                }
            }
        }
    }

?>

