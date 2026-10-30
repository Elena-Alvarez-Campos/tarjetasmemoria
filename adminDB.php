
<?php
	$uri = getenv("MONGODB_URI");
	if(!$uri){
        echo "no conectado";
		throw new RuntimeException(
			"no se ha configurado la uri"
			);
	}


	$data = json_decode(file_get_contents('php://input'),true);

	$nombre = trim($data['nombre']);
	$score = (int) ($data['puntuacion'] ?? 0);

	try {
		$bulk =new MongoDB\Driver\BulWrite();
		$bulk-> insert([
			'nombre' => $nombre,
			'score' => $score
		])
		$resultado = $manager->executeBulkWrite( 
		 		"memoriaDB.juegoCartas",
		 		$bulk
		 	);


		if($resultado->getInsertedCount() !== 1){
			throw new RuntimeException("Error");
			
		}
	} catch (Throwable $th) {
		http_response_code(500);
		error_log($th->getMessage)
	}

	









////////////////
	/*if($_POST){
   //echo "recibo algo POST";
   
   //recibo los datos y los decodifico con PHP

   //con esto podría mostrar todos los datos del JSON recibido
   //print_r($datosjugador);
    $data = [
                "_id" => uniqid(),
		 		"nombre" => $datosjugador[0],
				"score" => $datosjugador[1]		
			];
			$manager =new MongoDB\Driver\Manager($uri);
		 		
			$bulk = new MongoDB\Driver\BulkWrite();
		 	$bulk->insert($data);

		 	$resultado = $manager->executeBulkWrite( 
		 		"memoriaDB.juegoCartas",
		 		$bulk
		 	);
                
		 	if($resultado->getInsetedCount() !== 1){
		 		throw new RuntimeException("Error al insertar datos");
			}
   //ahora muestro algún dato de este array bidimiesional
   $salida = "";
   $salida .= "Capital de Francia: " . $datosjugador[1][1];
   $salida .= "<br>Nombre del país 1 (índice 0 del array): " . $datosjugador[0][0];
   $salida .= "<br>Nombre del país 3: " . $datosjugador[2][0];
   echo $salida;
}else{
   echo "No recibí datos por POST";
}
*/
/*
    function PHPguardado(){
        try {

            $datos = json_decode($_POST["datos"]);
            $nombre = trim($datos["nombre"] ?? ");
			$score = trim($datos["score"] ??? ");
			$id = uniqid()
			$uri = getenv("MONGODB_URI");
		 	if(!$uri){
                echo "no conectado";
		 			throw new RuntimeException(
		 			"no se ha configurado la uri"
				);
		 	}
			$data = [
                    "_id" => $id,
		 			"nombre" => $nombre,
		 			"score" => $score		 			
				];
			$manager =new MongoDB\Driver\Manager($uri);
		 		
			$bulk = new MongoDB\Driver\BulkWrite();
		 	$bulk->insert($data);

		 	$resultado = $manager->executeBulkWrite( 
		 		"memoriaDB.juegoCartas",
		 		$bulk
		 	);
                
		 	if($resultado->getInsetedCount() !== 1){
		 		throw new RuntimeException("Error al insertar datos");
			}
			

            //////////////////////////////////////
            // $uri = getenv("MONGODB_URI");
		 	// if(!$uri){
            //     echo "no conectado";
		 	// 		throw new RuntimeException(
		 	// 		"no se ha configurado la uri"
			// 	);
		 	// }
		 	// $manager =new MongoDB\Driver\Manager($uri);
		 	// 	$data = [
            //         "_id" => uniqid(),
		 	// 		"nombre" => $_POST["nombrePlayer"],
		 	// 		"score" => 0		 			
			// 	];
			// $bulk = new MongoDB\Driver\BulkWrite();
		 	// $bulk->insert($data);

		 	// $resultado = $manager->executeBulkWrite( 
		 	// 	"memoriaDB.juegoCartas",
		 	// 	$bulk
		 	// );
                
		 	// if($resultado->getInsetedCount() !== 1){
		 	// 	throw new RuntimeException("Error al insertar datos");
			// }

		} catch (Throwable $errorvariable) {	
		 	error_log("Error base de datos: " . $errorvariable->getMessage());
		    //throw $th;
		}
    }*/

?>

