<?php 
header("Access-Control-Allow-Origin: http://localhost:3000");
header("Access-Control-Allow-Methods: GET");
// establish variable to hold file path string.
$jsonFilePath = "./data.json";
// Retrieve contents of Json and store as variable.
$jsonData = json_decode(file_get_contents($jsonFilePath));
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
