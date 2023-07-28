<?php
  include('connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="public/css/app.css">
    <title>HealthySystemRestaurant</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">    
<?php
if (isset($_POST['title'] , $_POST['message'])){
$title = $_POST['title'];
$message = $_POST['message'];
echo $title ." ". $message;
}

else{


    $title = 'tt';

    $message = 'mm';

echo 'failed';

}       

        $getsql="SELECT `token` FROM `emp` WHERE `emp`.`dept` = 'mngr'";

        $query=$connect->query($getsql);

        $row = $query->fetch_row();


$data = array('title' => $title,'body' => $message);


 sendMessageThroughFCM($row[0], $data);

 

function sendMessageThroughFCM($registatoin_id, $data)
{

    $url = 'https://fcm.googleapis.com/fcm/send';

    $fields = array(

        'to' =>   $registatoin_id   ,

        'notification' => $data,

    );

    //************   rplace this with your api key ***************//
 
    define('GOOGLE_API_KEY', 'AAAAkhBpGfc:APA91bHCedeTMKskdJt1Y2QvN9IewxFIVBaqrJqKLJzLoF6IaevGwmu70YYloCiSUiTxqJYUOT1OvdKpRIOi-b5oEU8AYFvNscZ89FUNJwkIH-Eyv263MrJ4kciaevkcdEjXou6ApeeB');

    $headers = array(

        'Authorization: key=' . GOOGLE_API_KEY,

        'Content-Type: application/json'

    );

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);

    curl_setopt($ch, CURLOPT_POST, true);

    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

    $result = curl_exec($ch);

    if ($result === FALSE) {

        die('Curl failed: ' . curl_error($ch));

    }

    curl_close($ch);

    echo $result;


 }




?>





