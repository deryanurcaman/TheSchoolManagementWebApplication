<?php
// Include the database configuration file
include '../config.php';
$conn = OpenCon();

if(isset($_GET['code']))
{

  $query = $conn->query('SELECT course_materials FROM courses WHERE code = "'.$_GET["code"].'"');
  $row = $query->fetch_assoc();

  $file = '../uploads/'.$row["course_materials"];

if (file_exists($file) && !empty($row["course_materials"]))
    {
      $fsize = filesize($file);
      $path_parts = pathinfo($file);
      $ext = strtolower($path_parts["extension"]);
  
      switch ($ext) 
      {
        case "pdf": $ctype="application/pdf"; break;
        case "exe": $ctype="application/octet-stream"; break;
        case "zip": $ctype="application/zip"; break;
        case "doc": $ctype="application/msword"; break;
        case "xls": $ctype="application/vnd.ms-excel"; break;
        case "ppt": $ctype="application/vnd.ms-powerpoint"; break;
        case "gif": $ctype="image/gif"; break;
        case "png": $ctype="image/png"; break;
        case "jpeg":
        case "jpg": $ctype="image/jpg"; break;
        default: $ctype="application/force-download";
      }
  
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename='.basename($file));
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    ob_clean();
    flush();
    readfile($file);
    exit;
    }

else{
  echo '<script> alert("There is no file uploaded."); document.location="student_courses.php" </script>';
}


}

?>