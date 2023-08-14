<?php
// Same access controls as index file
header("Access-Control-Allow-Origin: http://localhost:3000");
header("Access-Control-Allow-Methods: GET");

//  establish file path and decode array.
  $jsonFilePath = "./data.json";
  $jsonData = json_decode(file_get_contents($jsonFilePath));

// establish endpoint as this file.
if ($_SERVER['REQUEST_METHOD'] === 'GET' && $_SERVER['REQUEST_URI'] == "/buzz.php") {
  // return a successful response code.
  http_response_code(200);


  // input json array into function and output modified array, store as variable.
  $fizzBuzzData = handleBuzz($jsonData);
  $response = array(
      "payload" => $fizzBuzzData,
  );

  // Allow JSON response
  header("Content-type: application/json");

  // Stringify/encode response and return.
  echo json_encode($response);
  exit();
}


function handleBuzz($jsonData){
  // iterate through array
    for($i = 0; $i<count($jsonData); $i++){
      // If 5 and not 3, buzz
      if($jsonData[$i]%5 === 0 && $jsonData[$i]%3 !== 0){
        $jsonData[$i] = "Buzz";
      } 
    }
    return $jsonData;
}


echo("Api not reached");


?>