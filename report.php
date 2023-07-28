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
        .container_ul,.driver_ul{
            margin-top: -7px;
            margin-bottom: 0px;
            background-color: rgb(198, 212, 216);
            padding-top: 10px;
            padding-bottom: 10px;
        }
        .driver_ul li{
            margin: 30px;
            display: inline;
        }
        .container_ul li{
            margin: 60px;
            display: inline;
        }
        .table_div{
            margin-bottom: 40px;
            margin-top: 0px;
        }
        .inside_ul{
            border-bottom: 1px solid rgb(168, 171, 172);
            border-top: 1px solid rgb(168, 171, 172);
            margin: 0px;
            background-color: #fff;
            height: 50px;
            padding-top: 5px;
        }
        .inside_ul li{
            display: inline;
        }
        h5{
            padding: 5px;
            text-align: center;
            border: 1px solid #000;
            background-color: #fff;
        }
        #li_address{
            padding: 10px;
            margin-left: -40px;
            text-align: center;
            border: 1px solid #000;
            margin-top: -11px;
            margin-bottom: 10px;
            height: 45px;
        }
        .li_span{
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            padding-right: 80px;
        }
        #record_li{
            margin: 70px;
        }
        #record_name,#record_start,#record_dest,#record_date,#record_price,#report_driver_name,#report_car,#report_pricing,#report_price,#report_level,#report_day,#report_total{
            position: absolute;
        }
        #record_name{
            left: 65px;
        }
        #record_start{
            left: 295px;
        }
        #record_dest{
            left: 535px;
        }
        #record_date{
            left: 710px;
        }
        #record_price{
            left: 890px;
        }
        #report_driver_name{
            left: 30px;
        }
        #report_car{
            left: 220px;
        }
        #report_pricing{         
            left: 330px;
        }
        #report_price{
            left: 500px;
        }
        #report_level{
            left: 650px;
        }
        #report_day{           
            left: 800px;
        }
        #report_total{
            left: 950px;
        }

    </style>
    <?php 
        include('nabvar.php');
    ?>
</head>
<body>

<div class="container_div">


<!--  start Comprehensive report   -->

<div id="all" class="table_div">
    <h5>Comprehensive report</h5>
    <?php 
        $query="select date,count(*) from receipt GROUP BY date";
        $result=mysqli_query($connect,$query);
        while($row= mysqli_fetch_assoc($result)){
            $travels_date=$row['date'];
    ?>
    <ul class="container_ul">
    <div id="li_address">
        <span class="li_span">travel's date : <span class="li_span"><?php echo $travels_date;?></span></span>
        <span class="li_span">count of travels : <span class="li_span"><?php echo $row['count(*)'];?></span></span>
    </div>
        <li>driver name</li>
        <li>passenger name</li>
        <li>start</li>
        <li>destination</li>
        <li>price</li>
    </ul>
    <?php
        $query1="select * from receipt where date='$travels_date'";
        $result1=mysqli_query($connect,$query1);
        while($row1= mysqli_fetch_assoc($result1)){
            $travel_price=$row1['price'];
            $travel_id=$row1['travel_id'];
            $query2="select * from travels where id='$travel_id'";
            $result2=mysqli_query($connect,$query2);
            while($row2= mysqli_fetch_assoc($result2)){
                $driver_id=$row2['driver_id'];
                $passenger_id=$row2['passenger_id'];
                $query3="select full_name from driver where id='$driver_id'";
                $result3=mysqli_query($connect,$query3);
                while($row3= mysqli_fetch_assoc($result3)){
                    $driver_name=$row3['full_name'];
                }
                $query4="select full_name from passenger where id='$passenger_id'";
                $result4=mysqli_query($connect,$query4);
                while($row4= mysqli_fetch_assoc($result4)){
                    $passenger_name=$row4['full_name'];
                }

    ?>
    <ul class="inside_ul">
        <li id="record_name"><?php echo $driver_name;?></li>
        <li id="record_start"><?php echo $passenger_name;?></li>
        <li id="record_dest"><?php echo $row2['start'];?></li>
        <li id="record_date"><?php echo $row2['destination'];?></li>
        <li id="record_price"><?php echo $travel_price;?>$</li>
    </ul>
    <?php
                
            }
        }
    } 
?>
</div>


<!--  end Comprehensive report   -->


<!--  start driver report   -->


<div class="table_div">
<h5>driver report</h5>
<ul class="driver_ul">
        <li>driver name</li>
        <li>his car</li>
        <li>pricing type</li>
        <li>pricing value</li>
        <li>evaluation</li>
        <li>his trips today</li>
        <li>total trips</li>

    </ul>
