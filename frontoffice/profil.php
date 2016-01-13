<?php 
   session_start();
    if(empty($_SESSION['statut']) or $_SESSION['statut']!="Util") 
    {
        header('Location: authentification.php');
    }
    $_SESSION["page"] = "profil";
    require_once('connexionBD.php');
    $idEtud=$_SESSION['idEtud'];
    $tableEtudiant="SELECT * FROM etudiant WHERE id='".$idEtud."'";     
    $table1=$connexion->query($tableEtudiant);
    $ligne1 = $table1->fetch();
    $nom=$ligne1['nom'];
    $prenom=$ligne1['prenom'];
    $dateNaissance=$ligne1['dateNaissance'];

    $tablePassage="SELECT * FROM passage WHERE idEtud='".$idEtud."'";     
    $table2 = $connexion->query($tablePassage);
    $ligne2 = $table2->fetch();
    $anEntre=$ligne2['anneeEntre'];
    $anSortie=$ligne2['anneeSortie'];
    $cursus=$ligne2['cursus'];

    $tableInfoEtud="SELECT * FROM infoetudiant WHERE id='".$idEtud."'";     
    $table3 = $connexion->query($tableInfoEtud);
    $ligne3 = $table3->fetch();
    $adresse=$ligne3['adresse'];
    $cp=$ligne3['cp'];
    $ville=$ligne3['ville'];
    $fixe=$ligne3['fixe'];
    $mobile=$ligne3['mobile'];
    $mail=$ligne3['mail'];

    $tableParcoursPro="SELECT * FROM parcourspro WHERE idEtud='".$idEtud."'";     
    $table4 = $connexion->query($tableParcoursPro);
    $ligne4 = $table4->fetch();
    //$occupEmploi=$ligne4['occupEmploi'];
    $emploi=$ligne4['emploi'];
    $typeContrat=$ligne4['typeContrat'];
    $entreprise=$ligne4['entreprise'];
    $adresseEnt=$ligne4['adresse'];
    $secteurActivite=$ligne4['secteurActivite'];

    $tablePoursuiteEtude="SELECT * FROM poursuiteetudes WHERE idEtud='".$idEtud."'";     
    $table5 = $connexion->query($tablePoursuiteEtude);
    $ligne5 = $table5->fetch();
    $formation=$ligne5['formation'];
    $anneeFormation=$ligne5['anneeFormation'];
    $discipline=$ligne5['discipline'];
    
    $tableStage="SELECT * FROM stage WHERE idEtud='".$idEtud."'"; 
    $table6 = $connexion->query($tableStage);
    $ligne6 = $table6->fetch();
    $idStage=$ligne6['id'];
    $entNom=$ligne6['EntNom'];
    $entVille=$ligne6['EntVille'];
    $ligne6 = $table6->fetch();
    $idStage2=$ligne6['id'];
    $entNom2=$ligne6['EntNom'];
    $entVille2=$ligne6['EntVille'];
    
    $_SESSION['idStage']=$idStage;
    $_SESSION['idStage2']=$idStage2;

    $totalInfos=$nom."/".$prenom."/".$dateNaissance."/".$anEntre."/".$anSortie."/".$cursus."/".$adresse."/".$cp."/".$ville."/".$fixe."/"
            .$mobile."/".$mail."/".$formation."/".$anneeFormation."/".$discipline."/".$emploi."/".$typeContrat."/".$entreprise."/".$adresseEnt."/"
            .$secteurActivite."/".$entNom."/".$entVille."/".$entNom2."/".$entVille2;
