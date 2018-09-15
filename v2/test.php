<?php
$comm = 5;
function verify($comm) {
  if ($comm != 5) {
    return true;
  } else {
    return false;
  }
}
$g = verify($comm);
if ($g == false) {
  echo 'false';
}
//echo $g;
?>