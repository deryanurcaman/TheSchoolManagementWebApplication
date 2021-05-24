<?php
include '../config.php';
$conn = OpenCon();
$username='';
session_start();

    $username=$_SESSION['username'];
    $sql='SELECT * FROM secretaries WHERE username = "'.$username.'"';
    $query = mysqli_query($conn, $sql);
    $result = mysqli_fetch_array($query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="secretary_mainpage.css">
    <title>Secretary Main Page</title>
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

        <strong style="text-align:center;">Secretary <br><b><?php echo $result['first_name'].' '. $result['last_name']; ?></b></strong>


        <hr style="border-color: white;">

        <table id="tablenavbar">
            <tr id="hv">
                <td>
                    <a href="http://localhost/WebProgrammingProject/secretary/secretary_mainpage.php"> <img src="../assets/home.png" height="50px" alt="">
                    </a>
                </td>
                <td> <a id="icon1" href="http://localhost/WebProgrammingProject/secretary/secretary_mainpage.php">Main Page</a></td>
            </tr>
            <tr id="hv">
                <td>
                    <a href="http://localhost/WebProgrammingProject/secretary/secretary_courses.php"><img src="../assets/courses.png" height="50px" alt="">
                    </a>
                </td>
                <td> <a id="icon2" href="http://localhost/WebProgrammingProject/secretary/secretary_courses.php">Courses</a></td>
            </tr>
            <tr id="hv">
                <td>
                    <a href="http://localhost/WebProgrammingProject/mainpage/login.php"><img src="../assets/logout.png" height="50px" alt="">
                    </a>
                </td>
                <td><a id="icon4" href="http://localhost/WebProgrammingProject/mainpage/login.php">Log Out</a></td>
            </tr>
        </table>
    </div>

    <!-- Page content -->
    <div class="main">
        <div class="div1">

            <a href="./secretary_courses.php"><button style="float: left;font-size: 18px;"><img src="../assets/course_siyah.png" alt=""> <br>
                Courses</button></a>
            <a href="./secretary_createCourse.php"><button style=" float: left; margin-left: 2em; font-size: 18px;"> <img src="../assets/createcourse_siyah.png" alt=""> <br>
                Create a New Course</button></a>


        </div>

        <table>
            <tr>
                <th style="text-align: center; font-size: 20px;" colspan="2"> USER PROFILE</th>
            </tr>
            <tr>
                <td>Name Surname:</td>
                <td><?php echo $result['first_name'].' '. $result['last_name'];?></td>
            </tr>
            <tr>
                <td>Username:</td>
                <td><?php echo '@'.$username;?></td>
            </tr>
        </table>
    </div>


</body>

</html>