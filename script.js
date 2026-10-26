
let cartas =document.querySelectorAll('.carta')
console.log(cartas)
let posibilidades=[1,1,2,2,3,3,4,4,5,5,6,6,7,7,8,8,9,9,0,0]
for (let cadaCarta of cartas){
    console.log(cadaCarta)
}


console.log(cartas.length)
cartas.forEach(carta => {
    carta.addEventListener('click', () =>{
        carta.classList.toggle("derecho")
    })
});



/*function vuelta(e) {
    alert('hola')
    console.log(e)
    ///e.target.classList.add('derecho')
    // let cercano=e.closest("#carta")
    // cercano.classList.toggle("derecho")

}
*/