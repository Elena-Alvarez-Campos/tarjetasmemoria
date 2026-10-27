
let cartas =document.querySelectorAll('.carta')
console.log(cartas)
let posibilidades=[1,1,2,2,3,3,4,4,5,5,6,6,7,7,8,8,9,9,0,0]



console.log(cartas.length)
cartas.forEach(carta => {
    let posicionAsgnado = Math.floor(Math.random() *(posibilidades.length))
    carta.textContent=posibilidades[posicionAsgnado]
    posibilidades.splice(posicionAsgnado,1)
    carta.addEventListener('click', () =>{
        carta.contains('.completado')== true ? console.log("pringado") : carta.classList.toggle("derecho")
        
        if(document.getElementsByClassName('derecho').length==2){
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
            document.getElementsByClassName('derecho')[0].classList.toggle("derecho")
            document.getElementsByClassName('derecho')[0].classList.toggle("derecho")
            }
        }
    })
});

/*
const tablero = [];//tablero de arrays 2D ppara meter las cartas
for (let i = 0; i < 5; i++) {
    tablero[i] = [];
    for (let j = 0; j < 5; j++) {
        tablero[i][j] = null;
    }
}
//console.log(tablero)
function impresora() {
    
    //creo el string que voy a imprimir
    
    let salida = '  0 1 2 3 4 5' + '\n'; // la fila de números de arriba y un salto de línea
    for (let i = 0; i < 5; i++) {
        salida += i + '|'; // el número de la izquierda (para la columna de números) y un separador
        for (let j = 0; j < 5; j++) {
            salida += (tablero[i][j] || ' ') + '|'; // coloco la ficha o un espacio en blanco y el separador
            // (null || 10) siempre pondrá 10 porque null es false. Es una forma de ahorrarse un IF
        }
        salida += '\n'; // le hago un salto de línea para ir a la siguiente
    }
    console.log(salida); // por último se imprime
}
console.log(impresora())


var tableBody = document.getElementById("tablero");
tableBody.innerHTML = "";
tablero.forEach(function (row) {
  var newRow = document.createElement("tr");
  tableBody.appendChild(newRow);
  if (row instanceof Array) {
    row.forEach(function (cell) {
      var newCell = document.createElement("td");
      newCell.textContent = cell;
      newRow.appendChild(newCell);
    });
  } else {
    newCell = document.createElement("td");
    newCell.textContent = row;
    newRow.appendChild(newCell);
  }
});
*/