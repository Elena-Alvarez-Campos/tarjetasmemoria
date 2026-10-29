
//luxon
//const { DateTime, Interval } = require("luxon");
if(window.location.pathname=='/' || window.location.pathname=='/index.php'){
    let button = document.querySelector('button');
    
    button.addEventListener("click", () => {
        console.log(document.querySelector('input').value)
        if(document.querySelector('input').value.trim()==""){
            console.log(false)
        }
        /*
        let player=prompt('Escribe tu nombre de usuario')
        if(player!=null){
            window.location.href='juego.php'
        }*/
    });
}


let cartas =document.querySelectorAll('.carta')
console.log(cartas)
let posibilidades=[1,1,2,2,3,3,4,4,5,5,6,6,7,7,8,8,9,9,10,10,11,11,12,12,13,13,14,14,15,15]
let imgsources=[];
let score=0
let timer=59
let valoresOrdenados=[]
let timerId 
function recuento() {
    document.getElementById('tiempo').textContent= timer--
    if(document.getElementById('tiempo').textContent==-1){
        let aviso=(confirm("Fin del juego\n¿Volver a jugar?")) 
        if (aviso==true) {
            window.location.href = 'juego.php'

        }else{
            window.location.href = 'index.php'

        }
    }    
}
let carta1=true
let timerId2
/*

var editButton = document.createElement('button');
var editImage = document.createElement('img');
editImage.src = "URL for image";
editImage.alt = "Edit";
editButton.appendChild(editImage);

*/
console.log(cartas.length)
cartas.forEach(carta => {
    let posicionAsgnado = Math.floor(Math.random() *(posibilidades.length))
    valoresOrdenados.push(posibilidades[posicionAsgnado])
    //carta.setAttribute('valor', posibilidades[posicionAsgnado])

    posibilidades.splice(posicionAsgnado,1)
    //FUNCIÓN AL PULSAR
    carta.addEventListener('click', () =>{
        if(carta1==true){
            timerId== setInterval(() => recuento(), 1000);
            carta1=false
        }
        //console.log(carta.id)
        carta.textContent=valoresOrdenados[carta.id]
        //si está al derecho o completada no se dá la vuelta
        if(carta.classList.contains('completado')==true || carta.classList.contains('derecho')==true){
            //no hace nada
            
        } else{
            carta.classList.toggle('derecho')}
        //Comprobar que 2 cartas son iguales
            emparejados()
             

            //Indicador de fin de juego
        if(document.querySelectorAll('.completado').length==30){
            score+=40
            console.log("JUEGO TERMINADO!!!!!!!")
        }
        
    })
});

function emparejados() {
    if(document.getElementsByClassName('derecho').length==2){
        let listaCartasDerecho=document.getElementsByClassName('derecho')
            //setTimeout()
            //cartas coinciden
            if(listaCartasDerecho[0].textContent==listaCartasDerecho[1].textContent){
                actualizaPuntos(true)
                //Añadir clase completado

                listaCartasDerecho[0].classList.add('completado')
                listaCartasDerecho[1].classList.add('completado')
                //quitar clase derecho
                listaCartasDerecho[0].classList.remove('derecho')
                listaCartasDerecho[0].classList.remove('derecho')
            //cartas no coinciden
            }else{
                setTimeout(() => malapareja(listaCartasDerecho), 550);

                
            }
        }
}
function malapareja(paralistaCartas) {
    actualizaPuntos(false)
                console.log(false)
                paralistaCartas[0].textContent=("")
                paralistaCartas[1].textContent=("")
                paralistaCartas[0].classList.toggle("derecho")
                paralistaCartas[0].classList.toggle("derecho")
}
//true: suman puntos
//false: restan puntos
//positivo ? es un número positivo->true :  false
function actualizaPuntos(positivo) {
    positivo==true ? score+=2 : score--
    document.getElementById('score').textContent=score
}
console.log(valoresOrdenados)
