

<?php

/* 
    user name : XlgfeyXe39RFptzJ500SaWfOiCs
    password : jz5G49Qty0hSo4toIWOhBXT2fttKQSHy-qknUDszRxMUikLu6YZaXA
*/

$url = 'https://v3.api.hypertrack.com/devices/';
$basicAuth = "Authorization: Basic " . base64_encode('XlgfeyXe39RFptzJ500SaWfOiCs' . ':' . 'jz5G49Qty0hSo4toIWOhBXT2fttKQSHy-qknUDszRxMUikLu6YZaXA');
$context = stream_context_create([
  "http" => [
        "method" => "GET",
        "header" => $basicAuth
    ]
]);

$response = file_get_contents($url, false, $context);
//echo $response;
?>
<a href="https://embed.hypertrack.com/devices/DE75346A-5803-3085-93F0-AD3A31739B56?publishable_key=QK_p448Gbv9hHgTA2nXrMuam62atBh0xTWqn7pmag2AFJrg92fti4qhQ7fNnxjyDovz_O4kANYXUYDHBdV3VqQ">show</a>
<a href="https://embed.hypertrack.com/devices/D1217CE9-5EC7-36EA-B709-7AB5858E0118?publishable_key=QK_p448Gbv9hHgTA2nXrMuam62atBh0xTWqn7pmag2AFJrg92fti4qhQ7fNnxjyDovz_O4kANYXUYDHBdV3VqQ">show</a>
<a href="https://embed.hypertrack.com/devices/D1217CE9-5EC7-36EA-B709-7AB5858E0118?publishable_key=QK_p448Gbv9hHgTA2nXrMuam62atBh0xTWqn7pmag2AFJrg92fti4qhQ7fNnxjyDovz_O4kANYXUYDHBdV3VqQ">show</a>