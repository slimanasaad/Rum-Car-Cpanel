<?php
    require('vendor/autoload.php');
    include('connect.php');
    $output = '';
    $query="select id,full_name,phone_number,email,password,location from driver ORDER BY id DESC";
    $result=mysqli_query($connect,$query);
    if(isset($_POST['export_excel'])){
        if(mysqli_num_rows($result) > 0){
            $output .= '
                <table class="table" bordered="1">
                <tr>
                    <th>id</th>
                    <th>full_name</th>
                    <th>phone_number</th>
                    <th>email</th>
                    <th>password</th>
                    <th>location</th>
                </tr>
            ';
            while($row = mysqli_fetch_array($result)){
                $output .= '
                <tr>
                    <th>'.$row["id"].'</th>
                    <th>'.$row["full_name"].'</th>
                    <th>'.$row["phone_number"].'</th>
                    <th>'.$row["email"].'</th>
                    <th>'.$row["password"].'</th>
                    <th>'.$row["location"].'</th>
                </tr>
                ';
            }
            $output .= '</table>';
            header("Content-Type: application/xls");
            header("Content-Disposition:attachment; filename:download.xls");
            echo $output;
        }
    }
    if(isset($_POST['export_pdf'])){
        if(mysqli_num_rows($result) > 0){
            $html='<table class="table" bordered="1">';
                $html.='<tr><td>id</td><td>full_name</td><td>phone_number</td><td>email</td><td>password</td><td>location</td></tr>';
                while($row = mysqli_fetch_array($result)){
                    $html.='<tr><td>'.$row["id"].'</td><td>'.$row["full_name"].'</td><td>'.$row["phone_number"].'</td><td>'.$row["email"].'</td><td>'.$row["password"].'</td><td>'.$row["location"].'</td></tr>';
                }
            $html.='</table>';
            echo $html;
        }else{
            $html="DATA NOT FOUND";
        }        
        $mpdf= new \Mpdf\Mpdf();
        $mpdf->WriteHTML($html);
        $file=time().'.pdf';
        $mpdf->Output($file,'D');
    }






    if(isset($_POST['export_receipt_excel'])){
        $query1="select * from receipt ORDER BY id ";
        $result1=mysqli_query($connect,$query1);
        if(mysqli_num_rows($result1) > 0){
            $output .= '
                <table class="table" bordered="1">
                <tr>
                    <th>id</th>
                    <th>date</th>
                    <th>driver name</th>
                    <th>passenger name</th>
                    <th>price</th>
                </tr>
            ';


        while($row1= mysqli_fetch_assoc($result1)){
        $driver_id=$row1['driver_id'];
        $passenger_id=$row1['passenger_id'];

        $query2="select full_name from driver where id='$driver_id' ";
        $result2=mysqli_query($connect,$query2);
        while($row2= mysqli_fetch_assoc($result2)){
            $driver_name=$row2['full_name'];
        }
        

        $query3="select full_name from passenger where id='$passenger_id' ";
        $result3=mysqli_query($connect,$query3);
        while($row3= mysqli_fetch_assoc($result3)){
            $passenger_name=$row3['full_name'];
        }

                $output .= '
                <tr>
                    <th>'.$row1["id"].'</th>
                    <th>'.$row1["date"].'</th>
                    <th>'.$driver_name.'</th>
                    <th>'.$passenger_name.'</th>
                    <th>'.$row1["price"].'</th>
                </tr>
                ';
            }
            $output .= '</table>';
            header("Content-Type: application/xls");
            header("Content-Disposition:attachment; filename:download.xls");
            echo $output;
        }
    }




    if(isset($_POST['export_receipt_pdf'])){
        $query1="select * from receipt ORDER BY id ";
        $result1=mysqli_query($connect,$query1);
        if(mysqli_num_rows($result1) > 0){
            $html='<table class="table" bordered="1">';
                $html.='<tr><td>id</td><td>date</td><td>driver name</td><td>passenger name</td><td>price</td></tr>';
                while($row1= mysqli_fetch_assoc($result1)){
                    $driver_id=$row1['driver_id'];
                    $passenger_id=$row1['passenger_id'];
            
                    $query2="select full_name from driver where id='$driver_id' ";
                    $result2=mysqli_query($connect,$query2);
                    while($row2= mysqli_fetch_assoc($result2)){
                        $driver_name=$row2['full_name'];
                    }
                    
            
                    $query3="select full_name from passenger where id='$passenger_id' ";
                    $result3=mysqli_query($connect,$query3);
                    while($row3= mysqli_fetch_assoc($result3)){
                        $passenger_name=$row3['full_name'];
                    }
                                $html.='<tr><td>'.$row1["id"].'</td><td>'.$row1["date"].'</td><td>'.$driver_name.'</td><td>'.$passenger_name.'</td><td>'.$row1["price"].'</td></tr>';
                }
            $html.='</table>';
            echo $html;
        }else{
            $html="DATA NOT FOUND";
        }        
        $mpdf= new \Mpdf\Mpdf();
        $mpdf->WriteHTML($html);
        $file=time().'.pdf';
        $mpdf->Output($file,'D');
    }

    ?>

