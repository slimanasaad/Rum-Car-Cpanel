<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>create new admin</title>
    <link rel="stylesheet" href="">
    <style>
        .profile_div{
            background-color: #fff;
            position: absolute;
            top: 100px;
            left: 280px;
            width: 25%;
            height: 75%;
        }
        .update_div{
            padding: 10px;
            background-color: #fff;
            position: absolute;
            top: 100px;
            left: 650px;
            width: 50%;
            height: 75%;
        }
        .delete_div{
        text-align: center;
        background-color: rgb(100, 231, 128);
        position: absolute;
        top: 100px;
        left: 280px;
        width: 78%;
        }
        #img{
            position: relative;
            top: 80px;
            left: 80px;
            width: 180px;
            height: 180px;
            border-radius: 100px;
        }
        .input{
            padding: 2px;
            margin: 10px;
            width: 95%;
        }
        h4{
            position: relative;
            top: 100px;
            left: 65px;
        }
        p{
            position: relative;
            top: 90px;
            left: 60px;
        }
    </style>
<?php 
        include('nabvar.php');

if(isset($_POST['delete'])){
    $id=$_POST['id'];
    $query="delete from passenger where id='$id' ";
    $result=mysqli_query($connect,$query);
    ?>
    <div class="delete_div">Item Successfully Deleted</div>
    <meta http-equiv="refresh" content="0;url=passenger.php">
    <?php
}else
if(isset($_POST['update'])){
    $id=$_POST['id'];
    $full_name=$_POST['name'];
    $phone_nmber=$_POST['number'];
    $email=$_POST['email'];
    $password=$_POST['pass'];
    $photo=$_POST['url'];
    $query="update passenger SET full_name='$full_name',phone_number='$phone_nmber',email='$email',password='$password',photo='$photo' where id='$id' ";
    $result=mysqli_query($connect,$query);
    ?>
    <div class="profile_div">
    <img id="img" src="<?php echo $_POST['url'];?>" alt="not found">
    <h4><?php echo $_POST['name'];?></h4><br>
    <p><?php echo $_POST['email'];?></p>
    </div>
    <div class="update_div">
        <form id="form" action="" method="POST">
            <input id='id' type="hidden" name="id" value="<?php echo $_POST['id'];?>" >
            Full Name <br>
            <input class="input" type="text" value="<?php echo $_POST['name'];?>" name="name"><br>
            Email <br>
            <input id='email' class="input" type="email" value="<?php echo $_POST['email'];?>" name="email"><br>
            Password <br>
            <input type="password" class="input" name="pass" value="<?php echo $_POST['pass'];?>"><br><br>
            <input type="file" name="url"><br><br>
            <!--<input type="text" class="input" placeholder="<?php //echo $_POST['url'];?>"><br>-->
            Phone Number <br>
            <input id='phone' class="input" type="number" value="<?php echo $_POST['number'];?>" name="number"><br>
            <input type="submit" value="update" name="update">
        </form>
    </div>
<?php
}else
if(isset($_POST['create'])){
    $full_name=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $phone_nmber=$_POST['phone'];
    $photo=$_POST['url'];
    $location=$_POST['location'];
    $query="insert into passenger(full_name,evaluation_id,favouriteplace_id,email,password,phone_number,photo,location) values ('$full_name',2,2,'$email','$password','$phone_nmber','$photo','$location') ";
    $result=mysqli_query($connect,$query);    
    ?>
    <div class="delete_div">Item Successfully Added</div>
    <meta http-equiv="refresh" content="0;url=passenger.php">
<?php
}?>

