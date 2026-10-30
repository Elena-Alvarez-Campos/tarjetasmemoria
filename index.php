<!DOCTYPE html>
<html lang='es'>
<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>Home</title>
    <link rel='stylesheet' href='style.css'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body id="indexBody">
   
    <h2>JUEGO DE MEMORIA</h2>
    <p>Pon a prueba tu cabeza </p>
    <article id="tabla">
        <div class="fila">1
            <div id="nombre1" class="nombre">Pepe</div>
            <div>50</div>
        </div>
        <div class="fila">2
            <div id="nombre2" class="nombre">Marisa</div>
            <div>30</div>
        </div>
        <div class="fila">3
            <div id="nombre3" class="nombre">Ana</div>
            <div>20</div>
        </div>
        <div class="fila">4
            <div id="nombre4" class="nombre">Pepa</div>
            <div>10</div>
        </div>
        <div class="fila">5
            <div id="nombre5" name="prueba" class="nombre">Blas</div>
            <div>2</div>
        </div>
        
    </article>
    <form name=formulario method="POST"  action="juego.php">
        <input type="text" name="nombrePlayer" id="nombre" placeholder="Escribe tu nombre">
        <button id="button" >¡A JUGAR!</button>
    </form>
    <p>Escribe un nombre para poder jugar</p>
    <!-- <img src="https://static.wikia.nocookie.net/pikmin/images/5/54/P4_Blue_Pikmin.png/revision/latest/thumbnail/width/360/height/450?cb=20230818163738"> -->
    <script src="script.js"></script>
    <div>
        <?php
          
    ?>
    <div>
    
</body>
</html>