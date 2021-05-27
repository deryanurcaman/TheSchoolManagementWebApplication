<?php  
include '../config.php';
$conn = OpenCon();
session_start();

$username = $_SESSION['username'];
$sql1 = 'SELECT * FROM students WHERE username = "' . $username . '"';
$query = mysqli_query($conn, $sql1);
$resultNew = mysqli_fetch_array($query);

mysqli_select_db($conn, 'webprogram');  
$sql = 'SELECT `type`,`code`,`name`,`instructors`.`first_name`, `instructors`.`last_name`, `day`,`start_time`,`end_time`
FROM `courses` 
JOIN `my_courses` ON `my_courses`.`course_id` = `courses`.`id` 
JOIN `instructors` ON `courses`.`instructor_id` = `instructors`.`id`
JOIN `students` ON `my_courses`.`student_id` = `students`.`id`
WHERE `students`.`id` = "' . $resultNew['id'] . '"';

$setRec = mysqli_query($conn, $sql);  
$columnHeader = '';  
$columnHeader = "Type" . "\t" . "Code" . "\t" . "Name" . "\t". "Instructor Name" . "\t" .  "Instructor Surname" . "\t" . "Day" . "\t". "Start Time" . "\t". "End Time" . "\t";
$setData = '';  
  while ($rec = mysqli_fetch_row($setRec)) {  
    $rowData = '';  
    foreach ($rec as $value) {  
        $value = '"' . $value . '"' . "\t";  
        $rowData .= $value;  
    }  
    $setData .= trim($rowData) . "\n";  
}  
  
header("Content-type: application/octet-stream");  
header("Content-Disposition: attachment; filename=List_Of_Courses.xls");  
header("Pragma: no-cache");  
header("Expires: 0");  

  echo ucwords($columnHeader) . "\n" . $setData . "\n";  
 ?> 