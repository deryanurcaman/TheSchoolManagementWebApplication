<?php
    $code = $name = $type = $instructor = $day = $start = $end= '';        // initialize with empty string
    $errors = array('code'=>'', 'name'=>'', 'type'=>'', 'instructor'=>'' ,'day'=>'' ,'start'=>'','end'=>''); // keys and their ampty values
    if (isset($_POST['submit'])) {
        if(empty($_POST['code'])) { // check if email is empty
            $errors['code'] = 'A course code is required';
        } else {
            $code = $_POST['code'];  // $email is now the input of the $_POST['email']
            }

        if(empty($_POST['name'])) {
            $errors['name'] = 'A course name is required';
        } else {
            $name = $_POST['name'];
            }

        if(empty($_POST['type'])) {
            $errors['type'] = 'Course type is required';
        }else {
            $type = $_POST['type'];
            }

        if(empty($_POST['day'])) {
            $errors['day'] = 'Day of the course is required';
        }else {
            $day = $_POST['day'];
            }

        if(empty($_POST['start'])) {
            $errors['start'] = 'Start time of the course is required';
        }else {
            $start = $_POST['start'];
            }

        if(empty($_POST['end'])) {
            $errors['end'] = 'End time of the course is required';
        }else {
            $end = $_POST['end'];
            }


        if(array_filter($errors)) {  // checks all the values of the array. If all the values of the array are ampty or false this method returns false.
            // echo 'errors in the form';
        } else {
            // echo 'no errors in the form';
            header('Location: http://localhost/WebProgrammingProject/secretary/secretary_courses.php');
            exit;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="secretary_Createcourse.css">
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
        <strong style="text-align:center;">Secretary <br><b>Roger Turpin</b></strong>


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
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <h1 id="title">Create a New Course</h1>
            <hr>
            <br>

            <div class="inside_form">
                <p id="text_input2">
                    <label for="">Course Code:</label>
                    <input type="text" name="code" placeholder="Enter Course Code" class="select" value="<?php echo htmlspecialchars($code); ?>">
                
                    <div style="color: red;">
                <?php echo $errors['code']; ?>      <!-- display error message here !-->
            </div>
                
                </p>
                <br>
                <hr><br>
                <p id="text_input">
                    <label for="">Course Name:</label>
                    <input type="text" name="name" placeholder="Enter Course Name" class="select" value="<?php echo htmlspecialchars($name); ?>">
            <div style="color: red;">
                <?php echo $errors['name']; ?>      <!-- display error message here !-->
            </div>
                
                </p>

                <br>
                <hr><br>
                <p id="text_input"><label>Course Type:</label> <br>
                    <br>
                    <input type="radio" name="type" <?php if (isset($type) && $type=="Mandatory") echo "checked";?> value="Mandatory" >Mandatory<br>
                    <input type="radio" name="type" <?php if (isset($type) && $type=="Elective") echo "checked";?> value="Elective" >Elective<br></p>
                    
                    <div style="color: red;">
                <?php echo $errors['type']; ?>      <!-- display error message here !-->
            </div>

                <br>
                <hr><br>

                <p><label id="text_input">Course Instructor:</label>
                    <select name="instructor" class="select" required>
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

                    <br>
                    <br>
                    <hr><br>

                    <div style="color: red;">
                <?php echo $errors['instructor']; ?>      <!-- display error message here !-->
            </div>

                </p>
                <label id="text_input">Course Time During The Week:</label>
                <br><br>
                <div id="time">
                    <p id="text_input">Day of the course:
                        <select name="day" class="select" required>
                            <option selected disabled>Select an Option</option>   
                            <option>Monday</option>
                            <option>Tuesday</option>
                            <option>Wednesday</option>
                            <option>Thursday</option>
                            <option>Friday</option>
                        </select>

                    </p>

                    <p id="text_input">Course starts at:
                        <input type="time" name="start" id="" ></p>
                    <p id="text_input">Course ends at:
                        <input type="time" name="end" id="" >
                    </p>
                </div>
            </div>

            <br><br><br>
            <button name="submit" type="submit">Save</button>

        </form>
    </div>

</body>

</html>