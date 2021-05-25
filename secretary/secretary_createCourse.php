<?php

include '../config.php';
$conn = OpenCon();

$username = '';
session_start();
$username = $_SESSION['username'];
$sql = 'SELECT * FROM secretaries WHERE username = "' . $username . '"';
$query = mysqli_query($conn, $sql);
$resultNew = mysqli_fetch_array($query);


$code = $name = $type = $instructor = $day = $start = $end = '';        // initialize with empty string
$errors = array('code' => '', 'name' => '', 'type' => '', 'instructor' => '', 'day' => '', 'start' => '', 'end' => ''); // keys and their ampty values
if (isset($_POST['submit'])) {
    if (empty($_POST['code'])) {
        $errors['code'] = 'A course code is required';
    } else {
        $codeN = $_POST['code'];
    }
    if (empty($_POST['name'])) {
        $errors['name'] = 'A course name is required';
    } else {
        $nameN = $_POST['name'];
    }
    if (empty($_POST['type'])) {
        $errors['type'] = 'Course type is required';
    } else {
        $typeN = $_POST['type'];
    }
    if (empty($_POST['instructor'])) {
        $errors['instructor'] = 'Instructor name is required';
    } else {
        $instructorN = $_POST['instructor'];
    }
    if (empty($_POST['day'])) {
        $errors['day'] = 'Day of the course is required';
    } else {
        $dayN = $_POST['day'];
    }
    if (empty($_POST['start'])) {
        $errors['start'] = 'Start time of the course is required';
    } else {
        $startN = $_POST['start'];
    }

    if (empty($_POST['end'])) {
        $errors['end'] = 'End time of the course is required';
    } else {
        $endN = $_POST['end'];
    }


    $sql = "SELECT * FROM courses";
    $query = mysqli_query($conn, $sql);
    $rows = array();
    while ($result = mysqli_fetch_array($query)) {
        $rows[] = $result;
    }

    $endTime = strtotime($_POST['end']);
    $startTime = strtotime($_POST['start']);

    foreach ($rows as $row) {
        if ($_POST['day'] == $row['day']) {
            $startTemp = $row['start_time'];
            $startTemp = strtotime($startTemp);
            $endTemp = $row['end_time'];
            $endTemp = strtotime($endTemp);


            if (($startTime >= $startTemp || $_POST['start'] === $startTemp) && $startTime <= $endTemp) {
                $errors['end'] = 'You can not create a course between these hours (start time overlaps with another course)';
                break;
            } else {
                if (($endTime >= $startTemp || $_POST['end'] === $startTemp) && $endTime <= $endTemp) {
                    $errors['end'] = 'You can not a create course between these hours (end time overlaps with another course)';
                    break;
                }
            }
        }
    }

    $token = strtok($instructorN, " ");
    $token2 = strtok(" ");

    if(array_filter($errors)) {
        // echo 'errors in the form';
    } else {
        // echo 'no errors in the form';

    if (!empty($_POST['code']) && !empty($_POST['name']) && !empty($_POST['type']) && !empty($_POST['day']) && !empty($_POST['start']) && !empty($_POST['end']) ) {
    $sqlNew = "INSERT INTO courses ( code, name, type, day, start_time, end_time, instructor_id) 
    VALUES ( '$codeN', '$nameN', '$typeN', '$dayN', '$startN', '$endN', (SELECT id FROM instructors WHERE first_name = '$token' AND last_name = '$token2'));";


    if (mysqli_query($conn, $sqlNew)) {
        echo "created course successfully";
    } else {
        echo "Error: " . $sqlNew . "<br>" . mysqli_error($conn);
    }


    if (array_filter($errors)) {  // checks all the values of the array. If all the values of the array are ampty or false this method returns false.
        echo 'errors in the form';
    } else {
        echo 'no errors in the form';
        header('Location: http://localhost/WebProgrammingProject/secretary/secretary_courses.php');
        exit;
    }
}}}

?>

<?php

$sql = "SELECT * FROM instructors;";
$query = mysqli_query($conn, $sql);
$rows = array();
while ($result = mysqli_fetch_array($query)) {
    $rows[] = $result;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"<?php echo time(); ?>>
    <link rel="stylesheet" href="secretary_Createcourse.css?v=<?php echo time(); ?>">
    <title>Secretary Creating a Course</title>
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
        <strong style="text-align:center;">Secretary <br><b><?php echo $resultNew['first_name'] . ' ' . $resultNew['last_name']; ?></b></strong>


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
    <div class="main">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <h1 id="title">Create a New Course</h1>
            <hr>
            <br>

            <div class="inside_form">
                <p id="text_input2">
                    <label for="">Course Code:</label>
                    <input type="text" name="code" placeholder="Enter Course Code" class="select" value="<?php echo htmlspecialchars($code); ?>">

                <div style="color: red;">
                    <?php echo $errors['code']; ?>
                    <!-- display error message here !-->
                </div>

                </p>
                <br>
                <hr><br>
                <p id="text_input">
                    <label for="">Course Name:</label>
                    <input type="text" name="name" placeholder="Enter Course Name" class="select" value="<?php echo htmlspecialchars($name); ?>">
                <div style="color: red;">
                    <?php echo $errors['name']; ?>
                    <!-- display error message here !-->
                </div>

                </p>

                <br>
                <hr><br>
                <p id="text_input"><label>Course Type:</label> <br>
                    <br>
                    <input type="radio" name="type" <?php if (isset($type) && $type == "Mandatory") echo "checked"; ?> value="Mandatory">Mandatory<br>
                    <input type="radio" name="type" <?php if (isset($type) && $type == "Elective") echo "checked"; ?> value="Elective">Elective<br>
                </p>

                <div style="color: red;">
                    <?php echo $errors['type']; ?>
                    <!-- display error message here !-->
                </div>

                <br>
                <hr><br>

                <p><label id="text_input">Course Instructor:</label>
                    <select name="instructor" class="select">
                        <option>Select an Option</option>
                        <?php
                        foreach ($rows as $row) {
                            echo '
                        <option> ' . $row['first_name'] . ' ' . $row['last_name'] . ' </option>
                        ';
                        }
                        ?>
                    </select>

                    <br>
                    <br>
                    <hr><br>

                <div style="color: red;">
                    <?php echo $errors['instructor']; ?>
                    <!-- display error message here !-->
                </div>

                </p>
                <label id="text_input">Course Time During The Week:</label>
                <br><br>
                <div id="time">
                    <p id="text_input">Day of the course:
                        <select name="day" class="select">
                            <option >Select an Option</option>
                            <option>Monday</option>
                            <option>Tuesday</option>
                            <option>Wednesday</option>
                            <option>Thursday</option>
                            <option>Friday</option>
                        </select>

                    <div style="color: red;">
                        <?php echo $errors['day']; ?>
                        <!-- display error message here !-->
                    </div>

                    </p>

                    <p id="text_input">Course starts at:
                        <input type="time" name="start" id="">
                    <div style="color: red;">
                        <?php echo $errors['start']; ?>
                        <!-- display error message here !-->
                    </div>
                    </p>
                    <p id="text_input">Course ends at:
                        <input type="time" name="end" id="">
                    <div style="color: red;">
                        <?php echo $errors['end']; ?>
                        <!-- display error message here !-->
                    </div>
                    </p>
                </div>
            </div>

            <br><br><br>
            <button name="submit" type="submit">Save</button>

        </form>
    </div>

</body>

</html>