<?php

function test_input($data)
{
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}

function deleteRow($row){
  require "includes/db_config.php";
  $sql = "DELETE FROM vehicles WHERE id ='".$row."'";
  if(mysqli_query($conn,$sql)){
    return true;
  }
  else{
    return false;
  }
}

function updateRow($row,$brand,$name,$model,$type,$milage,$price){
  require "includes/db_config.php";
  $sql = "UPDATE vehicles
          SET Brand = '".$brand."', Name = '".$name."', Type = '".$type."', Model = '".$model."', Milage = '".$milage."', Price = '".$price."'
          WHERE id='".$row."'";
  if(mysqli_query($conn,$sql)){
    return true;
  }
  else{
    return false;
  }
}

function newRow($brand,$name,$model,$type,$milage,$price){
  $row = randRow();
  require "includes/db_config.php";
  $sql = "INSERT INTO vehicles(id,Brand,Type,Name,Model,Milage,Price) VALUES('".$row."','".$brand."','".$type."','".$name."','".$model."','".$milage."','".$price."')";
  if(mysqli_query($conn,$sql)){
    return true;
  }
  else{
    return false;
  }
}

function getVehicleNameErr($name){
    if(!empty($name)){
      if(preg_match("/^([a-zA-Z0-9' ]+)$/",$name)){
        $nameErr = '';
      }
      else{
        $nameErr = 'Invalid Name Format';
      }
    }
    else{
      $nameErr = 'Name cant be Empty';
    }
    return $nameErr;
  }

function getVehicleTypeErr($type){
    if(!empty($type)){
      if(preg_match("/^([a-zA-Z0-9' ]+)$/",$type)){
        $typeErr = '';
      }
      else{
        $typeErr = 'Invalid Vehicle Type Format';
      }
    }
    else{
      $typeErr = 'Vehicle Type cant be Empty';
    }
    return $typeErr;
  }


function getVehicleBrandErr($brand){
    if(!empty($brand)){
      if(preg_match("/^([a-zA-Z0-9' ]+)$/",$brand)){
        $brandErr = '';
      }
      else{
        $brandErr = 'Invalid Brand value Format';
      }
    }
    else{
      $brandErr = 'Brand value cant be Empty';
    }
    return $brandErr;
  }

function getVehicleMilageErr($milage){
    if(!empty($milage)){
      if(preg_match("/^([a-zA-Z0-9.' ]+)$/",$milage)){
        $milageErr = '';
      }
      else{
        $milageErr = 'Invalid Milage Value Format';
      }
    }
    else{
      $milageErr = 'Milage Value cant be Empty';
    }
    return $milageErr;
  }

function getVehiclePriceErr($price){
    if(!empty($price)){
      if(preg_match("/^([a-zA-Z0-9.']+)(?=[^.]*\.?[^.]*$)$/",$price)){
        $priceErr = '';
      }
      else{
        $priceErr = 'Invalid Price Format';
      }
    }
    else{
      $priceErr = 'Price Value cant be Empty';
    }
    return $priceErr;
  }


