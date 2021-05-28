<?php
include '../config.php';
$conn = OpenCon();
$sql1='SELECT * FROM students WHERE student_id = "'.$_GET["student_id"].'"';
    $query1 = mysqli_query($conn, $sql1);
    $resultNew = mysqli_fetch_array($query1);

$sql = "DELETE FROM new_requests WHERE student_id='".$resultNew['id']."'";
if (mysqli_query($conn, $sql)) {
    echo '<script> alert("Request is rejected."); document.location="instructor_research.php" </script>';
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
mysqli_close($conn);
?>