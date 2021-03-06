<?php 
require 'config.php';
session_start();
$uid=$_SESSION['user'];
if(isset($_POST['submit'])){
    $search = $_POST['search'];
    if ($search) {
      $_SESSION['search']=$search;
       header("location:search.php");
    }

  }
 ?>
<!DOCTYPE html>
<html>
<head>
  <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css"> 
    <link rel="stylesheet"  href="css/style.css">
    <link rel="stylesheet"  href="fontawesome-free-5.13.1-web/css/all.css">
  <title>Dashboard </title>
  <link rel="shortcut icon" type="image/png" href="imgs/new_logo_black.png">
</head>
<body class="bg-secondary">

  <header>
  
      <nav class="navbar navbar-dark bg-dark navbar-expand-md">
        <a class="nav-brand text-white" href="dashboard.php" >
              GAMES
            </a>

        <button data-toggle="collapse" data-target="#navbarToggler" type="button" class="navbar-toggler"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarToggler">
<form class="form-inline form-submit" method="post">
      <input class="form-control ml-md-5 mr-sm-2 search" name="search" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success login" name="submit" type="submit"><i class="fas fa-search"></i></button>
    </form>

        <ul class="navbar-nav ml-auto">
          <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Games
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="action.php">Action</a>
          <a class="dropdown-item" href="adventure.php">Adventure</a>
          <a class="dropdown-item" href="modtoolkit.php">Mod Toolkit</a>
          <a class="dropdown-item" href="puzzle.php">Puzzle</a>
          <a class="dropdown-item" href="racing.php">Racing</a>
          <a class="dropdown-item" href="rgp.php">RGP</a>
          <a class="dropdown-item" href="shooter.php">Shooter</a>
          <a class="dropdown-item" href="strategy.php">Strategy</a>
          <a class="dropdown-item" href="survival.php">Survival</a>
        </div>
      </li>
                        

              <li class="nav-item active">
                <a href="profile.php" class="nav-link">Profile</a>
              </li>

              <li class="nav-item">
        <a class="nav-link " href="cart.php"> <i class="fas fa-shopping-cart"></i> Cart
          <span id="cart-item" class="badge badge-danger"></span></a>
      </li>

              <li class="nav-item ">
                <a href="logout.php" class="nav-link">Logout</a>
              </li>          
            </ul>


          </div>
      </nav>
   
  </header>

  <div class="container ml-auto">
    <div class="row">
      <div class="col-md-4 mt-5">
         <div class="form-group">
            <a href="profile.php">
            <input type="submit" name=""  value="Account Details" class="btn btn-primary btn-block register" id="#">
          </a>
            </div>
            <div class="form-group">
            <a href="changepassword.php">
            <input type="submit" name=""  value="Change Password" class="btn btn-primary btn-block register" id="#">
          </a>
            </div>
            <div class="form-group">
            <a href="changemail.php">
            <input type="submit" name=""  value="Change Mail" class="btn btn-primary btn-block register" id="#">
          </a>
            </div>
             <div class="form-group">
            <a href="addaddress.php">
            <input type="submit" name=""  value="Add Address" class="btn btn-primary btn-block register" id="#">
          </a>
            </div>
            <div class="form-group">
            <a href="modifyaddress.php">
            <input type="submit" name=""  value="Modify Address" class="btn btn-primary btn-block register" id="#">
          </a>
            </div>
      </div>
      <?php 
        $stmt = $conn-> prepare("SELECT * FROM user WHERE uid=?");
          $stmt->bind_param("i",$uid);
          $stmt->execute();
          $result = $stmt->get_result();
          $row = $result->fetch_assoc();

      ?>
      <div class="col-md-8 mt-5 bg-dark">
        <div class="row">
          <div class="col-md-6 mt-2 text-center text-white"><h5>First Name :-</h5></div>
          <div class="col-md-6 mt-2 text-left text-white"><h5><?= $row['fname']; ?></h5></div>
        </div>
        <div class="row">
          <div class="col-md-6 mt-2 text-center text-white"><h5>Last Name :-</h5></div>
          <div class="col-md-6 mt-2 text-left text-white"><h5><?= $row['lname']; ?></h5></div>
        </div>
        <div class="row">
          <div class="col-md-6 mt-2 text-center text-white"><h5>Email :-</h5></div>
          <div class="col-md-6 mt-2 text-left text-white"><h5><?= $row['email']; ?></h5></div>
        </div>
        <div class="row">
          <div class="col-md-6 mt-2 text-center text-white"><h5>Password :-</h5></div>
          <div class="col-md-6 mt-2 text-left text-white"><h5>**********</h5></div>
        </div>
        <div class="row">
          <div class="col-md-6 mt-2 text-center text-white"><h5>Account Status :-</h5></div>
          <div class="col-md-6 mt-2 text-left text-white"><h5>Active (Verified) 
            <?php

            ?>
          </h5></div>
        </div>
        <?php
        if($row['address']!=""){
        ?>
        <div class="row">
          <div class="col-md-6 mt-2 text-center text-white"><h5>Address :-</h5></div>
          <div class="col-md-6 mt-2 text-left text-white"><h5><?= $row['address']; ?></h5></div>
        </div>
        <?php
      }
      ?>
      </div>
    </div>
  </div>

   <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="bootstrap/js/jquery-3.5.1.slim.min.js"></script>
    <script src="bootstrap/js/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    
<script>
  load_cart_item_number();

        function load_cart_item_number(){
          $.ajax({
            url: 'action1.php',
            method: 'get',
            data: {cartItem:"cart_item"},
            success:function(response){
              $("#cart-item").html(response);
            }
          });
        }
</script>

</body>
</html>