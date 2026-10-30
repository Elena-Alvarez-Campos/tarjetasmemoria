
<?php
    header('Content-Type: application/json; charset=utf-8');

    function PHPguardado(){
        try {
            $datos = json_decode(
                $input,
                true,
                512,
                JSON_THROW_ON_ERROR
            );
            $nombre = trim($datos['nombre'] ?? '');

            //////////////////////////////////////
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
    }

?>

