<?php

$url= "http://localhost/Gancsov/0325/GePoPaDe/api.php";
$productid=2;
$data=[
    "id"=>$productid,
];

$ch=curl_init($url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_CUSTOMREQUEST,"DELETE");
curl_setopt($ch,CURLOPT_POSTFIELDS,json_encode($data));
curl_setopt($ch,CURLOPT_HTTPHEADER,['Content-Type: application/json']);
$response=curl_exec($ch);
curl_close($ch);
echo $response;