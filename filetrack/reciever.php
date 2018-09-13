<?php
//var_dump($_POST);
$temp = $_POST['file'];
$file = base64_decode($temp);

$name = 'uploads/img1.jpg';
file_put_contents($name, $file);
//move_uploaded_file($name, 'uploads/img1.jpg');
//echo $file;
//var_dump($_POST);
//var_dump($_FILES);
/*
if ($_POST['name']) {
  $file = file_get_contents($_POST['file']);
  if(move_uploaded_file($file, 'uploads/img1.jpg')){
    echo 'yes';
  } else {
    echo 'no';
  }
  echo $_POST['file'];
}
*/
//var_dump($_FILES);
?>