<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="student_joinresearch.css">
    <title>Student Join a Research Group</title>
</head>

<!-- <script>
    function save() {
        alert("The Request Is Successfully Sent");
    }
</script> -->

<?php
include '../config.php';
$conn = OpenCon();

$sqlString = "SELECT * FROM instructors;";
$query = mysqli_query($conn, $sqlString);
$rows = array();
while ($result = mysqli_fetch_array($query)) {
    $rows[] = $result;
}

session_start();

$username = $_SESSION['username'];
$sql = 'SELECT * FROM students WHERE username = "' . $username . '"';
$query = mysqli_query($conn, $sql);
$resultNew = mysqli_fetch_array($query);



$instructor = $file = $note = '';        // initialize with empty string
if (isset($_POST["submit"])) {

    // Allow certain file formats
    $allowTypes = array('jpg', 'png', 'jpeg', 'docx', 'pdf');

    $instructor = $_POST['instructor'];

    $student_id = $resultNew['id'];

    $token = strtok($_POST['instructor'], " ");
    $token2 = strtok(" ");

    $note = $_POST['note'];

    $file = $_POST['file'];

    if (!empty($_FILES["file"]["name"])) {
        $targetDir = "../uploads/";
        $fileName = basename($_FILES["file"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
        if (in_array($fileType, $allowTypes)) {
            // Upload file to server
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
                // Insert image file name into database
                $insert = $conn->query("INSERT INTO new_requests (student_id, instructor_id, note, attachment) VALUES ('$student_id',(SELECT id FROM instructors WHERE first_name = '$token' AND last_name = '$token2'),'$note','$fileName')");

                // $sql = 'SELECT id FROM ' . $table_name . ' WHERE username = "' . $username . '" and password = "' . $password . '"';

                // $result = mysqli_query($conn, $sql);


                // $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                // $count = mysqli_num_rows($result);

                // // If result matched $myusername and $mypassword, table row must be 1 row
                // if ($count == 1) {
                //     $_SESSION['username'] = $username;
                //     header("location: http://localhost/" . $page_uri);
                // } else {
                //     $errors['check'] = "Your Login Name or Password is invalid";
                // }



                if ($insert) {
                    $statusMsg = "The file " . $fileName . " has been uploaded successfully.";
                    echo '<script> alert("Join request sent successfully."); document.location="student_joinresearch.php" </script>';
                } else {
                    echo '<script> alert("File upload failed, please try again."); document.location="student_joinresearch.php" </script>';
                }
            } else {
                echo '<script> alert("Sorry, there was an error uploading your file."); document.location="student_joinresearch.php" </script>';
            }
        } else {
            echo '<script> alert("Sorry, only JPG, JPEG, PNG, DOCX, & PDF files are allowed to upload."); document.location="student_joinresearch.php" </script>';
        }
    }
    if (empty($_FILES["file"]["name"])) {
        $insert = $conn->query("INSERT INTO new_requests (student_id, instructor_id, note) VALUES ('$student_id',(SELECT id FROM instructors WHERE first_name = '$token' AND last_name = '$token2'),'$note')");
    }
}

?>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Domine&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Stalemate&display=swap');

    body {
        font-family: 'Domine', serif;
    }

    strong {
        font-family: 'Domine', serif;
        font-size: 25px;
    }

    body b {
        font-family: 'Stalemate', cursive;
        font-size: 50px;
    }
</style>

<body>
    <!-- Side navigation -->
    <div class="sidenav">
        <div><img src="../assets/hogwarts_logo.png" height="180px" style="opacity: 0.8;"></img>
        </div>

        <br>
        <strong style="text-align:center;">Student <br><b><?php echo $resultNew['first_name'] . ' ' . $resultNew['last_name']; ?></b></strong>


        <hr style="border-color: white;">

        <table id="tablenavbar">
            <tr id="hv">
                <td>
                    <a href="http://localhost/WebProgrammingProject/student/student_mainpage.php"><img src="../assets/home.png" height="50px" alt=""></a>
                </td>

                <td> <a id="icon1" href="http://localhost/WebProgrammingProject/student/student_mainpage.php">Main Page</a>
                </td>
            </tr>
            <tr id="hv">
                <td>
                    <a href="http://localhost/WebProgrammingProject/student/student_courses.php"><img src="../assets/courses.png" height="50px" alt=""></a>
                </td>

                <td> <a id="icon2" href="http://localhost/WebProgrammingProject/student/student_courses.php">Courses</a>
                </td>
            </tr>
            <tr id="hv">
                <td>
                    <a href="http://localhost/WebProgrammingProject/student/student_joinresearch.php"><img src="../assets/researchgroups.png" height="50px" alt=""></a>
                </td>

                <td> <a id="icon3" href="http://localhost/WebProgrammingProject/student/student_joinresearch.php">Join a Research Group</a>
                </td>
            </tr>
            <tr id="hv">
                <td>
                    <a href="http://localhost/WebProgrammingProject/mainpage/logout.php"><img src="../assets/logout.png" height="50px" alt=""></a>
                </td>

                <td><a id="icon4" href="http://localhost/WebProgrammingProject/mainpage/logout.php">Log Out</a></td>
            </tr>
        </table>


    </div>

    <div class="dropdown">
        <button class="dropbtn">Select</button>
        <div class="dropdown-content">
            <a href="#">Instructors</a>
            <a href="#Join">Join a Research Group</a>
        </div>
    </div>
    <br>

    <div class="main">

        <div class="Instructors_requests">
            <h1>Instructors and Their Areas</h1><br>
            <table>
                <tr id="heads">
                    <th id="hashtag">#</th>
                    <th>First Name</th>
                    <th>Surname</th>
                    <th>Area</th>
                </tr>
                <?php
                foreach ($rows as $row) {
                    echo
                    '<tr>
                                <td> ' . $row['id'] . '</td>
                                <td> ' . $row['first_name'] . '</td>
                                <td> ' . $row['last_name'] . '</td>
                                <td> ' . $row['area'] . ' </td>
                            </tr>';
                }
                ?>
            </table>

        </div>
        <br><br>

        <div class="Instructors_requests" id="Join">
            <h1 style="text-align: center;">Join a Research Group</h1>
            <hr><br>

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                <p><label id="text_input">Course Instructor:</label>
                    <select name="instructor" class="select">
                        <?php
                        foreach ($rows as $row) {
                            echo '
                        <option> ' . $row['first_name'] . ' ' . $row['last_name'] . ' </option>
                        ';
                        }
                        ?>
                    </select>
                <div style="color: red;">

                    <br><br>
                    <hr><br>
                    <p><label id="text_input" for="">Note:</label><br>
                        <textarea name="note" id="textarea" cols="44" rows="10" placeholder="Please enter your note"></textarea>
                    </p>


                    <br>
                    <hr>

                    <p><label id="text_input" for="">Attach Your File:</label>
                        <input type="file" id="up" name="file" required hidden />
                        <label for="up"><img id="upload" src="../assets/upload.png" alt=""></label>
                    </p>

                    <br><br>
                    <button onclick="save()" id="submit" type="submit" name="submit">Send</button>

            </form>
        </div>
    </div>
</body>

</html>