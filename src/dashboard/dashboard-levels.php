<?php
include('logic/dashboard-levels-logic.php');
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
        <div class="container-dashboard">

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

            <div class="centered-container">
                <h1>Dashboard Ligue</h1>
                <div class="parting"></div>
                <a href="dashboard-levels.php"><span class="chevron-left"><</span></a>
                <img src="./../../assets/img/learning-world-1.png" class="learn-world" />
                <a href="dashboard-levels.php"><span class="chevron-right">></span></a>
                <h2>Monde n°1</h2>
            </div>

                <img src="./../../assets/img/mountain.png" class="bg-mountains" />

            <footer>
                <div class="pseudo"><?php echo $pseudo_user; ?></div>
            </footer>  
        </div>
    </body>
</html>
