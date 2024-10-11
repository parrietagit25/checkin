<?php
// Datos de configuración
//$tenantId = 'd3 4 7 9 7 2 8 -  0 3  8 d - 4 9 8 6 - 8 5  83-0bcaa8999569'; // Tu ID de inquilino
//$clientId = '83c 234 65-412 e-40 ad -ad 2f-4b 63403    a8a       cc'; // Tu ID de cliente
//$clientSecret = '2 vF  8Q ~  J h x n w 0 N u I l k E Y y x IGXOECQWZbsd4fgQcQO'; // Reemplaza con tu secreto de cliente
$userId = 'pedro.arrieta@grupopcr.com.pa'; // ID o correo electrónico del usuario objetivo
$chatMessage = 'Este es un mensaje directo enviado desde PHP a Microsoft Teams';

// URL del token de autenticación de Microsoft
$tokenUrl = "https://login.microsoftonline.com/$tenantId/oauth2/v2.0/token";

// Obtener el token de acceso
$data = [
    'grant_type' => 'client_credentials',
    'client_id' => $clientId,
    'client_secret' => $clientSecret,
    'scope' => 'https://graph.microsoft.com/.default'
];

// Inicializar cURL para obtener el token de acceso
$ch = curl_init($tokenUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/x-www-form-urlencoded']);

$response = curl_exec($ch);
curl_close($ch);

// Decodificar el token de acceso
$token = json_decode($response, true)['access_token'];

// URL para enviar el mensaje
$messageUrl = "https://graph.microsoft.com/v1.0/users/$userId/sendMail";

// Crear el mensaje en formato JSON
$messageData = [
    'message' => [
        'subject' => 'Mensaje desde PHP',
        'body' => [
            'contentType' => 'Text',
            'content' => $chatMessage
        ],
        'toRecipients' => [
            [
                'emailAddress' => [
                    'address' => $userId // Puede ser el correo electrónico del usuario
                ]
            ]
        ]
    ]
];

// Inicializar cURL para enviar el mensaje
$ch = curl_init($messageUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Authorization: Bearer $token",
    'Content-Type: application/json'
]);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($messageData));

$response = curl_exec($ch);

echo '<pre>';
echo var_dump($ch);
echo '</pre>';

echo '<pre>';
echo var_dump($response);
echo '</pre>';

// Verificar si hubo errores
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
} else {
    echo 'Mensaje enviado correctamente a Microsoft Teams';
}

curl_close($ch);
?>
