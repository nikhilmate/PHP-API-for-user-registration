<?php

include 'inc/dbc.inc.php';
function verify($email, $conn) {
  $sql = "SELECT * FROM user_Details WHERE u_email='$email'";
  $query = mysqli_query($conn, $sql);
  $result = mysqli_num_rows($query);
  if ($result > 0) {
    $return = true;
  } else {
    $return = false;
  }
  return $return;
}
$params = ['u_email','u_unique_id','u_name','u_photo_id','u_photo'];
if(param_validator($params)) {
  $email = mysqli_real_escape_string($conn, $_POST[$params[0]]);
  
  $unique_id = mysqli_real_escape_string($conn, $_POST[$params[1]]);
  $name = mysqli_real_escape_string($conn, $_POST[$params[2]]);
  $photo_id = mysqli_real_escape_string($conn, $_POST[$params[3]]);
  $photo = mysqli_real_escape_string($conn, $_POST[$params[4]]);
  
  $decodedfile = base64_decode($photo);
  file_put_contents('img/img1.jpg', $decodedfile);

    $sql = "INSERT INTO user_details(u_email, u_unique_id, u_name, u_photo_id) VALUES ('$email', '$unique_id', '$name', '$photo_id');";
    $query = mysqli_query($conn, $sql);
    $verified = verify($email, $conn);
    if ($verified == true) {
      $response['error'] = false;
      $response['message'] = 'Registered';
    } else {
      $response['error'] = true;
      $response['message'] = 'not registered';
    }
} else {
  $response['error'] = true;
  $response['message'] = 'not posted';
}

/*

  if (verify($email, $conn)) {
    $response['error'] = true;
    $response['message'] = 'presented';
  } else {

  }
*/
?>