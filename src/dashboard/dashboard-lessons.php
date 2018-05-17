
<?php 
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
                
                <?php for ($i=0;$i<12;$i++){ 

                        $filterClass = "";

                        if ($i == (int) $lesson){ 
                            $filterClass="unit-to-do";
                        }
                        if($i > (int) $lesson){
                            $filterClass = "filter";
                        }                    
                    ?>

                    <?//Utilisation de la logic automatic (parent / enfant)
                      // si PROGRESS-BAR reste enfant de RECORD  le .css est .progress-bar
                      // si PROGRESS-BAR devient enfant de "UNIT-TO-DO" ou "FILTER 
                      // on peut utiliser se nouveau parent comme path du .css
                      // ce qui donne (.unit-to-do .progress-bar) ou (.filter .progress-bar)
                      // se qui permet de modifier .progress-bar uniquement pour ces cas la.
                    ?>

                    <a href="./../learning/start-learning.php?lesson=<?php echo $i+1; ?>">
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

    </body>
</html>    