?>
<html>
    <head>
      <meta charset="utf-8">
      <meta http-equiv="content-type" content="text/html; charset=utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
      <title></title>
      <link rel="stylesheet" href="../css/style.css">
      <link rel="stylesheet" href="../css/styleProfil.css">
	  <script type="text/javascript" src="../js/profil_formulaire.js"> </script>
    </head>
    <body id="ajout">
        <?php include 'header.php'; ?>
        <?php include 'menu.php'; ?>  
            <div id="divPrincipal" class="form-style-5">
            <form id="modifForm">
                <?php 
                    if(empty($anEntre) and empty($anSortie) and empty($cursus) and empty($adresse) and empty($cp) and empty($ville) and empty($fixe) and empty($mobile) and empty($mail))
                    {
                         echo "<fieldset>
                                <legend><span class="."number"." id="."number1".">1</span>Vous êtes :</legend>
                                <p>".str_replace("-"," ",$nom)."</p>
                                <p>".str_replace("-"," ",$prenom)."</p>
                                <p>Né le : ".$dateNaissance."</p>
                            </fieldset>";
                        echo "<p id="."information_non_renseigne".">Vous n'avez pas encore renseigné toutes vos informations !</p>";
                    }
                    else
                    {
                        echo "<fieldset>
                                <legend><span class="."number"." id="."number1".">1</span>Vous êtes :</legend>
                                <p>".str_replace("-"," ",$nom)."</p>
                                <p>".str_replace("-"," ",$prenom)."</p>
                                <p>Né le : ".$dateNaissance."</p>
                            </fieldset>
                            <fieldset>
                                <legend><span class="."number"." id="."number2".">2</span>Votre passage dans l'établissement</legend>
                                <p>Vous êtes entré dans l'établissement en : ".$anEntre."</p>
                                <p>Et vous y êtes sortie en : ".$anSortie."</p>
                                <p>Pour un : ".str_replace("-", " ", $cursus)."</p>
                            </fieldset>
                            <fieldset>
                                <legend><span class="."number"." id="."number3".">3</span>Comment vous contacter?</legend>
                                <p>Votre adresse : ".str_replace("-"," ",$adresse)."</p>
                                <p>Votre code postal: ".$cp."</p>
                                <p>Votre ville : ".str_replace("-"," ",$ville)."</p>
                                <p>Votre numéro de téléphone fixe : ".$fixe."</p>
                                <p>Votre numéro de portable : ".$mobile."</p>
                                <p>Votre eMail : ".$mail."</p>
                            </fieldset>";
                        if( empty($formation) and empty($anneeFormation) and empty($discipline))
                        {
                            echo "<p id="."information_non_renseigne".">Partie 4 qui est votre poursuite d'études
                                    non renseigné</p>";
                        }
                        else
                        {
                            echo "<fieldset>
                                    <legend><span class="."number"." id="."number4".">4</span>Poursuite d'études</legend>
                                    <p>Vous avez fait : ".str_replace("-"," ",$formation)."</p>
                                    <p>En : ".$anneeFormation."</p>
                                    <p>Votre discipline : ".str_replace("-"," ",$discipline)."</p>
                                </fieldset>";
                        }
                        if(empty($emploi) and empty($typeContrat) and empty($entreprise) and empty($adresseEnt) and empty($secteurActivite))
                        {
                            echo "<p id="."information_non_renseigne".">Partie 5 qui est votre emploi
                            non renseigné</p>";
                        }
                        else
                        {
                            echo "<fieldset>
                                <legend><span class="."number"." id="."number5".">5</span>Votre parcours professionnel</legend>
                                <p>Vous emploi : ".str_replace("-"," ",$emploi)."</p>
                                <p>Le type de contract : ".$typeContrat."</p>
                                <p>Dans l'entreprise : ".str_replace("-"," ",$entreprise)."</p>
                                <p>Adresse de l'entreprise : ".str_replace("-"," ",$adresseEnt)."</p>
                                <p>Dans le secteur d'activité : ".str_replace("-"," ",$secteurActivite)."</p>
                                </fieldset>";
                        }
                        if(empty($entNom) and empty($entVille))
                        {
                            echo "<p id="."information_non_renseigne".">Partie 6 qui concerne vos stages
                                    non renseigné</p>";
                        }
                        else
                        {
                            echo "<fieldset>
                                <legend><span class="."number"." id="."number6".">6</span>Vos stages</legend>
                                <label>Stage de première année</label>
                                <p>Nom de l'entreprise : ".str_replace("-"," ",$entNom)."</p>
                                <p>Ville d'implentation : ".str_replace("-"," ",$entVille)."</p>
                                <label>Stage de deuxième année</label>
                                <p>Nom de l'entreprise : ".str_replace("-"," ",$entNom2)."</p>
                                <p>Ville d'implentation : ".str_replace("-"," ",$entVille2)."</p>
                                </fieldset>";
                        }   
                    }
                     echo "<p id="."information_non_renseigne".">Pour modifier, cliquez sur le boutton si dessous :</p>"
                        . "<input type="."button"." value="."Modifier"." onClick="."afficheFormulaire("."'".$totalInfos."'".");"." />";
                ?>
            </form>
        </div>
    </body>
</html>