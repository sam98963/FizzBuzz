<?php
// Same access controls as index file
header("Access-Control-Allow-Origin: http://localhost:3000");
header("Access-Control-Allow-Methods: GET");

//  establish file path and decode array.
  $jsonFilePath = "./data.json";
  $jsonData = json_decode(file_get_contents($jsonFilePath));

// establish endpoint as this file.
if ($_SERVER['REQUEST_METHOD'] === 'GET' && $_SERVER['REQUEST_URI'] == "/fizz.php") {
  // return a successful response code.
  http_response_code(200);


  // input json array into function and output modified array, store as variable.
  $fizzBuzzData = handleFizz($jsonData);
  $response = array(
      "payload" => $fizzBuzzData,
  );

  // Allow JSON response
  header("Content-type: application/json");

  // Stringify/encode response and return.
  echo json_encode($response);
  exit();
}


function handleFizz($jsonData){
  // iterate through array
    for($i = 0; $i<count($jsonData); $i++){
      // If 3 and not 5, fizz
      if($jsonData[$i]%3 === 0 && $jsonData[$i]%5 !== 0){
        $jsonData[$i] = "Fizz";
      }
    }
    return $jsonData;
}


echo("Api not reached");


?>