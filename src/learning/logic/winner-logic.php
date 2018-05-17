<?php
session_start();
// cette page est appelé par winner.php

$lesson_current = (int) htmlspecialchars($_SESSION['lesson-user']);
//incrémente la courante
$lesson_next = $lesson_current +1;