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
                <a href=""><img src="../../assets/img/logo-white.png" class="logo"></a>
                <img src="./../../assets/img/portugais.png" class="logo-language" />
                <a href="dashboard-lessons.php" class="link-burger">
                    <div class="burger">
                        <div class="barre"></div>
                        <div class="barre"></div>
                        <div class="barre"></div>
                    </div>
                </a>
            </div>

            <div class="nav-left">
                <div class="icon-cup">120</div>
                    <p>Points Gagnés</p>
                <div class="icon-win">05</div>
                    <p>Combats Gagnés</p>
                <div class="icon-bad">02</div>
                    <p>Combats Perdus</P>

            </div>

            <?php if ($currentLevel -1 == 0)   { $chevron = "chevron-left-none"; }  ?>
            <?php if (($currentLevel +1 == 11) | ($currentLevel == (int) htmlspecialchars($_SESSION['validated-level-bd']))) { $chevron = "chevron-right-none";} ?>
            
            <div class="centered-container <?= $chevron; ?>">
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
    </body>
</html>
