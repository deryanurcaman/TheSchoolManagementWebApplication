<?php  
include '../config.php';
$conn = OpenCon();
session_start();

$username = $_SESSION['username'];
$sql1 = 'SELECT * FROM students WHERE username = "' . $username . '"';
$query = mysqli_query($conn, $sql1);
$resultNew = mysqli_fetch_array($query);

mysqli_select_db($conn, 'webprogram');  
$sql = 'SELECT `students`.`student_id`, `students`.`first_name`, `students`.`last_name`
FROM `students` 
JOIN `my_courses` ON `my_courses`.`student_id` = `students`.`id` 
JOIN `courses` ON `courses`.`id` = `my_courses`.`course_id`
WHERE `courses`.`code` = "' .$_GET["code"] . '"';

$setRec = mysqli_query($conn, $sql);  
$columnHeader = '';  
$columnHeader = "Student ID" . "\t" . "First Name" . "\t" . "Last Name" . "\t";
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
header("Content-Disposition: attachment; filename=List_Of_Students.xls");  
header("Pragma: no-cache");  
header("Expires: 0");  

  echo ucwords($columnHeader) . "\n" . $setData . "\n";  
 ?> 