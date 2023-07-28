<?php 
    session_start();
    include('connect.php');
    if(empty($_SESSION['username'])){
        die('Connection Failed');
        }
        ?>
      
    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <script>
    function go1(){
      window.location="my_profile.php"
    }
    function go2(){
      window.location="create_admin.php"
    }
  </script>
  <style>
body{
  font-family: Arial, Helvetica, sans-serif;
  padding-bottom: 15px;
  background-color: rgb(211, 229, 230);
  height: 2000px;
}
#nav{
    height: 65px;
  }
  /* start dropdwon */

.menu{
margin: 0px -3px 0px 0px;
height: 100%;
width: 250px;
background-color: #FFF;
padding: 2px 0px 2px 0px;
} 
.menu li{
height: 50px;
padding-left: 50px;
padding-top: 10px;
text-align: left;
font-size: 18px;

}
.menu li a{
  color: #555;
  text-decoration: none;
  padding-left: 10px;
}
.menu li :hover{
color: #000;
}
.menu li :active{
  background-color: rgb(168, 171, 172);
}
#logout{
  background-color: #FFF;
  color: #555;
}
#logout:hover{
  color: #000;
}
#logout:active{
  border: none;
  background-color: rgb(168, 171, 172);
}
#profile{
  height: 130px;
  text-align: center;
  padding-left: 0px;

}
#noun{
background-color: #fff;
border: 1px hidden;
margin: -2px 0px -2px 0px;
height: 70px;
padding-top: 20px;
}

/* end dropdwon */
#profile_img{
            width: 80px;
            height: 80px;
            border-radius: 50px;
        }

#create{
  height: 35px;
  width: 90%;
  color: #FFF;
  background-color: rgb(100, 203, 231);
  border: none;
  text-align: center;
  padding-left: 0px;
  margin-left: -15px;
}
#logo{
  position: absolute;
  left: 600px;
  width: 150px;
  height: 45px;
}

a{
  margin-left: 5px;
}
hr{
  background-color: #000;
}
  </style>
</head>
<body>
<nav id="nav" class="navbar navbar-expand-sm bg-dark navbar-dark">
  
    <img id="logo" src="full-logo.jpeg" alt=""> 
  
<!--    <li class="nav-item">
      <a class="nav-link" onclick="d2()" id="l2">الموظفين</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" onclick="d3()" id="l3">العملاء</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" onclick="d4()" id="l4">الوجبات</a>
    </li>
    <li class="nav-item">
      <a class="nav-link"  onclick="d5()" id="l5">العملاء</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" onclick="d6()" id="l6">العملاء</a>
    </li>
    <li class="nav-item">
      <a class="nav-link disabled" href="#">Disabled</a>
    </li>-->
  </ul>
