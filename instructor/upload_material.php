<?php
// Include the database configuration file
include '../config.php';
$db = OpenCon();

$statusMsg = '';

// File upload path

if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){
$targetDir = "../uploads/";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg','docx','pdf');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            // Insert image file name into database
            $insert = $db->query("UPDATE courses SET course_materials='$fileName' WHERE code = " .$_GET["code"] . "");
            if($insert){
                $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
                echo '<script> alert("Join request sent successfully."); document.location="instructor_courses.php" </script>';
            }else{
                echo '<script> alert("File upload failed, please try again."); document.location="instructor_courses.php" </script>';
                } 
        }else{
            echo '<script> alert("Sorry, there was an error uploading your file."); document.location="instructor_courses.php" </script>';
    
        }
    }else{
        echo '<script> alert("Sorry, only JPG, JPEG, PNG, DOCX, & PDF files are allowed to upload."); document.location="instructor_courses.php" </script>';
        
    }
}else{
    echo '<script> alert("Please select a file to upload.");  </script>';
   
}

?>