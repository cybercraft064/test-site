<?php

include('./logic/choose-langues-logic.php');

?>

<!DOCTYPE html>
<html>
   <head>
        <meta charset="UTF-8">
        <link href="https://fonts.googleapis.com/css?family=Oswald:300,400,700|Raleway:300,400,700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Fjalla+One|Montserrat" rel="stylesheet">
        <link href="../shared/css/reset.css" rel="stylesheet" type="text/css">
        <link href="./css/choose-langues.css" rel="stylesheet" type="text/css">
        <title>Choix-Langues</title>
    </head> 
    <body>
        <section class="page-container ">
                
            <div class="page-filter">

                <header>
                    <img src="../../assets/img/logo-white.png" class="logo"/> 
                    <img src="../../assets/img/pays/<?= strtoupper($currentLang); ?>.png" class="logo-language" />             
                    <div class="link-burger" id="link-burger"> 
                        <div class="burger">
                            <div class="barre"></div>
                            <div class="barre"></div>
                            <div class="barre"></div>
                        </div>
                        <ul class="burger-menu">
                        <i class="burger-icon-level icon-level"></i>
                        <li><a href="../dashboard/dashboard-levels.php?level=<?= $_SESSION['validated-level-bd']; ?>">Niveaux</a></li>
                        <div class="borderLine"></div> 
                        <i class="burger-icon-user icon-user"></i>
                        <li><a href="../auth/start-account.php">Ton compte</a></li>
                        <i class="burger-icon-exit icon-exit"></i>
                        <li><a href="../auth/logout.php">déconnexion</a></li>
                        </ul>
                    </div> 
                </header>

                <section class="title Foswald ">
                    <span class="line-txt"></span>
                    <span class="fat-300"> choisis <span class="fat-400">une langue</span>
                    <span class="line-txt"></span>
                </section>

                <section class="middle">

                    <?php // Boucle principale //
                        $countAlready = count($alreadySelected);
                        $i = 0;

                        while ($i < count($flagsPays)) {
                          $flag = strtoupper($flagsPays[$i]);
                          $name = strtoupper($namesPays[$i]);
                          $flagActive = "filter";
                          $typeFlag = "flag";

                            // Boucle secondaire -> sert à identifier les pays déjà utilisés
                            $l = 0;
                            while ($l < count($alreadySelected)) { 

                                if ($flag == strtoupper($alreadySelected[$l]['code_language'])) {

                                    $nbLevelInBd = $alreadySelected[$l]['level_user'];                         
                                    $nbLessonInBd = $alreadySelected[$l]['lesson_user'];
                                    $typeFlag = "alredySelect";
                                    $flagActive = 'flag-filter';

                                    $l = $countAlready; // on termine la boucle

                                } else {
                                    $l++;
                                }

                            } // fin boucle secondaire 

                        ?> 

                            <div class="border-flags">
                                <a href="./post/choose-langues-post.php?langID=<?= $flag; ?>"> 
                                    <div class="<?= $typeFlag; ?>" style='background-image: url("../../assets/img/pays/<?= $flag; ?>.png")' >

                                         <?php 
                                                if ($flagActive == "filter") {
                                          ?>      
                                                <div class="filter">
                                                <h2 class="Foswald"><?= $name; ?></h2>
                                                </div>
                                         <?php
                                                } else { 
                                          ?>                                
                                                <div class="flag-filter">
                                                <h3 class="Foswald fat-700"> <?= $name; ?><br>Niveau: <?= $nbLevelInBd; ?><br>Lesson: <?= $nbLessonInBd; ?> </h3>
                                                </div>
                                        <?php
                                                }
                                        ?>        

                                    </div>    
                                </a>
                            </div>                            
                            
                    <?php
                        // incrementation boucle principale //
                        $i++;
                        } // fin boucle principale
                    ?>

                </section>

                <footer>
                    <div class="pseudo"><?= $pseudo_user; ?></div>    
                </footer>

             </div>                          
        </section>
        <script src="../shared/js/burger.js"> </script> 
    </body>
</html>    
