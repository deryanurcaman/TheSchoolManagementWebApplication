<?php
include '../config.php';
$conn = OpenCon();

$sql1='SELECT * FROM courses WHERE code = "'.$_GET["code"].'"';
    $query1 = mysqli_query($conn, $sql1);
    $resultNew = mysqli_fetch_array($query1);

$sql = "DELETE FROM courses WHERE code='" . $_GET["code"] . "'";
$sql2 = "DELETE FROM my_courses WHERE course_id='" . $resultNew["id"] . "'";

if (mysqli_query($conn, $sql) && mysqli_query($conn, $sql2)) {
    header('Location: http://localhost/WebProgrammingProject/secretary/secretary_courses.php');
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
mysqli_close($conn);
?>