<?php

$conn = mysqli_connect('localhost','webuser','123456','webprogrammingproject2021');
if(!$conn){
    die ("Fail connection". mysqli_connect_error());
}


//yedek
// $sql = "INSERT INTO instructors (instructor_code, first_name, last_name, area, course_id, username, password) 
// VALUES ('340001', 'Minerva', 'McGonagall', 'Transfiguration', (SELECT id FROM courses WHERE code = 'POT78055'), 'catwoman', 'minerva340001'); ";


$sql = "INSERT INTO instructors (instructor_code, first_name, last_name, area, username, password) 
VALUES ('340001', 'Minerva', 'McGonagall', 'Transfiguration', 'catwoman', '12345'),
('340002', 'Filius', 'Flitwick', 'Xylomancy', 'minimum', '12345'),
('340003', 'Severus', 'Snape', 'Potions', 'oilhead', '12345'),
('340004', 'Pomona', 'Sprout', 'Herbology', 'lettuce', '12345'),
('340005', 'Madame', 'Hooch', 'Charms', 'cactus', '12345'),
('340006', 'Horace', 'Slughorn', 'Astronomy', 'smiley', '12345'),
('340007', 'Sybill', 'Trelawney', 'Divination', 'iseefuture', '12345'),
('340008', 'Remus', 'Lupin', 'Defence Against the Dark Arts', 'moony', '12345'),
('340009', 'Aurora', 'Sinistra', 'Muggle Studies', NULL, NULL),
('340010', 'Wilhelmina', 'Plank', 'Care of Magical Creatures', NULL, NULL),
('340011', 'Dolores', 'Umbridge', 'Ghoul Studies', NULL, NULL),
('340012', 'Gilderoy', 'Lockhart', 'Muggle Music', NULL, NULL);";


if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

mysqli_close($conn);
