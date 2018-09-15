<?php
$root_url = 'http://localhost/project-v1/api.php?apicall=';
$register_url = $root_url.'register';
$login_url = $root_url.'login';
$process = 'register';

$temp = file_get_contents('img1.jpg');
$str = base64_encode($temp);

if ($process == 'register') {
  $params = array(
    'u_email'     => 'coolnikim@gmail.com',
    'u_unique_id' => 'asbauafelsfjslfk2232342',
    'u_name'      => 'nik',
    'u_photo_id'  => 's35353j34534jj345',
    'u_photo'     =>  $str
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
$header = array('Content-Type:multipart/form-data');
$post = http_build_query($params);

//echo $post;
$ch = curl_init($final);

curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
//curl_setopt($ch, CURLOPT_FILE, $img);
//curl_setopt($ch, CURLOPT_HEADER, true);
//curl_setopt($ch, CURLINFO_HEADER_OUT, true);
//curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

if(!curl_exec($ch)) {
  echo 'fal';
} else {
  //echo curl_exec($ch);
  $getter = curl_exec($ch);
    echo $getter;
  //print_r(json_decode($getter));
}
$status = @curl_getinfo($ch, CURLINFO_HTTP_CODE);
echo "<br>".$status;
curl_close($ch);
?>  