<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>create new admin</title>
    <link rel="stylesheet" href="">
    <style>
        .update_div{
            padding: 10px;
            background-color: #fff;
            position: absolute;
            top: 100px;
            left: 280px;
            width: 78%;
            height: 60%;
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
        .create_div{
            padding: 10px;
            width: 100%;
            background-color: #fff;
        }
        .border{
            margin: 5px;
            border: 1px solid #000;
            width: 95%;
        }
    </style>
<?php 
        include('nabvar.php');

if(isset($_POST['delete'])){
    $id=$_POST['id'];
    $query="delete from coupons where id='$id' ";
    $result=mysqli_query($connect,$query);
    ?>
    <div class="delete_div">Item Successfully Deleted</div>
    <meta http-equiv="refresh" content="0;url=coupons.php">
    <?php
}else
if(isset($_POST['update'])){
    $name=$_POST['name'];
    $id=$_POST['id'];
    $start=$_POST['start'];
    $end=$_POST['end'];
    $email=$_POST['email'];
    $rate=$_POST['rate'];
    $amount=$_POST['amount'];
    $query="update coupons SET start='$start',end='$end',rate='$rate',amount='$amount',name='$name' where id='$id' ";
    $result=mysqli_query($connect,$query);
    ?>
    <div class="update_div">
        <form id="form" action="" method="POST">
            <input id='id' type="hidden" name="id" value="<?php echo $_POST['id'];?>" >
            Enter coupon name <br>
            <input class="border" type="text" name="name" value="<?php echo $_POST['name'];?>"><br>
            Enter start date <br>
            <input class="border" type="date" name="start" value="<?php echo $_POST['start'];?>"><br>
            Enter end date <br>
            <input class="border" type="date" name="end" value="<?php echo $_POST['end'];?>"><br>
            Enter rate <br>
            <input class="border" type="number" name="rate" value="<?php echo $_POST['rate'];?>"><br>
            Enter amount <br>
            <input class="border" type="number" name="amount" value="<?php echo $_POST['amount'];?>"><br>
            <input class="border" type="submit" name="update" value="update">
        </form>
    </div>

    
<?php

}?>

