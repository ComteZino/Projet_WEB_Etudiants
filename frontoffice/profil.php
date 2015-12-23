<?php 
   session_start();
    if(empty($_SESSION['statut']) or $_SESSION['statut']!="Util") 
    {
        header('Location: authentification.php');
    }
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

    $totalInfos=$nom."/".$prenom."/".$dateNaissance."/".$anEntre."/".$anSortie."/".$cursus."/".$adresse."/".$cp."/".$ville."/".$fixe."/"
            .$mobile."/".$mail."/".$emploi."/".$typeContrat."/".$entreprise."/".$adresseEnt."/".$secteurActivite."/".$formation."/".$anneeFormation."/".$discipline;
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
                                <p>".$nom."</p>
                                <p>".$prenom."</p>
                                <p>Né le : ".$dateNaissance."</p>
                            </fieldset>";
                        echo "<p id="."information_non_renseigne".">Vous n'avez pas encore renseigné toutes vos informations !</p>
                            <input type="."button"." value="."Modifier"." onClick="."afficheFormulaire("."'".$totalInfos."'".");"." />";
                    }
                    else
                    {
                        echo "<fieldset>
                                <legend><span class="."number"." id="."number1".">1</span>Vous êtes :</legend>
                                <p>".$nom."</p>
                                <p>".$prenom."</p>
                                <p>Né le : ".$dateNaissance."</p>
                            </fieldset>
                            <fieldset>
                                <legend><span class="."number"." id="."number2".">2</span>Votre passage dans l'établissement</legend>
                                <p>Vous êtes entré dans l'établissement en : ".$anEntre."</p>
                                <p>Et vous y êtes sortie en : ".$anSortie."</p>
                                <p>Pour un : ".$cursus."</p>
                            </fieldset>
                            <fieldset>
                                <legend><span class="."number"." id="."number3".">3</span>Comment vous contacter?</legend>
                                <p>Votre adresse : ".$adresse."</p>
                                <p>Votre code postal: ".$cp."</p>
                                <p>Votre ville : ".$ville."</p>
                                <p>Votre numéro de téléphone fixe : ".$fixe."</p>
                                <p>Votre numéro de portable : ".$mobile."</p>
                                <p>Votre eMail : ".$mail."</p>
                            </fieldset>";
                            if(empty($emploi) and empty($typeContrat) and empty($entreprise) and empty($adresseEnt) and empty($secteurActivite) and empty($formation) and empty($anneeFormation) and empty($discipline))
                            {
                                echo "<p id="."information_non_renseigne".">Vous n'avez pas rien renseigné pour vos poursuite d'études et votre emploi
                                        si vous voulez modifier cela cliquer sur le boutton si dessous :</p>
                                <input type="."button"." value="."Modifier"." onClick="."afficheFormulaire("."'".$totalInfos."'".");"." />";
                            }
                            else
                            {
                                echo "<fieldset>
                                        <legend><span class="."number"." id="."number4".">1</span>Poursuite d'études</legend>
                                        <p>Vous avez fait : ".$formation."</p>
                                        <p>En : ".$anneeFormation."</p>
                                        <p>Votre discipline : ".$discipline."</p>
                                    </fieldset>
                                    <fieldset>
                                        <legend><span class="."number"." id="."number5".">1</span>Votre parcours professionnel</legend>
                                        <p>Vous emploi : ".$emploi."</p>
                                        <p>Le type de contract : ".$typeContrat."</p>
                                        <p>Dans l'entreprise : ".$entreprise."</p>
                                        <p>Adresse de l'entreprise : ".$adresseEnt."</p>
                                        <p>Dans le secteur d'activité : ".$secteurActivite."</p>
                                    </fieldset>
                                    <p>Pour modifier vos informations, cliquez sur le boutton si dessous :</p>
                                    <input type="."button"." value="."Modifier"." onClick="."afficheFormulaire("."'".$totalInfos."'".");"." />";
                            }
                            //<input type="."button"." value="."Modifier"." onClick="."afficheFormulaire("."'".$nom."'".","."'".$prenom."'".","."'".$dateNaissance."'".");"." />";
                    }
                ?>

            </form>
        </div>
    </body>
</html>