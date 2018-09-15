<?php
function param_validator($params) {
  foreach($params as $param) {
    if (!isset($_POST[$param])) {
      return false;
    }
    return true;
  }  
}

include 'inc/dbc.inc.php';
$response = array();

if (isset($_GET['apicall'])) {
  
  $apicall = $_GET['apicall'];

  switch ($apicall) {
    case 'login':
      include 'login.php';
      break;
    
    case 'register':
      include 'register.php';
      break;
    
      default:
      $response['error'] = true;
      $response['message'] = 'Invalid Operation Failed!';
  }
} else {
  $response['error'] = true;
  $response['message'] = 'Invalid API called!';
}

//echo $response;
echo json_encode($response);
?>