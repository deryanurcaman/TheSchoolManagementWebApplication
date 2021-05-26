<?php
include 'config.php';
$conn = OpenCon();

// yedek
// $sql = "INSERT INTO courses (code, name, type, start_time, end_time) 
// VALUES ('POT78055', 'Potions', 'Mandatory', CAST('2021-05-12 00:00:00' AS datetime), CAST('2021-05-14 00:00:00' AS datetime)),
// ('HIS89407', 'History of Magic', 'Mandatory', CAST('2021-05-12 00:00:00' AS datetime), CAST('2021-05-14 00:00:00' AS datetime)),
// ('CMC46702', 'Care of Magical Creatures', 'Elective', CAST('2021-05-12 00:00:00' AS datetime), CAST('2021-05-14 00:00:00' AS datetime)),
// ('DDA95832', 'Defence Against the Dark Arts', 'Mandatory', CAST('2021-05-12 00:00:00' AS datetime), CAST('2021-05-14 00:00:00' AS datetime)),
// ('FLY66582', 'Flying', 'Mandatory', CAST('2021-05-12 00:00:00' AS datetime), CAST('2021-05-14 00:00:00' AS datetime)),
// ('HRB61429', 'Herbology', 'Mandatory', CAST('2021-05-12 00:00:00' AS datetime), CAST('2021-05-14 00:00:00' AS datetime)),
// ('SAR46609', 'Study of Ancient Runes', 'Elective', CAST('2021-05-12 00:00:00' AS datetime), CAST('2021-05-14 00:00:00' AS datetime)),
// ('MGT13472', 'Magical Theory', 'Elective', CAST('2021-05-12 00:00:00' AS datetime), CAST('2021-05-14 00:00:00' AS datetime)); ";



// $sql = "INSERT INTO courses (code, name, type, start_time, end_time, instructor_id, instructor_name, instructor_surname) 
// VALUES 
// ('POT78055', 'Potions', 'Mandatory', CAST('2021-05-12 00:00:00' AS datetime), CAST('2021-05-14 00:00:00' AS datetime), (SELECT id FROM instructors WHERE instructor_code = '340003'), (SELECT first_name FROM instructors WHERE instructor_code = '340003'), (SELECT last_name FROM instructors WHERE instructor_code = '340003')),
// ('HIS89407', 'History of Magic', 'Mandatory', CAST('2021-05-12 00:00:00' AS datetime), CAST('2021-05-14 00:00:00' AS datetime), (SELECT id FROM instructors WHERE instructor_code = '340008'), (SELECT first_name FROM instructors WHERE instructor_code = '340008'), (SELECT last_name FROM instructors WHERE instructor_code = '340008')),
// ('CMC46702', 'Care of Magical Creatures', 'Elective', CAST('2021-05-12 00:00:00' AS datetime), CAST('2021-05-14 00:00:00' AS datetime), (SELECT id FROM instructors WHERE instructor_code = '340006'), (SELECT first_name FROM instructors WHERE instructor_code = '340006'), (SELECT last_name FROM instructors WHERE instructor_code = '340006')),
// ('DDA95832', 'Defence Against the Dark Arts', 'Mandatory', CAST('2021-05-12 00:00:00' AS datetime), CAST('2021-05-14 00:00:00' AS datetime), (SELECT id FROM instructors WHERE instructor_code = '340008'), (SELECT first_name FROM instructors WHERE instructor_code = '340008'), (SELECT last_name FROM instructors WHERE instructor_code = '340008')),
// ('FLY66582', 'Flying', 'Mandatory', CAST('2021-05-12 00:00:00' AS datetime), CAST('2021-05-14 00:00:00' AS datetime), (SELECT id FROM instructors WHERE instructor_code = '340005'), (SELECT first_name FROM instructors WHERE instructor_code = '340005'), (SELECT last_name FROM instructors WHERE instructor_code = '340005')),
// ('HRB61429', 'Herbology', 'Mandatory', CAST('2021-05-12 00:00:00' AS datetime), CAST('2021-05-14 00:00:00' AS datetime), (SELECT id FROM instructors WHERE instructor_code = '340003'), (SELECT first_name FROM instructors WHERE instructor_code = '340003'), (SELECT last_name FROM instructors WHERE instructor_code = '340003')),
// ('SAR46609', 'Study of Ancient Runes', 'Elective', CAST('2021-05-12 00:00:00' AS datetime), CAST('2021-05-14 00:00:00' AS datetime), (SELECT id FROM instructors WHERE instructor_code = '340007'), (SELECT first_name FROM instructors WHERE instructor_code = '340007'), (SELECT last_name FROM instructors WHERE instructor_code = '340007')),
// ('MGT13472', 'Magical Theory', 'Elective', CAST('2021-05-12 00:00:00' AS datetime), CAST('2021-05-14 00:00:00' AS datetime), (SELECT id FROM instructors WHERE instructor_code = '340002'), (SELECT first_name FROM instructors WHERE instructor_code = '340002'), (SELECT last_name FROM instructors WHERE instructor_code = '340002')); ";


$sql = "INSERT INTO courses (code, name, type, day, start_time, end_time, instructor_id) 
VALUES 
('POT78055', 'Potions', 'Mandatory', 'Monday', CAST('09:00' AS time), CAST('11:00' AS time), (SELECT id FROM instructors WHERE instructor_code = '340003')),
('HIS89407', 'History of Magic', 'Mandatory', 'Tuesday', CAST('12:00' AS time), CAST('14:00' AS time), (SELECT id FROM instructors WHERE instructor_code = '340008')),
('CMC46702', 'Care of Magical Creatures', 'Elective', 'Tuesday', CAST('08:00' AS time), CAST('10:00' AS time), (SELECT id FROM instructors WHERE instructor_code = '340006')),
('DDA95832', 'Defence Against the Dark Arts', 'Mandatory','Friday', CAST('14:00' AS time), CAST('16:00' AS time), (SELECT id FROM instructors WHERE instructor_code = '340008')),
('FLY66582', 'Flying', 'Mandatory', 'Wednesday', CAST('13:00' AS time), CAST('15:00' AS time), (SELECT id FROM instructors WHERE instructor_code = '340005')),
('HRB61429', 'Herbology', 'Mandatory', 'Monday', CAST('13:00' AS time), CAST('15:00' AS time), (SELECT id FROM instructors WHERE instructor_code = '340003')),
('SAR46609', 'Study of Ancient Runes', 'Elective', 'Friday', CAST('17:00' AS time), CAST('19:00' AS time), (SELECT id FROM instructors WHERE instructor_code = '340007')),
('MGT13472', 'Magical Theory', 'Elective', 'Thursday', CAST('10:00' AS time), CAST('13:00' AS time), (SELECT id FROM instructors WHERE instructor_code = '340002')); ";


if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

mysqli_close($conn);
