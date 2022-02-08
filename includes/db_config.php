<?php
$conn = mysqli_connect("localhost", "root", "", "vehicloid");

if(!$conn){
  die("ERROR: Could not connect to databse. "
    . mysqli_connect_error());
}
  ?>
