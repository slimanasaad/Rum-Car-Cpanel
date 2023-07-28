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
        }
        .container_ul{
            margin-top: -7px;
            margin-bottom: 0px;
            background-color: rgb(198, 212, 216);
            padding-top: 10px;
            padding-bottom: 10px;
        }
        .container_ul li{
            margin: 40px;
            display: inline;
        }
        .inside_ul{
            border-bottom: 1px solid rgb(168, 171, 172);
            border-top: 1px solid rgb(168, 171, 172);
            margin: 0px;
            background-color: #fff;
            height: 50px;
        }
        .inside_ul li{
            display: inline;
        }
        #id{
            width: 50px;
            margin-left: 80px;

        }
        .photo{
            margin-left: 38px;
            margin-right: 65px;
            border-radius: 50px;
            width: 50px;
            height: 50px;
            padding: 5px;
        }
        #phone{
            width: 90px;
            margin-left: 25px;
        }
        #email{
            width: 200px;
            margin-left: 50px;
            margin-right: 30px;
        }
        input{
            border:none;
        }
        #delete , #update , #car{
            color: #fff;
            border-radius: 5px;
            width: 55px;

        }
        #delete{
            background-color: red;
        }
        #update{
            background-color: blue;
        }
        #car{
            background-color: #1aa;
        }
        .table_div{
            margin-bottom: 40px;
            margin-top: 0px;
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
            text-align: center;
            border: 1px solid #000;
            border-bottom: none;
            background-color: #fff;
        }
        #nav1_li{
            padding-left: 90px;
        }
        #export{
            margin-top: 2px;
        }
        #record_ul{
            padding-top: 13px;
            padding-bottom: 13px;
        }
        #record_li{
            margin: 70px;
        }
        #record_name{
            position: absolute;
            left: 70px;
        }
        #record_start{
            position: absolute;
            left: 285px;
        }
        #record_dest{
            position: absolute;
            left: 470px;
        }
        #record_date{
            position: absolute;
            left: 660px;
        }
        #record_price{
            position: absolute;
            left: 860px;
        }
        #export1 , #export2{
            position: absolute;
            top: 95px;
        }
        #export1{
            left: 750px;
        }
        #export2{
            left: 900px;
        }

    </style>
    <?php 
        include('nabvar.php');
    ?>

</head>
<body>

    <div class="container_div">
    <nav class="navbar navbar-expand-sm bg-secondary navbar-dark">
  <ul class="navbar-nav">
    <li class="nav-item active">
      <a class="nav-link" href="#all">All drivers</a>
    </li>
    <li id="nav1_li" class="nav-item">
      <a class="nav-link" href="#create1">create driver</a>
    </li>
    <li id="nav1_li" class="nav-item">
      <a class="nav-link" href="#active">active drivers</a>
    </li>
    <li id="nav1_li" class="nav-item">
      <a class="nav-link" href="#inactive">inactive drivers</a>
    </li>
    <li id="nav1_li" class="nav-item">
      <a class="nav-link" href="#banned">banned drivers</a>
    </li>
  </ul>
