<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>create new admin</title>
    <link rel="stylesheet" href="">
    <style>
        .container_div{
            padding: 10px;
            background-color: #fff;
            position: absolute;
            top: 100px;
            left: 280px;
            width: 78%;
        }
        .border{
            margin: 5px;
            width: 95%;
        }
    </style>
    <?php 
        include('nabvar.php');
        if($_SESSION['acc']==0){
            die('Connection Failed');
        }
        
        
    ?>
    </head>
<body>
    <div class="container_div">
        <!--<form action="" method="POST">
            <input type="text" placeholder="Enter full name"><br>
            <input type="text" placeholder="Enter Email"><br>
            <input type="password" placeholder="Enter password"><br>
            <input type="file"><br>
            <input type="button" name="create" value="create">
        </form>-->
        <h3>create new admin</h3>
        <form action="" method="POST">
            Enter Full Name <br>
            <input class="border" type="text" name="name"><br>
            Enter Email <br>
            <input class="border" type="email" name="email"><br>
            Enter Password <br>
            <input class="border" type="password" name="password"><br>
            Enter Phone Number <br>
            <input class="border" type="number" name="phone"><br>
            Chose image to add <br><br>
            <input type="file" name="url"><br><br>
            <input class="border" type="submit" name="create" value="create">
        </form>
    </div>
    </div>
    <?php
    if(isset($_POST['create'])){
        $full_name=$_POST['name'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $phone_nmber=$_POST['phone'];
        $photo=$_POST['url'];
        $query="insert into managers(full_name,email,password,phone_number,photo) values ('$full_name','$email','$password','$phone_nmber','$photo') ";
        $result=mysqli_query($connect,$query);
    }
    ?>
</body>
</html>
