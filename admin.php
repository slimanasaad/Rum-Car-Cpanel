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
        #delete , #update {
            color: #fff;
            border-radius: 5px;
            width: 55px;

        }
        #delete{
            background-color: red;
        }
        #update{
            width: 100px;
            background-color: green;
        }

        .table_div{
            margin-bottom: 40px;
            margin-top: 0px;
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

    </style>
    <?php 
        include('nabvar.php');
        if($_SESSION['acc']==0){
            die('Connection Failed');
        }
        if(isset($_POST['delete'])){
            $id=$_POST['id'];
            $query="delete from managers where id='$id' ";
            $result=mysqli_query($connect,$query);
            ?>
            <div class="delete_div">Item Successfully Deleted</div>
            <meta http-equiv="refresh" content="0;url=admin.php">
            <?php
        }else
        if(isset($_POST['update'])){
            $id=$_POST['id'];
            $query="update managers SET acc=1 where id='$id' ";
            $result=mysqli_query($connect,$query);
            ?>
            <div class="delete_div">Item Successfully Deleted</div>
            <meta http-equiv="refresh" content="0;url=admin.php">
            <?php
        }
    ?>
</head>
<body>
<div class="container_div">

    <!--START ALL DRIVER-->

    <div class="table_div">
    <h5>All Admins</h5>
    <ul class="container_ul">
        <li>id</li>
        <li>photo</li>
        <li>admin name</li>
        <li>phone number</li>
        <li>Email</li>
    </ul>
    <?php
        $query="select * from managers where acc=0";
        $result=mysqli_query($connect,$query);
        while($row= mysqli_fetch_assoc($result)){
    ?>
    <form class="inside_ul" action="" method="POST">
        <input id='id' type="number" value="<?php echo $row['id'];?>" name="id" readonly>
        <input type="hidden" name="acc" id="acc" value="<?php echo $row['acc'];?>">
        <img class='photo' src="<?php echo $row['photo'];?>" alt="not found" data-toggle="modal" data-target="#myModal" id="<?php echo $row['photo'];?>" onclick="photo1(this)">
        <input type="text" value="<?php echo $row['full_name'];?>" name="name" readonly>
        <input id='phone' type="number" value="<?php echo $row['phone_number'];?>" name="number" readonly>
        <input id='email' type="email" value="<?php echo $row['email'];?>" name="email" readonly>
        <input type="submit" name="delete" value="delete" id="delete">
        <input type="submit" name="update" value="Change state" id="update">

        </form>
    <?php }?>


    <!--END ALL DRIVER-->

    </div>
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

</script>



</body>
</html>


