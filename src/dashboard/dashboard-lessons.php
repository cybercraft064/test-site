
<?php 
    if (!isset($_SESSION)) { session_start(); }

include('logic/dashboard-lessons-logic.php');
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
        <div class="container">

            <div class="header">
                <a href=""><img src="../../assets/img/logo-white.png" class="logo"></a>
                <img src="../../assets/img/portugais.png" class="logo-language" />
                <a href="dashboard-levels" class="link-burger"> 
                    <div class="burger">
                        <div class="barre"></div>
                        <div class="barre"></div>
                        <div class="barre"></div>
                    </div>
                </a>    
            </div>
      
            <div class="centered-container">
                <h1>Niveau 1 - Planète Mongus</h1>
                <div class="parting"></div>           
            </div>  
            
            <div class="centered-level">

                <a href="./../learning/start-learning.php"><div class="record-1">
                    <p>1</p>
                    <img src="../../assets/img/pen.png" class="icon-pen" />
                    <div class="progress-bar"></div>
                </div></a>
                <a href="./../learning/start-learning.php"><div class="record-2">
                    <p>2</p>
                    <img src="../../assets/img/pen.png" class="icon-pen" />
                    <div class="progress-bar"></div>
                </div></a>
                <div class="record-3">
                    <p>3</p>
                    <img src="../../assets/img/sound.png" class="icon-sound" />
                    <div class="progress-bar"></div>
                </div>
                <div class="record-4">
                    <p>4</p>
                    <img src="../../assets/img/pen.png" class="icon-pen" />
                    <div class="progress-bar"></div>
                </div>                
                <div class="record-5">
                    <p>5</p>
                    <img src="../../assets/img/pen.png" class="icon-pen" />
                    <div class="progress-bar"></div>
                </div>
                <div class="record-6">
                    <p>6</p>
                    <img src="../../assets/img/sound.png" class="icon-sound" />
                    <div class="progress-bar"></div>
                </div>                
                <div class="record-7">
                    <p>7</p>
                    <img src="../../assets/img/pen.png" class="icon-pen" />
                    <div class="progress-bar"></div>
                </div>
                <div class="record-8">
                    <p>8</p>
                    <img src="../../assets/img/pen.png" class="icon-pen" />
                    <div class="progress-bar"></div>
                </div>
                <div class="record-9">
                    <p>9</p>
                    <img src="../../assets/img/sound.png" class="icon-sound" />
                    <div class="progress-bar"></div>
                </div>
                <div class="record-10">
                    <p>10</p>
                    <img src="../../assets/img/pen.png" class="icon-pen" />
                    <div class="progress-bar"></div>
                </div>                
                <div class="record-11">
                    <p>11</p>
                    <img src="../../assets/img/pen.png" class="icon-pen" />
                    <div class="progress-bar"></div>
                </div>
                <div class="record-12">
                    <p>12</p>
                    <img src="../../assets/img/pen.png" class="icon-pen" />
                    <div class="progress-bar"></div>
                </div> 
            </div>

            <footer>
                <div class="pseudo"><?php echo $pseudo_user; ?></div>
            </footer>    
        </div>    

    </body>
</html>    