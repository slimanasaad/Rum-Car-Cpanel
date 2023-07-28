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
        h5{
            text-align: center;
        }
        textarea{
            height: 400px;
            width: 100%;
            margin-top: 5px;
            margin-bottom: 10px;
        }
    </style>
    </head>
<body>
<?php   
        if(isset($_POST['create'])){
            $policy=$_POST['policy'];
            $query="update information SET policy='$policy' ";
            $result=mysqli_query($connect,$query);
        }
        $query="select * from information";
        $result=mysqli_query($connect,$query);
        while($row= mysqli_fetch_assoc($result)){
            $policy=$row['policy'];
        }
?>
<div class="container_div">
<div id="create1" class="create_div">
        <form action="" method="POST">
            <h5>Write Your Privacy Policy</h5>
            <textarea name="policy" id="" cols="30" rows="10"><?php echo $policy;?></textarea>
            <input class="border" type="submit" name="create" value="create">
        </form>
    </div>

</div>
</body>