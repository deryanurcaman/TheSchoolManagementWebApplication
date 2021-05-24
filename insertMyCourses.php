<?php

include 'config.php';
$conn = OpenCon();

$sql = "INSERT INTO my_courses (student_id, course_id) 
VALUES 
((SELECT id FROM students WHERE student_id = '8101086'), (SELECT id FROM courses WHERE code = 'POT78055')), 
((SELECT id FROM students WHERE student_id = '8101086'), (SELECT id FROM courses WHERE code = 'HIS89407')),
((SELECT id FROM students WHERE student_id = '8101086'), (SELECT id FROM courses WHERE code = 'FLY66582')),
((SELECT id FROM students WHERE student_id = '8101088'), (SELECT id FROM courses WHERE code = 'POT78055')),
((SELECT id FROM students WHERE student_id = '8101091'), (SELECT id FROM courses WHERE code = 'MGT13472')),
((SELECT id FROM students WHERE student_id = '8101089'), (SELECT id FROM courses WHERE code = 'MGT13472'));";



if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }



CloseCon($conn)
?>