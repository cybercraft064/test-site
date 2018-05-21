<?php
session_start();
// cette page est appelé par winner.php

$lesson_current = (int) htmlspecialchars($_SESSION['lesson-user']);
//incrémente la lesson courante
// et affiche la dans winner.php
$lesson_next = $lesson_current +1;

if ($_SESSION['revision'] == true) {
    $typeLesson = "revision";
} else {
    $typeLesson = "";
}