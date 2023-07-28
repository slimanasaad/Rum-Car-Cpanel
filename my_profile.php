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
        .img{
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
    </style>
    <?php 
        include('nabvar.php');
    ?>
    </head>
<body>
        <?php
    if(isset($_POST['update'])){
        
    $id=$_POST['id'];
    $full_name=$_POST['name'];
    $phone_nmber=$_POST['number'];
    $email=$_POST['email'];
    $password=$_POST['pass'];
    $photo=$_POST['url'];
    $query="update managers SET full_name='$full_name',phone_number='$phone_nmber',email='$email',password='$password',photo='$photo' where id='$id' ";
    $result=mysqli_query($connect,$query);
    ?>
    <div class="profile_div">
    <img class="img" src="<?php echo $_POST['url'];?>" alt="not found"  data-toggle="modal" data-target="#myModal" id="<?php echo $_POST['url'];?>" onclick="photo1(this)">
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
            Enter phone number
            <input id='phone' class="input" type="number" value="<?php echo $_POST['number'];?>" name="number"><br>
            <input type="submit" value="update" name="update">
        </form>
    </div>
<?php
}else{?>

<div class="profile_div">
    <img class="img" src="<?php echo $_SESSION['photo'];?>" alt="not found"   data-toggle="modal" data-target="#myModal" id="<?php echo $_SESSION['photo'];?>" onclick="photo1(this)">
    <h4><?php echo $_SESSION['username'];?></h4><br>
    <p><?php echo $_SESSION['email'];?></p>        
    </div>
    <div class="update_div">
        <form id="form" action="" method="POST">
            <input id='id' type="hidden" name="id" value="<?php echo $_SESSION['id'];?>" >
            Full Name <br>
            <input class="input" type="text" value="<?php echo $_SESSION['username'];?>" name="name"><br>
            Email <br>
            <input id='email' class="input" type="email" value="<?php echo $_SESSION['email'];?>" name="email"><br>
            Password <br>
            <input type="password" class="input" name="pass" value="<?php echo $_SESSION['password'];?>"><br><br>
            <input type="file" name="url"><br><br>
            Enter phone number
            <input id='phone' class="input" type="number" value="<?php echo $_SESSION['number'];?>" name="number"><br>
            <input type="submit" value="update" name="update">
        </form>
    </div>

<?php
}?>
        
</div>



                <!-- Modal -->
                <div class = "modal fade" id = "myModal" tabindex = "-1" role = "dialog" aria-labelledby = "myModalLabel" aria-hidden = "true">
   
   <div  class = "modal-dialog">
      <div class = "modal-content" id="modal-content">
         
         <div class = "modal-header">
         <h3 class = "modal-title" id = "myModalLabel">
            Admin photo
        </h3>
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
