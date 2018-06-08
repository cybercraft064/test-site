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

            <header class="pseudo"><?= $pseudo_user;?> </header>

            <div class="GB"><a href='../dashboard/dashboard-levels.php?lang=GB' class="">
            <img src="../../assets/img/pays/GB.png" width="100" height="100" alt="drapeau Anglais"  style="border: none;"> 
           </a></div>
           <div class="DE"><a href='../dashboard/dashboard-levels.php?lang=DE' class="">
            <img src="../../assets/img/pays/DE.png" width="100" height="100" alt="drapeau Allemand"  style="border: none;"> 
           </a></div>
           <div class="IT"><a href='../dashboard/dashboard-levels.php?lang=IT' class="">
            <img src="../../assets/img/pays/IT.png" width="100" height="100" alt="drapeau Italien"  style="border: none;"> 
           </a></div>
           <div class="ES"><a href='../dashboard/dashboard-levels.php?lang=ES' class="">
            <img src="../../assets/img/pays/ES.png" width="100" height="100" alt="drapeau Espagnol"  style="border: none;"> 
           </a></div>
           <div class="PT"><a href='../dashboard/dashboard-levels.php?lang=PT' class="">
            <img src="../../assets/img/pays/PT.png" width="100" height="100" alt="drapeau Portugais"  style="border: none;"> 
           </a></div>


            <div class=""><a href='../dashboard/dashboard-levels.php?lang=ES' class="ES"></a></div>
            <div class=""><a href='../dashboard/dashboard-levels.php?lang=PT' class="PT"></a></div>

            <div class="txt-left"> 
                <h1 class="big" >fais évoluer ton speaky grâce à ton
                <span class="small">apprentissage !</span></h1>
                <a href="../dashboard/dashboard-levels.php?level=1" class="button-game">Jouer !</a>                    
            </div>

        </div> 
    </body>
</html>

