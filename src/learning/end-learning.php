<?php 

if (!isset($_SESSION)) { session_start(); }

/**
 * Cette page provient de : learning.js
 * à la fin d'une leçon pour mettre à jour
 * la base de données, les kilomètres parcourus
 * et récupèrer la prochaine leçon.
 */

 // appel de la BD
include("../shared/bd-manager.php");  

// Récupération du numéro de la leçon traité
$curLesson = (int) ($_GET['lesson']);

// Chargement du profil utilisateur
$id_user = (int) ($_SESSION['id-user']);
$currentCodeLang = htmlspecialchars($_SESSION['current-code-language']);
$levelBd = (int) $_SESSION['validated-level-bd'];
$lessonBd = (int) $_SESSION['validated-lesson-bd'];
$endLessonInLevel = (int) $_SESSION['endLesson-level'];
// $endLessonInLevel = 3; // pour les testes -------------------------------- //


$kmBd = (int) $_SESSION['validated-km-bd'];
$_SESSION['revision'] = false;

// test si s'est une nouvelle leçon ou une révision
// si nouvelle, validation de cette leçon en Bd.
if ($curLesson > $lessonBd) {
    // validation Table -> user_languages
    updateLessons($id_user,$curLesson);

        $nextLesson = true;
        $km = "";
        $_SESSION['validated-lesson-bd'] = $curLesson;

        // incrementation des kilometres +5 : table -> users 
        $km = (int) ($_SESSION['validated-km-bd']);
        $km = $km +5;
        $_SESSION['validated-km-bd'] = $km;
        updateKm($id_user,$km);

} else {
        $_SESSION['revision'] = true;
        $km = "";    
        // incrementation des kilometres +2 en mode révision
        $km = (int) ($_SESSION['validated-km-bd']);
        $km = $km +2;
        $_SESSION['validated-km-bd'] = $km;
        updateKm($id_user,$km);
}


// Test si cetait la dernière leçon du niveau
if ($curLesson == $endLessonInLevel) {

        $endLevel = true;
        // Incrémentation du niveau actuel
        $levelBd++;
        // function de mise jour du niveau : base-> users_languages
        updateLevel($id_user, $levelBd);
        $_SESSION['validated-level-bd'] = $levelBd;

} else {
        // passage à l'index de leçon suivante
        $_SESSION['current-lesson'] = $curLesson +1;

}


// Traitement des redirections
if ($endLevel) {
        header( "location: ../dashboard/dashboard-levels.php?level=".$levelBd);
} else {
        // direction la page winner de lessons      
        header("Location: winner.php?level=".(int) ($_SESSION['current-level']));
}



?>

<script>
        // pour des essais seulement
    var valLesson = sessionStorage.getItem("lesson");
    console.log("end-learning-php: Valeur sessionStorage de lesson: \n " + valLesson );

</script>
