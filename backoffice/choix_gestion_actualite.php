<?php 
    require_once('../frontoffice/connexionBD.php');
    if(empty($_SESSION['statut'])or $_SESSION['statut']!="Admin") 
    {
        header('Location: ../frontoffice/authentification.php');
    }
    $select_actualites = $connexion->query('Select idNews,titre from news');
    $select_actualites2 = $connexion->query('Select idNews,titre from news');
?>
<html>
    <head>
     <meta http-equiv="content-type" content="text/html; charset=utf-8" />
     <link rel="stylesheet" href="../css/style.css">
     <link rel="stylesheet" href="../css/styleGestionActualite.css">
     <script type="text/javascript" src="../ckeditor/ckeditor.js"></script><!-- Script pour l'outil d'édition de texte --> 
     <title>Ajouter une actualité</title>
    </head>
    <body>
        <?php include 'header.php'; ?>
        <?php include 'menu.php'; ?>   
        
        <!--- Zone d'ajout d'article --->
        <div id="divPrincipal" class="box-actu">
            <h2>Ajout d'une actualité</h2>
            <form action="traitement/ajout_actualite.php" id="ajout" method="POST" name="formulaire"  onsubmit="return verifForm(this)">
                <!-- Champ titre -->    
                <p>Titre de l'actualité</p>   
                <p class="titre">
                    <p id="erreurtitre"></p>
                    <input name="titre" type="text" class="validate[required,custom[onlyLetter],length[0,100]] feedback-input" class="titre" onblur="verifTitre(this);" />
                </p>
                
                 <!-- Liste catégorie --> 
                <p>
                    <p>Catégorie</p>
                    <select name="categorie" class="select">
                        <option value="Lycee">Lycée</option>
                        <option value="Mariage">Mariage</option>
                        <option value="Deces">Décés</option>
                    </select>
                </p>

                <!-- Champ contenue -->  
                <p>Contenu de la page</p>
                <textarea name="contenu" rows="10" cols="50" >
                    <?php
                        if (!empty($_POST["contenu"]))
                        {
                            echo stripcslashes(htmlspecialchars($_POST["contenu"],ENT_QUOTES));
                        }
                    ?>
                </textarea>
                <script type="text/javascript">
                    CKEDITOR.replace( 'contenu' );// Mise en place de l'outil d'édition de texte précédement appelé 
                </script>
                
                <!-- Boutons --> 
                
                   <input name="Valider" class='bouton' value="Valider" type="submit"/>           
            </form>
        </div>
        
        <!--- Zone de modification d'article --->
        <div id="divPrincipal" class="box-actu">
            <h2>Modification d'une actualité</h2>     
            <form method="post" action="traitement/modification_actualite.php">     
                
                <!-- Liste modifier article --> 
                <p>Quel article voulez vous modifier  ?</p>
                <select name="article_modif" class="select">
                    <?php
                        while($lgn = $select_actualites->fetch())
                        {
                            echo '<option value="'.$lgn["idNews"].'">'.$lgn["titre"].'</option>';
                        }
                    ?>
                </select>
                
                <!-- Boutons --> 
                    <input name="Supprimer" class='bouton' value="Modifier l'article" type="submit"/>
                
            </form>
        </div>   
            
        <!--- Zone de suppression d'article --->
        <div id="divPrincipal" class="box-actu">
            <h2>Suppression d'une actualité</h2>     
            <form method="post" action="traitement/suppression_actualite.php">     
                
                <!-- Liste supprimer article --> 
                <p>Quel article voulez vous supprimer ?</p>
                <select name="article_suppr" class="select">
                    <?php
                        while($lgn = $select_actualites2->fetch())
                        {
                            echo '<option value="'.$lgn["idNews"].'">'.$lgn["titre"].'</option>';
                        }
                    ?>
                </select>
                
                <!-- Boutons --> 
                    <input name="Supprimer" class='bouton' value="Supprimer l'article" type="submit"/>
                
            </form>
        </div>              
   
    </body>
</html>
