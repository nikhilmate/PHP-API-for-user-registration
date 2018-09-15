<?php
include 'inc/dbc.inc.php';
$params = ['u_email','u_unique_id','u_photo_id'];
if(param_validator($params)) {
  $email = mysqli_real_escape_string($conn, $_POST[$params[0]]);
  $unique_id = mysqli_real_escape_string($conn, $_POST[$params[1]]);
  $photo_id = mysqli_real_escape_string($conn, $_POST[$params[2]]);

  $sql = "SELECT * FROM user_details WHERE u_email='$email' AND u_unique_id='$unique_id';";
  $query = mysqli_query($conn, $sql);
  $result = mysqli_num_rows($query);
  if ($result == 1) {
    while ($row = mysqli_fetch_assoc($query)) {
      $data['email'] = $row['u_email'];
    }
    $response['error'] = false;
    $response['message'] = 'logged';
    $response['data'] = $data;
  } else {
    $response['error'] = true;
    $response['message'] = 'not logged';
  }
} else {
  $response['error'] = true;
  $response['message'] = 'not posted any data';
}
?>
