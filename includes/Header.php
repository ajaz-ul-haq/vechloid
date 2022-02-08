<?php
include "includes/Functions.php";
?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
  <link rel="icon" href="favicon.ico">

  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
  <link rel="stylesheet" href="includes/theme.css">
  <title> Vehicles DB 2.0 </title>
</head>
<body>
  <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php"><strong>Vechloid</strong></a>
    </div>
    <ul class="nav navbar-nav navbar-right">
      <?php
      if(isLoggedIn()){
          if($_SESSION['type']=="admin"){
             if(isset($_GET["viewer"]) && $_GET["viewer"]== "agent"){
               echo "<li><a href='index.php?viewer=admin'><span class='glyphicon glyphicon-eye-open'></span> View as Admin</a></li>";
              }
             else{
               echo "<li><a href='index.php?viewer=agent'><span class='glyphicon glyphicon-eye-open'></span>&nbsp View as Agent</a></li>";
              }
          }
        echo "<li><a href='#'><span class='glyphicon glyphicon-user'></span>&nbsp".$_SESSION['name']."</a></li>";
        echo "<li><a href='logout.php'><span class='glyphicon glyphicon-log-in'></span>&nbspLog Out</a></li>";
      }
      else{
        echo "<li><a href='signup.php'><span class='glyphicon glyphicon-user'></span> Sign Up</a></li>";
        echo "<li><a href='login.php'><span class='glyphicon glyphicon-log-in'></span> Log In</a></li>";
      }
      ?>
    </ul>
  </div>
</nav>
