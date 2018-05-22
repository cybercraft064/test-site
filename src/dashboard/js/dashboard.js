var elementA;

function openMenu(){
    
    if (elementA.classList.contains('show-burger')){  
        elementA.classList.remove('show-burger');
    } else {
        elementA.classList.add('show-burger');        
    }
};

elementA = document.getElementById('link-burger');

elementA.addEventListener('click', openMenu);

