<?php
   include "includes/Header.php";

   if(isset($_SESSION['sid'])){
   header("Location:index.php");
   }

   $name = $email = $username= $dob = $pass = $passs = $type = $alert = "";
   $nameErr = $emailErr = $usernameErr = $dobErr = $passErr = $passsErr = $typeErr = "";

   if (isset($_POST["submit"])){
     $name = $_POST['name'];
     $email = $_POST["email"];
     $dob = $_POST['dob'];
     $username = $_POST['username'];
     $pass1 = $_POST['pass1'];
     $pass2 = $_POST['pass2'];
     $type = $_POST['type'];

     $nameErr = getErrName($name);
     $emailErr = getErrEmail($email);
     $usernameErr = getErrUsername($username);
     $passErr = getErrPass($pass1);
     $passsErr = isSame($pass1,$pass2);
     $dobErr = getErrDate($dob);
     $typeErr = getErrType($type);

     if(empty($nameErr) && empty($emailErr) && empty($usernameErr) && empty($passErr) && empty($passsErr) && empty($dobErr) && empty($typeErr)){
       if(createUser($name,$email,$username,$dob,$pass1,$type)){

         $name = $email = $username= $dob = $pass = $passs = $type = "";
         $alert = "<div class='alert alert-success' role='alert'>
               Account Created Successfully!<a href='login.php' class='alert-link'> Click Here </a> to Login Now.
               </div>";
       }
       else{
         $alert = "<div class='alert alert-danger' role='alert'>Unable to Create Account! <a href='signup.php' class='alert-link'>Please try again</a>
               </div>";
       }
     }
   }
   ?>
<div class= 'container form-container' style="padding-left:15%">
   <div id="divv"><?php echo $alert; ?></div>
   <form action="" method="post">
      <div class="container" id="popup">
         <div class="row rows">
            <div class="col-sm-4">
               <label for="name">Name</label>
               <em>
               <input type="text" name="name" id="name" value="<?php echo $name; ?>" class="form-control" />
               <span class="form-errors"><?php echo $nameErr; ?></span></em>
               </em>
            </div>
            <div class="col-sm-4">
               <label for="email">Email</label><em>
               <input type="email" name="email" id="email" value="<?php echo $email; ?>" class="form-control" />
               <span class="form-errors"><?php echo $emailErr; ?></span></em>
               </em>
            </div>
         </div>
         <div class="row rows">
            <div class="col-sm-4">
               <label for="username">Username</label><em>
               <input type="text" name="username" id="username" value="<?php echo $username; ?>" class="form-control" />
               <span class="form-errors"><?php echo $usernameErr; ?></span></em>
            </div>
            <div class="col-sm-4">
               <label for="dob">D.O.B</label><em>
               <input type="date" name="dob" id="dob" value="<?php echo $dob; ?>" class="form-control" />
               <span class="form-errors"><?php echo $dobErr; ?></span></em>
            </div>
         </div>
         <div class="row rows">
            <div class="col-sm-4">
               <label for="pass1">Password</label><em>
               <input type="password" name="pass1" id="pass1" value="" class="form-control" />
               <span class="form-errors"><?php echo $passErr; ?></span></em>
            </div>
            <div class="col-sm-4">
               <label for="pass2">Confirm Password</label><em>
               <input type="password" name="pass2" id="pass2" value="" class="form-control" />
               <span class="form-errors"><?php echo $passsErr; ?></span></em>
            </div>
         </div>
         <div class="row rows">
            <div class="col-sm-4">
               <div class="form-group">
                  <label for="account_type">Account Type :</label>
                  <em>
                     <select class="form-control" name="type" id="account_type">
                        <option value="">.....</option>
                        <option value="admin" class="form-control">Admin</option>
                        <option value="agent">Agent</option>
                        <option disabled>Both</option>
                     </select>
                  </em>
               </div>
               <span class="form-errors"><?php echo $typeErr; ?></span></em>
            </div>
            <div class="col-sm-4"><br>
               <span style="color:red;"><em> All Fields are mandatory. </em>
            </div>
         </div>
         <div class="row rows">
            <div class="col-sm-4">
               <br>
               <button type="submit" name="submit" class="btn btn-success btn-lg">Create Now!</button>
            </div>
            <div >
               <br>
               <a href="login.php"><button type="button" name="Create Account" class="btn btn-info btn-lg">Already have an Account</button></a>
            </div>
         </div>
      </div>
   </form>
</div>
<script src="includes/Main.js"></script>
<?php
   include "includes/Footer.php";
   ?>
