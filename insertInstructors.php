<?php

$conn = mysqli_connect('localhost','webuser','123456','webprogrammingproject2021');
if(!$conn){
    die ("Fail connection". mysqli_connect_error());
}


//yedek
// $sql = "INSERT INTO instructors (instructor_code, first_name, last_name, area, course_id, username, password) 
// VALUES ('340001', 'Minerva', 'McGonagall', 'Transfiguration', (SELECT id FROM courses WHERE code = 'POT78055'), 'catwoman', 'minerva340001'); ";


$sql = "INSERT INTO instructors (instructor_code, first_name, last_name, area, username, password) 
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
