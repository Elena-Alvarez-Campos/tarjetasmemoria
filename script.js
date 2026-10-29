
//luxon
//const { DateTime, Interval } = require("luxon");

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
            window.location.href = 'index.html'

        }else{
            window.location.href = 'home.html'

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
            timerId2= setInterval(() => emparejados(), 1000);

            //Indicador de fin de juego
        if(document.querySelectorAll('.completado').length==20){
            console.log("JUEGO TERMINADO!!!!!!!")
        }
        
    })
});
function emparejados() {
    if(document.getElementsByClassName('derecho').length==2){
            //setTimeout()
            //cartas coinciden
            if(document.getElementsByClassName('derecho')[0].textContent==document.getElementsByClassName('derecho')[1].textContent){
                actualizaPuntos(true)
                //Añadir clase completado

                document.getElementsByClassName('derecho')[0].classList.add('completado')
                document.getElementsByClassName('derecho')[1].classList.add('completado')
                //quitar clase derecho
                document.getElementsByClassName('derecho')[0].classList.remove('derecho')
                document.getElementsByClassName('derecho')[0].classList.remove('derecho')
            //cartas no coinciden
            }else{
                actualizaPuntos(false)
                console.log(false)
                document.getElementsByClassName('derecho')[0].textContent=("")
                document.getElementsByClassName('derecho')[1].textContent=("")
                document.getElementsByClassName('derecho')[0].classList.toggle("derecho")
                document.getElementsByClassName('derecho')[0].classList.toggle("derecho")
            }
        }
}
//true: suman puntos
//false: restan puntos
//positivo ? es un número positivo->true :  false
function actualizaPuntos(positivo) {
    positivo==true ? score+=2 : score--
    document.getElementById('score').textContent=score
}
console.log(valoresOrdenados)
