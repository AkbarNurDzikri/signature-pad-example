<?php

$data_uri = $_POST['signatured'];
$encoded_image = explode(",", $data_uri)[1];
$encoded_image = str_replace(' ', '+', $encoded_image);
$decoded_image = base64_decode($encoded_image);
file_put_contents('img/'. uniqid() .'-signature.png', $decoded_image);

if($data_uri) {
  echo 'Image saved !';
} else {
  echo 'No data ! ';
}