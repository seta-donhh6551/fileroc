<?php
$path = pathinfo($_SERVER['SCRIPT_NAME']);
if ($path['extension'] == 'css')  {
  header('Content-type: text/css');
}
if ($path['extension'] == 'js')  {
  header('Content-type: application/x-javascript');
}
?>