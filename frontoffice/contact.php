<?php 
    session_start();
    if(empty($_SESSION['statut']) or $_SESSION['statut']!="Util") 
    {
        header('Location: authentification.php');
    }
    $_SESSION["page"] = "contact";
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
        <!--- Zone fil ariane --->
        <div class="filAriane">
            <a href="../frontoffice/accueil.php">Accueil</a> » Contact
        </div>
        
        <div class="box-contact">           
            <h1 id="test">Formulaire de contact</h1>
            <form action="../backoffice/traitement_contact.php" id="contact" method="POST" name="formulaire"  onsubmit="return verifForm(this)">

                <p id="erreurnom"></p>
                <input class="input" name="nom" type="text" placeholder="Nom" id="nom" onblur="verifNom(this);" />

                <p id="erreuremail"></p>
                <input class="input" name="email" type="text" placeholder="Email" id="email" onblur="verifEmail(this);" />                  

                <p id="erreursujet"></p>
                <input class="input" name="sujet" type="text" placeholder="Sujet" id="sujet" onblur="verifSujet(this);" />                  

                <p id="erreurmessage"></p>
                <textarea class="input" name="message" placeholder="Commentaire" id="message" onblur="verifMessage(this);" ></textarea>                                  
               
                <input class="bouton" name='soumettre' type="submit" value="Envoyer"/>                 
            </form>
        </div>
    </body>
</html>


