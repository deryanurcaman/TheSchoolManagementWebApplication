<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="student_courses.css">
    <title>Student Courses</title>
</head>

<script>
    function add_course() {
        alert("The Course Is Successfully Added");
    }

    function download_file() {
        alert("The Class Materials Is Successfully Downloaded");
    }

    function drop_course() {
        alert("The Course Is Successfully Dropped");
    }

    function download_courses() {
        alert("The List Of All Courses Is Successfully Downloaded");
    }
</script>

<?php 
$conn = mysqli_connect('localhost','webuser','123456','webprogrammingproject2021');
if(!$conn){
    die ("Fail". mysqli_connect_error());
}
$sqlString = "SELECT * FROM courses INNER JOIN instructors ON courses.instructor_id=instructors.id;";
$query = mysqli_query($conn, $sqlString);
$rows = array();
while($result = mysqli_fetch_array($query))
{
    $rows[] = $result;
}

$sqlString2 = "SELECT * FROM students, courses, instructors WHERE courses.instructor_id=instructors.id AND students.course_id=courses.id;";
$query2 = mysqli_query($conn, $sqlString2);
$rows2 = array();
while($result2 = mysqli_fetch_array($query2))
{
    $rows2[] = $result2;
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
        <strong style="text-align:center;">Student <br><b>Luna Lovegood</b></strong>


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
                    <a href="http://localhost/WebProgrammingProject/mainpage/login.php"><img src="../assets/logout.png" height="50px" alt=""></a>
                </td>

                <td><a id="icon4" href="http://localhost/WebProgrammingProject/mainpage/login.php">Log Out</a></td>
            </tr>
        </table>


    </div>

    <div class="dropdown">
        <button style="margin-top: unset; height: unset;" class="dropbtn">Select</button>
        <div class="dropdown-content">
            <a href="#">All Available Courses</a>
            <a href="#MyCourses">My Courses</a>
        </div>
    </div>
    <br>

    
    <!-- Page content -->
    <div class="main">
        <h1>All Available Courses</h1>

    <?php 
    foreach($rows as $row){
    echo'
        <div class="courselist">
            <form action="">
                <table>
                    <tr>
                        <td>
                            <button onclick="add_course()">Add</button>


                            <button onclick="download_file()">Download Class Materials<img src="" alt=""></button> </td>
                    </tr>
                </table>
            </form>
            <ul>
                            <li class="classtype">'.$row['type'].'</li>
                            <li class="classcode">'.$row['code'].'</li>
                            <li class="classname">'.$row['name'].'</li>
                            <li span style="font-weight:bolder;">Instructor: '.$row['first_name'].' '. $row['last_name'].'</li>
                            <li span style="color:rgb(61, 0, 0);">Time: '.$row['start_time'].' - '. $row['end_time'].'</li>
            </ul>
        </div>';
    }
    ?>


    </div>
    <div class="main" id="MyCourses">
        <h1 style="float: left;">My Courses</h1>
        <br>
        <div id="outer">
            <div class="inner">
                <button style="margin-top: unset;;" onclick="download_courses()">Download The List of Courses</button>
            </div>
        </div>
        <?php foreach($rows2 as $row){ echo'
        <div class="courselist">
            <form action="">
                <table>
                    <tr>
                        <td>
                            <button onclick="drop_course()">Drop</button>

                            <button onclick="download_file()">Download Class Materials<img src="" alt=""></button> </td>
                    </tr>
                </table>
            </form>
            <ul>
                            <li class="classtype">'.$row['type'].'</li>
                            <li class="classcode">'.$row['code'].'</li>
                            <li class="classname">'.$row['name'].'</li>
                            <li span style="font-weight:bolder;">Instructor: '.$row['first_name'].' '. $row['last_name'].'</li>
                            <li span style="color:rgb(61, 0, 0);">Time: '.$row['start_time'].' - '. $row['end_time'].'</li>
            </ul>
        </div>';
        }
        ?>
    </div>


</body>

</html>