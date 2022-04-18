<?php
$conn = mysqli_connect("localhost", "root", "", "vechloid");

if(!$conn){
  die("ERROR: Could not connect to databse. "
    . mysqli_connect_error());
}
  ?>
