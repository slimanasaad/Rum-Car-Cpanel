<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>passenger</title>
    <link rel="stylesheet" href="">
    <?php 
        include('nabvar.php');
    ?>
        <style>
        .container_div{
            position: absolute;
            top: 100px;
            left: 280px;
            width: 78%;
            height: 50%;
        }
        .container_ul{
            margin-top: -7px;
            margin-bottom: 0px;
            background-color: rgb(198, 212, 216);
            padding-top: 5px;
            padding-bottom: 5px;
            height: 40px;
        }
        .container_ul li{
            margin: 30px;
            display: inline;
        }
        .inside_ul{
            border-bottom: 1px solid rgb(168, 171, 172);
            border-top: 1px solid rgb(168, 171, 172);
            margin: 0px;
            background-color: #fff;
        }
        .inside_ul li{
            margin: 50px;
            display: inline;
        }
        #id{
            width: 50px;
            margin-left: 70px;

        }
        .photo{
            margin-left: 16px;
            margin-right: 60px;
            border-radius: 50px;
            width: 50px;
            height: 50px;
            padding: 5px;
        }
        #type{
            width: 80px;
        }
        #number{
            width: 90px;
            margin-left: 50px;
        }
        #details{
            width: 100px;
            margin-left: 40px;
            margin-right: 30px;
        }
        #pri_type{
            width: 100px;
        }
        #price{
            width: 100px;
            margin-left: 50px;
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
        .radio{
            margin-left: 20px;
            margin-right: 10px;
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
        </style>
</head>
<body>
<div class="container_div">
<div id="all" class="table_div">
    <h5>All Cars</h5>
    <ul class="container_ul">
        <li>id</li>
        <li>photo</li>
        <li>car name</li>
        <li>car number</li>
        <li>car details</li>
        <li>pricing type </li>
        <li>price</li>
    </ul>
    <?php
        $query="select * from car";
        $result=mysqli_query($connect,$query);
        while($row= mysqli_fetch_assoc($result)){
    ?>
    <form class="inside_ul" action="" method="POST">
        <input id='id' type="number" value="<?php echo $row['id'];?>" name="id" readonly>
        <input type="hidden" value="<?php echo $row['photo'];?>" name="url">
        <img class='photo' src="<?php echo $row['photo'];?>" alt="not found" data-toggle="modal" data-target="#myModal" id="<?php echo $row['photo'];?>" onclick="photo1(this)">
        <input id='type' type="text" value="<?php echo $row['type'];?>" name="type" readonly>
        <input id='number' type="number" value="<?php echo $row['number'];?>" name="number" readonly>
        <input id='details' type="text" value="<?php echo $row['details'];?>" name="details" readonly>
        <input id='pri_type' type="text" value="<?php echo $row['pricing_type'];?>" name="pri_type" readonly>
        <input id='price' type="number" value="<?php echo $row['price'];?>" name="price" readonly>
        <input type="submit" name="delete" value="delete" id="delete">
        <input type="submit" name="update" value="update" id="update">

        </form>
    <?php }?>
    </div>
<!--    <div id="create1" class="create_div">
        <h3>create new car</h3>
        <form action="" method="POST">
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
            <input class="border" type="submit" name="create" value="create">
        </form>
    </div>
        -->
    </div>
    <?php
    if(isset($_POST['delete'])){
        $id=$_POST['id'];
        $query="delete from car where id='$id' ";
        $result=mysqli_query($connect,$query);
        ?>
        <meta http-equiv="refresh" content="0;url=cars.php">
        <?php
    }
    /*else
    if(isset($_POST['create'])){
        $type=$_POST['type'];
        $details=$_POST['details'];
        $number=$_POST['number'];
        $photo=$_POST['url'];
        $pricing_type=$_POST['pricing_type'];
        $price=$_POST['price'];
        $query="insert into car(type,details,number,photo,pricing_type,price) values ('$type','$details','$number','$photo','$pricing_type','$price') ";
        $result=mysqli_query($connect,$query);
        ?>
        <meta http-equiv="refresh" content="0;url=cars.php">
        <?php
    }*/
    ?>



                <!-- Modal -->
    <div class = "modal fade" id = "myModal" tabindex = "-1" role = "dialog" aria-labelledby = "myModalLabel" aria-hidden = "true">
   
   <div  class = "modal-dialog">
      <div class = "modal-content" id="modal-content">
         
         <div class = "modal-header">
         <h4 class = "modal-title" id = "myModalLabel">
            Car photo
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