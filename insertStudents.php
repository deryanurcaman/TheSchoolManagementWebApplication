<?php

include 'config.php';
$conn = OpenCon();

// example students

$sql = "INSERT INTO students (student_id, first_name, last_name, gpa, class, username, password) 
VALUES ('8101086', 'Colin', 'Creevey', '2.68', '1', 'colinc', '12345'),
('8101087','Seamus', 'Finnigan','2.37', '2', 'seafin', '12345'),
('8101088','Hannah', 'Abbott', '3.25', '4', 'hannahabb', '12345'),
('8101089','Pansy', 'Parkinson', '2.97', '3', 'pansypar', '12345'),
('8101090','Blaise', 'Zabini', '2.89', '1', 'blaiz', '12345'),
('8101091','Zacharias', 'Smith', '3.28', '2', 'zsmith', '12345');";


if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

mysqli_close($conn);