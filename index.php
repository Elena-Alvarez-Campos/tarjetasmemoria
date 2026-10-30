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
            <div>20</div>
        </div>
        <div class="fila">2
            <div id="nombre2" class="nombre">MacaPaca</div>
            <div>20</div>
        </div>
        <div class="fila">3
            <div id="nombre3" class="nombre">miku</div>
            <div>20</div>
        </div>
        <div class="fila">4
            <div id="nombre4" class="nombre">imolnyhereforpikmin</div>
            <div>20</div>
        </div>
        <div class="fila">5
            <div id="nombre5" name="prueba" class="nombre">segfsweugb</div>
            <div>20</div>
        </div>
        
    </article>
    <form name=formulario method="POST"  >
        <input type="text" name="nombrePlayer" id="nombre" placeholder="Escribe tu nombre">
        <button id="button" >¡A JUGAR!</button>
    </form>
    <p>Escribe un nombre para poder jugar</p>
    <!-- <img src="https://static.wikia.nocookie.net/pikmin/images/5/54/P4_Blue_Pikmin.png/revision/latest/thumbnail/width/360/height/450?cb=20230818163738"> -->
    <script src="script.js"></script>
    <div>
        <?php
    if (empty($_POST['nombrePlayer'])) {
        echo 'mal';
    }else{
        echo 'bien';
        header('Location: /juego.php');
        die();
    }
    ?>
    <div>
    
</body>
</html>scm-history-item:c%3A%5CUsers%5Celiac%5COneDrive%5CEscritorio%5C2CS%5Ccliente%5Ctarjetas?%7B%22repositoryId%22%3A%22scm0%22%2C%22historyItemId%22%3A%2248f09ad0496f3711e53fde156026b7d4809abb90%22%2C%22historyItemParentId%22%3A%22846b2fd2bc458ce23e806aa30b5ec3c4b352bbbb%22%2C%22historyItemDisplayId%22%3A%2248f09ad%22%7D