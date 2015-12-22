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
      <title></title>
      <link rel="stylesheet" href="../css/style.css">
      <link rel="stylesheet" href="../css/styleContact.css">
    </head>
    <body>
        <?php include 'header.php'; ?>
        <?php include 'menu.php'; ?>   
        
        <div id="form-main">
            <div id="form-div">
                <form action="../traitement_contact.php" id="contact" method="POST">
                <p class="name">
                  <input name="nom" type="text" class="validate[required,custom[onlyLetter],length[0,100]] feedback-input" placeholder="Nom" id="name"  />
                </p>

                <p class="email">
                  <input name="email" type="text" class="validate[required,custom[email]] feedback-input" id="email" placeholder="Email" />
                </p>

                <p class="text">
                  <textarea name="message" class="validate[required,length[6,300]] feedback-input" id="comment" placeholder="Commentaire"></textarea>
                </p>


                <div class="submit">
                  <input name='soumettre' type="submit" value="Envoyer" id="button-blue"/>
                  </form>
                  <div class="ease"></div>
                </div>
            </div>
        </div>
    </body>
</html>
