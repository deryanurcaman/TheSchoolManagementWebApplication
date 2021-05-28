<?php
// Include the database configuration file
include '../config.php';
$db = OpenCon();

$statusMsg = '';

// File upload path
session_start();

$username = $_SESSION['username'];
$sql = 'SELECT * FROM students WHERE username = "' . $username . '"';
$query = mysqli_query($db, $sql);
$resultNew = mysqli_fetch_array($query);
$student_id=$resultNew['id'];

$targetDir = "../uploads/";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){
    $note=$_POST['note'];
    $token = strtok($_POST['instructor'], " ");
    $token2 = strtok(" ");

    $sql = "SELECT id FROM new_requests WHERE student_id = ' ". $student_id . "' AND instructor_id 
    IN (SELECT id FROM instructors WHERE first_name = '$token' AND last_name = '$token2')";

    $result = mysqli_query($db, $sql);


    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    $count = mysqli_num_rows($result);

    $sql2 = "SELECT id FROM research_groups WHERE student_id = ' ". $student_id . "' AND instructor_id 
    IN (SELECT id FROM instructors WHERE first_name = '$token' AND last_name = '$token2')";
    
    $result2 = mysqli_query($db, $sql2);


    $row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC);

    $count2 = mysqli_num_rows($result2);


    // If result matched $myusername and $mypassword, table row must be 1 row
    if ($count > 0) {
        echo '<script> alert("You already sent a request to this instructor"); document.location="student_joinresearch.php" </script>';
    } 
    else if($count2 > 0){
        echo '<script> alert("You already in the research group of this instructor"); document.location="student_joinresearch.php" </script>';
    }
    
    else {
        



    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg','docx','pdf');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            // Insert image file name into database
            $insert = $db->query("INSERT INTO new_requests (student_id, instructor_id, note, attachment) VALUES ('$student_id',(SELECT id FROM instructors WHERE first_name = '$token' AND last_name = '$token2'),'$note','$fileName')");
            if($insert){
                $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
                echo '<script> alert("Join request sent successfully."); document.location="student_joinresearch.php" </script>';
            }else{
                echo '<script> alert("File upload failed, please try again."); document.location="student_joinresearch.php" </script>';
                } 
        }else{
            echo '<script> alert("Sorry, there was an error uploading your file."); document.location="student_joinresearch.php" </script>';
    
        }
    }else{
        echo '<script> alert("Sorry, only JPG, JPEG, PNG, DOCX, & PDF files are allowed to upload."); document.location="student_joinresearch.php" </script>';
        
    }
}}else{
    echo '<script> alert("Please select a file to upload."); document.location="student_joinresearch.php" </script>';
   
}

?>