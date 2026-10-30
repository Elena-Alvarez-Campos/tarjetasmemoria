<?php

    try{
        $uri=getenv("MONGODB_URI");
        if(!$uri){
            throw new RuntimeException("Falta MONGODB_URI");
        }

        $manager=new MongoDB\Driver\Manager($uri);
        $comand=new MongoDB\Driver\Command(["ping"=> 1]);
        $manager->executeComand("admin",$comand);
        echo "CONEXIÓN CORRECTA :) PIKMIN";
    }catch(Throwable $e){
        http_response_code(500);
        error_log("Error MongoDB: ". $e->getMessage());

        echo "ERROR DE CONEXIÓN";
    }

?>