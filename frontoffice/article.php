<?php 
    session_start();
    if(empty($_SESSION['statut'])) 
    {
        header('Location: authentification.php');
    }
    $_SESSION["page"] = "accueil";
    
    require_once('connexionBD.php');
    
    $idnews = htmlentities($_GET["id"]);
    
    $titre="SELECT * FROM news WHERE IdNews='$idnews'";    
    $table = $connexion->query($titre);
    $ligne = $table->fetch();

    
    $auteur="SELECT * FROM news WHERE IdNews='$idnews'";    
    $table = $connexion->query($auteur);
    $ligne1 = $table->fetch();
    
    $date="SELECT * FROM news WHERE IdNews='$idnews'";    
    $table = $connexion->query($date);
    $ligne2 = $table->fetch();
    
    $categorie="SELECT * FROM news WHERE IdNews='$idnews'";    
    $table = $connexion->query($categorie);
    $ligne3 = $table->fetch();
    
    $contenu="SELECT * FROM news WHERE IdNews='$idnews'";    
    $table = $connexion->query($contenu);
    $ligne4 = $table->fetch();


?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../css/style.css" />
        <link rel="stylesheet" href="../css/styleAccueil.css" />
        <link rel="stylesheet" href="../css/styleActualite.css" />
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
            <div class="titre">
                <h1>
                    <?php
                        echo $ligne["titre"];
                    ?>
                </h1>
            </div>
            <div class="categorie">
                <p><span id="categorie">Actualité : <?php echo $ligne3["categorie"]; ?></span></p>
                
            </div>
            <div class="contenu">
                <?php
                    echo htmlspecialchars_decode(strip_tags($ligne4["contenu"]));
                ?>
            </div>
            
            <div class="auteur_date">
                <p>Actualité posté par <span id="auteur"><?php echo $ligne1["auteur"]; ?></span> le <span id="date"><?php echo $ligne2["date"];?></span></p>
            </div>
        </div>       
    </body>
</html>
