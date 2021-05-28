<?php
include '../config.php';
$conn = OpenCon();
$username = '';
session_start();

$username = $_SESSION['username'];
$sql = 'SELECT * FROM instructors WHERE username = "' . $username . '"';
$query = mysqli_query($conn, $sql);
$result = mysqli_fetch_array($query);

$sqlString = "SELECT *, courses.id AS cid FROM courses WHERE courses.instructor_id=" . $result['id'] . "";
$query2 = mysqli_query($conn, $sqlString);
$rows = array();
while ($result2 = mysqli_fetch_array($query2)) {
    $rows[] = $result2;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="instructor_courses.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Charmonman:wght@700&display=swap" rel="stylesheet">
    <title>Instructor Courses</title>
</head>
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

<script>
    function download_file() {
        alert("The File Is Successfully Downloaded");
    }

    function submit_file() {
        alert("The File Is Successfully Submitted");
    }
</script>

<body>
    <!-- Side navigation -->
    <div class="sidenav">
        <div><img src="../assets/hogwarts_logo.png" height="180px" style="opacity: 0.8;"></img>
        </div>
        <br>
        <strong style="text-align:center;">Instructor <br><b><?php echo $result['first_name'] . ' ' . $result['last_name']; ?></b></strong>


        <hr style="border-color: white;">

        <table id="tablenavbar">
            <tr id="hv">
                <td>
                    <a href="http://localhost/WebProgrammingProject/instructor/instructor_mainpage.php"><img height="50px" src="../assets/home.png" alt=""></a>
                </td>
                <td> <a id="icon1" href="http://localhost/WebProgrammingProject/instructor/instructor_mainpage.php">Main Page</a>
                </td>
            </tr>
            <tr id="hv">
                <td>
                    <a href="http://localhost/WebProgrammingProject/instructor/instructor_courses.php"><img height="50px" src="../assets/courses.png" alt=""></a>
                </td>
                <td> <a id="icon2" href="http://localhost/WebProgrammingProject/instructor/instructor_courses.php">Courses</a>
                </td>
            </tr>
            <tr id="hv">
                <td>
                    <a href="http://localhost/WebProgrammingProject/instructor/instructor_research.php"><img height="50px" src="../assets/researchgroups.png" alt=""></a>
                </td>
                <td> <a id="icon3" href="http://localhost/WebProgrammingProject/instructor/instructor_research.php">Research Group</a>
                </td>
            </tr>
            <tr id="hv">
                <td>
                    <a href="http://localhost/WebProgrammingProject/mainpage/logout.php"><img height="50px" src="../assets/logout.png" alt=""></a>
                </td>
                <td><a id="icon4" href="http://localhost/WebProgrammingProject/mainpage/logout.php">Log Out</a></td>
            </tr>
        </table>
    </div>

    <!-- Page content -->
    <div class="main">
        <div class="allCourses">
            <h1>Courses</h1>
            <?php
            foreach ($rows as $row) {

                $sql22 = "SELECT course_id, COUNT(student_id) FROM my_courses WHERE course_id = ".$row['cid']." GROUP BY course_id";
                $no_Of_Students = mysqli_query($conn, $sql22);
                $no_Of_Students = mysqli_fetch_assoc($no_Of_Students);



                $token = strtok($row['start_time'], ":");
                $token2 = strtok(":");
                $token3 = strtok($row['end_time'], ":");
                $token4 = strtok(":");
                ?>
            <div class="courselist">
                <form action="upload_material.php" method="post" enctype="multipart/form-data">
                    <table>
                        <tr>
                            <td><a href="export.php?code=<?php echo $row["code"]; ?>"><img id="download" src="../assets/download.png" alt=""></td>
                            <td><input type="file" id="up" name="file" hidden/>
                                <label for="up"><img id="upload" src="../assets/upload.png" alt=""></a></label>
                                <input type="submit" name="submit" id="sub" hidden/>
                                <label for="sub"><?php $_SESSION['code'] = $row["code"];?><img src="../assets/submit.png" alt="" id="submit" name="submit" title="Submit File"></label>
                            </td>
                        </tr>
                        <tr>
                            <td> Download list of students</td>
                            <td>Upload class material</td>
                        </tr>
                    </table>
                </form>

                <ul>
                    <li class="classtype"><?php echo $row["type"]; ?></li>
                    <li class="classcode"><?php echo $row["code"]; ?></li>
                    <li class="classname"><?php echo $row["name"]; ?></li>
                    <li class="classname">Number of Students: <?php
                    
                    if(empty($no_Of_Students['COUNT(student_id)'])){
                        $no_Of_Students['COUNT(student_id)']=0;
                    }
                    
                    echo $no_Of_Students['COUNT(student_id)']; ?></li>
                    <li span style="color:rgb(61, 0, 0);"> <?php echo 'Day: ' . $row['day']; ?></li>
                    <li span style="color:rgb(61, 0, 0);"> <?php echo ' Time: ' . $token.':'.$token2 . ' - ' . $token3.':'.$token4  . ''; ?></li>              
                </ul>
            </div>
            <?php
        }
            
        ?>

        </div>

    </div>

</body>

</html>