<?php 
    session_start();
    if(empty($_SESSION['statut'])) 
    {
        header('Location: authentification.php');
    }
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../css/style.css">
        <title></title>
    </head>
    <body>
        <?php include 'header.php'; ?>
        <?php include 'menu.php'; ?>    
        <aside><!-- Les à-cotés de la page --></aside>
        <article>
            <!-- Contenu textuel de la page -->
            <meta http-equiv="refresh" content="4;accueil.php" />
            <p id="message_envoye">Votre profil a bien été mis à jour. Vous allez etre redirigé vers la page d'accueil dans quelques secondes.</p>
            <SCRIPT LANGUAGE="JavaScript"> 
                window.setTimeout("document.form.time.value='10'",1000) 
                window.setTimeout("document.form.time.value='9'",2000) 
                window.setTimeout("document.form.time.value='8'",3000) 
                window.setTimeout("document.form.time.value='7'",4000) 
                window.setTimeout("document.form.time.value='6'",5000) 
                window.setTimeout("document.form.time.value='5'",6000) 
                window.setTimeout("document.form.time.value='4'",7000) 
                window.setTimeout("document.form.time.value='3'",8000) 
                window.setTimeout("document.form.time.value='2'",9000) 
                window.setTimeout("document.form.time.value='1'",10000) 
                window.setTimeout("document.form.time.value='0';location=('http://www.tapage.com');",11000) 
            </script>
        </article>
        <footer><!-- Pied-de-page de la page -> site --></footer>
    </body>
</html>
