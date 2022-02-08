<?php
   include "includes/Header.php";

   if(!isset($_SESSION) || getUserType($_SESSION["username"]) != "admin" ){
   header("Location:login.php");
   }

   $name = $type = $brand= $milage = $price = $model = $alert = "";
   $nameErr = $typeErr = $brandErr = $milageErr = $priceErr = $modelErr = "";

   if(isset($_POST["create"])){

     $brand = $_POST["brand"];
     $name = $_POST["name"];
     $model = $_POST["model"];
     $type  = $_POST["type"];
     $milage  = $_POST["milage"];
     $price  = $_POST["price"];


       $brandErr = getVehicleBrandErr($brand);
       $nameErr = getVehicleNameErr($name);
       $modelErr = getVehicleModelErr($model);
       $typeErr  = getVehicleTypeErr($type);
       $milageErr  = getVehicleMilageErr($milage);
       $priceErr  = getVehiclePriceErr($price);

      if(empty($nameErr) && empty($typeErr) && empty($brandErr) && empty($modelErr) && empty($milageErr) && empty($priceErr)){
         newRow($brand,$name,$model,$type,$milage, $price);
         header("Location:index.php");
     }
   }
?>

<div class= 'container form-container' style="padding-left:15%">
   <div id="divv"><?php echo $alert; ?></div>
   <form action="insert.php" method="POST">
      <div class="container" id="popup">
         <div class="row rows">
            <div class="col-sm-4">
               <label for="brand">Brand</label>
               <em>
               <input type="text" name="brand" id="brand" value="<?php echo $brand; ?>" class="form-control" />
               <span class="form-errors"><?php echo $brandErr; ?></span></em>
               </em>
            </div>
            <div class="col-sm-4">
               <label for="type">Type</label><em>
               <input type="text" name="type" id="type" value="<?php echo $type; ?>" class="form-control" />
               <span class="form-errors"><?php echo $typeErr; ?></span></em>
               </em>
            </div>
         </div>
         <div class="row rows">
            <div class="col-sm-4">
               <label for="name">Name</label><em>
               <input type="text" name="name" id="name" value="<?php echo $name; ?>" class="form-control" />
               <span class="form-errors"><?php echo $nameErr; ?></span></em>
            </div>
            <div class="col-sm-4">
               <label for="model">Model</label><em>
               <input type="text" name="model" id="model" value="<?php echo $model; ?>" class="form-control" />
               <span class="form-errors"><?php echo $modelErr; ?></span></em>
            </div>
         </div>
         <div class="row rows">
            <div class="col-sm-4">
               <label for="milage">Milage</label><em>
               <input type="text" name="milage" id="milage" value="<?php echo $milage; ?>" class="form-control" />
               <span class="form-errors"><?php echo $milageErr; ?></span></em>
            </div>
            <div class="col-sm-4">
               <label for="price">Price</label><em>
               <input type="text" name="price" id="price" value="<?php echo $price; ?>" class="form-control" />
               <span class="form-errors"><?php echo $priceErr; ?></span></em>
            </div>
         </div>
         <div class="row rows">
            <div class="col-sm-4"><br>
               <span style="color:red;"><em> All Fields are mandatory. </em>
            </div>
            <div class="col-sm-4">
                  <br><button type="submit" name="create" value='true' class="btn btn-success btn-lg">Add Now!</button>
           </div>
         </div>
      </div>
   </form>
</div>
