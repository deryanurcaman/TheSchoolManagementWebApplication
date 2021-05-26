<?php
echo "HELLO";
include '../config.php';

$sql = "DELETE FROM my_courses WHERE course_id='" . $_GET["Cid"] . "'";
if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
mysqli_close($conn);
?>