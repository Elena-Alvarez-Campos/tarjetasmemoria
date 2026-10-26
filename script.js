
let cartas =document.querySelectorAll('.carta')
console.log(cartas)
for (let cadaCarta of cartas){
    console.log(cadaCarta)
}

console.log(cartas.length)
cartas.forEach(carta => {
    carta.addEventListener('click', () =>{
        let cartavalor = carta.textContent;
        alert(cartavalor)
    })
    alert("a")
});
/*function vuelta(e) {
    alert('hola')
    console.log(e)
    ///e.target.classList.add('derecho')
    // let cercano=e.closest("#carta")
    // cercano.classList.toggle("derecho")

}
*/