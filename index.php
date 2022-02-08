<?php
   include "includes/Header.php";

   if(!isset($_SESSION["sid"])){
   header("Location:login.php");
   }

   if(isset($_GET["viewer"])){
     $viewer = $_GET["viewer"];
   }
   else{
     $viewer = $_SESSION["type"];
   }

   ?>
<div class="container">
   <table class="table">
      <tr>
         <th>Brand</th>
         <th>Type</th>
         <th>Name</th>
         <th>Model</th>
         <th>Milage</th>
         <th>Price</th>
      </tr>
      <?php
         require "includes/db_config.php";
         $sql= "SELECT * FROM vehicles";
         $result = mysqli_query($conn,$sql);
         if(mysqli_num_rows($result)>0){
           while($row = mysqli_fetch_array($result)){
             if (isset($_GET["action"]) && isset($_GET["id"]) && $_SESSION["type"] == "admin"){
               if($_GET["id"] == $row['id'] && $_GET["action"] == "edit"){
                echo"<tr>
                     <form action='update.php' method='get'>
                     <input type='hidden' name='action' value='update' /><input type='hidden' name='id' value='".$row['id']."' />
                     <th><input type='text' name='Brand'  value=".$row['Brand']." class='form-control' /></th>
                     <th><input type='text' name='Type'  value=".$row['Type']." class='form-control' /></th>
                     <th><input type='text' name='Name'  value=".$row['Name']." class='form-control' /></th>
                     <th><input type='text' name='Model'  value=".$row['Model']." class='form-control' /></th>
                     <th><input type='text' name='Milage'  value=".$row['Milage']." class='form-control' /></th>
                     <th><input type='text' name='Price'  value=".$row['Price']." class='form-control' /></th>
                     <th><button type='submit' name='submit' class='btn btn-success btn-md'>Update</button></th>
                     </form>";
                  }
                  else{
                   echo"<tr><form action='update.php' method='GET'>
                     <th>".$row['Brand']."</th>
                     <th>".$row['Type']."</th>
                     <th>".$row['Name']."</th>
                     <th>".$row['Model']."</th>
                     <th>".$row['Milage']."</th>
                     <th>".$row['Price']."</th>";

                     if($_SESSION["type"] == "admin"){
                       echo "
                       <th><a href='index.php?id=".$row['id']."&action=edit'><img class='db-icon' src='edit.png'></img></a>
                       <input type='hidden' name='action' value='delete' />
                       <input type='hidden' name='id' value='".$row['id']."' />
                       <button type='submit' style='border:0px;'><img class='db-icon' src='delete.png'></img></button>
                       </form>
                       </th>";
                     }
                   }
                  echo "</tr>";
             }
             elseif($_SESSION["type"] == "admin" && $viewer == "agent"){
             echo"<tr>
                <th>".$row['Brand']."</th>
                <th>".$row['Type']."</th>
                <th>".$row['Name']."</th>
                <th>".$row['Model']."</th>
                <th>".$row['Milage']."</th>
                <th>".$row['Price']."</th>";
              }

             else{
             echo"<tr>
                <th>".$row['Brand']."</th>
                <th>".$row['Type']."</th>
                <th>".$row['Name']."</th>
                <th>".$row['Model']."</th>
                <th>".$row['Milage']."</th>
                <th>".$row['Price']."</th>";

                if($_SESSION["type"] == "admin"){
                  echo "<form action='update.php' method='get'>
                  <th><a href='index.php?id=".$row['id']."&action=edit'><img class='db-icon' src='edit.png'></img></a>
                  <input type='hidden' name='action' value='delete' />
                  <input type='hidden' name='id' value='".$row['id']."' />
                  <button type='submit' style='border:0px;'><img class='db-icon' src='delete.png'></img></button>
                  </form>
                  </th>";
                }
              }
             echo "</tr>";
           }
         }
         else{
         }

         ?>
   </table>
</div>

<?php
   if($_SESSION["type"] == "admin" && $viewer != "agent"){
     echo "<br><center><a href='insert.php'><button type='button' name='create' value='true' class='btn btn-primary btn-lg'>Add New Entry</button></a>";
   }

   include "includes/Footer.php";
   ?>
