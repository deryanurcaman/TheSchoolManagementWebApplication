<?php
include '../config.php';
$conn = OpenCon();
$sql = "DELETE FROM courses WHERE code='" . $_GET["code"] . "'";
if (mysqli_query($conn, $sql)) {
    header('Location: http://localhost/WebProgrammingProject/secretary/secretary_courses.php');
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
mysqli_close($conn);
?>