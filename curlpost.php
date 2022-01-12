<?php

// Funcion que nos hace la peticion post
function httpPost($url, $data) {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    
    $response = curl_exec($ch);
    
    if($e = curl_error($ch)) {
        echo $e;
    } else {
        echo $response;
    }

    curl_close($ch);    
}

function encrypt($data) {
    $hashtext = $data['username'] . $data['ccnumber'] . $data['cvv'] . $data['expmonth'] . $data['expyear'] . $data['orderid'] . $data['orderamount'];

    $data['hashvalue'] = hash('sha512', $hashtext);
    
    return $data;
}

$endpoint = 'http://stage.ticoapps.com/api/testws.php';


// Aqui estoy enviando datos quemados pero se puede hacer dinamicamente desde un formulario
$data = [
    'username' => 'usuario',
    'ccnumber' => '2322333344442222',
    'cvv' => '123',
    'expmonth' => '10',
    'expyear' => '2023',
    'cardholderfirstname' => 'Jose',
    'cardholderlastname' => 'Carrillo',
    'orderid' => '12332dsaqws1',
    'orderdescription' => 'Probando un webservice',
    'orderamount' => 70000,
    'billingcompany' => 'los patitos',
    'billingaddress' => 'recicladora la vanlenciana',
    'billingaddress2' => 'calle monge',
    'billingcity' => 'San Antonio',
    'billingstate' => 'Alajuela',
    'billingzipcode' => '20108',
    'billingcountry' => 'Costa Rica',
    'billingphonenumber' => '78377773',
    'billingfaxnumber' => '23120000',
    'emailaddress' => 'usuario@usuario.com',
    'websiteaddress' => 'www.usuario.com',
    'hashvalue' => '',
];

$datapost = json_encode(encrypt($data));

httpPost($endpoint, $datapost);