</nav>
        <ul class="menu">
            <li id="profile"><img onclick="go1()" id="profile_img" src="<?php echo $_SESSION['photo'];?>" alt="notfound"><br><span onclick="go1()"><?php echo $_SESSION['username'];?></span></li>
            <?php
            if($_SESSION['acc']==1){
            ?>
            <li><button id="create" onclick="go2()">Create New</button></li>
            <?php }?>
            <?php
            if($_SESSION['acc']==0){?>
                <hr>
            <?php
            }
            ?>
            <li><i class='fas fa-home' style='font-size:20px;'><a href="Cpanel.php">HOME</a></i></li>
            <?php
            if($_SESSION['acc']==1){
            ?>
            <li><i class='fas fa-user-tie' style='font-size:20px;'><a href="admin.php">Admins</a></i></li>
            <?php }?>
            <li><i class='fas fa-map-marked-alt' style='font-size:20px;'><a href="map.php">Valiable now</a></i></li>
            <li><i class='fas fa-male' style='font-size:20px;'><a href="passenger.php">Pssenger</a></i></li>
            <li><i class='fas fa-car-side' style='font-size:20px;'><a href="driver.php">Driver</a></i></li>
            <li><i class='fas fa-comments' style='font-size:20px;'><a href="send.php">Chat</a></i></li>
            <li><i class='fas fa-clipboard' style='font-size:20px;'><a href="report.php">Report</a></i></li>
            <li><i class='fas fa-money-bill' style='font-size:20px;'><a href="receipt.php">Receipt</a></i></li>
            <li><i class='fas fa-star' style='font-size:20px;'><a href="evaluation.php">Evaluation</a></i></li>
            <?php
            if($_SESSION['acc']==1){
            ?>
            <li><i class='fas fa-percent' style='font-size:20px;'><a href="coupons.php">Discount coupons</a></i></li>
            <?php }?>
            <li><i class='fas fa-suitcase' style='font-size:20px;'><a href="travels.php">Travels</a></i></li>
            <li><i class='fas fa-taxi' style='font-size:20px;'><a href="cars.php">Cars</a></i></li>
            <li><i class='fas fa-shield-alt' style='font-size:20px;'><a href="policy.php">Privacy Policy</a></i></li>
            <li><i class='fas fa-cog' style='font-size:20px;'><a href="setings.php">Setings</a></i></li><li>
            <form action="cpanel.php" method="POST">
            <input type="hidden">
            <i class='fas fa-sign-out-alt' style='font-size:20px;'>
                <input id="logout" type="submit" value="logout" name="logout">
            </i>
            </form>
            </li>
        </ul>
        <?php

        ?>

     
          <!--  <li onclick="d5()" id="l5">المشروبات</li>
            <li onclick="d6()" id="l6">العروض</li>
            <li onclick="go()">خروج</li>-->

<!--<nav class="navbar navbar-expand-sm bg-primary navbar-dark">
  <ul class="navbar-nav">
    <li class="nav-item active">
      <a class="nav-link" href="#">Active</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Link</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Link</a>
    </li>
    <li class="nav-item">
      <a class="nav-link disabled" href="#">Disabled</a>
    </li>
  </ul>
</nav>

<nav class="navbar navbar-expand-sm bg-success navbar-dark">
  <ul class="navbar-nav">
    <li class="nav-item active">
      <a class="nav-link" href="#">Active</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Link</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Link</a>
    </li>
    <li class="nav-item">
      <a class="nav-link disabled" href="#">Disabled</a>
    </li>
  </ul>
</nav>

<nav class="navbar navbar-expand-sm bg-info navbar-dark">
  <ul class="navbar-nav">
    <li class="nav-item active">
      <a class="nav-link" href="#">Active</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Link</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Link</a>
    </li>
    <li class="nav-item">
      <a class="nav-link disabled" href="#">Disabled</a>
    </li>
  </ul>
</nav>

<nav class="navbar navbar-expand-sm bg-warning navbar-dark">
  <ul class="navbar-nav">
    <li class="nav-item active">
      <a class="nav-link" href="#">Active</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Link</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Link</a>
    </li>
    <li class="nav-item">
      <a class="nav-link disabled" href="#">Disabled</a>
    </li>
  </ul>
</nav>
navbar navbar-expand-sm bg-danger navbar-dark
<nav class="navbar navbar-expand-sm bg-danger navbar-dark">
  <ul class="navbar-nav">
    <li class="nav-item active">
      <a class="nav-link" href="#">Active</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Link</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Link</a>
    </li>
    <li class="nav-item">
      <a class="nav-link disabled" href="#">Disabled</a>
    </li>
  </ul>
</nav>

<nav class="navbar navbar-expand-sm bg-secondary navbar-dark">
  <ul class="navbar-nav">
    <li class="nav-item active">
      <a class="nav-link" href="#">Active</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Link</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Link</a>
    </li>
    <li class="nav-item">
      <a class="nav-link disabled" href="#">Disabled</a>
    </li>
  </ul>
</nav>-->