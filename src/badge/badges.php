<?php

// Appelé de badges.php
include('./logic/badges-logic.php');

?>

<!DOCTYPE html>
<html>
   <head>
        <meta charset="UTF-8">
        <link href="https://fonts.googleapis.com/css?family=Oswald:300,400,700|Raleway:300,400,700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Fjalla+One|Montserrat" rel="stylesheet">
        <link href="../shared/css/reset.css" rel="stylesheet" type="text/css">
        <link href="./css/badges.css" rel="stylesheet" type="text/css">
        <title>Badges</title>
    </head> 
    <body>
        <section class="container-page ">
                

            <div class="filter-page">

                <header>
                    <span><img src="../../assets/img/logo-white.png" class="logo"/></span>              
                    <div class="link-burger" id="link-burger"> 
                        <div class="burger">
                            <div class="barre"></div>
                            <div class="barre"></div>
                            <div class="barre"></div>
                        </div>
                        <ul class="burger-menu">
                        <li><a href="../auth/start-account.php">Account</a></li>
                        <li><a href="../auth/logout.php">Se déconnecter</a></li>
                        </ul>
                    </div> 
                </header>

                <section class="tittle Foswald ">
                    <span class="line-txt"></span>
                    <span class="fat-300"> Tes <span class="fat-400">badges</span>
                    <span class="line-txt"></span>
                </section>

                <section class="middle">

                </section>


                <footer>
                    <div class="bg-moutains">
                        <img src="../../assets/img/mountain.png" class="bg-mountains" />
                    </div>
                    <div class="pseudo"></div>    
                </footer>

             </div>                          
        </section>
        <script src="../shared/js/burger.js"> </script> 
    </body>
</html>    