<?php
        $query21="select * from driver";
        $result21=mysqli_query($connect,$query21);
        while($row21= mysqli_fetch_assoc($result21)){
            $car_id=$row21['id'];
            $evaluation_id=$row21['id'];
            $query22="select * from car where driver_id='$car_id'";
            $result22=mysqli_query($connect,$query22);
            while($row22= mysqli_fetch_assoc($result22)){
                $car=$row22['type'];
                $pricing_type=$row22['pricing_type'];
                $price=$row22['price'];
            }
            $query23="select avg(level) from evaluation where driver_id='$evaluation_id'";
            $result23=mysqli_query($connect,$query23);
            $level=0;
            while($row23= mysqli_fetch_assoc($result23)){
                $level+=$row23['avg(level)'];
            }
            $day_count=0;
            $date=date('Y-m-d');
            $query24="select count(*) from travels where driver_id='$evaluation_id' and date='$date'";
            $result24=mysqli_query($connect,$query24);
            while($row24= mysqli_fetch_assoc($result24)){
                $day_count+=$row24['count(*)'];
            }
            $total_count=0;
            $query25="select count(*) from travels where driver_id='$evaluation_id' ";
            $result25=mysqli_query($connect,$query25);
            while($row25= mysqli_fetch_assoc($result25)){
                $total_count+=$row25['count(*)'];
            }


?>

<ul class="inside_ul">
        <li id="report_driver_name"><?php echo $row21['full_name'];?></li>
        <li id="report_car"><?php echo $car;?></li>
        <li id="report_pricing"><?php echo $pricing_type;?></li>
        <li id="report_price"><?php echo $price;?>$</li>
        <li id="report_level"><?php echo $level;?></li>
        <li id="report_day"><?php echo $day_count;?></li>
        <li id="report_total"><?php echo $total_count;?></li>
    </ul>
<?php
        }

?>

</div>




<!--  end driver report   -->



<!--  start today report   -->

<div class="table_div">
    <?php
        $query31="select count(*) from receipt where date='$date'";
        $result31=mysqli_query($connect,$query31);
        while($row31= mysqli_fetch_assoc($result31)){
                $travels_in_today=$row31['count(*)'];
            }
        $day=0;
        $query32="select SUM(price) from receipt where date='$date'";
        $result32=mysqli_query($connect,$query32);
        while($row32= mysqli_fetch_row($result32)){
        $day+=$row32[0]*20/100;
        }

?>
<h5>
    <span  class="li_span">today's report</span>
    <span  class="li_span"><?php $date=date('Y-m-d'); echo $date;?></span>
    count of travels : <span class="li_span"><?php echo $travels_in_today;?></span>
    Today's profits : <span class="li_span"><?php echo $day;?></span>

</h5>
<ul class="container_ul">
        <li>driver name</li>
        <li>passenger name</li>
        <li>start</li>
        <li>destination</li>
        <li>price</li>
    </ul>
    <?php

        $query33="select * from receipt where date='$date'";
        $result33=mysqli_query($connect,$query33);
        while($row33= mysqli_fetch_assoc($result33)){
            $travel_id_in_day=$row33['travel_id'];
            $query34="select * from travels where id='$travel_id_in_day'";
            $result34=mysqli_query($connect,$query34);
            while($row34= mysqli_fetch_assoc($result34)){
                $driver_id_in_day=$row34['driver_id'];
                $passenger_id_in_day=$row34['passenger_id'];
                $query35="select full_name from driver where id='$driver_id_in_day'";
                $result35=mysqli_query($connect,$query35);
                while($row35= mysqli_fetch_assoc($result35)){
                    $driver_name_in_day=$row35['full_name'];
                }
                $query36="select full_name from passenger where id='$passenger_id_in_day'";
                $result36=mysqli_query($connect,$query36);
                while($row36= mysqli_fetch_assoc($result36)){
                    $passenger_name_in_day=$row36['full_name'];
                }
                ?>
                <ul class="inside_ul">
                    <li id="record_name"><?php echo $driver_name_in_day;?></li>
                    <li id="record_start"><?php echo $passenger_name_in_day;?></li>
                    <li id="record_dest"><?php echo $row34['start'];?></li>
                    <li id="record_date"><?php echo $row34['destination'];?></li>
                    <li id="record_price"><?php echo $row33['price'];?>$</li>
                </ul>
                <?php

            }

        }

    ?>

</div>


<div class="table_div">
    <?php
        $month_date=date('m');
        $year_date=date('Y');
        $query31="select count(*) from receipt where MONTH(date)='$month_date' and YEAR(date)='$year_date'";
        $result31=mysqli_query($connect,$query31);
        while($row31= mysqli_fetch_assoc($result31)){
                $travels_in_today=$row31['count(*)'];
            }
        $day=0;
        $query32="select SUM(price) from receipt where MONTH(date)='$month_date' and YEAR(date)='$year_date'";
        $result32=mysqli_query($connect,$query32);
        while($row32= mysqli_fetch_row($result32)){
        $day+=$row32[0]*20/100;
        }

