<?php
   // Include config file
   require_once "config.php";
   ini_set('max_execution_time', 300);
   $ch = curl_init();
   curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
   curl_setopt($ch, CURLOPT_URL, 'http://aviation-edge.com/v2/public/flights?key=a1cfea-a5248d');
   $result = curl_exec($ch);
   curl_close($ch);

   $json = json_decode($result);
   $link->query("DELETE FROM flight");
   $link->query("ALTER TABLE flight ADD PRIMARY KEY(aircraft_id)");
   foreach($json as $obj){
      if($obj->status == "en-route"){
         $aircraft_id = $obj->aircraft->regNumber;
         $altitude = $obj->geography->altitude;
         $latitude = $obj->geography->latitude;
         $longitude = $obj->geography->longitude;
         $direction = $obj->geography->direction;
         $speed = $obj->speed->horizontal;
         $airline = $obj->airline->iataCode;
         $flight_num = $obj->flight->number;
         $aircraft_icao = $obj->aircraft->icaoCode;
         $source = $obj->departure->iataCode;
         $destination = $obj->arrival->iataCode;
         if($airline == "" or $aircraft_icao == "" or $source == "" or $destination == ""){
            continue;
         }
         $sql = "INSERT INTO flight (aircraft_id, altitude, latitude, longitude, direction, speed, airline, flight_num, aircraft_icao, source, destination) VALUES ('$aircraft_id', '$altitude', '$latitude', '$longitude', '$direction', '$speed', '$airline', '$flight_num', '$aircraft_icao', '$source', '$destination')";
         $link->query($sql);
      }
      
   }
   $link->close();
?>