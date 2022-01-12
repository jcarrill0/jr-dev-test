<?php

$url = 'http://stage.ticoapps.com/api/testws.php';   
$result = file_get_contents($url);
$data = json_decode($result, true);
print_r($data);

// $ch = curl_init();

// curl_setopt($ch, CURLOPT_URL, $url);
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

// $response = curl_exec($ch);

// if($e = curl_error($ch)) {
//     echo $e;
// } else {
//     $decode = json_decode($response);
//     // foreach($decode as $key => $val){
//     //     echo $key . ': ' . $val . '<br>';
//     // }
//     print_r($decode);
// }
// curl_close($ch);