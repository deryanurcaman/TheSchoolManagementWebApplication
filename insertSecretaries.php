<?php

$conn = mysqli_connect('localhost','webuser','123456','webprogrammingproject2021');
if(!$conn){
    die ("Fail connection". mysqli_connect_error());
}



$sql = "INSERT INTO secretaries (first_name, last_name, username, password) 
VALUES ('Argus', 'Filch', 'mrsnorris', 'argus123'),
('Poppy', 'Pomfrey', 'pompom', 'poppy123'),
('Remy', 'Portchester',  'remyport', 'remy123'),
('Gladys', 'Jones',  'gjones', 'gladys123');";


if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

mysqli_close($conn);
