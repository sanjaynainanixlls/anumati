<?php
  // Account details
  $apiKey = urlencode('jT83j1EY5p8-blmKHslzA1wtLjT5l7GzTZwmGIGy3b');

  // Message details
  $numbers = array(918696962049);
  $sender = urlencode('TXTLCL');
  $message = rawurlencode('Jai Sachdanand Ji. Your Anumati Pass has been registered in Shri Anandpur. Your Registration Number is {id returning from database}. Please quote this number at anumati pass counter. Thanks.');


  // Prepare data for POST request
  $data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);

  // Send the POST request with cURL
  $ch = curl_init('https://api.textlocal.in/send/');
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $response = curl_exec($ch);
  curl_close($ch);

  // Process your response here
  echo $response;
?>
