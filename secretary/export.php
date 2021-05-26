<?php  
include '../config.php';
$conn = OpenCon();
mysqli_select_db($conn, 'webprogram');  
$sql = "SELECT `type`,`code`,`name`,`day`,`start_time`,`end_time` FROM `courses`";  
$setRec = mysqli_query($conn, $sql);  
$columnHeader = '';  
$columnHeader = "type" . "\t" . "Code" . "\t" . "Name" . "\t". "Day" . "\t". "Start Time" . "\t". "End Time" . "\t";  
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
header("Content-Disposition: attachment; filename=List_Of_All_Courses.xls");  
header("Pragma: no-cache");  
header("Expires: 0");  

  echo ucwords($columnHeader) . "\n" . $setData . "\n";  
 ?> 