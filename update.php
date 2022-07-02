<?php
   include "includes/Header.php";
   $action = $_GET["action"];

if(isset($action)){
  $row = $_GET["id"];

   if($action == "delete"){
     if(deleteRow($row)){
       header("Location:index.php");
       }
     else{
       echo "Unable to Delete";
       }
     }
  elseif($action == "update"){

    $brand = $_GET["Brand"];
    $name = $_GET["Name"];
    $model = $_GET["Model"];
    $type  = $_GET["Type"];
    $milage  = $_GET["Milage"];
    $price  = $_GET["Price"];


    $brandErr = getVehicleBrandErr($brand);
    $nameErr = getVehicleNameErr($name);
    $modelErr = getVehicleModelErr($model);
    $typeErr  = getVehicleTypeErr($type);
    $milageErr  = getVehicleMilageErr($milage);
    $priceErr  = getVehiclePriceErr($price);
    $errorsArray = array($brandErr, $nameErr, $modelErr, $typeErr, $milageErr, $priceErr);

    $errorList = '<ol>';
    foreach($errorsArray as $error){
        if(strlen($error)> 3){
            $errorList = $errorList . "<li>$error</li>";
        }
    }
    $errorList = $errorList . '</ol>';


    if(empty($nameErr) && empty($typeErr) && empty($brandErr) && empty($modelErr) && empty($milageErr) && empty($priceErr)){
       updateRow($row,$brand,$name,$model,$type,$milage,$price);
       header("Location:index.php");
   }
   else{
    echo "<div class= 'container' style='font-style:oblique; padding-bottom:80px;'><div class='alert alert-danger' role='alert'>$errorList</div>";
    echo "<br><center><a href='index.php' ><button type='submit' name='submit' class='btn btn-danger btn-lg'>Back To Homepage</button></a></center>";
   }
     }
  else{
      header("Location:index.php");
  }
}
 ?>
