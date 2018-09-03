<?php

include 'inc/dbc.inc.php';
function verify($email, $conn) {
  $sql = "SELECT * FROM user_Details WHERE u_email='$email'";
  $query = mysqli_query($conn, $sql);
  $result = mysqli_num_rows($query);
  $return = $result == 1 ? true : false;
  return $return;
}
$params = ['u_email','u_unique_id','u_name','u_photo_id'];
if(param_validator($params)) {
  $email = mysqli_real_escape_string($conn, $_POST[$params[0]]);
  $unique_id = mysqli_real_escape_string($conn, $_POST[$params[1]]);
  $name = mysqli_real_escape_string($conn, $_POST[$params[2]]);
  $photo_id = mysqli_real_escape_string($conn, $_POST[$params[3]]);

  $present = verify($email, $conn);
  if ($present == true) {
    $response = 'presented';
  } else {
    $sql = "INSERT INTO user_details(u_email, u_unique_id, u_name, u_photo_id) VALUES ('$email', '$unique_id', '$name', '$photo_id');";
    $query = mysqli_query($conn, $sql);
    $verified = verify($email, $conn);
    if ($verified == true) {
      $response['error'] = false;
      $response['message'] = 'Registered';
      $response['data'] = $data;
    } else {
      $response['error'] = true;
      $response['message'] = 'not registered';
    }
  }
} else {
  $response = 'false5';
  $response['error'] = true;
}

?>