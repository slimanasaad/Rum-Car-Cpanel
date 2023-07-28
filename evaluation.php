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
            margin: 75px;
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
        .table_div{
            background-color: #fff;
        }
        #id{
            position: absolute;
            left: 115px;
        }
        #start{
            position: absolute;
            left: 230px;
        }
        #dest{
            position: absolute;
            left: 470px;            
        }
        #price{
            position: absolute;
            left: 670px;
        }
        #driver{
            position: absolute;
            left: 850px;
        }
        #pass{
            position: absolute;
            left: 840px;
        }
        .modal_ul{
            margin: 0px;
            background-color: rgb(198, 212, 216);
            position: relative;
            top: 0px;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        .modal_ul li{
            display: inline;
            margin: 70px;
        }
        #modal-content{
            width: 800px;
            height: 500px;
        }
        .modal_inside_ul li{
            display: inline;
        }
        #dialog_name{
            position: absolute;
            left: 80px;
        }
        #dialog_type{
            position: absolute;
            left: 300px;
        }
        #dialog_level{
            position: absolute;
            left: 490px;
        }
        #dialog_opinion{
            position: absolute;
            left: 650px;
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

<div id="all" class="table_div">
    <!--<h5>All Drivers</h5>-->
    <ul class="container_ul">
        <li>id</li>
        <li>name</li>
        <li>type</li>
        <li>level</li>
    </ul>
    <?php
/*        $query="select * from evaluation";
        $result=mysqli_query($connect,$query);
        while($row= mysqli_fetch_assoc($result)){
            $driver_id=$row['driver_id'];
            $passenger_id=$row['passenger_id'];
            if($driver_id!=null){
            $query1="select full_name from driver where id='$driver_id' ";
            $result1=mysqli_query($connect,$query1);
            while($row1= mysqli_fetch_assoc($result1)){
                $name=$row1['full_name'];
                $type="driver";
            }
            }else
            if($passenger_id!=null){
            $query2="select full_name from passenger where id='$passenger_id' ";
            $result2=mysqli_query($connect,$query2);
            while($row2= mysqli_fetch_assoc($result2)){
                $name=$row2['full_name'];
                $type="passenger";
            }
            }*/
            $query="select *,avg(level) from evaluation where driver_id!='null' group by driver_id";
            $result=mysqli_query($connect,$query);
            while($row= mysqli_fetch_assoc($result)){
                $driver_id=$row['driver_id'];
                $query1="select full_name from driver where id='$driver_id' ";
                $result1=mysqli_query($connect,$query1);
                while($row1= mysqli_fetch_assoc($result1)){
                    $name=$row1['full_name'];
                    $type="driver";
                }

    ?>
        <ul class="inside_ul">
            <li id="id"><?php echo $row['id'];?></li>
            <li  id="start"><?php echo $name;?></li>
            <li id="dest"><?php echo $type;?></li>
            <li id="price"><?php echo 0+round($row['avg(level)'],1);?></li>
            <li id="driver"><button type="submit" name="sss" data-toggle="modal" data-target="#myModal" id="<?php echo $name;?>" onclick="showDetails(this);">Details</button></li>
        </ul>
    <?php }
    $query="select *,avg(level) from evaluation where passenger_id!='null' group by passenger_id";
            $result=mysqli_query($connect,$query);
            while($row= mysqli_fetch_assoc($result)){
                $passenger_id=$row['passenger_id'];
                $query1="select full_name from passenger where id='$passenger_id' ";
                $result1=mysqli_query($connect,$query1);
                while($row1= mysqli_fetch_assoc($result1)){
                    $name=$row1['full_name'];
                    $type="passenger";
                }

    ?>
        <ul class="inside_ul">
            <li id="id"><?php echo $row['id'];?></li>
            <li  id="start"><?php echo $name;?></li>
            <li id="dest"><?php echo $type;?></li>
            <li id="price"><?php echo 0+round($row['avg(level)'],1);?></li>
            <li id="driver"><button type="submit" name="sss" data-toggle="modal" data-target="#myModal" id="<?php echo $name;?>" onclick="showDetails(this);">Details</button></li>
        </ul>
    <?php }?>
    </div>

    </div>
        <!-- Modal -->
        <div class = "modal fade" id = "myModal" tabindex = "-1" role = "dialog" 
   aria-labelledby = "myModalLabel" aria-hidden = "true">
   
   <div  class = "modal-dialog">
      <div class = "modal-content" id="modal-content">
         
         <div class = "modal-header">
         <h4 class = "modal-title" id = "myModalLabel">
            All Evaluation For 
        </h4>
            <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">
                  &times;
            </button>
            
            
         </div>
         
         <div class = "modal-body">
        <ul class="modal_ul">
            <li>name</li>
            <li>type</li>
            <li>level</li>
            <li>opnion</li>
        </ul>
        <?php
        $query="select * from evaluation";
        $result=mysqli_query($connect,$query);
        while($row= mysqli_fetch_assoc($result)){
            $driver_id=$row['driver_id'];
            $passenger_id=$row['passenger_id'];
            if($driver_id!=null){
            $query1="select full_name from driver where id='$driver_id' ";
            $result1=mysqli_query($connect,$query1);
            while($row1= mysqli_fetch_assoc($result1)){
                $name=$row1['full_name'];
                $type="driver";
            }
            }else
            if($passenger_id!=null){
            $query2="select full_name from passenger where id='$passenger_id' ";
            $result2=mysqli_query($connect,$query2);
            while($row2= mysqli_fetch_assoc($result2)){
                $name=$row2['full_name'];
                $type="passenger";
            }
            }


    ?>
        <ul class="modal_inside_ul">
            <li id="dialog_name"><?php echo $name;?></li>
            <li id="dialog_type"><?php echo $type;?></li>
            <li id="dialog_level"><?php echo $row['level'];?></li>
            <li id="dialog_opinion"><?php echo $row['opinion'];?></li>
            <br>
        </ul>
      

    <?php }?>
         </div>

         

         
      </div><!-- /.modal-content -->
   </div><!-- /.modal-dialog -->
  
</div><!-- /.modal -->


<script>
    function showDetails(button){
        var customerNumber = button.id;
        alert(customerNumber);
    }
</script>
</body>
</html>