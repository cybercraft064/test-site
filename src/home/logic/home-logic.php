<?php
    session_start();

    // Variables de contexte
    $pseudo_user = $_SESSION['pseudo-user'];
    $validatedLevel = $_SESSION['validated-level-bd'];
    $validatedLesson = $_SESSION['validated-lesson-bd'];
    $validatedKlm = $_SESSION['validated-klm-bd'];
    $currentLanguage = $_SESSION['current-langage'];