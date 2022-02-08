<?php
   include "includes/Header.php";

   if(isset($_SESSION['sid'])){
   header("Location:index.php");
   }

   $username = $dob = $pass = $type = $alert = "";
   $usernameErr = $dobErr = $passErr  = $typeErr = "";

   if (isset($_GET["submit"])){

     $dob = $_GET['dob'];
     $username = $_GET['username'];
     $pass = $_GET['pass'];

     $usernameErr = "";
     $dobErr = getErrDate($dob);
     $passErr = getErrPass($pass);

     if(isValidData($usernameErr,$dobErr,$passErr)){
       if(isValidUser($username,$pass,$dob)){
         session_start();
         $_SESSION["username"] = $username;
         $_SESSION["dob"] = $dob;
         $_SESSION["sid"] = session_id();
         $_SESSION["name"] = getUserName($username);
         $_SESSION["email"] = getUserEmail($username);
         $_SESSION["type"] = getUserType($username);

         header("Location:index.php");
      }
      else{
        $alert = "<div class='alert alert-danger' role='alert'>Invalid Credentials!</div>";
      }
      }

    }
   ?>
<div class= 'container form-container' style="padding-top:80px;padding-bottom:80px;">
   <div id="divv"><?php echo $alert; ?></div>
   <form action="" method="get">
      <div class="container" id="popup">
         <div class="row rows">
            <div class="col-sm-6">
               <label for="username">Username</label><em>
               <input type="text" name="username" id="username" value="<?php echo $username; ?>" class="form-control" />
               <span class="form-errors"><?php echo $usernameErr; ?></span></em>
            </div>
         </div>
         <div class="row rows">
            <div class="col-sm-6">
               <label for="dob">D.O.B</label><em>
               <input type="date" name="dob" id="dob" value="<?php echo $dob; ?>" class="form-control" />
               <span class="form-errors"><?php echo $dobErr; ?></span></em>
            </div>
         </div>
         <div class="row rows">
            <div class="col-sm-6">
               <label for="pass">Password</label><em>
               <input type="password" name="pass" id="pass" value="" class="form-control" />
               <span class="form-errors"><?php echo $passErr; ?></span></em>
            </div>
         </div>
         <div class="row rows">
            <div class="col-sm-4">
               <br>
               <button type="submit" name="submit" class="btn btn-success btn-lg">Login Now!</button>
   </form>
   </div>
   <div class="col-sm-6">
   <br>
   <a href="signup.php"><button type="button" name="Create Account" onclick="" class="btn btn-info btn-lg">Create Account</button></a>
   </div>
   </div>
   </div>
</div>
<script src="includes/Main.js"></script>
<? php
   include "includes/Footer.php";
   ?>
