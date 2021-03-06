<?php

include '../config.php';
$conn = OpenCon();

$check = $username = $password = $mything = $first_name = $last_name = '';        // initialize with empty string
$errors = array('check' => '', 'username' => '', 'password' => '', 'mything' => '', 'first_name' => '', 'last_name' => ''); // keys and their ampty values

session_start();
if (isset($_POST['submit'])) {
    if (empty($_POST['username'])) { // check if email is empty
        $errors['username'] = 'An username is required';
    } else {
        $username = $_POST['username'];  // $email is now the input of the $_POST['email']
    }

    echo "<br>";

    if (empty($_POST['password'])) {
        $errors['password'] = 'A password is required';
    } else {
        $password = $_POST['password'];
    }

    if (empty($_POST['mything'])) {
        $errors['mything'] = 'Account type is required';
    } else {
        $mything = $_POST['mything'];
    }

    if (empty($_POST['first_name'])) {
        $errors['first_name'] = 'First name is required';
    } else {
        $first_name = $_POST['first_name'];
    }

    if (empty($_POST['last_name'])) {
        $errors['last_name'] = 'Last name is required';
    } else {
        $last_name = $_POST['last_name'];
    }

    if (empty($_POST['mything'])) {
        $errors['mything'] = 'An account type is required';
    } else {
        $mything = $_POST['mything'];
        if ($mything == "1") {
            $table_name = "secretaries";
            $page_uri = "WebProgrammingProject/secretary/secretary_mainpage.php";
        } else if ($mything == "2") {
            $table_name = "instructors";
            $page_uri = "WebProgrammingProject/instructor/instructor_mainpage.php";
        } else if ($mything == "3") {
            $table_name = "students";
            $page_uri = "WebProgrammingProject/student/student_mainpage.php";
        }
    }


    if (!empty($_POST['first_name']) && !empty($_POST['last_name']) && !empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['mything'])) {

        $sql = 'SELECT id FROM '.$table_name.' WHERE username = "'.$username.'"';
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);

        // If result matched $username, table row must be 1 row
        if ($count == 1) {
            $errors['check'] = "This username is taken.";
        } else {
            $sqlNew = "INSERT INTO $table_name ( first_name, last_name, username, password) 
            VALUES ( '$first_name', '$last_name', '$username', '$password');";
    

        if (mysqli_query($conn, $sqlNew)) {
            echo "created account successfully";
        } else {
            echo "Error: " . $sqlNew . "<br>" . mysqli_error($conn);
        }


        if (array_filter($errors)) {  // checks all the values of the array. If all the values of the array are ampty or false this method returns false.
            echo 'errors in the form';
        } else {
            $_SESSION['username'] = $username;
            header("Location: http://localhost/" . $page_uri);
            exit;
        }
        }

        
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Hogwarts School of Witchcraft and Wizardry</title>
    <link rel="stylesheet" href="./signup.css?v=<?php echo time(); ?>">
</head>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Domine&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Stalemate&display=swap');

    body {
        font-family: 'Domine', serif;
    }
</style>


<body>
    <table class="headerbox">
        <tr>
            <td id="li1"><img id="hogwartslogo" src="../assets/hogwartslogo.jpg" alt=""></td>
            <td>
                <div style="margin: 0 auto; width: 700px"><img src="../assets/texthogwarts.png" alt=""></div>
            </td>
            <td id="li3">
                <a href="https://www.instagram.com/wbtourlondon/"> <img id="socialmedia" src="../assets/instagram.png" title="Instagram"></a>
                <a href="https://www.facebook.com/wizardingworld"> <img id="socialmedia" src="../assets/facebook.png" title="Facebook"></a>
                <a href="https://twitter.com/wizardingworld"><img id="socialmedia" src="../assets/twitter.png" title="Twitter"></a>
                <a href="https://help.wizardingworld.com/hc/en-us"><img id="socialmedia" src="../assets/support.png" title="Support"></a>
            </td>
        </tr>
    </table>

    <br><br><br>


    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <h1 id="title">Create an Account</h1>
        <p id="text_input">
            <label for="">Please choose your account type:</label>
            <br><br>
            <input id="radio" type="radio" name="mything" <?php if (isset($mything) && $mything == "1") echo "checked"; ?> value="1"> Secretary<br>
            <input id="radio" type="radio" name="mything" <?php if (isset($mything) && $mything == "2") echo "checked"; ?> value="2"> Instructor<br>
            <input id="radio" type="radio" name="mything" <?php if (isset($mything) && $mything == "3") echo "checked"; ?> value="3"> Student<br>
        </p>

        <div style="color: red;">
            <span class="error"> <?php echo $errors['mything']; ?> </span>
        </div>


        <p id="text_input">
            <label for="">First Name:</label>
            <br>
            <input type="text" name="first_name" placeholder="Enter your first name" size="80" class="select" value="<?php echo htmlspecialchars($first_name); ?>">

        <div style="color: red;">
            <?php echo $errors['first_name']; ?>
            <!-- display error message here !-->
        </div>

        </p>

        <p id="text_input">
            <label for="">Last Name:</label>
            <br>
            <input type="text" name="last_name" placeholder="Enter your last name" size="80" class="select" value="<?php echo htmlspecialchars($last_name); ?>">

        <div style="color: red;">
            <?php echo $errors['last_name']; ?>
            <!-- display error message here !-->
        </div>

        </p>

        <p id="text_input">
            <label for="">Username:</label>
            <br>
            <input type="text" name="username" placeholder="Enter your username" size="80" class="select" value="<?php echo htmlspecialchars($username); ?>">

        <div style="color: red;">
            <?php echo $errors['username']; ?>
            <!-- display error message here !-->
        </div>

        </p>

        <p id="text_input">
            <label for="">Password:</label>
            <br>
            <input type="password" name="password" placeholder="Enter your password" size="80" class="select" value="<?php echo htmlspecialchars($password); ?>">

        <div style="color: red;">
            <?php echo $errors['password']; ?>
            <!-- display error message here !-->
        </div>
        <div style="color: red;">
            <?php echo $errors['check']; ?>
            <!-- display error message here !-->
        </div>

        </p>
        <br>

        <p id="text_input"><button onclick="signup()" name="submit">
                <img height="30px" id="loginbuttonimage" src="../assets/signup.png" alt="">
                <img height="50px" id="loginbuttonimage2" src="../assets/imglogin.png" alt=""></button></p>

        <p id="check">
            Already have an account? Then login <a href="login.php" id="link">here</a>
        </p>
    </form>

    <footer>
        <p><small>Copyright &copy;2021, Original Hogwarts</small></p> <br>
    </footer>

</body>

</html>