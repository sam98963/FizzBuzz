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

?>
