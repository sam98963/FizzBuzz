<?php 
// Allow front-end server access.
header("Access-Control-Allow-Origin: http://localhost:3000");
// Allow GET requests.
header("Access-Control-Allow-Methods: GET");

try{
  // establish variable to hold file path string.
  $jsonFilePath = "./data.json";
  // Retrieve contents of Json and store as variable.
  $jsonData = file_get_contents($jsonFilePath);

  // If json, data does not exist throw error.
  if($jsonData === false){
    throw new Exception("Failed to read the JSON file provided.");
  }

  // Parse the json file.
  $jsonData = json_decode($jsonData);

  // If null, error parsing the data.
  if($jsonData === null){
    throw new Exception("Failed to parse JSON data.");
  }

  
}
catch(Exception $exception){
    // If something fails - internal server error response.
    http_response_code(500);
    // return error.
    echo json_encode(array("error"=>$exception->getMessage()));
}


if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  // Return a successful response code.
  http_response_code(200);
  // response object
$response = array("payload"=>$jsonData);
// Allow Json response
header("Content-type: application/json");
// Object to Json
echo json_encode($response);
  exit();
}


// FIZZBUZZ API


if ($_SERVER['REQUEST_METHOD'] === 'GET' && $_SERVER['REQUEST_URI'] == "/fizzbuzz") {
  // Return a successful response code.
  http_response_code(200);
  // response object
$fizzBuzz = handleFizzBuzz($jsonData);

$response = array("payload"=>$fizzBuzz);
// Allow Json response
header("Content-type: application/json");
// Object to Json
echo json_encode($response);
  exit();
}




// FUNCTIONS

// FizzBuzz function to handle the data manipulation
// Recieves array as arguement
function handleFizzBuzz($jsonData){
  // iterate through array
    for($i = 0; $i<count($jsonData); $i++){
      // If 3 and not 5, fizz
      if($jsonData[$i]%3 === 0 && $jsonData[$i]%5 !== 0){
        $jsonData[$i] = "Fizz";
      } 
      // If 5 and not 3, buzz
      else if($jsonData[$i]%5 === 0 && $jsonData[$i]%3 !== 0){
        $jsonData[$i] = "Buzz";
      } 
      // if both, fizzbuzz
      else if($jsonData[$i]%5 === 0 && $jsonData[$i]%3 === 0){
        $jsonData[$i] = "FizzBuzz";
      }
    }
    return $jsonData;
}







?>
