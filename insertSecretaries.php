<?php

$conn = mysqli_connect('localhost','webuser','123456','webprogrammingproject2021');
if(!$conn){
    die ("Fail connection". mysqli_connect_error());
}



$sql = "INSERT INTO secretaries () 
VALUES ('340001', 'Minerva', 'McGonagall', 'Transfiguration', 'catwoman', 'minerva123'),
('340002', 'Filius', 'Flitwick', 'Xylomancy', 'minimum', 'filius123'),
('340003', 'Severus', 'Snape', 'Potions', 'oilhead', 'severus123'),
('340004', 'Pomona', 'Sprout', 'Herbology', 'lettuce', 'pomona123');";


if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

mysqli_close($conn);
