<?php  

    
    session_start();
    include('connect.php');
    if(!empty($_POST['save']))
    {
        $Email=$_POST['email'];
        $password=$_POST['password'];
        $query="select * from managers where email='$Email' and password='$password' and acc=1";
        $result=mysqli_query($connect,$query);
        while($row= mysqli_fetch_assoc($result)){
            $_SESSION['username']=$row['full_name'];
            $_SESSION['photo']=$row['photo'];
            $_SESSION['email']=$row['email'];
            $_SESSION['password']=$row['password'];
            $_SESSION['id']=$row['id'];
            $_SESSION['number']=$row['phone_number'];
            $_SESSION['acc']=$row['acc'];
    }
    $query1="select * from managers where email='$Email' and password='$password' and acc=0";
    $result1=mysqli_query($connect,$query1);
    while($row1= mysqli_fetch_assoc($result1)){
        $_SESSION['username']=$row1['full_name'];
        $_SESSION['photo']=$row1['photo'];
        $_SESSION['email']=$row1['email'];
        $_SESSION['password']=$row1['password'];
        $_SESSION['id']=$row1['id'];
        $_SESSION['number']=$row1['phone_number'];
        $_SESSION['acc']=$row1['acc'];
}
        $count=mysqli_num_rows($result);
        $count1=mysqli_num_rows($result1);
        if($count>0)
        {?>
        <div class="manager_div">Login Successful Welcome you are admin</div>
        <?php
            $page="../transfer/logo.php";
        }
        else
        if($count1>0){?>
          <div class="success_div">Login Successful please wait 3 secounds</div>
          <?php
          $page="../transfer/logo.php";
        }
        else
        {?>
          <div class="failed_div">Login Not Successful please wait 3 secounds and try again</div>
          <?php
            $page="";
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="refresh" content="2;url=<?php echo $page ?>">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>

    .failed_div , .success_div , .manager_div{
        text-align: center;
        position: absolute;
        top: 100px;
        left: 10%;
        width: 80%;
      } 
    .failed_div{
          background-color: red;
          color: #fff;
      }
    .success_div{
        background-color: rgb(100, 203, 231);
        color: #000;
      }
    .manager_div{
        background-color: rgb(100, 231, 128);
        color: #000;
      }  

  
  /* ---------- GENERAL ---------- */
  * {
    box-sizing: inherit;
  }
  
  html {
    box-sizing: border-box;
  }
  
  body {
    background-color: rgb(211, 229, 230);
    font-family: 'Varela Round', sans-serif;
    line-height: 1.5;
    margin: 0;
    min-block-size: 100vh;
    padding: 5vmin;
  }
  
  h2 {
    font-size: 1.75rem;
  }
  
  input {
    background-image: none;
    border: none;
    font: inherit;
    margin: 0;
    padding: 0;
    transition: all 0.3s;
  }
  
  svg {
    height: auto;
    max-width: 100%;
    vertical-align: middle;
  }
  
  /* ---------- ALIGN ---------- */
  .align {
    display: grid;
    place-items: center;
  }
  
  /* ---------- BUTTON ---------- */
  
  .button {
    background-color: rgb(211, 229, 230);
    color: #000;
    padding: 0.25em 1.5em;
    border: 1px solid #000;
  }
  
  .button:focus,
  .button:hover {
    color: #fff;
    background-color: rgb(35, 35, 50);
  }
  
  /* ---------- ICONS ---------- */
  .icons {
    display: none;
  }
  
  .icon {
    fill: currentcolor;
    display: inline-block;
    height: 1em;
    width: 1em;
  }
  
  /* ---------- LOGIN ---------- */
  .login {
    width: 400px;
  }
  
  .login__header {
    background-color: rgb(35, 35, 50);
    border-top-left-radius: 1.25em;
    border-top-right-radius: 1.25em;
    color: #fff;
    padding: 1.25em 1.625em;
  }
  
  .login__header :first-child {
    margin-top: 0;
  }
  
  .login__header :last-child {
    margin-bottom: 0;
  }
  
  .login h2 .icon {
    margin-right: 14px;
  }
  
  .login__form {
    background-color: #fff;
    border-bottom-left-radius: 1.25em;
    border-bottom-right-radius: 1.25em;
    color: #777;
    display: grid;
    gap: 0.875em;
    padding: 1.25em 1.625em;
  }
  
  .login input {
    border-radius: 0.1875em;
  }
  
  .login input[type="email"],
  .login input[type="password"] {
    background-color: #eee;
    color: #777;
    padding: 0.25em 0.625em;
    width: 100%;
  }
  
  .login input[type="submit"] {
    display: block;
    margin: 0 auto;
  }
    </style>
</head>
<body class="align">

  <div class="login">

    <header class="login__header">
      <h2><svg class="icon">
          <use xlink:href="#icon-lock" />
        </svg>Sign In</h2>
    </header>

    <form action="" class="login__form" method="POST">

      <div>
        <label for="email">E-mail address</label>
        <input type="email" id="email" name="email" placeholder="mail@address.com">
      </div>

      <div>
        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="password">
      </div>

      <div>
        <input class="button" type="submit" value="Sign In" name="save">
      </div>

    </form>

  </div>

  <svg xmlns="http://www.w3.org/2000/svg" class="icons">

    <symbol id="icon-lock" viewBox="0 0 448 512">
      <path d="M400 224h-24v-72C376 68.2 307.8 0 224 0S72 68.2 72 152v72H48c-26.5 0-48 21.5-48 48v192c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V272c0-26.5-21.5-48-48-48zm-104 0H152v-72c0-39.7 32.3-72 72-72s72 32.3 72 72v72z" />
    </symbol>

  </svg>

</body>
</html>
