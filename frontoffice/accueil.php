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

    
    $tableNewsMariage="SELECT * FROM news WHERE categorie='mariage' ORDER BY `date` desc";     
    $table1 = $connexion->query($tableNewsMariage);

    
    $tableNewsDeces="SELECT * FROM news WHERE categorie='deces' ORDER BY `date` desc";     
    $table2 = $connexion->query($tableNewsDeces);


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
            <div id="box-principal-one">
                <div id="box_lycee" class="form-style-5">
                    <div id="barre_box_lycee">
                        <span class="titre_categorie_actualite">Dernière actualité du lycée :</span>
                    </div>
                    <div id="actualite_box_lycee">
                        <?php 
                            while($ligne = $table->fetch())
                            {
                                echo "<p><span>Auteur : </span> ".$ligne['auteur']." <span>Date de publication : </span> ".$ligne['date']."</p>";
                                echo '<p><a href="accueil.php">' .  $ligne['titre'] .'</a></p>';   
                                echo '<div class="trait"></div>';
                            }
                        ?>
                    </div>
                </div>
            
                <div id="box_mariage" class="form-style-5">
                    <div id="barre_box_mariage">
                        <span class="titre_categorie_actualite">Dernière actualité de mariage :</span>
                    </div>
                    <div id="actualite_box_mariage"> 
                    <?php 
                        while($ligne1 = $table1->fetch())
                        {      
                            echo "<p><span>Auteur : </span> ".$ligne1['auteur']." <span>Date de publication : </span> ".$ligne1['date']."</p>";
                            echo '<p><a href="accueil.php">' .  $ligne1['titre'] .'</a></p>';    
                            echo '<div class="trait"></div>';
                        }
                    ?>
                    </div>         
                </div>
            </div> 
                
            <div id="box-principal-two">
                
                <div id="box_deces" class="form-style-5">
                    <div id="barre_box_deces">
                        <span class="titre_categorie_actualite">Dernière actualité de décés :</span>
                    </div>
                    <div id="actualite_box_deces">
                    <?php 
                        while($ligne2 = $table2->fetch())
                        {
                            echo "<p><span>Auteur : </span> ".$ligne2['auteur']." <span>Date de publication : </span> ".$ligne2['date']."</p>";
                            echo '<p><a href="accueil.php">' .  $ligne2['titre'] .'</a></p>';
                            echo '<div class="trait"></div>';
                            
                        }
                    ?>
                    </div>        
                </div>

                <div id="box_naissance" class="form-style-5">
                    <div id="barre_box_naissance">
                        <span class="titre_categorie_actualite">Dernière actualité de naissance :</span>
                    </div>
                    <div id="actualite_box_naissance">
                        <?php 
                        while($ligne2 = $table2->fetch())
                        {  
                            echo "<p>Auteur : ".$ligne2['auteur']." Date de Publication : ".$ligne2['date']."</p>";
                            echo $ligne2['titre'];
                            echo '<div class="trait"></div>';
                        }
                    ?>
                    </div>
                </div>
            </div>     
        </div>       
    </body>
</html>
