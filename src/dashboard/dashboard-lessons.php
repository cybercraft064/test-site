<?php 
include('logic/dashboard-lessons-logic.php');
// appelé par login-post.php
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
        <div class="container" style="background-image: url('<?php echo $backgroundLesson.$level.".jpg";?>')">
            
            <div class="header">
                <a href=""><img src="../../assets/img/logo-white.png" class="logo"></a>
                <img src="../../assets/img/portugais.png" class="logo-language" />
                <div class="link-burger" id="link-burger"> 
                    <div class="burger">
                        <div class="barre"></div>
                        <div class="barre"></div>
                        <div class="barre"></div>
                    </div>
                    <ul class="burger-menu">
                        <li><a href="dashboard-levels.php?level=<?php echo $_SESSION['level-user']; ?>">Niveaux</li>
                        <li><a href="../auth/logout.php">Se déconnecter</li>
                    </ul>
                </div>    
            </div>
      
            <div class="centered-container">
                <h1>Niveau <?php echo htmlspecialchars($_SESSION['level-user']);?> - Planète Mongus</h1>
                <div class="parting"></div>           
            </div>  
            
            <div class="centered-level">
                
                <?php for ($i=0;$i<12;$i++){ // début de la boucle principal

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
                      // on peut utiliser se nouveau parent comme path du .css
                      // ce qui donne (.unit-to-do .progress-bar) ou (.filter .progress-bar)
                      // se qui permet de modifier .progress-bar uniquement pour ces cas la.
                    ?>

                    <a href="<?php echo $linkLesson . ($i+1);?>">           
                        <div class="record <?php echo $filterClass; ?>">
                            <p class="win"><?php echo $i+1; ?></p>

                            <?php if ($i == 2 || $i == 5 || $i == 7) { ?>
                                <img src="../../assets/img/sound.png" class="icon-sound" />
                                <?php } else { ?>
                                <img src="../../assets/img/pen.png" class="icon-pen" />
                                <?php } ?>
                    
                            <div class="progress-bar"></div>
                        </div>
                    </a>

                <?php } // fin de boucle ?>
               
            </div>

            <footer>
                <div class="pseudo"><?php echo $pseudo_user; ?></div>
            </footer>    
        </div> 
        
        <script src="js/dashboard.js"> </script>
    
    </body>
</html>    