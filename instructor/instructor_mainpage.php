<?php
include '../config.php';
$conn = OpenCon();
$username='';
session_start();

    $username=$_SESSION['username'];
    $sql='SELECT * FROM instructors WHERE username = "'.$username.'"';
    $query = mysqli_query($conn, $sql);
    $result = mysqli_fetch_array($query);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="instructor_mainpage.css">
    <title>Instructor Main Page</title>
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

<body>
    <!-- Side navigation -->
    <div class="sidenav">
        <div><img src="../assets/hogwarts_logo.png" height="180px" style="opacity: 0.8;"></img>
        </div>
        <br>
        <strong style="text-align:center;">Instructor <br><b><?php echo $result['first_name'].' '. $result['last_name']; ?></b></strong>


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
                    <a href="http://localhost/WebProgrammingProject/mainpage/login.php"><img height="50px" src="../assets/logout.png" alt=""></a>
                </td>
                <td><a id="icon4" href="http://localhost/WebProgrammingProject/mainpage/login.php">Log Out</a></td>
            </tr>
        </table>
    </div>

    <!-- Page content -->
    <div class="main">
        <div class="div1">

            <a href="./instructor_courses.php"><button style="float: left;font-size: 18px;"><img src="../assets/course_siyah.png" alt=""> <br>Courses</button></a>
            <a href="./instructor_research.php"><button style=" float: left; margin-left: 2em; font-size: 18px;"><img id="siyah_tüp" src="../assets/test_tube_siyah.png" alt=""> <br>Research Group</button></a>


        </div>

        <table>
            <tr>
                <th style="text-align: center; font-size: 20px;" colspan="2">USER PROFILE</th>
            </tr>
            <tr>
                <td>Name Surname:</td>
                <td><?php echo $result['first_name'].' '. $result['last_name']; ?></td>
            </tr>
            <tr>
                <td>Username:</td>
                <td><?php echo '@'.$username;?></td>
            </tr>
            <tr>
                <td>Major:</td>
                <td><?php echo $result['area']; ?></td>
            </tr>
        </table>
    </div>






</body>

</html>