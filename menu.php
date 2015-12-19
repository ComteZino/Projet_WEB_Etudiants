<?php 
   if(!empty($_SESSION)) {
        if($_SESSION['statut']=="0")
	{
		header('Location: authentification.php');
            
	}
    }
    else {
        session_start(); 
          if($_SESSION['statut']=="0" or $_SESSION['statut']=="Admin" or $_SESSION['statut']=="Util"   )
	{
		header('Location: authentification.php');
            
	}
    }
   
?>
<html lang=''>
<head>
   <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="css/styleNav.css">
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>
   <title>CSS MenuMaker</title>
</head>
<body>

<div id='cssmenu'>
<ul>
   <li class='active'><a href='#'><span>Accueil</span></a></li>
   <li><a href='#'><span>News</span></a></li>
   <li><a href='#'><span>Profil</span></a></li>
   <li><a href='#'><span>Forum</span></a></li>
   <li class='last'><a href='#'><span>Contact</span></a></li>
</ul>
</div>

</body>
<html>