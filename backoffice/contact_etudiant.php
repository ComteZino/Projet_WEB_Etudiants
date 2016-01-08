<?php 
    require_once('../frontoffice/connexionBD.php');
    if(empty($_SESSION['statut']) or $_SESSION['statut']!="Admin") 
    {
        header('Location: authentification.php');
    }
    $_SESSION["page"] = "contact_etudiant";
    $select_comptes = ('Select id,nom,prenom from etudiant');
    $query_select = $connexion->query($select_comptes);
?>
<html>
    <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
      <script type="text/javascript" src="../js/verification_contact.js"></script>
      <title>Contacter un étudiant</title>
      <link rel="stylesheet" href="../css/style.css">
      <link rel="stylesheet" href="../css/styleContact.css">
    </head>
    <body>
        <?php include 'header.php'; ?>
        <?php include 'menu.php'; ?>   
        
        
        <div id="form-main">           
            <div id="form-div">
                <h2 id="test">Formulaire de contact</h2>
                <form action="../backoffice/traitement_contact_etudiant.php" id="contact" method="POST" name="formulaire"  onsubmit="return verifForm(this)">
                                    
                    <select id="id" name="id">
                        <?php
                            while($lgn = $query_select->fetch())
                            {
                                echo '<option value="'.$lgn["id"].'">'.$lgn["nom"].' '.$lgn["prenom"].'</option>';
                            }
                        ?>
                    </select>

                    <!--<p class="email">
                        <p id="erreuremail"></p>
                        <input name="email" type="text" class="validate[required,custom[email]] feedback-input" placeholder="Email" id="email" onblur="verifEmail(this);" />                  
                    </p>-->
                    
                    <p class="sujet">
                        <p id="erreursujet"></p>
                        <input name="sujet" type="text" class="validate[required,custom[email]] feedback-input" placeholder="Sujet" id="sujet" onblur="verifSujet(this);" />                  
                    </p>

                    <p class="message">
                        <p id="erreurmessage"></p>
                        <textarea name="message" class="validate[required,length[6,300]] feedback-input" placeholder="Commentaire" id="message" onblur="verifMessage(this);" ></textarea>                  
                    </p>                  
                    <section>
                        <input name='soumettre' type="submit" value="Envoyer"/>
                    </section>                  
                </form>
            </div>
        </div>
    </body>
</html>