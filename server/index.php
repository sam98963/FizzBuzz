<?php 
header("Access-Control-Allow-Origin: http://localhost:3000");
header("Access-Control-Allow-Methods: GET");
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  // Return a successful response code.
  http_response_code(200);
  // response object
$response = array("message"=>"Server Request Successful");
// Allow Json response
header("Content-type: application/json");
// Object to Json
echo json_encode($response);
  exit();
}

?>
