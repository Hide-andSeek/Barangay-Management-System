<?php
$mysqli= new mysqli('localhost', 'root', 'ecajucom143','bpso') or die(mysqli_error($mysqli));

if (isset($_POST['save'])){
    $name =$_POST['name'];
    $location = $POST['location'];

    $mysqli->query("INSERT INTO bpso(name,location) VALUES('$name','$location')") or
    die ($mysqli->error); 
}