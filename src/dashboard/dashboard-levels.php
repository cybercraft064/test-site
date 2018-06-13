<?php
include('logic/dashboard-levels-logic.php');
// appelé par 
 ?>

<!DOCTYPE html>
<html>
   <head>
        <meta charset="UTF-8">
        <link href="https://fonts.googleapis.com/css?family=Fjalla+One|Montserrat" rel="stylesheet">
        <link href="./../shared/css/reset.css" rel="stylesheet" type="text/css">
        <link href="./css/dashboard-levels.css" rel="stylesheet" type="text/css">
        <title>DashBoard-Levels</title>
    </head>
    <body>
        <div class="container-dashboard" style="background-image: url('<?= $backgroundLevel.$currentLevel.".jpg";?>')"> 

            <div class="header">

                <span><img src="../../assets/img/logo-white.png" class="logo" /></span>

                <img src="../../assets/img/pays/<?= strtoupper($currentCodeLang); ?>.png" class="logo-language" />


                <div class="link-burger" id="link-burger"> 

                    <div class="burger">
                        <div class="barre"></div>
                        <div class="barre"></div>
                        <div class="barre"></div>
                    </div>

                    <ul class="burger-menu">
                      <li><a href="../home/home.php">Choix des Langues</a></li>  
                      <li><a href="../auth/logout.php">Se déconnecter</a></li>
                    </ul>

                </div>  

            </div>


            <div class="nav-left">
                <div class="icon-cup"><?= $nbLessonsFinichedInLevel ?></div>
                    <p>Leçons finies</p>
                <div class="icon-win"><?= $klmInBd ?></div>
                    <p>Km Parcourus</p>
                
            </div>
            

            <?php if ($currentLevel == 1)   { $chevronLeft = "chevron-left-none"; }  ?>
            <?php if (($currentLevel +1 == 11) | ($currentLevel == (int) ($_SESSION['validated-level-bd']))) { $chevronRight = "chevron-right-none";} ?>
            
            <div class="centered-container <?= $chevronLeft; ?> <?= $chevronRight; ?>">
                <h1>Dashboard Ligue</h1> 
                    
                <div class="parting"></div>
                    
                <a href="<?= $linkLevel.($currentLevel -1); ?>"><span class="chevron-left"> < </span></a>
                    
                <a href="<?= $linkLessons.$currentLesson."&level=".$currentLevel; ?>">
                  <img src="<?= $learningWorld.$currentLevel.'.png'; ?>"  class="learn-world" />
                </a>
                    
                <a href="<?= $linkLevel.($currentLevel +1); ?>"><span class="chevron-right"> > </span></a>

                <h2>Monde n°<?= $currentLevel; ?></h2>
            </div>

            <footer>
                <div class="pseudo"><?= $pseudo_user; ?></div>
            </footer>  
        </div>
        <script src="js/dashboard.js"> </script>
    </body>
</html>