</nav>

    <!--START ALL DRIVER-->

    <div id="all" class="table_div">
    <h5>All Drivers</h5>
    <ul class="container_ul">
        <li>id</li>
        <li>photo</li>
        <li>driver name</li>
        <li>phone number</li>
        <li>Email</li>    
        
        <form action="excel.php" id="export" method="POST">
        <input  id="export1" type="submit" name="export_excel" class="btn btn-success" value="Export to Excel">
        <input id="export2" type="submit" name="export_pdf" class="btn btn-success" value="Export to pdf">
    </form>
    </ul>
    <?php
        $query="select * from driver";
        $result=mysqli_query($connect,$query);
        while($row= mysqli_fetch_assoc($result)){
    ?>
    <form class="inside_ul" action="ulter_driver.php" method="POST">
        <input id='id' type="number" value="<?php echo $row['id'];?>" name="id" readonly>
        <input type="hidden" value="<?php echo $row['car_id'];?>" name="car_id">
        <input type="hidden" value="<?php echo $row['photo'];?>" name="url">
        <img class='photo' src="<?php echo $row['photo'];?>" alt="not found" data-toggle="modal" data-target="#myModal" id="<?php echo $row['photo'];?>" onclick="photo1(this)">
        <input type="text" value="<?php echo $row['full_name'];?>" name="name" readonly>
        <input id='phone' type="number" value="<?php echo $row['phone_number'];?>" name="number" readonly>
        <input id='email' type="email" value="<?php echo $row['email'];?>" name="email" readonly>
        <input type="hidden" name="pass" value="<?php echo $row['password'];?>">
        <input type="submit" name="car" value="car" id="car">
        <input type="submit" name="delete" value="delete" id="delete">
        <input type="submit" name="update" value="update" id="update">

        </form>
    <?php }?>

    </div>

    <!--END ALL DRIVER-->

        <!--START BANNED DRIVER-->
     
        <div  id="banned" style="margin-top: 40px;" class="table_div">
    <h5>Banned Drivers</h5>
    <ul class="container_ul">
        <li>id</li>
        <li>photo</li>
        <li>driver name</li>
        <li>phone number</li>
        <li>Email</li>
    </ul>
    <?php
        $query="select * from driver where account_state=0 ";
        $result=mysqli_query($connect,$query);
        while($row= mysqli_fetch_assoc($result)){
    ?>
    <form class="inside_ul" action="ulter_driver.php" method="POST">
        <input id='id' type="number" value="<?php echo $row['id'];?>" name="id" readonly>
        <input type="hidden" value="<?php echo $row['photo'];?>" name="url">
        <img class='photo' src="<?php echo $row['photo'];?>" alt="not found" data-toggle="modal" data-target="#myModal" id="<?php echo $row['photo'];?>" onclick="photo1(this)">
        <input type="text" value="<?php echo $row['full_name'];?>" name="name" readonly>
        <input id='phone' type="number" value="<?php echo $row['phone_number'];?>" name="number" readonly>
        <input id='email' type="email" value="<?php echo $row['email'];?>" name="email" readonly>
        <input type="hidden" name="pass" value="<?php echo $row['password'];?>">
        <input type="submit" name="delete" value="delete" id="delete">
        <input type="submit" name="un_ban" value="Un ban" id="update">

        </form>
    <?php }?>
    </div>
    <!--END BANNED DRIVER-->

    <!--START CONNECT DRIVER-->

    <div id="all" class="table_div">
    <h5>Connected Drivers</h5>
    <ul class="container_ul">
        <li>id</li>
        <li>photo</li>
        <li>driver name</li>
        <li>phone number</li>
        <li>Email</li>
    </ul>
    <?php
        $query="select * from driver where state='connect'";
        $result=mysqli_query($connect,$query);
        while($row= mysqli_fetch_assoc($result)){
    ?>
    <form class="inside_ul" action="ulter_driver.php" method="POST">
        <input id='id' type="number" value="<?php echo $row['id'];?>" name="id" readonly>
        <input type="hidden" value="<?php echo $row['car_id'];?>" name="car_id">
        <input type="hidden" value="<?php echo $row['photo'];?>" name="url">
        <img class='photo' src="<?php echo $row['photo'];?>" alt="not found" data-toggle="modal" data-target="#myModal" id="<?php echo $row['photo'];?>" onclick="photo1(this)">
        <input type="text" value="<?php echo $row['full_name'];?>" name="name" readonly>
        <input id='phone' type="number" value="<?php echo $row['phone_number'];?>" name="number" readonly>
        <input id='email' type="email" value="<?php echo $row['email'];?>" name="email" readonly>
        <input type="hidden" name="pass" value="<?php echo $row['password'];?>">
        <input type="submit" name="car" value="car" id="car">
        <input type="submit" name="delete" value="delete" id="delete">
        <input type="submit" name="update" value="update" id="update">

        </form>
    <?php }?>
    </div>

    <!--END ALL DRIVER-->



    <!--START ACTIVATED DRIVER-->

    <div id="active" style="margin-top: 40px;" class="table_div">
    <h5>Activated Drivers</h5>
    <ul class="container_ul">
        <li>id</li>
        <li>photo</li>
        <li>driver name</li>
        <li>phone number</li>
        <li>Email</li>
    </ul>
    <?php
        $query="select * from driver where account_state=2 ";
        $result=mysqli_query($connect,$query);
        while($row= mysqli_fetch_assoc($result)){
    ?>
    <form class="inside_ul" action="ulter_driver.php" method="POST">
        <input id='id' type="number" value="<?php echo $row['id'];?>" name="id" readonly>
        <input type="hidden" value="<?php echo $row['photo'];?>" name="url">
        <img class='photo' src="<?php echo $row['photo'];?>" alt="not found" data-toggle="modal" data-target="#myModal" id="<?php echo $row['photo'];?>" onclick="photo1(this)">
        <input type="text" value="<?php echo $row['full_name'];?>" name="name" readonly>
        <input id='phone' type="number" value="<?php echo $row['phone_number'];?>" name="number" readonly>
        <input id='email' type="email" value="<?php echo $row['email'];?>" name="email" readonly>
        <input type="hidden" name="pass" value="<?php echo $row['password'];?>">
        <input type="submit" name="delete" value="delete" id="delete">
        <input type="submit" name="ban" value="Ban" id="update">

        </form>
    <?php }?>
    </div>
    <!--END ACTIVATED DRIVER-->

    <!--START INACTIVE DRIVER-->

    <div id="inactive" style="margin-top: 40px;" class="table_div">
    <h5>Inactive Drivers</h5>
    <ul class="container_ul">
        <li>id</li>
        <li>photo</li>
        <li>driver name</li>
        <li>phone number</li>
        <li>Email</li>
    </ul>
    <?php
        $query="select * from driver where account_state=1 ";
        $result=mysqli_query($connect,$query);
        while($row= mysqli_fetch_assoc($result)){
    ?>
    <form class="inside_ul" action="ulter_driver.php" method="POST">
        <input id='id' type="number" value="<?php echo $row['id'];?>" name="id" readonly>
        <input type="hidden" value="<?php echo $row['photo'];?>" name="url">
        <img class='photo' src="<?php echo $row['photo'];?>" alt="not found" data-toggle="modal" data-target="#myModal" id="<?php echo $row['photo'];?>" onclick="photo1(this)">
        <input type="text" value="<?php echo $row['full_name'];?>" name="name" readonly>
        <input id='phone' type="number" value="<?php echo $row['phone_number'];?>" name="number" readonly>
        <input id='email' type="email" value="<?php echo $row['email'];?>" name="email" readonly>
        <input type="hidden" name="pass" value="<?php echo $row['password'];?>">
        <input type="submit" name="delete" value="delete" id="delete">
        <input type="submit" name="activate" value="Activate" id="update">

        </form>
    <?php }?>
    </div>
    <!--END INACTIVE DRIVER-->

        <!--START CREATE DRIVER-->

        <div id="create1" class="create_div">
        <h3>create new driver</h3>
        <form action="ulter_driver.php" method="POST">
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
            Enter Lcation <br>
            <input class="border" type="text" name="location"><br>
            <input class="border" type="submit" name="create" value="create">
        </form>
    </div>

    <!--END CREATE DRIVER-->

    <!-- start Transactions Record div -->



    <div class="table_div" style="margin-top: 40px;">
    <ul class="container_ul">
    <h5 style="margin-left: -40px; margin-top: -10px;">Transactions Record</h5>
        <li id="record_li">name</li>
        <li id="record_li">start</li>
        <li id="record_li">destination</li>
        <li id="record_li">date</li>
        <li id="record_li">price</li>
    </ul>
    <?php
        $query2="select * from driver";
        $result2=mysqli_query($connect,$query2);
        while($row2= mysqli_fetch_assoc($result2)){
            $driver_id=$row2['id'];
            $driver_name=$row2['full_name'];
            $query3="select * from travels where driver_id='$driver_id'";
            $result3=mysqli_query($connect,$query3);
            while($row3= mysqli_fetch_assoc($result3)){
                $reciept_id=$row3['id'];
                $start=$row3['start'];
                $destination=$row3['destination'];
                $query4="select * from receipt where travel_id='$reciept_id'";
                $result4=mysqli_query($connect,$query4);
                while($row4= mysqli_fetch_assoc($result4)){
                    $date=$row4['date'];
                    $price=$row4['price'];
                
            ?>
    <ul class="inside_ul" id="record_ul">
        <li id="record_name"><?php echo $driver_name;?></li>
        <li id="record_start"><?php echo $start;?></li>
        <li id="record_dest"><?php echo $destination;?></li>
        <li id="record_date"><?php echo $date;?></li>
        <li id="record_price"><?php echo $price;?>$</li>
    </ul>

     <?php
        }
    }
}    
    ?>
    </div>



    <!-- end Transactions Record div -->


    </div>


            <!-- Modal -->
            <div class = "modal fade" id = "myModal" tabindex = "-1" role = "dialog" aria-labelledby = "myModalLabel" aria-hidden = "true">
   
   <div  class = "modal-dialog">
      <div class = "modal-content" id="modal-content">
         
         <div class = "modal-header">
         <h4 class = "modal-title" id = "myModalLabel">
            User photo
        </h4>
            <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">
                  &times;
            </button>
            
            
         </div>
         
         <div class = "modal-body">
             <img style="width: 465px; height: 465px;" id="Modal_photo" src="" alt="notfound">
         </div>

         

         
      </div><!-- /.modal-content -->
   </div><!-- /.modal-dialog -->
  
</div><!-- /.modal -->

<script>
    function photo1(img){
        var customerNumber = img.id;
        //alert(customerNumber);
        document.getElementById("Modal_photo").src=customerNumber;
    }
    /*function photo2(img){
        var customerNumber = img.id;
        //alert(customerNumber);
        document.getElementById("Modal_photo").src=customerNumber;
    }
    function photo3(img){
        var customerNumber = img.id;
        //alert(customerNumber);
        document.getElementById("Modal_photo").src=customerNumber;
    }
    function photo4(img){
        var customerNumber = img.id;
        //alert(customerNumber);
        document.getElementById("Modal_photo").src=customerNumber;
    }
    function photo5(img){
        var customerNumber = img.id;
        //alert(customerNumber);
        document.getElementById("Modal_photo").src=customerNumber;
    }*/
</script>
</body>
</html>


