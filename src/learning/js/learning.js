// Déclaration des variables
var userAnswer, correctAnswer;
var goodAnswer = false;
var wordIndex = 0;
var etape = "";

// var nbWordInLesson = translations.length; // Nombre de lignes à traiter pour cette leçon
var nbWordInLesson = 2; alert("ATTENTION tu es en test!!") ;

var dataCouleurCss;
var textButton;
var dataBadReply;
var dataWordReply;
var dataInputReply

// -- Préparation de la vue  -- //
// Fonction: Début d'une leçon
function F_begineView() {  

    // Ecrit le texte à traduire que tu récupère de l'objet tableau [translation]
    document.getElementById("data_WordSource").innerHTML = translations[wordIndex]['source'];

    // Récupère la réponse original 
    correctAnswer = translations[wordIndex]['reponse'].toLowerCase();

    // Vide la zone de saisie de l'input
    dataInputReply.value="";
    // Réactivation du focus
    dataInputReply.focus();

    // texte bouton = Vérification
    textButton.textContent="vérification".toUpperCase();
    // Modification de l'action sur onclick --> Controle de la saisie
    etape="check";   
} // Fin function F_begineView ---------------------------------------------- //


// -- Traitements de la réponse -- // 

// Fonction: contrôle la Réponse de l'utilisateur et traite la vue suivant le résultat
// Appelé par le bouton de validation.
function F_checkAnswer() {    
    // Récupère la réponse saisie
    userAnswer = dataInputReply.value.toLowerCase();  
    etape="next";
    // Compare la réponse
    if (userAnswer != "" ) {
        if (userAnswer == correctAnswer) {
            dataCouleurCss.classList.add("good-reply");             
            textButton.textContent="suivant".toUpperCase();        
            goodAnswer = true;
            

        } else {
            dataCouleurCss.classList.add("bad-reply");
            dataBadReply.classList.add("correction-container");
            dataWordReply.textContent=correctAnswer;
            textButton.classList.add("nextButton");
            textButton.textContent="recommencer".toUpperCase();
            goodAnswer = false;
            
        }

    } else {
        alert("Vous n'avez pas saisie de réponse \n " +
              "Si vous ne savez pas quoi répondre \n" + 
               "écrivez n'importe quoi, puis validez \n" +
               "La bonne réponse s'affichera !" );
    }
} // fin function F_checkAnswer  ------------------------------------------- //


// -- Rétablissement de la vue -- //

// Fonction: Remise à zero des sélécteurs CSS et autres valeurs de base
function F_cleanView() {
    if (dataCouleurCss.classList.contains('good-reply')) {dataCouleurCss.classList.remove('good-reply');}
    if (dataCouleurCss.classList.contains('bad-reply')) {dataCouleurCss.classList.remove('bad-reply');}  
    if (dataBadReply.classList.contains('correction-container')) {dataBadReply.classList.remove('correction-container');}
    dataWordReply.textContent="";
    dataInputReply.value=" ";  // supprime le texte saisie
    textButton.classList.remove("nextButton");
} // fin function F_cleanView ---------------------------------------------- //


// -- Passage au mot/phrase suivant(e) ou redirection si leçon terminée -- //

function F_nextWord() {
    if (wordIndex == nbWordInLesson -1) { // (-1) puisque l'on compare un index de tableau

        alert(" lesson terminé " + "\n" + " Envoi vers end-learning.php");
        
        // redirection vers --> end-learning.php
        window.location.href = "../learning/end-learning.php?lesson="+currentLesson;

    } else {
        ++wordIndex;
        // Rétablissement de la vue de base 
        F_cleanView();
        F_begineView(wordIndex);
    }
} // fin function F_nextWorld -------------------------------------------- //


// -- Erreur de saisie Rejouer -- //

// refaire un tour car mauvaise réponse
function F_loopWord() { 
    F_cleanView();
    F_begineView(wordIndex);
}

// lancement des scripts en fin du loading de la page web.
window.addEventListener('load', function(){
	
// Chargement de quelques noeuds sous forme de variable, un seul appel
    dataCouleurCss = document.getElementById("data_Couleur_Css");
    textButton = document.getElementById("data_NextButton_Css"); 
    dataBadReply = document.getElementById("data_BadReply"); 
    dataWordReply = document.getElementById("data_WordReply");
    dataInputReply = document.getElementById("data_InputReply");

    // MEttre les event listeners
    dataInputReply.addEventListener("keypress", function (e){ // touche Entrée
        if(e.keyCode == 13){

            if (etape == "check"){
                F_checkAnswer();// lancement de la fonction de controle saisie 
            }else{
                (goodAnswer) ? F_nextWord() : F_loopWord(); // Ternaire sur la bonne réponse
            }           
        }
    });

    textButton.addEventListener("click", function(){ // idem mais quand click sur le bouton
        if (etape == 'check' ){
            F_checkAnswer();
        } else {
            (goodAnswer) ? F_nextWord() : F_loopWord();
        }
    });
    
    // -- Exécution du Scriptes de départ -- //
    F_begineView(); 

});



