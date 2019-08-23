<?php
$url = getenv("URL")."/v1/NoaaExt.json?user=".getenv("DID")."&pass=".getenv("PASSWORD")."&apiToken=".getenv("APITOKEN");
$data = json_decode(file_get_contents($url));
$temp = $data->temp_f;
$tempExtra1 = null;
$stationName = null;
if (property_exists($data, "davis_current_observation")) {
  $currentObservation = $data->davis_current_observation;
  $stationName = $currentObservation->station_name;
  if (property_exists($currentObservation, "temp_extra_1")) {
    $tempExtra1 = $currentObservation->temp_extra_1;
  }
}
?>
<html>
  <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Lexend+Deca&display=swap" rel="stylesheet"> 
    <style>
      * {
        font-family: 'Lexend Deca', sans-serif;
        font-size: 64px;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col"><?php echo($stationName); ?></div>
      </div>
      <div class="row">
        <div class="col">Air Temp</div>
        <div class="col">Extra Temp 1</div>
      </div>
      <div class="row">
        <div class="col"><?php echo($temp); ?> &deg; F</div>
        <div class="col"><?php echo($tempExtra1); ?> &deg; F</div>
      </div>
    </div>
  </body>
</html>

