<?php 
    session_start();
    if(empty($_SESSION['statut'])) 
    {
        header('Location: authentification.php');
    }
    $_SESSION["page"] = "accueil";
    require_once('connexionBD.php');
    $tableNewsLycee="SELECT * FROM news WHERE categorie='lycee' ORDER BY `date` desc";     
    $table = $connexion->query($tableNewsLycee);
    $ligne = $table->fetch();
    $auteurLycee=$ligne['auteur'];
    $titreLycee=$ligne['titre'];
    $contenuLycee=$ligne['contenu'];
    $dateLycee=$ligne['date'];
    
    $tableNewsMariage="SELECT * FROM news WHERE categorie='mariage' ORDER BY `date` desc";     
    $table1 = $connexion->query($tableNewsMariage);
    $ligne1 = $table1->fetch();
    $auteurMariage=$ligne1['auteur'];
    $titreMariage=$ligne1['titre'];
    $contenuMariage=$ligne1['contenu'];
    $dateMariage=$ligne1['date'];
    
    $tableNewsDeces="SELECT * FROM news WHERE categorie='deces' ORDER BY `date` desc";     
    $table2 = $connexion->query($tableNewsDeces);
    $ligne2 = $table2->fetch();
    $auteurDeces=$ligne2['auteur'];
    $titreDeces=$ligne2['titre'];
    $contenuDeces=$ligne2['contenu'];
    $dateDeces=$ligne2['date'];

?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../css/style.css" />
        <link rel="stylesheet" href="../css/styleAccueil.css" />
        <title></title>
    </head>
    <body>
        <?php include 'header.php'; ?>
        <?php include 'menu.php'; ?>
        
        <!--- Zone fil ariane --->
        <div class="filAriane">
            Accueil
        </div>
        
        <div class="box-principal">
            <div id="box_lycee" class="form-style-5">   
                
                    <legend><span class="number" id="number1">1</span>Dernière actualité du lycée :</legend>
                     <div class="actu_lycee">
                        <p><?php echo 'Auteur : ' . $auteurLycee . ' Date de publication : ' . $dateLycee; ?></p>
                        <p><?php echo $titreLycee; ?></p>
                        <p><?php echo substr(htmlspecialchars_decode(strip_tags($contenuLycee)), 0, 140) ; ?></p>
                     </div>
                
                <?php 
                    while($ligne = $table->fetch())
                    {
                        echo "<fieldset>";
                        echo "<div class="."actu_lycee".">";
                        echo "<p>Auteur : ".$ligne['auteur']." Date de Publication : ".$ligne['date']."</p>";
                        echo $ligne['titre'];
                        echo "<p>".substr(htmlspecialchars_decode(strip_tags($ligne['contenu'])), 0, 140)."</p>" ;
                        echo "</div>";
                        echo "</fieldset>";
                    }
                ?>
            </div>
            <div id="box_mariage" class="form-style-5">
                
                    <legend><span class="number" id="number2">2</span>Dernière actualité de Mariage :</legend>
                     <div class="actu_mariage">
                        <p><?php echo 'Auteur : ' . $auteurMariage . ' Date de publication : ' . $dateMariage; ?></p>
                        <p><?php echo $titreMariage; ?></p>
                        <p><?php echo substr(htmlspecialchars_decode(strip_tags($contenuMariage)), 0, 140); ?></p>
                    </div>
                
                <?php 
                    while($ligne1 = $table1->fetch())
                    {
                        echo "<fieldset>";
                        echo "<div class="."actu_mariage".">";
                        echo "<p>Auteur : ".$ligne1['auteur']." Date de Publication : ".$ligne1['date']."</p>";
                        echo $ligne1['titre'];
                        echo "<p>".substr(htmlspecialchars_decode(strip_tags($ligne1['contenu'])), 0, 140)."</p>" ;
                        echo "</div>";
                        echo "</fieldset>";
                    }
                ?>
            </div>
        </div>    
        <div id="container_two">
            <div id="box_deces" class="form-style-5">
                
                    <legend><span class="number" id="number3">3</span>Dernière actualité de décès :</legend>
                    <div class="actu_deces">
                        <p><?php echo 'Auteur : ' . $auteurDeces . ' Date de publication : ' . $dateDeces; ?></p>
                        <p><?php echo $titreDeces; ?></p>
                        <p><?php echo substr(htmlspecialchars_decode(strip_tags($contenuDeces)), 0, 140) ; ?></p>
                    </div>
                
                <?php 
                    while($ligne2 = $table2->fetch())
                    {
                        echo "<fieldset>";
                        echo "<div class="."actu_deces".">";
                        echo "<p>Auteur : ".$ligne2['auteur']." Date de Publication : ".$ligne2['date']."</p>";
                        echo $ligne2['titre'];
                        echo "<p>".substr(htmlspecialchars_decode(strip_tags($ligne2['contenu'])), 0, 140)."</p>" ;
                        echo "</div>";
                        echo "</fieldset>";
                    }
                ?>
            </div>
            <div id="box_naissance" class="form-style-5">
                
                    <legend><span class="number" id="number4">4</span>Dernière actualité de décès :</legend>
                    <p><?php echo 'Auteur : ' . $auteurDeces . ' Date de publication : ' . $dateDeces; ?></p>
                    <p><?php echo $titreDeces; ?></p>
                    <p><?php echo substr(htmlspecialchars_decode(strip_tags($contenuDeces)), 0, 140); ?></p>
                
            </div>
        </div> 
    </body>
</html>
