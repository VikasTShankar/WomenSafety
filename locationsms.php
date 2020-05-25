<?php
     $locate=json_decode($_POST['locate'],true);
     $key1 = "lat";
     $latitude = $locate[$key1];
     $key2 = "lon";
     $longitude = $locate[$key2];
  
   
    // Account details
    $apiKey = urlencode('QyVb39rB0s0-UIWbgGDkHzgPgD1F4QCY3uWPrcXkXW');
    
    // Message details
    $numbers = array(919483868461);
    $sender = urlencode('TXTLCL');
    $message = rawurlencode(sprintf("Latitude=%f Longitude=%f",$latitude,$longitude));
 
    $numbers = implode(',', $numbers);
 
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
     

