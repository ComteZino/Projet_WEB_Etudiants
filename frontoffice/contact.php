<?php 
    session_start();
    if(empty($_SESSION['statut']) or $_SESSION['statut']!="Util") 
    {
        header('Location: authentification.php');
    }
?>
<html>
    <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
      <script type="text/javascript" src="../js/verification_contact.js"></script>
      <title></title>
      <link rel="stylesheet" href="../css/style.css">
      <link rel="stylesheet" href="../css/styleContact.css">
    </head>
    <body>
        <?php include 'header.php'; ?>
        <?php include 'menu.php'; ?>   
        
        
        <div id="form-main">
            
            <div id="form-div">
                <h2 id="test">Formulaire de contact</h2>
                <form action="../backoffice/traitement_contact.php" id="contact" method="POST" name="formulaire"  onsubmit="return verifForm(this)">
                                    
                    <p class="nom">
                        <p id="erreurnom"></p>
                        <input name="nom" type="text" class="validate[required,custom[onlyLetter],length[0,100]] feedback-input" placeholder="Nom" id="nom" onblur="verifNom(this);" />
                    </p>

                    <p class="email">
                        <p id="erreuremail"></p>
                        <input name="email" type="text" class="validate[required,custom[email]] feedback-input" placeholder="Email" id="email" onblur="verifEmail(this);" />                  
                    </p>
                    
                    <p class="sujet">
                        <p id="erreursujet"></p>
                        <input name="sujet" type="text" class="validate[required,custom[email]] feedback-input" placeholder="Sujet" id="sujet" onblur="verifSujet(this);" />                  
                    </p>

                    <p class="message">
                        <p id="erreurmessage"></p>
                        <textarea name="message" class="validate[required,length[6,300]] feedback-input" placeholder="Commentaire" id="message" onblur="verifMessage(this);" ></textarea>                  
                    </p>
                    
                    <div class="submit">
                        <input name='soumettre' type="submit" value="Envoyer" id="button-blue"/>
                        <div class="ease"></div>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
