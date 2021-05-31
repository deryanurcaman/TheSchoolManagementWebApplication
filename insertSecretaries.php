<?php

include 'config.php';
$conn = OpenCon();

// example secretaries

$sql = "INSERT INTO secretaries (first_name, last_name, username, password) 
VALUES ('Argus', 'Filch', 'mrsnorris', '12345'),
('Poppy', 'Pomfrey', 'pompom', '12345'),
('Remy', 'Portchester',  'remyport', '12345'),
('Gladys', 'Jones',  'gjones', '12345');";


if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

mysqli_close($conn);
