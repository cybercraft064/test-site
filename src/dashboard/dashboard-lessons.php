<?php 
include('logic/dashboard-lessons-logic.php');

// est appelé par
// login-post.php en début de session 
// login-logic si déjà connecté
// signup.php si email déjà enregistré
// appelé aussi par Winner.php
// et enfin par le dashboard-levels
?>

<!DOCTYPE html>
<html>
   <head>
        <meta charset="UTF-8">
        <link href="https://fonts.googleapis.com/css?family=Fjalla+One|Montserrat" rel="stylesheet">
        <link href="../shared/css/reset.css" rel="stylesheet" type="text/css">
        <link href="./css/dashboard-lessons.css" rel="stylesheet" type="text/css">
        <title>DashBoard-Lessons</title>
    </head> 
    <body>
        <div class="page-container" style="background-image: url('<?= $backgroundLesson.$levelLessons.".jpg";?>')">
            
            <div class="header">
                <span><img src="../../assets/img/logo-white.png" class="logo" /></span>
                <img src="../../assets/img/pays/<?= strtoupper($_SESSION['current-code-language']); ?>.png" class="logo-language" />
                <div class="link-burger" id="link-burger"> 
                    <div class="burger">
                        <div class="barre"></div>
                        <div class="barre"></div>
                        <div class="barre"></div>
                    </div>
                    <ul class="burger-menu">
                        <i class="burger-icon-level icon-level"></i>
                        <li><a href="dashboard-levels.php?level=<?= $_SESSION['validated-level-bd']; ?>">Niveaux</a></li>
                        <i class="burger-icon-badge icon-badge"></i>
                        <li><a href="../badge/badges.php">Tes Badges</a></li>
                        <i class="burger-icon-langue icon-langue"></i>
                        <li><a href="../home/home.php">Choix des Langues</a></li>
                        <div class="borderLine"></div>
                        <i class="burger-icon-user icon-user"></i>
                        <li><a href="../auth/start-account.php">Ton compte</a></li>
                        <i class="burger-icon-exit icon-exit"></i>
                        <li><a href="../auth/logout.php">déconnexion</a></li>
                    </ul>
                </div>    
            </div>
      
            <div class="centered-container">
                <h1>Niveau <?= $levelLessons; ?> - <?= $planetName; ?> </h1> 
                <div class="parting"></div>           
            </div>  
            
            <div class="centered-level">
                
                <?php for ($i=$startLesson; $i<$endLesson; $i++){ // début de la boucle principal

                        $filterClass = "";
                        $linkLesson = "./../learning/start-learning.php?lesson=";

                        if ($i == (int) $lesson){ 
                            $filterClass="unit-to-do";
                        }
                        if($i > (int) $lesson){
                            $filterClass = "filter";
                            $linkLesson = 'dashboard-lessons.php?lock=lockLesson';
                        }                    
                    ?>

                <?php //Utilisation de la logic automatic (parent / enfant)
                      // si PROGRESS-BAR reste enfant de RECORD  le .css est .progress-bar
                      // si PROGRESS-BAR devient enfant de "UNIT-TO-DO" ou "FILTER 
                      // on utilise se nouveau parent comme path du .css
                      // ce qui donne (.unit-to-do .progress-bar) ou (.filter .progress-bar)
                      // se qui permet de modifier .progress-bar uniquement pour ces cas la.
                    ?>

                    <a href="<?= $linkLesson.($i+1); ?>">           
                        <div class="record <?= $filterClass; ?>">
                            <p class="win"><?= $i+1; ?></p>

                            <?php if ($i == $soundLesson[0] || $i == $soundLesson[1] || $i == $soundLesson[2]) { ?>
                                <img src="../../assets/img/sound.png" class="icon-sound" />
                                <?php } else { ?>
                                <img src="../../assets/img/pen.png" class="icon-pen" />
                                <?php } ?>
                    
                            <div class="progress-bar"></div>
                        </div>
                    </a>

                <?php } // fin de boucle ?>
               
                <div class="<?= $lockLesson; ?>lock-popup ">
                    <h2>Leçon bloquée</h2><span>Finis les leçons précédentes pour débloquer celle-ci</span>
                </div>

            </div> <?php // Fin centered-level ?>

            <footer>
                <div class="pseudo"><?= $pseudo_user; ?></div>
            </footer>    
        </div> 
        
        <script src="js/dashboard.js"> </script>
    
    </body>
</html>    