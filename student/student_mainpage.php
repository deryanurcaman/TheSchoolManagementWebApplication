<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="student_mainpage.css">
    <title>Student Main Page</title>
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


    <!-- Page content -->
    <div class="main">
        <div class="div1">

            <a href="./student_courses.php"><button style="float: left;font-size: 18px;"><img src="../assets/course_siyah.png" alt=""> <br> Courses</button></a>
            <a href="./student_joinresearch.php"><button style=" float: left; margin-left: 2em; font-size: 18px;"><img id="siyah_tüp" src="../assets/test_tube_siyah.png" alt=""> <br>
                Join a Research Group</button></a>


        </div>

        <table>
            <tr>
                <th style="text-align: center; font-size: 20px;" colspan="2">USER PROFILE</th>
            </tr>
            <tr>
                <td>Name Surname:</td>
                <td>Luna Lovegood </td>
            </tr>
            <tr>
                <td>Class:</td>
                <td>6th Grade</td>
            </tr>
            <tr>
                <td>Student ID:</td>
                <td>3499871</td>
            </tr>
            <tr>
                <td>Username:</td>
                <td>@loonylovegood</td>
            </tr>
            <tr>
                <td>GPA:</td>
                <td>3.04</td>
            </tr>
        </table>
    </div>
</body>

</html>