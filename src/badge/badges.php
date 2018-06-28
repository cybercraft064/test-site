<?php

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
        <section class="page-container">
                
            <div class="page-filter">

                <header>
                    <img src="../../assets/img/logo-white.png" class="logo"/> 
                    <img src="../../assets/img/pays/<?= strtoupper($currentCodeLang); ?>.png" class="logo-language" />             
                    <div class="link-burger" id="link-burger"> 
                        <div class="burger">
                            <div class="barre"></div>
                            <div class="barre"></div>
                            <div class="barre"></div>
                        </div>
                        <ul class="burger-menu">
                            <i class="burger-icon-level icon-level"></i>
                            <li> <a href="../dashboard/dashboard-levels.php?level=<?= $_SESSION['validated-level-bd']; ?>"> Niveaux </a></li>
                            <i class="burger-icon-langue icon-langue"></i>
                            <li> <a href="../language/choose-langues.php"> Choix des Langues </a> </li>
                            <div class="borderLine"></div> 
                            <i class="burger-icon-user icon-user"></i>
                            <li> <a href="../auth/start-account.php"> Ton compte </a> </li>
                            <i class="burger-icon-exit icon-exit"></i>
                            <li> <a href="../auth/logout.php"> déconnexion </a> </li>
                        </ul>
                    </div> 
                </header>

                <section class="title Foswald">
                    <span class="line-txt"> </span>
                    <span class="fat-300"> Tes <span class="fat-400"> Badges </span>
                    <span class="line-txt"> </span>
                </section>

                <section class="middle">

                    <section class="current-badge">
                        <img src="../../assets/img/badges/<?= $currentBadge; ?>.png" alt="badge en cours" class="img-current-badge" />
                    </section>

                    <section class="next-badge-container">
                        <div class="title-badge Foswald fat-300">
                            <?= $titleBadge; ?> <br>
                            <span class="km-next-badge fat-400"> <?= $currentKm; ?> km </span>
                        </div>
                        <div class="progress-bar-container">
                            <div class="next-badge">
                                <img src="../../assets/img/badges/<?= $nextBadge; ?>" alt="badge suivant" class="img-next-badge" />    
                            </div>
                            <div class="progress-bar">
                                <div class="run-Progress-bar"> </div>
                            </div>
                            <div class="txt-progress-bar "> Plus que <?= $kmNextBadge; ?> km avant le prochain badge </div>      
                        </div>
                    </section>

                    <section class="challenge-badge-container">

                        <?php  
                            // init des variables
                            $i = 0;
                            while ($i < $nb_badges ) {  
                                ?>
                                <div class="challenge-badge">
                                    <img src="../../assets/img/badges/<?=$i;?>.png" class="img-challenge-badge" />         
                                    <div class="title-challenge-badge Foswald fat-300">
                                    <?= $rowBadge[$i]['title_badge']; ?> <br>
                                    <span class="km-challenge-badge fat-400"> <?= $rowBadge[$i]['km_badge']; ?> km </span>
                                    </div>
                                </div> 
                        <?php 
                                $i++;
                            } 
                        ?>

                    </section>

                    <section class="general-progress-bar">

                    </section>

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
