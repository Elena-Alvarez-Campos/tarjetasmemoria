
//luxon
//const { DateTime, Interval } = require("luxon");
//console.log(document.getElementById('nombrePlayerEscrito').textContent)
if(window.location.pathname=='/' || window.location.pathname=='/index.php'){

    let button = document.querySelector('button');
    
    button.addEventListener("click", () => {
        //console.log(document.querySelector('input').value)
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
//console.log(cartas)
let posibilidades=[1,1,2,2,3,3,4,4,5,5,6,6,7,7,8,8,9,9,10,10,11,11,12,12,13,13,14,14,15,15]
let colores=['#2A0081','#B7E7FC','#FFD3F0','#F5C700','#BA1650','#0AC0A2','#F221B3','#B6B023','#63DA10','#698F5F','#00F6FC','#FC947D','#F388FC','#007DFC','#8279FF','red']
let imgsources=[];
let score=0
let timer=59
let valoresOrdenados=[]
let timerId 
function recuento() {
    document.getElementById('tiempo').textContent= timer--
    if(document.getElementById('tiempo').textContent==-1){
        finJuego()
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
//console.log(cartas.length)
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
        carta.style.backgroundColor = colores[carta.textContent]
        //si está al derecho o completada no se dá la vuelta
        if(carta.classList.contains('completado')==true || carta.classList.contains('derecho')==true){
            //no hace nada
            
        } else{
            carta.classList.toggle('derecho')
        }
        //Comprobar que 2 cartas son iguales
        let listaCartasDerecho=document.getElementsByClassName('derecho')
        emparejados(listaCartasDerecho)
        //Indicador de fin de juego
        if(document.querySelectorAll('.completado').length==30){
            score+=40
            finJuego()
        }
        
    })
});

function emparejados(listaCartasDerecho) {
    if(listaCartasDerecho.length==2){
        
        let id1=document.getElementById(listaCartasDerecho[0].id)
        let id2=document.getElementById(listaCartasDerecho[1].id)
        
    id1.classList.toggle("derecho")
    id2.classList.toggle("derecho")
        //console.log(id1.textContent)
            //cartas coinciden
            if(id1.textContent==id2.textContent){
                actualizaPuntos(true)
                //Añadir clase completado

                id1.classList.add('completado')
                id2.classList.add('completado')
                //quitar clase derecho
                id1.classList.remove('derecho')
                id2.classList.remove('derecho')
            //cartas no coinciden
            }else{
                setTimeout(() => malapareja(id1,id2), 550);
            }
        }
}
function malapareja(id1,id2) {
    
    actualizaPuntos(false)//quita puntos
    //console.log(false)
    id1.style.backgroundColor = 'white'
    id2.style.backgroundColor = 'white'
    id1.textContent=("")
    id2.textContent=("")
}
//true: suman puntos
//false: restan puntos
//positivo ? es un número positivo->true :  false
function actualizaPuntos(positivo) {
    positivo==true ? score+=2 : score--
    document.getElementById('score').textContent=score
}
function finJuego() {
    //let nuevosDatos = []
    let aviso=(confirm("Fin del juego\n¿Volver a jugar?\nScore: "+score)) 
    if (aviso==true) {
        location.reload()
    }else{
        window.location.href = 'index.php'
    }
}
console.log(valoresOrdenados)
