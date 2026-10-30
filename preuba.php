
<?php

try {
    $input = file_get_contents('php://input');

    $datos = json_decode(
        $input,
        true,
        512,
        JSON_THROW_ON_ERROR
    );

    $nombre = trim($datos['nombre'] ?? '');
    $email = trim($datos['email'] ?? '');

    if ($nombre === '' || $email === '') {
        http_response_code(400);

        echo json_encode([
            'ok' => false,
            'error' => 'Faltan datos obligatorios.'
        ]);

        exit;
    }

} catch (JsonException $e) {
    http_response_code(400);

    echo json_encode([
        'ok' => false,
        'error' => 'El JSON recibido no es válido.'
    ]);
}