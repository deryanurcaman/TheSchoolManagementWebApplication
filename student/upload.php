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

if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"]) && !empty($_POST['note'])&& !empty($_POST['instructor'])){

    $note=$_POST['note'];
    $token = strtok($_POST['instructor'], " ");
    $token2 = strtok(" ");
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
}else{
    echo '<script> alert("Please select a file to upload."); document.location="student_joinresearch.php" </script>';
   
}

?>