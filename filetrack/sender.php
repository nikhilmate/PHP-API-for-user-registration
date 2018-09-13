<?php
$root_url = 'http://localhost/filetrack/reciever.php';
$file = realpath('img1.jpg');
//$img = new CURLFile($file, 'image/jpg', 'img1');
$temp = file_get_contents('img1.jpg');
$str = base64_encode($temp);
echo $str;
$size = filesize('img1.jpg');
$images = array(
  'file' => $str,
  'name' => 'img1',
  'size' => $size,
  'type' => 'jpg'
);
$files = http_build_query($images);

$ch = curl_init($root_url);

curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $files);
//curl_setopt($ch, CURLOPT_FILE, $picture);
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
/*
$img = array(
  'imagestr' => $str,
  'imagemime' => 'image/jpeg',
  'imagename' => 'img1.jpg'
);
//$params = array('file' => $img);
$header = array('Content-Type:multipart/form-data');
*/

?>