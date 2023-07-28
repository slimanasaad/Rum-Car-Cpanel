<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .container_div{
            position: absolute;
            top: 120px;
            left: 280px;
            width: 78%;
        }
        .table_div{
            margin-bottom: 40px;
            margin-top: 0px;
            background-color: #fff;
            border:1px solid;
        }
        #send_all{
            margin-bottom: 7px;
            padding-top: 20px;
            padding-bottom: 40px;
        }
        #send_all button{
            height: 40px;
            margin-left: 10%;
            border: none;
            border-radius: 10px;
        }
        #send_all , #send_driver , #send_passenger{
            border: 1px solid #000;
            border-bottom: none;
            background-color: #fff;
        }
        #send_driver , #send_passenger{            
            display: inline;
            padding-top: 20px;
            padding-bottom: 20px;
            background-color: rgb(198, 212, 216);

        }
        #send_driver{
            padding-left: 233px;
            padding-right: 232px;
        }
        #send_passenger{
            margin-left: -4px;
            padding-left: 212px;
            padding-right: 211px;
            border-left: none;
        }
        #driver_div{
            background-color: #fff;
            width: 50%;
            border: 1px solid;
            margin-top: 18px;
            border-bottom: none;
        }
        #passenger_div{
            position: absolute;
            top: 187px; 
            left:50%; 
            background-color: #fff; 
            width: 50%; 
            border: 1px solid;
            border-bottom: none;
            border-left: none;
        }
        form{
            padding: 10px;
            border-bottom: 1px solid;
        }
        input{
            border:none;
        }
        .send_message{
            margin-top: 20px;
            float: right;
            border-radius: 10px;
        }
        .name{
            padding-left: 30px;
            font-size: 20px;
        }
        .photo{
            margin-left: 30px;
            border-radius: 50px;
            width: 70px;
            height: 70px;
        }
        .radio{
            margin-left: 14%;
            font-size: 20px;
        }
        #h5_all{
            padding: 5px;
            text-align: center;
            border-bottom: 1px solid;
            background-color: rgb(198, 212, 216);
        }
    </style>
    <script>
        function choose(){
            document.getElementById('all').innerHTML+='<br>all users :<input type="radio" name="all" >all drivers :<input type="radio" name="all" >all passengers :<input type="radio" name="all" >'
        }
    </script>
    <?php 
        include('nabvar.php');
    ?>
</head>
<body>
<div class="container_div">
<div class="table_div">
<h5 id="h5_all">broadcast message:</h5>
<form action="" method="POST" style="border-bottom: none;">
<span style="margin-left: 100px; font-size: 20px;">all users : <input type="radio" name="all" value="users"></span>
<span class="radio">all drivers : <input type="radio" name="all" value="drivers"></span> 
<span class="radio">all passengers : <input type="radio" name="all" value="passengers"></span>
<input class="btn btn-success" style="margin-left: 11%;" type="submit" name="to_all" value="send message">
</form>
</div>
<div class="table_div" style="border-left: none; border-right: none;">
<h5 id="send_driver">drivers</h5>
<h5 id="send_passenger">passengers</h5>
<div id="driver_div">
<?php
        $query="select * from driver";
        $result=mysqli_query($connect,$query);
        while($row= mysqli_fetch_assoc($result)){?>
            <form action="" method="POST">
                <input type="hidden" name="driver_id" value="<?php echo $row['id'];?>">
                <img class="photo" src="<?php echo $row['photo'];?>" alt="not found" data-toggle="modal" data-target="#myModal" id="<?php echo $row['photo'];?>" onclick="photo1(this)">
                <input class="name" type="text" name="driver_name" value="<?php echo $row['full_name'];?>" readonly>
                <input class="btn btn-success" class="send_message" type="submit" name="send_driver" value="send message">
            </form>

<?php
        }
?>
        </div>
        <div id="passenger_div">

<?php
        $query1="select * from passenger";
        $result1=mysqli_query($connect,$query1);
        while($row1= mysqli_fetch_assoc($result1)){?>
                <form action="" method="POST">
                    <input type="hidden" name="passenger_id" value="<?php echo $row1['id'];?>">
                    <img class="photo" src="<?php echo $row1['photo'];?>" alt="not found" data-toggle="modal" data-target="#myModal" id="<?php echo $row1['photo'];?>" onclick="photo1(this)">
                    <input class="name" type="text" name="driver_name" value="<?php echo $row1['full_name'];?>">
                    <input class="btn btn-success" class="send_message" type="submit" name="send_driver" value="send message">
                </form>
    <?php

        }
?>
            </div>
<!--            <h5 id="send_all"><button class="btn btn-success" onclick="choose()">send message to all</button><span id="all"></span><!--<button class="btn btn-success">send message to all drivers</button><button class="btn btn-success">send message to all passengers</button></h5>-->


</div>
</div>

    <!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="https://www.gstatic.com/firebasejs/8.6.1/firebase-app.js"></script>

<!-- TODO: Add SDKs for Firebase products that you want to use
     https://firebase.google.com/docs/web/setup#available-libraries -->
<script src="https://www.gstatic.com/firebasejs/8.6.1/firebase-analytics.js"></script>

<script>

  // Your web app's Firebase configuration
  // For Firebase JS SDK v7.20.0 and later, measurementId is optional
/*  var firebaseConfig = {
      
    apiKey: "AIzaSyCvQAbHkT2RGQTfvZKFIB1w_cDMtaSXypc",
    authDomain: "send-notification-17.firebaseapp.com",
    projectId: "send-notification-17",
    storageBucket: "send-notification-17.appspot.com",
    messagingSenderId: "627340548599",
    appId: "1:627340548599:web:444c6e90be723fe96d36f2",
    measurementId: "G-YHJT1V3SR4"
  };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);
  firebase.analytics();


  const messaging = firebase.messaging();
  messaging.requestPermission()
  .then(function(){
      console.log('HAVE');
      return messaging.getToken();
  })
  .then(function(token){
      console.log(token);
  })
.catch(function(err){
    console.log('err');
})

    // Add the public key generated from the console here.
   // messaging.getToken({vapidKey: "BKagOny0KF_2pCJQ3m....moL0ewzQ8rZu"});

*/
</script>


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
