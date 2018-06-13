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
                      <li><a href="../auth/logout.php">Se déconnecter</a></li>
                    </ul>
                </div>    
            </div>


            <header class="pseudo"><?= $pseudo_user;?> </header>

            <div class="txt-left"> 
                <h1 class="big" >choisies la langue que tu veux
                <span class="small">apprendre !</span></h1>                  
            </div>

            <div class="size-flag GB"><a href="home.php?newLang=GB" id="">
               <img class="size-flag" src="../../assets/img/pays/GB.png" alt="drapeau Anglais"></a>
            </div>
            <span class="levelLesson GB"><?= $GB ?></span>

           <div class="size-flag DE"><a href="home.php?newLang=DE" id="">
              <img class="size-flag" src="../../assets/img/pays/DE.png" alt="drapeau Allemand"></a>
           </div>
           <span class="levelLesson DE"><?= $DE ?></span>

           <div class="size-flag IT"><a href="home.php?newLang=IT" id="">
               <img class="size-flag" src="../../assets/img/pays/IT.png" alt="drapeau Italien"></a>
           </div>
           <span class="levelLesson IT"><?= $IT ?></span>

           <div class="size-flag ES"><a href="home.php?newLang=ES"  id="">
               <img class="size-flag" src="../../assets/img/pays/ES.png" alt="drapeau Espagnol"></a>
           </div>
           <span class="levelLesson ES"><?= $ES ?></span>

           <div class="size-flag PT"><a href="home.php?newLang=PT" id="">
               <img class="size-flag" src="../../assets/img/pays/PT.png" alt="drapeau Portugais"></a>
           </div>
           <span class="levelLesson PT"><?= $PT ?></span>


            <div class="txt-right"> 
                <h1 class="big" >et fais évoluer ton speaky grâce à ton
                <span class="small">apprentissage !</span></h1>
            </div>
        </div>
        <script src="../shared/js/burger.js"> </script> 
    </body>
</html>