function getVehicleModelErr($model){
    if(!empty($model)){
      if(preg_match("/^([a-zA-Z0-9' ]+)$/",$model)){
        $modelErr = '';
      }
      else{
        $modelErr = 'Invalid Model value Format';
      }
    }
    else{
      $modelErr = 'Model value cant be Empty';
    }
    return $modelErr;
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

function isLoggedIn(){
  session_start();
  if(isset($_SESSION["sid"])){
    return TRUE;
  }
  else{
    return FALSE;
  }
}


function createUser($name,$email,$username,$dob,$pass,$type){
  require "includes/db_config.php";
  $sql = "INSERT INTO creds(name,email,username,dob,password,type) VALUES('".$name."','".$email."','".$username."','".$dob."','".$pass."','".$type."')";

  if(mysqli_query($conn,$sql)){
    return true;
  }
  else{
    return false;
  }
}

function isValidData($usernameErr,$dobErr,$passErr){
  if(empty($usernameErr) && empty($dobErr) && empty($passErr)){
    return true;
  }
  else{
    return false;
  }
}

function isValidUser($username,$pass,$dob){
  require "includes/db_config.php";
  $sql= "SELECT * FROM creds WHERE username='".$username."' AND password = '".$pass."' AND dob = '".$dob."'";
  $result = mysqli_query($conn,$sql);
  if(mysqli_num_rows($result)>0){
      return true;
  }
  else{
    return false;
  }
}

function getUserName($username){
  require "includes/db_config.php";
  $sql= "SELECT name FROM creds WHERE username='".$username."'";
  $result = mysqli_query($conn,$sql);
  if(mysqli_num_rows($result)>0){
    while($row = mysqli_fetch_array($result)){
      $name= $row["name"];
    }
  }
  else{
    $name="Invalid User";
  }
  return $name;
}

function getUserEmail($username){
  require "includes/db_config.php";
  $sql= "SELECT email FROM creds WHERE username='".$username."'";
  $result = mysqli_query($conn,$sql);
  if(mysqli_num_rows($result)>0){
    while($row = mysqli_fetch_array($result)){
      $email= $row["email"];
    }
  }
  else{
    $email="Invalid User";
  }
  return $email;
}


function getUserType($username){
  require "includes/db_config.php";
  $sql= "SELECT type FROM creds WHERE username='".$username."'";
  $result = mysqli_query($conn,$sql);
  if(mysqli_num_rows($result)>0){
    while($row = mysqli_fetch_array($result)){
      $type= $row["type"];
    }
  }
  else{
    $type="Invalid User";
  }
  return $type;
}


function getErrName($name){
  if(!empty($name)){
    if(preg_match("/^([a-zA-Z' ]+)$/",$name)){
      $nameErr = '';
    }
    else{
      $nameErr = 'Invalid Name Format';
    }
  }
  else{
    $nameErr = 'Name cant be Empty';
  }
  return $nameErr;
}

function getErrEmail($email){
  if(!empty($email)){
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = '';
    }
    else{
      $emailErr = 'Invalid Email Format';
    }
  }
  else{
    $emailErr = 'Email cant be Empty';
  }
  return $emailErr;
}

function getErrUsername($username){
  if(!empty($username)){
    if(preg_match("/^([a-zA-Z0-9@_' ]+)$/",$username)){
      require "includes/db_config.php";
      $sql = "SELECT * FROM creds WHERE username='".$username."'";
      $result = mysqli_query($conn,$sql);
      if(mysqli_num_rows($result)>0){
          $usernameErr = 'Username Already Taken';
         }
      else{
          $usernameErr = '';
         }
      }

    else{
      $usernameErr = 'Invalid Username Format';
     }
  }
  else{
    $usernameErr = 'Username cant be Empty';
  }
  return $usernameErr;
}

function getErrLoginUsername($username){
  if(!empty($username)){
    if(preg_match("/^([a-zA-Z0-9@_' ]+)$/",$username)){
          $usernameErr = '';
      }
    else{
      $usernameErr = 'Invalid Username Format';
     }
  }
  else{
    $usernameErr = 'Username cant be Empty';
  }
  return $usernameErr;
}

function getErrDate($dob){
  if(!empty($dob)){
    $date = explode('-',$dob,3);
    $year = $date[0];
    $month = $date[1];
    $day = $date[2];

    if($day<=31 && $month<=12 && $year < 2022){
      $dobErr = "";
    }
    else{
      $dobErr = "Invalid D.o.B";
    }
  }
  else{
    $dobErr = 'DOB cant be Empty';
  }

  return $dobErr;
}

function getErrType($type){
  if(!empty($type)){
    if($type=="admin" || $type =="agent"){
      $typeErr = "";
    }
  }
  else{
    $typeErr = "Must Select an Account Type";
  }
  return $typeErr;
}

function getErrPass($pass1){
  if(!empty($pass1)){
    if(preg_match("/^([a-zA-Z0-9@_' ]+)$/",$pass1)){
      $passErr = "";
    }
    else{
    $passErr = "Invalid Characters in password";
    }
  }
  else{
    $passErr = "Password Cant be Empty";
  }

  return $passErr;
}

function isSame($pass1,$pass2){
  if($pass1 === $pass2){
    $passsErr ="";
  }
  else{
    $passsErr = "Password Must be Same";
  }
  return $passsErr;
}

 ?>
