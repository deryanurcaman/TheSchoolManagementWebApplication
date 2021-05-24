<?php
function OpenCon()
 {
 $dbhost = "localhost";
 $dbuser = "webuser";
 $dbpass = "123456";
 $db = "webprogrammingproject2021";
 $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
 
 return $conn;
 }
 
function CloseCon($conn)
 {
 $conn -> close();
 }
   
?>