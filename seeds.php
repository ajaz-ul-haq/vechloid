<?php

   include "includes/db_config.php";



   function generateRandomString($length) {
       $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
       $charactersLength = strlen($characters);
       $randomString = '';
       for ($i = 0; $i < $length; $i++) {
           $randomString .= $characters[rand(0, $charactersLength - 1)];
       }
       return $randomString;
   }


function newRow($brand,$name,$model,$type,$milage,$price){
  $row = randRow();
  require "includes/db_config.php";
  $sql = "INSERT INTO vehicles(id,Brand,Type,Name,Model,Milage,Price) VALUES('".$row."','".$brand."','".$type."','".$name."','".$model."','".$milage."','".$price."')";

  mysqli_query($conn,$sql);
}



function randRow(){
  $new = rand(100000000,999999999);
  require "includes/db_config.php";
  $sql= "SELECT * FROM vehicles WHERE id ='.$new.'";
  $result = mysqli_query($conn,$sql);
  if(mysqli_num_rows($result)>0){
      $new = randRow();
  }
  return $new;
}


for($i=0; $i<500; $i++){

  $Brand = generateRandomString(10);
  $Type = generateRandomString(10);
  $Name = generateRandomString(10);
  $Model = generateRandomString(10);
  $Milage = rand(15,40);
  $Price  = rand(15,40);
  newRow($Brand,$Name,$Model,$Type,$Milage,$Price);
}

?>
