<?php
if (!isset($_SESSION)) { session_start(); }

// page en include de dashboard-lessons-logic-php
// j'utilise la variable $levelLesson de dashboard-lessons-logic.php 
// que je renome par sécuritée car j'utilise aussi switch case avec cette variable 
// dans le dashboard logic
$namePlanets = $levelLessons;

// sert de référence au noms de planètes
  switch ($namePlanets)  {  

    case 1:
    $planetName = "Planète Mongus";
    break;

    case 2:
    $planetName = "Planète Jungly";
    break;

    case 3:
    $planetName ="Vulcanta";
    break;

}



        // à creuser !!
      /*  <div class="page-container" style="background-image: url('<?php echo $backgroundLesson.$levelurrent.".jpg";?>')">  */
