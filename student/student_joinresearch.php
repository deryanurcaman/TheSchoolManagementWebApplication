<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="student_joinresearch.css">
    <title>Student Join a Research Group</title>
</head>

<script>
    function save() {
        alert("The Request Is Successfully Sent");
    }
</script>

<?php 
include '../config.php';
$conn = OpenCon();

$sqlString = "SELECT * FROM instructors;";
$query = mysqli_query($conn, $sqlString);
$rows = array();
while($result = mysqli_fetch_array($query))
{
    $rows[] = $result;
}

session_start();

    $username=$_SESSION['username'];
    $sql='SELECT * FROM students WHERE username = "'.$username.'"';
    $query = mysqli_query($conn, $sql);
    $resultNew = mysqli_fetch_array($query);
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
        <strong style="text-align:center;">Student <br><b><?php echo $resultNew['first_name'].' '. $resultNew['last_name']; ?></b></strong>


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
        <button class="dropbtn">Select</button>
        <div class="dropdown-content">
            <a href="#">Instructors</a>
            <a href="#Join">Join a Research Group</a>
        </div>
    </div>
    <br>

    <div class="main">

        <div class="Instructors_requests">
            <h1>Instructors</h1><br>
            <table>
                <tr id="heads">
                    <th id="hashtag">#</th>
                    <th>First Name</th>
                    <th>Surname</th>
                    <th>Area</th>
                </tr>
                <?php
                    foreach($rows as $row){
                        echo
                            '<tr>
                                <td> '.$row['id'].'</td>
                                <td> '.$row['first_name'].'</td>
                                <td> '.$row['last_name'].'</td>
                                <td> '.$row['area'].' </td>
                            </tr>';
                    }
                ?>  
            </table>

        </div>
        <br><br>

        <div class="Instructors_requests" id="Join">
            <h1 style="text-align: center;">Join a Research Group</h1>
            <hr><br>

            <form action="">

                <p><label id="text_input">Course Instructor:</label>
                    <select name="CourseInstructor" class="select" required>
                    <option selected disabled>Select an Option</option>   
                    <option>Minerva McGonagall</option>   
                    <option>Filius Flitwick</option>   
                    <option>Severus Snape</option>   
                    <option>Pomona Sprout</option>   
                    <option>Madame Hooch</option>   
                    <option>Horace Slughorn</option>   
                    <option>Sybill Trelawney</option>   
                    <option>Remus Lupin</option>   
                </select>
                    <br><br>
                    <hr><br>
                    <p><label id="text_input" for="">Note:</label><br>
                        <textarea name="" id="textarea" cols="44" rows="10" placeholder="Please enter your note"></textarea>
                    </p>

                    <br>
                    <hr>

                    <p><label id="text_input" for="">Attach Your File:</label>
                        <input type="file" id="up" name="filename" required hidden/>
                        <label for="up"><img id="upload" src="../assets/upload.png" alt=""></label>
                    </p>
                    <br><br>
                    <button onclick="save()" id="submit" type="submit">Send</button>

            </form>
        </div>
    </div>
</body>

</html>