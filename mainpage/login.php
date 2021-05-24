<?php

$conn = mysqli_connect('localhost','webuser','123456','webprogrammingproject2021');
if(!$conn){
    die ("Fail connection". mysqli_connect_error());
}

$username = $password = $mything = '';        // initialize with empty string
$errors = array('username'=>'', 'password'=>'', 'mything'=>''); // keys and their ampty values


session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 

      if(empty($_POST['username'])) { // check if email is empty
        $errors['username'] = 'An username is required';
    } else {
        $username = mysqli_real_escape_string($conn,$_POST['username']);
        }

        if(empty($_POST['password'])) {
            $errors['password'] = 'A password is required';
        } else {
            $password = mysqli_real_escape_string($conn, $_POST['password']); 
        }

        if (mything.value == "1") {
            $sql = "SELECT id FROM secretary WHERE username = '$username' and password = '$password'";
              $result = mysqli_query($conn,$sql);
              $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
              $active = $row['active'];
              
              $count = mysqli_num_rows($result);
              
              // If result matched $myusername and $mypassword, table row must be 1 row
                
              if($mything=="1") {
                $_SESSION['username']="username";
                header("location: http://localhost/WebProgrammingProject/secretary/secretary_mainpage.php");
                 
              }else {
                $error = "Your Login Name or Password is invalid";
            }
                 
            
        } else if ($mything=="2") {
            $sql = "SELECT id FROM instructors WHERE username = '$username' and password = '$password'";
              $result = mysqli_query($conn,$sql);
              $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
              $active = $row['active'];
              
              $count = mysqli_num_rows($result);
              
              // If result matched $myusername and $mypassword, table row must be 1 row
                
              if($count == 1) {
                $_SESSION['username']="username";
                header("location: http://localhost/WebProgrammingProject/instructor/instructor_mainpage.php");
                 
              }else {
                 $error = "Your Login Name or Password is invalid";
              }
        } else if ($mything=="3") {
            $sql = "SELECT id FROM students WHERE username = '$username' and password = '$password'";
              $result = mysqli_query($conn,$sql);
              $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
              $active = $row['active'];
              
              $count = mysqli_num_rows($result);
              
              // If result matched $myusername and $mypassword, table row must be 1 row
                
              if($count == 1) {
                $_SESSION['username']="username";
                header("location: http://localhost/WebProgrammingProject/student/student_mainpage.php");
                 
              }else {
                 $error = "Your Login Name or Password is invalid";
              }
            
        }
      
      
   }








    
    // if (isset($_POST['submit'])) {
        

    //     echo "<br>";

        

    //     if(empty($_POST['mything'])) {
    //         $errors['mything'] = 'Account type is required';
    //     }else{
    //         $password = $_POST['mything'];
    //     }
    

    //     if(array_filter($errors)) {  // checks all the values of the array. If all the values of the array are ampty or false this method returns false.
    //         // echo 'errors in the form';
    //     } else {
    //         // echo 'no errors in the form';
    //         header('Location: http://localhost/WebProgrammingProject/secretary/secretary_mainpage.php');
    //         exit;
    //     }

    // }
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


    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <h1 id="title">User Login</h1>
        <p id="text_input">
            <label for="">Please choose your account type:</label>
            <br><br>
            <input id="radio" type="radio" name="mything" <?php if (isset($mything) && $mything=="1") echo "checked";?> value="1"> Secretary<br>
            <input id="radio" type="radio" name="mything" <?php if (isset($mything) && $mything=="2") echo "checked";?> value="2"> Instructor<br>
            <input id="radio" type="radio" name="mything" <?php if (isset($mything) && $mything=="3") echo "checked";?> value="3"> Student<br>
       
        </p>
        <div style="color: red;">
        <span class="error"> <?php //echo $errors['mything']; ?> </span>
        </div>

        <p id="text_input">
            <label for="">Username:</label>
            <br>
            <input type="text" name="username" placeholder="Enter your username" size="80" class="select" value="<?php echo htmlspecialchars($username); ?>">

            <div style="color: red;">
                <?php echo $errors['username']; ?>      <!-- display error message here !-->
            </div>

        </p>

        <p id="text_input">
            <label for="">Password:</label>
            <br>
            <input type="password" name="password" placeholder="Enter your password" size="80" class="select" >

            <div style="color: red;">
                <?php echo $errors['password']; ?>      <!-- display error message here !-->
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