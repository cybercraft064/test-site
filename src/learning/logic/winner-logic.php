<?php
session_start();
// cette page est appelé par winner.php

// variable path de l'image
$backgroundLevel = "./../../assets/img/bg-learning-";

if (isset ($_GET['level']) & !empty($_GET['level'])  ) { 

    $levelCurrent = (int) htmlspecialchars($_GET['level']);

} else {

    $levelCurrent = (int) htmlspecialchars($_SESSION['validated-level-bd']);
}

// indication du passage à la leçon suivante
$lesson_current = (int) htmlspecialchars($_SESSION['validated-lesson-bd']);
$lesson_next = $lesson_current +1;


// test si nous somme en révision
// cela change le message d'accueil
if ($_SESSION['revision'] == true) {
    $typeLesson = "revision";
} else {
    $typeLesson = "";
}
