<?php 
    session_start();
    if(empty($_SESSION['statut'])) 
    {
        header('Location: authentification.php');
    }
?>
<html>
    <head>
     <meta http-equiv="content-type" content="text/html; charset=utf-8" />
     <link rel="stylesheet" href="../css/style.css">
     <link rel="stylesheet" href="../css/styleAjoutActualite.css">
     <script type="text/javascript" src="../ckeditor/ckeditor.js"></script><!-- Script pour l'outil d'édition de texte --> 
     <title>Ajouter une actualité</title>
    </head>
    <body>
        <?php include 'header.php'; ?>
        <?php include 'menu.php'; ?>   
        
        <div id="divPrincipal" class="box-ajout-actu">
            <h2>Ajout d'une actualité</h2>
            <form action="../backoffice/traitement_contact.php" id="contact" method="POST" name="formulaire"  onsubmit="return verifForm(this)">

                <!-- Champ titre -->    
                <p>Titre de l'actualité</p>   
                <p class="titre">
                    <p id="erreurtitre"></p>
                    <input name="titre" type="text" class="validate[required,custom[onlyLetter],length[0,100]] feedback-input" id="titre" onblur="verifTitre(this);" />
                </p>
                
                 <!-- Champ catégorie --> 
                <p>
                    <p>Catégorie</p>
                    <select name="cat" id="cat">
                        <option value="">Selectionnez une catégorie</option>
                        <?php
                            //On selectionne les données
                            $categorie = mysql_query("SELECT id,nom_categorie FROM CATEGORIES ORDER BY id ASC");

                            //On affiche les catégories dans la liste
                            while($affiche = mysql_fetch_array($categorie))
                            {
                                echo '<option value="'.$affiche['id'].'">'.$affiche['nom_categorie'].'</option>';
                            }	
                        ?>
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
                <section>
                   <input name="Valider" value="Valider" type="submit" id="button-valider"/>
                </section>    
               </div>
            </form>
        </div>
    </body>
<html>