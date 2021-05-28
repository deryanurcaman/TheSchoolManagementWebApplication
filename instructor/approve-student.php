<?php
include '../config.php';
$conn = OpenCon();
session_start();

$student_id = $course_id = $username = '';

$username=$_SESSION['username'];
$sql1='SELECT * FROM instructors WHERE username = "'.$username.'"';
$query1 = mysqli_query($conn, $sql1);
$resultNew = mysqli_fetch_array($query1);
$instructor_id=$resultNew['id'];



$sql1='SELECT * FROM students WHERE student_id = "'.$_GET["student_id"].'"';
    $query1 = mysqli_query($conn, $sql1);
    $resultNew2 = mysqli_fetch_array($query1);
    $student_id=$resultNew2['id'];

$sqlss = "DELETE FROM new_requests WHERE student_id='".$resultNew2['id']."'";



$sql = "INSERT INTO research_groups (student_id, instructor_id)
        VALUES ('$student_id', '$instructor_id')";
            
 if (mysqli_query($conn, $sql) && mysqli_query($conn, $sqlss)) {
            echo '<script> alert("Request is approved."); window.location="instructor_research.php" </script>';
} else {
     echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

mysqli_close($conn);
