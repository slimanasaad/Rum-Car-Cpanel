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
        #update_create{
            position: absolute;
            top: 100px;
            left: 280px;
            width: 100%;
            height: 100%;
        }
        .update_car{
            padding: 10px;
            background-color: #fff;
            width: 78%;
            height: 75%;
            margin-bottom: 30px;         
        }
        .update_car img{
            position: relative;
            top: -285px;
            left: 80px;
            width: 380px;
            height: 430px;
            }
        .update_car #update_form input{
            padding: 2px;
            margin: 10px;
            width: 50%;
        }
        #sub{
            position: relative;
            top: -180px;
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
        .create_div{
            width: 78%;
            height: 82%;
            padding: 10px;
            background-color: #fff;
        }
        .border{
            margin: 5px;
            border: 1px solid #000;
            width: 95%;
        }
        
    </style>
</head>
<body>
<?php 
        include('nabvar.php');

if(isset($_POST['delete'])){
    $id=$_POST['id'];
    $query="delete from driver where id='$id' ";
    $result=mysqli_query($connect,$query);
    ?>
    <div class="delete_div">Item Successfully Deleted</div>
    <meta http-equiv="refresh" content="0;url=driver.php">
    <?php
}else
if(isset($_POST['update'])){
    $id=$_POST['id'];
    $full_name=$_POST['name'];
    $phone_nmber=$_POST['number'];
    $email=$_POST['email'];
    $password=$_POST['pass'];
    $photo=$_POST['url'];
    $query="update driver SET full_name='$full_name',phone_number='$phone_nmber',email='$email',password='$password',photo='$photo' where id='$id' ";
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
    $query="insert into driver(full_name,evaluation_id,car_id,email,password,phone_number,photo,location,state) values ('$full_name',2,2,'$email','$password','$phone_nmber','$photo','$location','available') ";
    $result=mysqli_query($connect,$query);    
    ?>
    <div class="delete_div">Item Successfully Added</div>
    <meta http-equiv="refresh" content="0;url=driver.php">
<?php
}else
if(isset($_POST['un_ban'])){
    $id=$_POST['id'];
    $query="update driver SET account_state=2 where id='$id' ";
    $result=mysqli_query($connect,$query);
    ?>
    <div class="delete_div">The ban has been lifted</div>
    <meta http-equiv="refresh" content="0;url=driver.php">
    <?php
}else
if(isset($_POST['ban'])){
    $id=$_POST['id'];
    $query="update driver SET account_state=0 where id='$id' ";
    $result=mysqli_query($connect,$query);
    ?>
    <div class="delete_div">Item Successfully Bloced</div>
    <meta http-equiv="refresh" content="0;url=driver.php">
    <?php
}else
if(isset($_POST['activate'])){
    $id=$_POST['id'];
    $query="update driver SET account_state=2 where id='$id' ";
    $result=mysqli_query($connect,$query);
    ?>
    <div class="delete_div">Item Successfully Bloced</div>
    <meta http-equiv="refresh" content="0;url=driver.php">
    <?php
}else
if(isset($_POST['car'])){?>
    <div id="update_create">
    <?php
    $id=$_POST['id'];
    $query="select * from car where driver_id='$id' ";
    $result=mysqli_query($connect,$query);
    while($row= mysqli_fetch_assoc($result)){
    ?>
    <div class="update_car">
    <form id="update_form" action="" method="POST">
        <input type="hidden" name="id" value="<?php echo $row['id'];?>" >
        Type <br>
        <input type="text" value="<?php echo $row['type'];?>" name="type"><br>
        Details <br>
        <input type="text" value="<?php echo $row['details'];?>" name="details"><br>
        Number <br>
        <input type="number" name="number" value="<?php echo $row['number'];?>"><br>
        Choose photo <br>
        <input type="file" name="url"><br>
        <input id="sub" type="submit" value="update" name="update_car">
        <img src="<?php echo $row['photo'];?>" alt="not found">
    </form>
    </div>
<?php
    } ?>
    <div id="create1" class="create_div">
    <h3>create new car</h3>
    <form action="" method="POST">
    <input type="hidden" name="id" value="<?php echo $id;?>" >
        Enter Car's Type <br>
        <input class="border" type="text" name="type"><br>
        Enter Car's Details <br>
        <input class="border" type="text" name="details"><br>
        Enter Car's Number <br>
        <input class="border" type="number" name="number"><br>
        Choose image to add <br><br>
        <input type="file" name="url"><br><br>
        Choose pricing type <br>
        <span class="radio">every kilo
        <input  type="radio" value="every kilo" name="pricing_type"></span>
        <span class="radio">pri minute
        <input  type="radio" value="pri minute" name="pricing_type"></span><br><br>
        Enter price <br>
        <input class="border" type="number" name="price"><br>
        <input class="border" type="submit" name="create_car" value="create">
    </form>
</div>
    </div>
<?php
}else
if(isset($_POST['update_car'])){
    $id=$_POST['id']; 
    $type=$_POST['type']; 
    $details=$_POST['details']; 
    $number=$_POST['number']; 
    $photo=$_POST['url'];
    $query="update car SET type='$type',details='$details',number='$number',photo='$photo' where id='$id' ";
    $result=mysqli_query($connect,$query);
    ?>
    <div class="delete_div">Car Successfully Updated</div>
    <meta http-equiv="refresh" content="0;url=driver.php">
    <?php
}else
if(isset($_POST['create_car'])){
    $driver_id=$_POST['id']; 
    $type=$_POST['type'];
    $details=$_POST['details'];
    $number=$_POST['number'];
    $photo=$_POST['url'];
    $pricing_type=$_POST['pricing_type'];
    $price=$_POST['price'];
    $query="insert into car(driver_id,type,details,number,photo,pricing_type,price) values ('$driver_id','$type','$details','$number','$photo','$pricing_type','$price') ";
    $result=mysqli_query($connect,$query);
    ?>
    <meta http-equiv="refresh" content="0;url=cars.php">
    <?php
}
?>

</body>
</html>