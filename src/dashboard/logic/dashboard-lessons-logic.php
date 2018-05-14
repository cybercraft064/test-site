<?php
    session_start(); 

    echo "---- je passe par dashboard-lessons-logic.php ---"; // debug
    print_r($_SESSION); // debug

    // variables de travail
    $pseudo_user = $_SESSION['pseudo-user'];

    // init des filters
    $filter2 = "filter";
    $filter3 = "filter";
    $filter4 = "filter";
    $filter5 = "filter";
    $filter6 = "filter";
    $filter7 = "filter";
    $filter8 = "filter";
    $filter9 = "filter";
    $filter10 = "filter";
    $filter11 = "filter";
    $filter12 = "filter";

    // numéro de la dernière leçon validée
    $lesson = $_SESSION['lesson-user'];
    
    if ($lesson == 2){
        $filter2 = "";
    } 
    if ($lesson == 3){
        $filter2 = "";
        $filter3 = "";
    }
    if ($lesson == 4){
        $filter2 = "";
        $filter3 = "";
        $filter4 = "";
    } 
    if ($lesson == 5){
        $filter2 = "";
        $filter3 = "";
        $filter4 = "";
        $filter5 = "";        
    }   
    if ($lesson == 6){
        $filter2 = "";
        $filter3 = "";
        $filter4 = "";
        $filter5 = ""; 
        $filter6 = "";       
    }         
    if ($lesson == 7){
        $filter2 = "";
        $filter3 = "";
        $filter4 = "";
        $filter5 = ""; 
        $filter6 = ""; 
        $filter7 = "";               
    }  
    if ($lesson == 8){
        $filter2 = "";
        $filter3 = "";
        $filter4 = "";
        $filter5 = ""; 
        $filter6 = ""; 
        $filter7 = ""; 
        $filter8 = ""; 
    }
    if ($lesson == 9){
        $filter2 = "";
        $filter3 = "";
        $filter4 = "";
        $filter5 = ""; 
        $filter6 = ""; 
        $filter7 = ""; 
        $filter8 = ""; 
        $filter9 = "";
    } 
    if ($lesson == 10){
        $filter2 = "";
        $filter3 = "";
        $filter4 = "";
        $filter5 = "";  
        $filter6 = ""; 
        $filter7 = ""; 
        $filter8 = ""; 
        $filter9 = "";
        $filter10 = "";
    }   
    if ($lesson == 11){
        $filter2 = "";
        $filter3 = "";
        $filter4 = "";
        $filter5 = ""; 
        $filter6 = "";  
        $filter7 = ""; 
        $filter8 = ""; 
        $filter9 = "";
        $filter10 = "";        
        $filter11 = "";  
    }         
    if ($lesson == 12){
        $filter2 = "";
        $filter3 = "";
        $filter4 = "";
        $filter5 = ""; 
        $filter6 = ""; 
        $filter7 = ""; 
        $filter8 = ""; 
        $filter9 = "";
        $filter10 = "";        
        $filter11 = "";
        $filter12 = "";    
    }        
    
