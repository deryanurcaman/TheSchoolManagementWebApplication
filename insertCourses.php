<?php
include 'config.php';
$conn = OpenCon();

// example courses

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
