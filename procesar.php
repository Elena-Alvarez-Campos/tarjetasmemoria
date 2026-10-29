<?php
	
    // Arrays para guardar mensajes y errores:
	$aErrores = array();
	$aMensajes = array();

    // Patrón para usar en expresiones regulares (admite letras acentuadas y espacios):
	$patron_texto = "/^[a-zA-Z0-9áéíóúÁÉÍÓÚüÜàèìòùÀÈÌÒÙ\s]+$/";

	// Comprobar si se ha enviado el formulario:
	if( !empty($_POST) )
		// Mostrar la información recibida del formulario:
		print_r( $_POST );

		// Comprobar si llegaron los campos requeridos:
		if( isset($_POST['nombrePlayer']) & isset($_POST['score']))
		{
			
			// Nombre:
			if( empty($_POST['nombrePl']) )
				$aErrores[] = "Debe especificar el nombre";
			else
			{
				// Comprobar mediante una expresión regular, que sólo contiene letras y espacios:
				if( preg_match($patron_texto, $_POST['nombretxt']) )
					$aMensajes[] = "<p> Nombre: [".$_POST['nombretxt']."] </p>";
				else
					$aErrores[] = "El nombre sólo puede contener letras y espacios";
			}			
		}
		else
		{
			echo "<p>No se han especificado todos los datos requeridos.</p>";
		}


		// Si han habido errores se muestran, sino se mostrán los mensajes
		
		if( count($aErrores) > 0 )
		{
			echo "<p>ERRORES ENCONTRADOS:</p>";

			// Mostrar los errores:
			for( $contador=0; $contador < count($aErrores); $contador++ ) 
				echo $aErrores[$contador]."<br/>";
		}
		else
		{
			// Mostrar los mensajes:
			for( $contador=0; $contador < count($aMensajes); $contador++ ) 
				echo $aMensajes[$contador]."<br/>";
			
			try {
				$uri = getenv("MONGODB_URI");
				if(!$uri){
					throw new RuntimeException(
						"no se ha configurado la uri"
					);
				}
				$manager =new MongoDB\Driver\Manager($uri);

				$data = [
					"nombre" => $_POST['nombretxt'],
					"apellidos" => $_POST['apellidostxt'],
					"tlfn" => $_POST['tlfnnum'],
					"email" => $_POST['correoemail']
				];
				
				$bulk = new MongoDB\Driver\BulkWrite();
				$bulk->insert($data);

				$resultado = $manager->executeBulkWrite( 
					"macapacaDB.fichero",
					$bulk
				);

				if($resultado->getInsetedCount() !== 1){
					throw new RuntimeException("Error al insertar datos");
					
				}
				echo "formulario enviado correctamente";
			} catch (Throwable $errorvariable) {
				
				error_log("Error base de datos: " . $errorvariable->getMessage());
				
				//throw $th;
			}
		}
		
	}
	else
	{
		echo "<p>No se ha enviado el formulario.</p>";
	}

?>