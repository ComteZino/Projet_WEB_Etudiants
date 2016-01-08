<?php 
    session_start();
    $_SESSION['statut']="0";
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <script type="text/javascript" src="../js/verification_authentification.js"></script>
        <title></title>
        <link rel="stylesheet" href="../css/styleCo.css">
    </head>
    <body>
        <header>
            <!-- Entête de la zone considérée -->
            <a>
                <img src="../images/logostpaul.png" alt="logo" title="logo" id="logo" /> 
            </a>
        </header>
        <form method="post" action="authentificationBD.php" id="login" class="login" onsubmit="return verifForm(this)">
            <p>
                <label for="login">Identifiant:</label>
                
                <input type="text" name="Identifiant" id="loginId" value="" onblur="verifIdentifiant(this);">
            </p>

            <p>
                <label for="password">Password:</label>
                
                <input type="password" name="Password" id="password" value="" onblur="verifMotDePasse(this);">
            </p>
            
            <p class="login-submit">
                <button type="submit" class="login-button">Authentification</button>
            </p>
        </form>
        
    </body>
</html>