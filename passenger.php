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
        }
        .container_ul{
            margin: 0px;
            background-color: rgb(198, 212, 216);
            padding-top: 10px;
            padding-bottom: 10px;
        }
        .container_ul li{
            margin: 45px;
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
            width: 30px;
            margin-left: 85px;

        }
        .photo{
            margin-left: 68px;
            margin-right: 55px;
            border-radius: 50px;
            width: 50px;
            height: 50px;
            padding: 5px;
        }
        #phone{
            width: 75px;
            margin-left: 50px;
        }
        #email{
            width: 200px;
            margin-left: 50px;
            margin-right: 50px;
        }
        input{
            border:none;
        }
        #delete{
            background-color: red;
            color: #fff;
            border-radius: 5px;
            width: 60px;
        }
        #update{
            background-color: blue;
            color: #fff;
            border-radius: 5px;
            width: 60px;
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
            padding: 10px;
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
        #record_ul{
            padding-top: 13px;
            padding-bottom: 13px;
        }
        #record_li{
            margin: 70px;
        }
        #record_name{
            position: absolute;
            left: 90px;
        }
        #record_start{
            position: absolute;
            left: 280px;
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
    </style>
    <?php 
        include('nabvar.php');
    ?>
</head>
<body>


    <div class="container_div"><!-- start this div that container all div -->

    <!-- start search div  -->

    <div class="search_div">
        <form class="search" action="" method="POST">
        <i id="i" class='fas fa-search' style='font-size:36px'></i>
        <input id="s" type="text" placeholder="search" name="search_value">
        <input type="submit" name="search" value="search">
        </form>
    </div>
    
    <!--  end search div -->

    <?php
    if(isset($_POST['search'])){
    $search_value=$_POST['search_value'];
    ?>
    
    <!--  start result search div -->

    <div class="table_div">
    <ul class="container_ul">
        <h5>search resault</h5>
        <li>id</li>
        <li>photo</li>
        <li>driver name</li>
        <li>phone number</li>
        <li>Email</li>
    </ul>
    <?php
        $query="select * from passenger where id='$search_value' or full_name='$search_value' or phone_number='$search_value' or email='$search_value' or photo='$search_value'";
        $result=mysqli_query($connect,$query);
        while($row= mysqli_fetch_assoc($result)){
    ?>
    <form class="inside_ul" action="ulter_passenger.php" method="POST">
        <input id='id' type="number" value="<?php echo $row['id'];?>" name="id" readonly>
        <input type="hidden" value="<?php echo $row['photo'];?>" name="url">
        <img class='photo' src="<?php echo $row['photo'];?>" alt="not found" data-toggle="modal" data-target="#myModal" id="<?php echo $row['photo'];?>" onclick="photo1(this)">
        <input type="text" value="<?php echo $row['full_name'];?>" name="name" readonly>
        <input id='phone' type="number" value="<?php echo $row['phone_number'];?>" name="number" readonly>
        <input id='email' type="email" value="<?php echo $row['email'];?>" name="email" readonly>
        <input type="hidden" name="pass" value="<?php echo $row['password'];?>">
        <input type="submit" name="delete" value="delete" id="delete">
        <input type="submit" name="update" value="update" id="update">

        </form>
        </div>
    <?php
    }
}
    ?>

    <!--  end result search div -->
    

    <!--  start all passenger div -->

    <div class="table_div">
    <ul class="container_ul">
        <li>id</li>
        <li>photo</li>
        <li>driver name</li>
        <li>phone number</li>
        <li>Email</li>
    </ul>
    <?php
        $query="select * from passenger";
        $result=mysqli_query($connect,$query);
        while($row= mysqli_fetch_assoc($result)){
    ?>
    <form class="inside_ul" action="ulter_passenger.php" method="POST">
        <input id='id' type="number" value="<?php echo $row['id'];?>" name="id" readonly>
        <input type="hidden" value="<?php echo $row['photo'];?>" name="url">
        <img class='photo' src="<?php echo $row['photo'];?>" alt="not found" data-toggle="modal" data-target="#myModal" id="<?php echo $row['photo'];?>" onclick="photo1(this)">
        <input type="text" value="<?php echo $row['full_name'];?>" name="name" readonly>
        <input id='phone' type="number" value="<?php echo $row['phone_number'];?>" name="number" readonly>
        <input id='email' type="email" value="<?php echo $row['email'];?>" name="email" readonly>
        <input type="hidden" name="pass" value="<?php echo $row['password'];?>">
        <input type="submit" name="delete" value="delete" id="delete">
        <input type="submit" name="update" value="update" id="update">

        </form>
    <?php }?>
    </div>


    <!--  end all passenger div -->



    <!--  start create passenger div -->

    <div class="create_div">
        <h3>create new passenger</h3>
        <form action="ulter_passenger.php" method="POST">
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

    <!--  end create passenger div -->


    <!--  start Transactions Record div -->


    <div class="table_div">
    <ul class="container_ul">
    <h5>Transactions Record</h5>
        <li id="record_li">name</li>
        <li id="record_li">start</li>
        <li id="record_li">destination</li>
        <li id="record_li">date</li>
        <li id="record_li">price</li>
    </ul>
    <?php
        $query2="select * from passenger";
        $result2=mysqli_query($connect,$query2);
        while($row2= mysqli_fetch_assoc($result2)){
            $pass_id=$row2['id'];
            $pass_name=$row2['full_name'];
            $query3="select * from travels where passenger_id='$pass_id'";
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
        <li id="record_name"><?php echo $pass_name;?></li>
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


    <!--  end Transactions Record div -->


    </div><!-- end this div that container all div -->




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

</script>

</body>
</html>


