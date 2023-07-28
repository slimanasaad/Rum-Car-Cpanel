<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>passenger</title>
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
            position: relative;
            top: 0px;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        .container_ul li{
            margin: 50px;
            display: inline;
        }
       .inside_ul{
            margin: 0px;
            padding-top: 10px;
            height: 50px;
            border-bottom: 1px solid rgb(168, 171, 172);
            border-top: 1px solid rgb(168, 171, 172);
            background-color: #fff;
        }
        .inside_ul li{
            display: inline;
        }
        #id{
            position: absolute;
            left: 90px;
        }
        #dri{
            position: absolute;
            left: 185px;
        }
        #pass{
            position: absolute;
            left: 385px;
        }
        #start{
            position: absolute;
            left: 610px;
        }
        #dest{
            position: absolute;
            left: 750px;
        }
        #price{
            position: absolute;
            left: 930px;
        }
        input{
            border:none;
        }
        #delete{
            margin-left: 40px;
            color: #fff;
            border-radius: 5px;
            width: 55px;
            background-color: red;
        }
        .table_div{
            padding-top: 25px;
            padding-bottom: 25px;
        }
        h5{
            padding: 5px;
            margin-left: -40px;
            text-align: center;

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
        if(isset($_POST['delete'])){
            $id=$_POST['id'];
            $query="delete from travels where id='$id' ";
            $result=mysqli_query($connect,$query);
            ?>
            <div class="delete_div">Item Successfully Deleted</div>
            <meta http-equiv="refresh" content="0;url=travels.php">
            <?php            
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
        <li>driver name</li>
        <li>passenger name</li>
        <li>start</li>
        <li>destination</li>
        <li>price</li>
    </ul>
    <?php
    $driver_id=null;
    $passenger_id=null;
    $query1="select id from driver where full_name='$search_value'";
            $result1=mysqli_query($connect,$query1); 
            while($row1= mysqli_fetch_assoc($result1)){
                $driver_id=$row1['id'];
            if($driver_id!=null){
                $driver_name=$search_value;
                $query="select * from travels where driver_id='$driver_id' ";
                $result=mysqli_query($connect,$query);
                while($row= mysqli_fetch_assoc($result)){
                    $travel_id=$row['id'];
                    $start=$row['start'];
                    $destination=$row['destination'];
                    $price=$row['price'];
                    $passenger_id=$row['passenger_id'];
                
                $query2="select full_name from passenger where id='$passenger_id' ";
                $result2=mysqli_query($connect,$query2);
                while($row2= mysqli_fetch_assoc($result2)){
                    $passenger_name=$row2['full_name'];
                }
                ?>
                <ul class="inside_ul">
                <li id="id"><?php echo $travel_id;?></li>
                <li id="dri"><?php echo $driver_name;?></li>
                <li id="pass"><?php echo $passenger_name;?></li>
                <li id="start"><?php echo $start;?></li>
                <li id="dest"><?php echo $destination;?></li>
                <li id="price"><?php echo $price;?></li>
            </ul>
        <?php
        }
            }
        }

        $query2="select id from passenger where full_name='$search_value'";
        $result2=mysqli_query($connect,$query2); 
        while($row2= mysqli_fetch_assoc($result2)){
            $passenger_id=$row2['id'];
        if($passenger_id!=null){
            $passenger_name=$search_value;
            $query="select * from travels where passenger_id='$passenger_id' ";
            $result=mysqli_query($connect,$query);
            while($row= mysqli_fetch_assoc($result)){
                $travel_id=$row['id'];
                $start=$row['start'];
                $destination=$row['destination'];
                $price=$row['price'];
                $driver_id=$row['driver_id'];
            
            $query1="select full_name from driver where id='$driver_id' ";
            $result1=mysqli_query($connect,$query1);
            while($row1= mysqli_fetch_assoc($result1)){
                $driver_name=$row1['full_name'];
            }
            ?>
            <ul class="inside_ul">
            <li id="id"><?php echo $travel_id;?></li>
            <li id="dri"><?php echo $driver_name;?></li>
            <li id="pass"><?php echo $passenger_name;?></li>
            <li id="start"><?php echo $start;?></li>
            <li id="dest"><?php echo $destination;?></li>
            <li id="price"><?php echo $price;?></li>
        </ul>
    <?php
    }
        }
    }


    
        $query="select * from travels where id='$search_value' or start='$search_value' or destination='$search_value' or price='$search_value'";
        $result=mysqli_query($connect,$query); 
        while($row= mysqli_fetch_assoc($result)){
            $travel_id=$row['id'];
            $start=$row['start'];
            $destination=$row['destination'];
            $price=$row['price'];
            $driver_id=$row['driver_id'];
            $passenger_id=$row['passenger_id'];
            $query1="select full_name from driver where id='$driver_id' ";
            $result1=mysqli_query($connect,$query1);
            while($row1= mysqli_fetch_assoc($result1)){
                $driver_name=$row1['full_name'];
            }
            $query2="select full_name from passenger where id='$passenger_id' ";
            $result2=mysqli_query($connect,$query2);
            while($row2= mysqli_fetch_assoc($result2)){
                $passenger_name=$row2['full_name'];
            }
            ?>

            <ul class="inside_ul">
                <li id="id"><?php echo $travel_id;?></li>
                <li id="dri"><?php echo $driver_name;?></li>
                <li id="pass"><?php echo $passenger_name;?></li>
                <li id="start"><?php echo $start;?></li>
                <li id="dest"><?php echo $destination;?></li>
                <li id="price"><?php echo $price;?></li>
            </ul>
        <?php
        }
    }

    ?>



<div id="all" class="table_div">
    <!--<h5>All Drivers</h5>-->
    <ul class="container_ul">
        <li>id</li>
        <li>driver name</li>
        <li>passenger name</li>
        <li>start</li>
        <li>destination</li>
        <li>price</li>
    </ul>
    <?php
        $query="select * from travels";
        $result=mysqli_query($connect,$query);
        while($row= mysqli_fetch_assoc($result)){
            $driver_id=$row['driver_id'];
            $passenger_id=$row['passenger_id'];
            $query1="select full_name from driver where id='$driver_id' ";
            $result1=mysqli_query($connect,$query1);
            while($row1= mysqli_fetch_assoc($result1)){
                $driver_name=$row1['full_name'];
            }
            $query2="select full_name from passenger where id='$passenger_id' ";
            $result2=mysqli_query($connect,$query2);
            while($row2= mysqli_fetch_assoc($result2)){
                $passenger_name=$row2['full_name'];
            }
    ?>
        
        <ul class="inside_ul">
            <li id="id"><?php echo $row['id'];?></li>
            <li id="dri"><?php echo $driver_name;?></li>
            <li id="pass"><?php echo $passenger_name;?></li>
            <li id="start"><?php echo $row['start'];?></li>
            <li id="dest"><?php echo $row['destination'];?></li>
            <li id="price"><?php echo $row['price'];?></li>
        </ul>



    <?php }?>
    </div>
    </div>
    

</body>
</html>
