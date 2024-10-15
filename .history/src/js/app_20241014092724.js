// vamos a escuchar que el documento este cargado y haya cargado tanto el html, como el javascript como el css
document.addEventListener('DOMContentLoaded', function(){
    eventListeners();

    darkMode();
});

function darkMode(){

    const prefiereDarkMode = window.matchMedia('(prefers-color-scheme: dark)'); 


    if(prefiereDarkMode.matches){
        document.body.classList.add('dark-mode');
    }else{
        document.body.classList.remove('dark-mode');
    }

    prefiereDarkMode.addEventListener('change', function(){
        if(prefiereDarkMode.matches){
            document.body.classList.add('dark-mode');
        }else{
            document.body.classList.remove('dark-mode');
        }  
    })

    const botonDarkMode = document.querySelector('.dark-mode-boton');

    botonDarkMode.addEventListener('click', function(){
        document.body.classList.toggle('dark-mode');
    });
}

function  eventListeners(){
    const mobileMenu = document.querySelector('.mobile-menu');
    mobileMenu.addEventListener('click',navegacionResponsive);

    // Muestra campos condicionales
    // registrar un evenListener para los radius button

    // seleccionar todos los inputs que tengan como name: contacto[contacto]
    const metodoContacto = document.querySelectorAll('input[name="contacto[contacto]"]'); // va a permitir seleccionar algunos de los atributos
    //console.log(metodoContacto);

    metodoContacto.forEach(input => input.addEventListener('click', mostrarMetodosContacto))
    metodoContacto.addEventListener('click', mostrarMetodosContacto);
}

function navegacionResponsive(){
    const navegacion = document.querySelector('.navegacion');
    if(navegacion.classList.contains('mostrar')){
        navegacion.classList.remove('mostrar');
    }else{
        navegacion.classList.add('mostrar');
    }

   
}

function mostrarMetodosContacto(e){
    const contactoDiv = document.querySelector('#contacto');

    //contactoDiv.textContent = 'Diste click';

    console.log(e);
    
    
}

 //navegacion.classList.toggle('mostrar')  // si la tiene la agrega, si no la tiene la quita