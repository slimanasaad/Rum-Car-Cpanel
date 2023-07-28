<?php
    include('connect.php');
    $query="select * from driver";
    $result=mysqli_query($connect,$query);
    header('Access-Control-Allow-Origin: *');
   $locations=array();
    while($row= mysqli_fetch_assoc($result)){
        $locations[]=[
            'position' => [
                'lat'=>$row["locationLat"],
                'lng'=>$row["locationLong"]
            ],
                'title' => $row["location"],
                'info' => $row["location"]
        ];

    }
       // $locations["lat"] = $row['track_lat'];
       // $locations["lng"] = $row['track_lng'];
//     $locations = array(
//     [
//     'position' => [
//         'lat' => 33.5104140,
//         'lng' => 36.2783360
//     ],
    
//     'title' => 'damascus',
//     'info' => 'capital'
//     ],
//     [
//         'position' => [
//             'lat' => 35.5407100,
//             'lng' => 35.7952670
//         ],
    
//         'title' => 'lattakia',
//         'info' => 'city'
//     ],
//     [
//            'position' => [
//             'lat' => 34.5407100,
//             'lng' => 36.7952670
//         ],
    
//         'title' => 'unknown',
//         'info' => 'unknown'
//     ]   
// );
echo json_encode($locations);

// echo json_encode($locations);

    
