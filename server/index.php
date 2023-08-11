<!-- Test Server connection -->
<!-- Establish 3 api calls - one for the fizz numbers, one buzz and one for fizzbuzz? -->
<!-- Allow access control from localhost:3000 for frontend to request from this server.-->
<!-- Create a Json file with all numbers in. -->

<?php 

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  // Return a successful response code.
  http_response_code(200);
  exit();
}
// response object
$response = array("message"=>"Server Request Successful");
// Allow Json response
header("Content-type: application/json");
// Object to Json
echo json_encode($response)
?>