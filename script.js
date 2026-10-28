
let cartas =document.querySelectorAll('.carta')
console.log(cartas)
let posibilidades=[1,1,2,2,3,3,4,4,5,5,6,6,7,7,8,8,9,9,0,0]
let score=0


console.log(cartas.length)
cartas.forEach(carta => {
    let posicionAsgnado = Math.floor(Math.random() *(posibilidades.length))
    //carta.textContent=posibilidades[posicionAsgnado]
    carta.setAttribute('valor', posibilidades[posicionAsgnado])

    posibilidades.splice(posicionAsgnado,1)
    carta.addEventListener('click', () =>{
        carta.textContent=carta.getAttribute('valor')
        carta.classList.contains('completado')== true ? console.log("pringado") : carta.classList.toggle("derecho")
        
        if(document.getElementsByClassName('derecho').length==2){
            //setTimeout()
            if(document.getElementsByClassName('derecho')[0].textContent==document.getElementsByClassName('derecho')[1].textContent){
                console.log(true)
                //Añadir clase completado

                document.getElementsByClassName('derecho')[0].classList.add('completado')
                document.getElementsByClassName('derecho')[1].classList.add('completado')
                //quitar clase derecho
                document.getElementsByClassName('derecho')[0].classList.remove('derecho')
                document.getElementsByClassName('derecho')[0].classList.remove('derecho')
            
            }else{
                console.log(false)
                document.getElementsByClassName('derecho')[0].textContent=("")
                document.getElementsByClassName('derecho')[1].textContent=("")
                document.getElementsByClassName('derecho')[0].classList.toggle("derecho")
                document.getElementsByClassName('derecho')[0].classList.toggle("derecho")
            }
        }
        if(document.querySelectorAll('.completado').length==20){
            console.log("JUEGO TERMINADO!!!!!!!")
        }
    })
});