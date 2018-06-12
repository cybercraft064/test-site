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
        <div class="container" style="background-image: url('<?= $backgroundLesson.$levelLessons.".jpg";?>')">
            
            <div class="header">
                <a href=""><img src="../../assets/img/logo-white.png" class="logo"></a>
                <img src="../../assets/img/pays/<?= strtoupper($_SESSION['current-code-language']); ?>.png" class="logo-language" />
                <div class="link-burger" id="link-burger"> 
                    <div class="burger">
                        <div class="barre"></div>
                        <div class="barre"></div>
                        <div class="barre"></div>
                    </div>
                    <ul class="burger-menu">
                        <li><a href="dashboard-levels.php?level=<?= $_SESSION['validated-level-bd']; ?>">Niveaux</li>
                        <li><a href="../home/home.php">Choix des Langues</li> 
                        <li><a href="../auth/logout.php">Se déconnecter</li>
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
                            $linkLesson = '#';
                        }                    
                    ?>

                <?php //Utilisation de la logic automatic (parent / enfant)
                      // si PROGRESS-BAR reste enfant de RECORD  le .css est .progress-bar
                      // si PROGRESS-BAR devient enfant de "UNIT-TO-DO" ou "FILTER 
                      // on utilise se nouveau parent comme path du .css
                      // ce qui donne (.unit-to-do .progress-bar) ou (.filter .progress-bar)
                      // se qui permet de modifier .progress-bar uniquement pour ces cas la.
                    ?>

                    <a href="<?= $linkLesson.($i+1);?>">           
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
               
            </div>
            <div class="lock-popup">
                <h2>Leçon bloquée</h2>
                <p>Finis les leçons précédentes pour débloquer celle-ci</p>
            </div>
            <footer>
                <div class="pseudo"><?= $pseudo_user; ?></div>
            </footer>    
        </div> 
        
        <script src="js/dashboard.js"> </script>
    
    </body>
</html>    