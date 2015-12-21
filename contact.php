<?php 
    session_start();
    if(empty($_SESSION['statut'])) 
    {
        header('Location: authentification.php');
    }
?>
<html>
    <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
      <script type="text/javascript" src="verification_contact.js"></script>
      <title></title>
      <link rel="stylesheet" href="css/style.css">
      <link rel="stylesheet" href="css/styleContact.css">
    </head>
    <body>
        <?php include 'header.php'; ?>
        <?php include 'menu.php'; ?>   
        
        <div id="form-main">
            <form action="traitement_contact.php" id="contact" method="POST">
            <div id="form-div">
                <p class="name">
                  <input name="nom" type="text" class="validate[required,custom[onlyLetter],length[0,100]] feedback-input" placeholder="Nom" id="name" />
                </p>

                <p class="email">
                  <input name="email" type="text" class="validate[required,custom[email]] feedback-input" id="email" placeholder="Email" />
                </p>

                <p class="text">
                  <textarea name="message" class="validate[required,length[6,300]] feedback-input" id="comment" placeholder="Commentaire"></textarea>
                </p>


                <div class="submit">
                  <input type="submit" value="Envoyer" id="button-blue"/>
                  <div class="ease"></div>
                </div>
            </div>
            </form>
        </div>
    </body>
</html>
