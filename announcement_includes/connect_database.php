<?php 

$connect = new mysqli("localhost","news","","news");

// Check connection
if ($connect -> connect_errno) {
  echo "Failed to connect to MySQL: " . $connect -> connect_error;
  exit();
}
?>
