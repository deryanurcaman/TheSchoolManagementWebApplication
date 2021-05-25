
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="secretary_courses.css">
    <title>Secretary Courses</title>
</head>

<script>
    function download_file() {
        alert("The File Is Successfully Downloaded");
    }

    function delete_course() {
        alert("The Course Is Successfully Deleted");
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



$username='';
session_start();

    $username=$_SESSION['username'];
    $sqlNew='SELECT * FROM secretaries WHERE username = "'.$username.'"';
    $query = mysqli_query($conn, $sqlNew);
    $result = mysqli_fetch_array($query);


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
        <h1>Courses</h1>
        <br>
        <div id="outer">
            <div class="inner">
                <a href="http://localhost/WebProgrammingProject/secretary/secretary_createCourse.php" id="create_link"><button  style="color: white;" id="new_course">Create a New Course</button></a>
            </div>
            <div class="inner"><button onclick="download_file()" id="new_course" style="color: white; float: unset;">Download The List of Courses <img src="" alt=""></button></div>
        </div>

        <?php
                    foreach($rows as $row){
                        echo
                            '
                            <div class="courselist">
                            <form action="">
                            <table>
                                <tr>
                                    <td><button id="delete_button" onclick="delete_course()"><img src="../assets/reject.png" alt=""></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Delete The Course</td>
                                </tr>
                            </table>
                        </form>
                        <ul>
                            <li class="classtype">'.$row['type'].'</li>
                            <li class="classcode">'.$row['code'].'</li>
                            <li class="classname">'.$row['name'].'</li>
                            <li span style="font-weight:bolder;">Instructor: '.$row['first_name'].' '. $row['last_name'].'</li>
                            <li span style="color:rgb(61, 0, 0);"> Day: '.$row['day'].' Time: '.$row['start_time'].' - '. $row['end_time'].'</li>
                        </ul>
                        </div>';
                    }
                ?>         
</body>

</html>