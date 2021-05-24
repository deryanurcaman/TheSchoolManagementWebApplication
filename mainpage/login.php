<?php



include '../config.php';
$conn = OpenCon();

$username = $password = $mything = $check = '';        // initialize with empty string
$errors = array('username' => '', 'password' => '', 'mything' => '', 'check' => ''); // keys and their ampty values


session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form 

    if (empty($_POST['username'])) { // check if email is empty
        $errors['username'] = 'An username is required';
    } else {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
    }

    if (empty($_POST['password'])) {
        $errors['password'] = 'A password is required';
    } else {
        $password = mysqli_real_escape_string($conn, $_POST['password']);
    }
    if (empty($_POST['mything'])) { // check if email is empty
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


    if (!empty($_POST['password']) && !empty($_POST['username']) && !empty($_POST['mything']) ) {
        $sql = 'SELECT id FROM '.$table_name.' WHERE username = "'.$username.'" and password = "'.$password.'"';

        $result = mysqli_query($conn, $sql);
    
                
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

        $count = mysqli_num_rows($result);

        if ($count == 1) {
            $_SESSION['username'] = $username;
            header("location: http://localhost/" . $page_uri);
        } else {
            $errors['check'] = "Your Login Name or Password is invalid";
        }
    }
    // If result matched $myusername and $mypassword, table row must be 1 row

    
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Welcome to Hogwarts School of Witchcraft and Wizardry</title>
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
                <div style="margin-left: 200px;"><img width="600" height="45" id="td2" src="../assets/texthogwarts.png" alt=""></div>
            </td>
            <td id="li3">
                <a href="https://www.instagram.com/wbtourlondon/" target="_blank"> <img id="socialmedia" src="../assets/instagram.png" title="Instagram"></a>
                <a href="https://www.facebook.com/wizardingworld" target="_blank"> <img id="socialmedia" src="../assets/facebook.png" title="Facebook"></a>
                <a href="https://twitter.com/wizardingworld" target="_blank"><img id="socialmedia" src="../assets/twitter.png" title="Twitter"></a>
                <a href="https://help.wizardingworld.com/hc/en-us" target="_blank"><img id="socialmedia" src="../assets/support.png" title="Support"></a>
            </td>
        </tr>
    </table>

    <br><br><br>


    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <h1 id="title">User Login</h1>
        <p id="text_input">
            <label for="">Please choose your account type:</label>
            <br><br>
            <input id="radio" type="radio" name="mything" <?php if (isset($mything) && $mything == "1") echo "checked"; ?> value="1"> Secretary<br>
            <input id="radio" type="radio" name="mything" <?php if (isset($mything) && $mything == "2") echo "checked"; ?> value="2"> Instructor<br>
            <input id="radio" type="radio" name="mything" <?php if (isset($mything) && $mything == "3") echo "checked"; ?> value="3"> Student<br>

        </p>
        <div style="color: red;">
            <span class="error"> <?php echo $errors['mything']; 
                                    ?> </span>
        </div>

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
            <input type="password" name="password" placeholder="Enter your password" size="80" class="select">

        <div style="color: red;">
            <?php echo $errors['password']; echo $errors['check']; ?>
            <!-- display error message here !-->
        </div>

        </p>

        <br>

        <p id="text_input">
            <button onclick="check(form)" value="Login" name="submit">
                <img height="30px" id="loginbuttonimage" src="../assets/login.png" alt="">
                <img height="50px" id="loginbuttonimage2" src="../assets/imglogin.png" alt="">
            </button>

        </p>


        <p id="check">
            Don't you have an account? <br> Create an account from <a href="signup.php" id="link">here</a>
        </p>
    </form>

    <footer>
        <p><small>Copyright &copy;2021, Original Hogwarts</small></p> <br>
    </footer>

</body>

</html>