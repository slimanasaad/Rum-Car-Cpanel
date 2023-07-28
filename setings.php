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
    </head>
<body>
<?php
    if(isset($_POST['update'])){
        $number=$_POST['number'];
        $email_admin=$_POST['email'];
        $face_page=$_POST['face'];
        $insta_page=$_POST['insta'];
        $query="update information SET number='$number',email_admin='$email_admin',face_page='$face_page',insta_page='$insta_page' ";
        $result=mysqli_query($connect,$query);}
        $query="select * from information";
        $result=mysqli_query($connect,$query);
        while($row= mysqli_fetch_assoc($result)){
        $number=$row['number'];
        $email_admin=$row['email_admin'];
        $face_page=$row['face_page'];
        $insta_page=$row['insta_page'];
        }
?>
<div class="container_div">
<div id="create1" class="create_div">
        <form action="" method="POST">
        <i class='fas fa-phone' style='font-size:24px;'>Phone Number</i><br>
            <input class="border" type="number" value="<?php echo $number;?>" name="number"><br>
            <i class='fas fa-user-tie' style='font-size:24px;'>Email Adimn</i><br>
            <input class="border" type="email" value="<?php echo $email_admin;?>" name="email"><br>
            <i class='fab fa-facebook' style='font-size:24px;'>facebook page</i><br>
            <input class="border" type="text" value="<?php echo $face_page;?>" name="face"><br>
             <i class='fab fa-instagram' style='font-size:24px'>instagram page</i><br>
            <input class="border" type="text" value="<?php echo $insta_page;?>" name="insta"><br>
            <input class="border" type="submit" name="update" value="update">
        </form>
    </div>


</div>
</body>