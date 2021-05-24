<?php

include 'config.php';
$conn = OpenCon();

$sql = "INSERT INTO research_groups (instructor_id, student_id) 
VALUES 
((SELECT id FROM instructors WHERE instructor_code = '340007'), (SELECT id FROM students WHERE student_id = '8101086')), 
((SELECT id FROM instructors WHERE instructor_code = '340007'), (SELECT id FROM students WHERE student_id = '8101087')),
((SELECT id FROM instructors WHERE instructor_code = '340007'), (SELECT id FROM students WHERE student_id = '8101089')),
((SELECT id FROM instructors WHERE instructor_code = '340005'), (SELECT id FROM students WHERE student_id = '8101086')),
((SELECT id FROM instructors WHERE instructor_code = '340005'), (SELECT id FROM students WHERE student_id = '8101089')),
((SELECT id FROM instructors WHERE instructor_code = '340004'), (SELECT id FROM students WHERE student_id = '8101090')),
((SELECT id FROM instructors WHERE instructor_code = '340003'), (SELECT id FROM students WHERE student_id = '8101090')),
((SELECT id FROM instructors WHERE instructor_code = '340001'), (SELECT id FROM students WHERE student_id = '8101088'));";



if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }



CloseCon($conn)
?>