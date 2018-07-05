<?php

    include('./logic/home-logic.php');
?>

<!DOCTYPE html>
<html>
   <head>
        <meta charset="UTF-8">
        <link href="https://fonts.googleapis.com/css?family=Oswald:300,400,700|Raleway:300,400,700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Fjalla+One|Montserrat" rel="stylesheet">
        <link href="../shared/css/reset.css" rel="stylesheet" type="text/css">
        <link href="./css/home.css" rel="stylesheet" type="text/css">
        <title>Speekoo-Home</title>
    </head> 
    <body>
        <div class="top-container">
            <img src="../../assets/img/mountain.png" class="bg-mountains" />
            <img src="../../assets/img/speakies.png" class="speekies" />

            <div class="header">
                <span><img src="../../assets/img/logo-white.png" class="logo"/></span>              
                <div class="link-burger" id="link-burger"> 
                    <div class="burger">
                        <div class="barre"></div>
                        <div class="barre"></div>
                        <div class="barre"></div>
                    </div>
                    <ul class="burger-menu">
                            <i class="burger-icon-user icon-user"></i>
                            <li><a href="../auth/start-account.php">Ton compte</a></li>
                            <i class="burger-icon-exit icon-exit"></i>
                            <li><a href="../auth/logout.php">Déconnexion</a></li>
                    </ul>
                </div>    
            </div>

            <div class="txt-left"> 
                <h1 class="big" >choisies la langue que tu veux
                <span class="small">apprendre !</span></h1>  
                <a href="../language/choose-langues.php"><div class="button-game">GO !</div></a>                
            </div>

            <div class="pseudo"><?= $pseudo_user;?></div>

        </div>
        <script src="../shared/js/burger.js"> </script> 
    </body>
</html>