?>
<h5>
    <span  class="li_span">month report</span>
    month : <span  class="li_span"><?php $date1=date('M'); echo $date1;?></span>
    count of travels : <span class="li_span"><?php echo $travels_in_today;?></span>
    profits for the month : <span class="li_span"><?php echo $day;?></span>

</h5>
<ul class="container_ul">
        <li>driver name</li>
        <li>passenger name</li>
        <li>start</li>
        <li>destination</li>
        <li>price</li>
    </ul>
    <?php

        $query33="select * from receipt where MONTH(date)='$month_date' and YEAR(date)='$year_date'";
        $result33=mysqli_query($connect,$query33);
        while($row33= mysqli_fetch_assoc($result33)){
            $travel_id_in_day=$row33['travel_id'];
            $query34="select * from travels where id='$travel_id_in_day'";
            $result34=mysqli_query($connect,$query34);
            while($row34= mysqli_fetch_assoc($result34)){
                $driver_id_in_day=$row34['driver_id'];
                $passenger_id_in_day=$row34['passenger_id'];
                $query35="select full_name from driver where id='$driver_id_in_day'";
                $result35=mysqli_query($connect,$query35);
                while($row35= mysqli_fetch_assoc($result35)){
                    $driver_name_in_day=$row35['full_name'];
                }
                $query36="select full_name from passenger where id='$passenger_id_in_day'";
                $result36=mysqli_query($connect,$query36);
                while($row36= mysqli_fetch_assoc($result36)){
                    $passenger_name_in_day=$row36['full_name'];
                }
                ?>
                <ul class="inside_ul">
                    <li id="record_name"><?php echo $driver_name_in_day;?></li>
                    <li id="record_start"><?php echo $passenger_name_in_day;?></li>
                    <li id="record_dest"><?php echo $row34['start'];?></li>
                    <li id="record_date"><?php echo $row34['destination'];?></li>
                    <li id="record_price"><?php echo $row33['price'];?>$</li>
                </ul>
                <?php

            }

        }

    ?>

</div>


<div class="table_div">
    <?php
        $query41="select count(*) from receipt where YEAR(date)='$year_date'";
        $result41=mysqli_query($connect,$query41);
        while($row41= mysqli_fetch_assoc($result41)){
                $travels_in_today=$row41['count(*)'];
            }
        $day=0;
        $query42="select SUM(price) from receipt where YEAR(date)='$year_date'";
        $result42=mysqli_query($connect,$query42);
        while($row42= mysqli_fetch_row($result42)){
        $day+=$row42[0]*20/100;
        }

?>
<h5>
    <span  class="li_span">year report</span>
    year : <span  class="li_span"><?php $date1=date('Y'); echo $date1;?></span>
    count of travels : <span class="li_span"><?php echo $travels_in_today;?></span>
    profits for the year : <span class="li_span"><?php echo $day;?></span>

</h5>
<ul class="container_ul">
        <li>driver name</li>
        <li>passenger name</li>
        <li>start</li>
        <li>destination</li>
        <li>price</li>
    </ul>
    <?php

        $query43="select * from receipt where YEAR(date)='$year_date'";
        $result43=mysqli_query($connect,$query43);
        while($row43= mysqli_fetch_assoc($result43)){
            $travel_id_in_day=$row43['travel_id'];
            $query44="select * from travels where id='$travel_id_in_day'";
            $result44=mysqli_query($connect,$query44);
            while($row44= mysqli_fetch_assoc($result44)){
                $driver_id_in_day=$row44['driver_id'];
                $passenger_id_in_day=$row44['passenger_id'];
                $query45="select full_name from driver where id='$driver_id_in_day'";
                $result45=mysqli_query($connect,$query45);
                while($row45= mysqli_fetch_assoc($result45)){
                    $driver_name_in_day=$row45['full_name'];
                }
                $query46="select full_name from passenger where id='$passenger_id_in_day'";
                $result46=mysqli_query($connect,$query46);
                while($row46= mysqli_fetch_assoc($result46)){
                    $passenger_name_in_day=$row46['full_name'];
                }
                ?>
                <ul class="inside_ul">
                    <li id="record_name"><?php echo $driver_name_in_day;?></li>
                    <li id="record_start"><?php echo $passenger_name_in_day;?></li>
                    <li id="record_dest"><?php echo $row44['start'];?></li>
                    <li id="record_date"><?php echo $row44['destination'];?></li>
                    <li id="record_price"><?php echo $row43['price'];?>$</li>
                </ul>
                <?php

            }

        }

    ?>

</div>


</div>
</body>
</html>