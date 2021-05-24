<?php
   $conn = mysqli_connect('localhost', 'webuser', '123456', 'webprogrammingproject2021');
   if (!$conn) {
       die("Fail connection" . mysqli_connect_error());
   }
?>