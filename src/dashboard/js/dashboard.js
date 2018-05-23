var elementBurger;


elementBurger = document.getElementById('link-burger');

elementBurger.addEventListener('click', openMenu);


function openMenu(){
    
    if (elementBurger.classList.contains('show-burger')){  
        elementBurger.classList.remove('show-burger');
    } else {
        elementBurger.classList.add('show-burger');        
    }
};