<?php
include '../config.php';
$conn = OpenCon();
session_start();

$student_id = $course_id = $username = '';

$username=$_SESSION['username'];
$sql1='SELECT * FROM students WHERE username = "'.$username.'"';
$query1 = mysqli_query($conn, $sql1);
$resultNew = mysqli_fetch_array($query1);
$student_id=$resultNew['id'];

$sql2='SELECT * FROM courses WHERE code = "'.$_GET["code"].'"';
    $query2 = mysqli_query($conn, $sql2);
    $resultNew2 = mysqli_fetch_array($query2);
$course_id = $resultNew2['id'];


$sql3 = 'SELECT id FROM my_courses WHERE course_id = "'.$course_id.'" and student_id = "'.$student_id.'"';

        $result = mysqli_query($conn, $sql3);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);

        // If result matched table row must be 1 row
        if ($count == 1) {
            echo '<script> alert("You\'re already taking this course."); document.location="student_courses.php" </script>';
        } else {
            $sql = "INSERT INTO my_courses (student_id, course_id)
            VALUES ('$student_id', '$course_id')";
            
            if (mysqli_query($conn, $sql)) {
                echo '<script> alert("Course added successfully."); window.location="student_courses.php" </script>';
            } else {
              echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }

mysqli_close($conn);
?>