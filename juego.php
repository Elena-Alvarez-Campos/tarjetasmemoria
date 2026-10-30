<!DOCTYPE html>
<html lang='es'>
<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>Tarjeta memoria</title>
    <link rel='stylesheet' href='style.css'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>
    <article>
        <div id="tablero">
            <div class="carta" id="0"></div>
            <div class="carta" id="1"></div>
            <div class="carta" id="2"></div>
            <div class="carta" id="3"></div>
            <div class="carta" id="4"></div>
            <div class="carta" id="5"></div>
            <div class="carta" id="6"></div>
            <div class="carta" id="7"></div>
            <div class="carta" id="8"></div>
            <div class="carta" id="9"></div>
            <div class="carta" id="10"></div>
            <div class="carta" id="11"></div>
            <div class="carta" id="12"></div>
            <div class="carta" id="13"></div>
            <div class="carta" id="14"></div>
            <div class="carta" id="15"></div>
            <div class="carta" id="16"></div>
            <div class="carta" id="17"></div>
            <div class="carta" id="18"></div>
            <div class="carta" id="19"></div>
            <div class="carta" id="20"></div>
            <div class="carta" id="21"></div>
            <div class="carta" id="22"></div>
            <div class="carta" id="23"></div>
            <div class="carta" id="24"></div>
            <div class="carta" id="25"></div>
            <div class="carta" id="26"></div>
            <div class="carta" id="27"></div>
            <div class="carta" id="28"></div>
            <div class="carta" id="29"></div>


        </div>
        <div id="foot">
            <div>Nombre Usuario <div id="nombrePlayerEscrito" ma><?php echo $_POST['nombrePlayer'] ?></div></div>
            <div>Puntuación <div id="score">000</div></div>
            <div>Tiempo <div id="tiempo">60</div></div>
        </div>
    </article>
    <?php
        
        try {
            $uri = getenv("MONGODB_URI");
		 	if(!$uri){
                echo "no conectado";
		 			throw new RuntimeException(
		 			"no se ha configurado la uri"
				);
		 	}
		 	$manager =new MongoDB\Driver\Manager($uri);
		 		$data = [
                    "_id" => uniqid(),
		 			"nombre" => $_POST['nombrePlayer'],
		 			"score" => 0		 			
				];
			$bulk = new MongoDB\Driver\BulkWrite();
		 	$bulk->insert($data);

		 	$resultado = $manager->executeBulkWrite( 
		 		"memoriaDB.juegoCartas",
		 		$bulk
		 	);
                
		 	if($resultado->getInsetedCount() !== 1){
		 		throw new RuntimeException("Error al insertar datos");
			}

		} catch (Throwable $errorvariable) {	
		 	error_log("Error base de datos: " . $errorvariable->getMessage());
		    //throw $th;
		}


    ?>
    <script src="script.js"></script>
</body>
</html>