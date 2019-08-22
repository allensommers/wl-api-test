<?php

$url = getenv("URL")."/v1/NoaaExt.json?user=".getenv("DID")."&pass=".getenv("PASSWORD")."&apiToken=".getenv("APITOKEN");

$data = json_decode(file_get_contents($url));
$extratemp = $data->davis_current_observation->temp_extra_1;
?>
<html>
  <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Lexend+Deca&display=swap" rel="stylesheet"> 
    <style>
      * {
        font-family: 'Lexend Deca', sans-serif;
        font-size: 36px;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col">Air Temperature</div>
<?php
       // if(property_exists($data, "davis_current_observation")) {
         if ($extratemp) {

?>
        <div class="col">Water Temperature</div>
<?php
        }
        
?>
      </div>
      <div class="row">
        <div class="col"><?php echo($data->temp_f); ?> &deg; F</div>
<?php
       // if(property_exists($data, "temp_extra_1")) {
        if ($extratemp) {
?>
        <div class="col"><?php echo($extratemp); ?> &deg; F</div>
<?php
        }
?>
      </div>
    </div>
  </body>
</html>

