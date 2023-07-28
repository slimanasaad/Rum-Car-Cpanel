<?php 
//    session_start();

    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control Panel</title>
    <link rel="stylesheet" href="">
    <style>
        .father_div{
            position: absolute;
            top: 100px;
            left: 280px;
            width: 78%;
            height: 500px;
            background-color: #fff;
            padding-top: 15px;
        }
        .num_passenger , .num_driver , .total , .num_car , .today , .trips{
            padding: 15px;
            position: relative;
            border-radius: 250px;
            background-color: rgb(211, 229, 230);
            width: 200px;
            height: 200px;
        }
        .num_passenger{
            left: 100px;            
        }
        .num_driver{
            top: -200px;
            left: 400px;
        }
        .total{
            top: -400px;
            left: 700px;
        }
        .num_car{
            top: -350px;
            left: 100px;
        }
        .today{
            top: -550px;
            left: 400px;
        }
        .trips{
            top: -750px;
            left:700px;
        }
        h1,h4{
            text-align: center;
        }
        h1{
            color: red;
        }
        .container_ul{
            margin: 0px;
            background-color: rgb(198, 212, 216);
            position: relative;
            top: -680px;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        .container_ul li{
            margin: 50px;
            display: inline;
        }
        .ul_inside{
            position: relative;
            top: -680px;
            background-color: #fff;            
            margin-bottom: 25px;
        }
        .inside_ul{
            margin: 0px;
            padding-top: 10px;
            height: 50px;
            border-bottom: 1px solid rgb(168, 171, 172);
            border-top: 1px solid rgb(168, 171, 172);
        }
        .inside_ul li{
            display: inline;

        }
        #id{
            position: absolute;
            left: 60px;
        }
        #start{
            position: absolute;
            left: 200px;
        }
        #dest{
            position: absolute;
            left: 350px;            
        }
        #price{
            position: absolute;
            left: 525px;
        }
        #driver{
            position: absolute;
            left: 640px;
        }
        #pass{
            position: absolute;
            left: 840px;
        }
    </style>



    <?php 
//    if(empty($_SESSION['username'])){
//        die('Connection Failed');
//        }
            include('nabvar.php');
      
//        include('map.php');
        ?>

    <script>
    </script>


</head>
<body>


    <!-- number of passenger -->


<?php
    $query="select COUNT(*) from passenger";
    $result=mysqli_query($connect,$query);
    while($row= mysqli_fetch_row($result)){?>
    <div class="father_div">
    <div class="num_passenger">   
    <h1><?php echo $row[0];?></h1>
    <h4>Number of passenger</h4> 
    </div>


    <!-- number of driver -->



<?php
    }
    $query="select COUNT(*) from driver";
    $result=mysqli_query($connect,$query);
    while($row= mysqli_fetch_row($result)){?>
    <div class="num_driver">   
    <h1><?php echo $row[0];?></h1>
    <h4>Number of driver</h4> 
    </div>



    <!-- total profits -->


    <?php
    }

    $query="SELECT SUM(price) FROM travels";
    $result=mysqli_query($connect,$query);
    while($row= mysqli_fetch_row($result)){
        $total=$row[0]*20/100;
        ?>
    <div class="total">   
    <h1><?php echo $total;?></h1>
    <h4>total profits</h4> 
    </div>



    <!-- number of car -->


    <?php
    }
    $query="select COUNT(*) from car";
    $result=mysqli_query($connect,$query);
    while($row= mysqli_fetch_row($result)){?>
    <div class="num_car">   
    <h1><?php echo $row[0];?></h1>
    <h4>Number of car</h4> 
    </div>



    <!-- today's profits -->


    <?php
    }
    $day=0;
    $date=date('Y-m-d');
    $query="select SUM(price) from travels where date='$date'";
    $result=mysqli_query($connect,$query);
    while($row= mysqli_fetch_row($result)){
        $day+=$row[0]*20/100;
    }
    ?>
    <div class="today">   
    <h1><?php echo $day;?></h1>
    <h4>Today's profits</h4> 
    </div>


    <!-- total trips -->


    <?php
    $query="select COUNT(*) from travels";
    $result=mysqli_query($connect,$query);
    while($row= mysqli_fetch_row($result)){?>
    <div class="trips">   
    <h1><?php echo $row[0];?></h1>
    <h4>total trips</h4> 
    </div>
    <?php
    }
?>



    <!-- the last 10 trips -->



    <div class="table_div">
    <ul class="container_ul">
        <li>date</li>
        <li>start</li>
        <li>destination</li>
        <li>price</li>
        <li>driver name</li>
        <li>passenger name</li>
    </ul>
    <div class="ul_inside">
    <?php
        $i=1;
        $query="select * from travels ORDER BY date DESC";
        $result=mysqli_query($connect,$query);
        while($row= mysqli_fetch_assoc($result)){
            $driver_id=$row['driver_id'];
            $passenger_id=$row['passenger_id'];
            $query1="select * from driver where id='$driver_id'";
            $result1=mysqli_query($connect,$query1);
            while($row1= mysqli_fetch_assoc($result1)){
                $driver_name=$row1['full_name'];
            }
            $query2="select * from passenger where id='$passenger_id'";
            $result2=mysqli_query($connect,$query2);
            while($row2= mysqli_fetch_assoc($result2)){
                $passenger_name=$row2['full_name'];
            }
            ?>
        <ul class="inside_ul">
            <li id="id"><?php echo $row['date'];?></li>
            <li  id="start"><?php echo $row['start'];?></li>
            <li id="dest"><?php echo $row['destination'];?></li>
            <li id="price"><?php echo $row['price'];?></li>
            <li id="driver"><?php echo $driver_name?></li>
            <li id="pass"><?php echo $passenger_name;?></li>
        </ul>
        <?php
        if($i==10){
            break;
        }
        $i++;
        }?>
        </div>
    </div>
  </div>


<!--<form action="send_notification.php" method="POST">
    <input type="text" name="title" id="">
    <input type="text" name="message" id="">
    <input type="submit">
</form>-->


<!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="/__/firebase/8.4.1/firebase-app.js"></script>

<!-- TODO: Add SDKs for Firebase products that you want to use
     https://firebase.google.com/docs/web/setup#available-libraries -->
<script src="/__/firebase/8.4.1/firebase-analytics.js"></script>

<!-- Initialize Firebase -->
<script src="/__/firebase/init.js"></script>
       
</body>
</html>
<?php
  if(isset($_POST['logout'])){
    ?>
    <meta http-equiv="refresh" content="0;url=index.php">
    <?php
      session_unset();
      session_destroy();
  }
  

    /*session_unset();
    session_destroy();*/

  ?>