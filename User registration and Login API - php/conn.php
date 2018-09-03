<?php
$root_url = 'http://localhost/project-v1/api.php?apicall=';
$register_url = $root_url.'register';
$login_url = $root_url.'login';
$process = 'register';

if ($process == 'register') {
  $params = array(
    'u_email'     => 'coolnikim@gmail.com',
    'u_unique_id' => 'asbauafelsfjslfk2232342',
    'u_name'      => 'nik', 
    'u_photo_id'  => 's35353j34534jj345'
  );
  $final = $register_url;
} else if ($process == 'login') {
  $params = array(
    'u_email'     => 'coolnikim@gmail.com',
    'u_unique_id' => 'asbauafelsfjslfk2232342',
    'u_photo_id'  => 's35353j34534jj345'
  );
  $final = $login_url;
}

$post = http_build_query($params);

$ch = curl_init($final);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

if(!curl_exec($ch)) {
  echo 'fal';
} else {
  //echo curl_exec($ch);
  //echo curl_exec($ch);
  $getter = curl_exec($ch);
  //echo $getter;
  print_r(json_decode($getter));
}
$status = @curl_getinfo($ch, CURLINFO_HTTP_CODE);
echo "<br>".$status;
//print_r(json_decode($getter));
curl_close($ch);
?>