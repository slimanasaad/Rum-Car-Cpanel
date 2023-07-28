<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Discount coupons</title>
    <link rel="stylesheet" href="">
    <style>
        .container_div{
            position: absolute;
            top: 100px;
            left: 280px;
            width: 78%;
            height: 50%;
        }
        .container_ul{
            margin: 0px;
            background-color: rgb(198, 212, 216);

        }
        .container_ul li{
            margin: 55px;
            display: inline;
        }
        .inside_ul{
            border-bottom: 1px solid rgb(168, 171, 172);
            border-top: 1px solid rgb(168, 171, 172);
            margin: 0px;
            background-color: #fff;
            padding-top: 10px;
            height: 50px;
        }
        .inside_ul li{
            margin: 40px;
            display: inline;
        }
        #id{
            width: 50px;
            margin-left: 95px;
        }
        #name{
            width: 130px;
            margin-left: 60px;
        }
        #start{
            width: 135px;
            margin-left: 0px;
        }
        #end{
            width: 135px;
            margin-left: 0px;
        }
        #rate{
            width: 50px;
            margin-left: 40px;
        }
        #amount{
            width: 60px;
            margin-left: 80px;
        }
        input{
            border:none;
        }
        #update , #delete{
            color: #fff;
            border-radius: 5px;
            width: 60px;
        }
        #delete{
            background-color: red;
            margin-left: 40px;
        }
        #update{
            background-color: blue;

        }
        .table_div{
            margin-bottom: 25px;
            margin-top: 25px;
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
        h5{
            padding: 5px;
            margin-left: -40px;
            text-align: center;
            border: 1px solid #000;
            border-bottom: none;
            background-color: #fff;
        }
        #i{
            position: relative;
            top: -1px;
            background-color: #fff;
            margin-right: -4px;
            height: 50px;
        }
        #s{
            padding-left: 10px;
            height: 50px;
            width: 900px;
            margin-right: 15px;
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

    <div class="search_div">
        <form class="search" action="" method="POST">
        <i id="i" class='fas fa-search' style='font-size:36px'></i>
        <input id="s" type="text" placeholder="search" name="search_value">
        <input type="submit" name="search" value="search">
        </form>
    </div>
    <?php
    if(isset($_POST['search'])){
    $search_value=$_POST['search_value'];
    ?>
    <div class="table_div">
    <ul class="container_ul">
        <h5>search resault</h5>
        <li>id</li>
        <li>name</li>
        <li>start</li>
        <li>end</li>
        <li>rate</li>
        <li>amount</li>
    </ul>
    <?php  
        $query="select * from coupons where name='$search_value' or id='$search_value' or start='$search_value' or end='$search_value' ";
        $result=mysqli_query($connect,$query);
        while($row= mysqli_fetch_assoc($result)){
    ?>
    <form class="inside_ul" action="ulter_coupon.php" method="POST">
        <input id="id" type="number" value="<?php echo $row['id'];?>" name="id" readonly>
        <input id="name" type="text" value="<?php echo $row['name'];?>" name="name" readonly>
        <input id="start" type="date" value="<?php echo $row['start'];?>" name="start" readonly>
        <input id="end" type="date" value="<?php echo $row['end'];?>" name="end" readonly>
        <input id="rate" type="number" name="rate" value="<?php echo $row['rate'];?>" readonly>%
        <input id="amount" type="number" name="amount" value="<?php echo $row['amount'];?>" readonly>$
        <input type="submit" name="delete" value="delete" id="delete">
        <input type="submit" name="update" value="update" id="update">

        </form>
    <?php
    }
}
    ?>


    <div class="table_div">
    <ul class="container_ul">
    <h5>All Copouns</h5>
        <li>id</li>
        <li>name</li>
        <li>start</li>
        <li>end</li>
        <li>rate</li>
        <li>amount</li>
    </ul>
    <?php
        $query="select * from coupons";
        $result=mysqli_query($connect,$query);
        while($row= mysqli_fetch_assoc($result)){
    ?>
    <form class="inside_ul" action="ulter_coupon.php" method="POST">
        <input id="id" type="number" value="<?php echo $row['id'];?>" name="id" readonly>
        <input id="name" type="text" value="<?php echo $row['name'];?>" name="name" readonly>
        <input id="start" type="date" value="<?php echo $row['start'];?>" name="start" readonly>
        <input id="end" type="date" value="<?php echo $row['end'];?>" name="end" readonly>
        <input id="rate" type="number" name="rate" value="<?php echo $row['rate'];?>" readonly>%
        <input id="amount" type="number" name="amount" value="<?php echo $row['amount'];?>" readonly>$
        <input type="submit" name="delete" value="delete" id="delete">
        <input type="submit" name="update" value="update" id="update">

        </form>
    <?php }?>
    </div>
    <div class="create_div">
        <h3>create new coupon</h3>
        <form action="" method="POST">
            Enter coupon name <br>
            <input class="border" type="text" name="name"><br>
            Enter start date <br>
            <input class="border" type="date" name="start"><br>
            Enter end date <br>
            <input class="border" type="date" name="end"><br>
            Enter rate <br>
            <input class="border" type="number" name="rate"><br>
            Enter amount <br>
            <input class="border" type="number" name="amount"><br>
            <input class="border" type="submit" name="create" value="create">
        </form>
    </div>
    </div>
    <?php
    if(isset($_POST['create'])){
        $name=$_POST['name'];echo $name;
        $start=$_POST['start'];echo $start;
        $end=$_POST['end'];echo $end;
        $rate=$_POST['rate'];echo $rate;
        $amount=$_POST['amount'];echo $amount;
        $query="insert into coupons(start,end,rate,amount,name) values ('$start','$end','$rate','$amount','$name') ";
        $result=mysqli_query($connect,$query);
        ?>
        <meta http-equiv="refresh" content="0;url=coupons.php">
        <?php
    }
    ?>

</body>
</html>


