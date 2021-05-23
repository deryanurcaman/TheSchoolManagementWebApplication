<?php

$conn = mysqli_connect('localhost','webuser','123456','webprogrammingproject2021');
if(!$conn){
    die ("Fail connection". mysqli_connect_error());
}



$sql = "INSERT INTO secretaries (first_name, last_name, username, password) 
VALUES ('Argus', 'Filch', 'mrsnorris', '12345'),
('Poppy', 'Pomfrey', 'pompom', '12345'),
('Remy', 'Portchester',  'remyport', '12345'),
('Gladys', 'Jones',  'gjones', '12345'),
('Duncan', 'Flockton',  NULL, NULL),
('Avery', 'Burke',  NULL, NULL),
('Angelica', 'Karume',  NULL, NULL),
('Fiona', 'James',  NULL, NULL);";


if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

mysqli_close($conn);
