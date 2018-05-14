<?php
    if (!isset($_SESSION)) { session_start(); }
?>

<!DOCTYPE html>
<html>
   <head>
        <meta charset="UTF-8">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <link href="../shared/css/reset.css" rel="stylesheet" type="text/css">
        <link href="./css/home.css" rel="stylesheet" type="text/css">
        <title>Speekoo-Home</title>
    </head> 
    <body>
        <div class="top-container">
            <div class="txt-left"> 
                <h1 class="big" >fais évoluer ton speaky grâce à ton
                <span class="small">apprentissage !</span></h1>

                <a href="../dashboard/dashboard-levels.php" class="button-game">Jouer !</a>     
                
            </div>
            <img src="../../assets/img/mountain.png" class="bg-mountains" />
            <img src="../../assets/img/speakies.png" class="speekies" />
        </div> 
    </body>
</html>

