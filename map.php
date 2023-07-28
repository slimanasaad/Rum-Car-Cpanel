<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Map</title>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style type="text/css">
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        position: absolute;
        top: 100px;
        left: 280px;
        width: 75%;
        height: 80%;
      }

      /* Optional: Makes the sample page fill the window. */
      html,
      body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>

    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBCZXOBgJ-dpCLpiQM-rQtNaM--wwLfPIU&callback=initMap&libraries=&v=weekly"
      async
    ></script>


    <script>
      var map;
      var locations;

      function initMap() {
        map = new google.maps.Map(document.getElementById("map"), {
          center: { lat: 35.00, lng: 38.00 },
          zoom: 8,
        });
        //ajax using axios

        axios.get('http://localhost/transfer/locations.php')
        .then ( function(response){
          console.log(response.data)
          locations = response.data

          
          locations.forEach( function(loc){
          var marker = new google.maps.Marker({
          
          position: { lat: parseFloat(loc.position.lat), lng: parseFloat(loc.position.lng) },
          title: loc.title,
          map: map
          });

          var infowindow = new google.maps.InfoWindow({
          content: loc.info
          });

          marker.addListener('click',function(){
          infowindow.open(map, marker);
          })

          });

          //var image ="https://cdn3.f-cdn.com/contestentries/1485057/33190796/5ca4d0f6827f5_thumb80.jpg";
          //marker = new  google.maps.Marker({

          //position: { lat: 33.5104140, lng: 36.2783360 },
          //title:"damascus",
          //map: map,
          //     icon:image

          //});

          infowindow = new google.maps.InfoWindow({
          content:loc.info
          });

         marker.addListener('click', function(){
        infowindow.open(map, marker);
        });




        })
        .catch( function(error){
          console.log(error);
        })

         
      }
    </script>
  </head>
  <body>
  <?php include('nabvar.php'); ?>

    <div id="map"></div>

    <!-- Async script executes immediately and must be after any DOM elements used in callback. -->

  </body>
</html>