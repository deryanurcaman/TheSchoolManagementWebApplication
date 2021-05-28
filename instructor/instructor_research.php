<?php
include '../config.php';
$conn = OpenCon();
$username = '';
session_start();

$username = $_SESSION['username'];
$sql = 'SELECT * FROM instructors WHERE username = "' . $username . '"';
$query = mysqli_query($conn, $sql);
$result = mysqli_fetch_array($query);

$sqlString = "SELECT DISTINCT students.student_id AS st, students.first_name,students.last_name,students.gpa,students.class,research_groups.instructor_id, instructors.id, research_groups.student_id, students.id
    FROM research_groups 
        LEFT JOIN instructors ON research_groups.instructor_id = instructors.id 
        LEFT JOIN students ON research_groups.student_id = students.id
        WHERE " . $result['id'] . "=instructors.id";

$query2 = mysqli_query($conn, $sqlString);
$rows = array();
while ($result2 = mysqli_fetch_array($query2)) {

    $rows[] = $result2;
}

$requests = "SELECT DISTINCT new_requests.student_id AS stid, new_requests.note
FROM  new_requests
    LEFT JOIN instructors ON new_requests.instructor_id =". $result['id'] . ";";
$query4 = mysqli_query($conn, $requests);
$rows4 = array();
while ($result4 = mysqli_fetch_array($query4)) {

    $rows4[] = $result4;
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../instructor/instructor_research.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Stalemate&display=swap" rel="stylesheet">
    <title> Instructor Research Groups </title>

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

</head>

<script>
    function approve() {
        alert("The Request Is Accepted");
    }

    function reject() {
        alert("The Request Is Declined");
    }

    function download_file() {
        alert("The File Is Successfully Downloaded");
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

    <div class="dropdown">
        <button class="dropbtn">Select</button>
        <div class="dropdown-content">
            <a href="#">Research Group Students</a>
            <a href="#NewRequests">New Requests</a>
        </div>
    </div>
    <br>

    <div class="main">
        <div class="groupstudents" id="#ResearchGroupStudents">
            <h1>Research Group Students</h1><br>
            <table>
                <tr id="heads">
                    <th id="hashtag">#</th>
                    <th>Student ID</th>
                    <th>Student Name</th>
                    <th>GPA</th>
                    <th>Class</th>
                    <th>Courses taken in the active semester</th>
                </tr>

                <?php
                $i = 1;
                foreach ($rows as $row) {

                    $qq ='SELECT `courses`.`id`, `my_courses`.`course_id`, `my_courses`.`student_id`, `students`.`id`, `courses`.`name` 
                    FROM `courses` 
                        LEFT JOIN `my_courses` ON `my_courses`.`course_id` = `courses`.`id` 
                        LEFT JOIN `students` ON `my_courses`.`student_id` = `students`.`id`
                        WHERE `students`.`student_id` = ' . $row['st'] . '
                        ';
                    $query3 = mysqli_query($conn, $qq);
                    $rows2 = array();
                
                    while ($result3 = mysqli_fetch_array($query3)) {
                    $rows2[] = $result3;
                    }

                    echo
                    '
                <tr>
                    <td id="hashtag">' . $i . '</td>
                    <td>' . $row['st'] . '</td>
                    <td>' . $row['first_name'] . '  ' . $row['last_name'] . '</td>
                    <td>' . $row['gpa'] . '</td>
                    <td>' . $row['class'] . '</td>
                    <td id="fixed">
                        <ul id="courses">';
                    foreach ($rows2 as $row2) {
                        echo
                        '
                            <li>' . $row2['name'] . '</li>';
                    }
                    '
                        </ul>
                    </td>
                </tr>
            ';
                    $i = $i + 1;
                }
                ?>
            </table>
        </div>


        <div class="requests" id="NewRequests">
            <h1>New Requests</h1>
            <table>
                <tr id="heads">
                    <th>Decision</th>
                    <th>Request Number</th>
                    <th id="research_student">Student</th>
                    <th id="research_note">Note</th>
                    <th>Attachment</th>
                </tr>

                <?php $j=1;
            foreach ($rows4 as $row) {
                $aaaa ="SELECT students.student_id, students.first_name , students.last_name, students.class
                    FROM students 
                        LEFT JOIN new_requests ON new_requests.student_id =students.id 
                        WHERE students.id = " . $row['stid'] . " AND new_requests.instructor_id= ".$result['id']."
                        ";
                    $query5 = mysqli_query($conn, $aaaa);
                    $rows5 = array();
                    while ($result5 = mysqli_fetch_array($query5)) {
                    $rows5[] = $result5;
                    } foreach ($rows5 as $roww) {
                ?>
                <tr>
                    <td>
                        <a href="approve-student.php?student_id=<?php echo $roww["student_id"]; ?>"><button id="decision"><img src="../assets/approved.png" alt=""></button></a>
                        <a href="reject-student.php?student_id=<?php echo $roww["student_id"]; ?>"><button  id="decision"><img src="../assets/reject.png" alt=""></button></a>
                    </td>
                    <td><?php echo $j; ?></td>
                    <td id="research_student">
                        <ul>
                            <li>ID: <?php echo $roww["student_id"]; ?></li>
                            <li><?php echo $roww["first_name"].' '. $roww["last_name"]; ?></li>
                            <li>Class: <?php echo $roww["class"]; ?></li>
                        </ul>
                    </td>
                    <td id="research_note"><?php echo $row["note"]; ?></td>
                    <td><a href="download_attachment.php?student_id=<?php echo $roww["student_id"]; ?>"><img title="Download" id="download" src="../assets/download.png" height="50px" alt=""></a></td>
                </tr>

                <?php $j=$j+1;}} ?>
                
            </table>
        </div>
    </div>
</body>

</html>