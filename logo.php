<?php 
    session_start();
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
    <title>Document</title>
    <style>

    img{
        position: absolute;
        top: -45%;
        left: 3%;
    }
    </style>
    <meta http-equiv="refresh" content="2;url=Cpanel.php">
</head>
<body>
    <img src="logo.jpeg" alt="notfound">
</body>
</html>
      