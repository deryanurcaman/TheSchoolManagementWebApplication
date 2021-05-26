<?php  
include '../config.php';
$conn = OpenCon();
mysqli_select_db($conn, 'webprogram');  
$sql = "SELECT `type`,`code`,`name` FROM `courses`";  
$setRec = mysqli_query($conn, $sql);  
$columnHeader = '';  
$columnHeader = "type" . "\t" . "Code" . "\t" . "Name" . "\t";  
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
header("Content-Disposition: attachment; filename=Course_Materials.xls");  
header("Pragma: no-cache");  
header("Expires: 0");  

  echo ucwords($columnHeader) . "\n" . $setData . "\n";  
 ?> 