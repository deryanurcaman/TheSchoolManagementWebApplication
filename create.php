
<?php

include 'config.php';
$conn = OpenCon();

$errors = [];


$table1 = "CREATE TABLE instructors( 
    id INT(11) NOT NULL AUTO_INCREMENT, 
    instructor_code VARCHAR(100), 
    first_name VARCHAR(100), 
    last_name VARCHAR(100), 
    area VARCHAR(100), 
    username VARCHAR(100), 
    password VARCHAR(100), 
    PRIMARY KEY (id));";


$table2 = "CREATE TABLE students(
    id INT(11) NOT NULL AUTO_INCREMENT,
    student_id VARCHAR(100),
    first_name VARCHAR(100),
    last_name VARCHAR(100),
    gpa VARCHAR(100),
    class VARCHAR(100),
    username VARCHAR(100),
    password VARCHAR(100),
    PRIMARY KEY (id));";



$table3 = "CREATE TABLE secretaries ( 
    id INT(11) NOT NULL AUTO_INCREMENT, 
    first_name VARCHAR(100),
    last_name VARCHAR(100), 
    username VARCHAR(100), 
    password VARCHAR(100), 
    PRIMARY KEY (id));";


$table4 = "CREATE TABLE research_groups(
    id INT(11) NOT NULL AUTO_INCREMENT,
    student_id INT(11),
    instructor_id INT(11),
    PRIMARY KEY (id),
    FOREIGN KEY (student_id) REFERENCES students(id),
    FOREIGN KEY (instructor_id) REFERENCES instructors(id));";


$table5 = "CREATE TABLE courses(
    id INT(11) NOT NULL AUTO_INCREMENT,
    code VARCHAR(100),
    name VARCHAR(100),
    type VARCHAR(100), 
    day VARCHAR(20), 
    start_time TIME(6),
    end_time TIME(6),
    instructor_id INT(11),
    course_materials VARCHAR(100),
    PRIMARY KEY (id),
    FOREIGN KEY (instructor_id) REFERENCES instructors(id));";


$table6 = "CREATE TABLE my_courses(
        id INT(11) NOT NULL AUTO_INCREMENT,
        student_id INT(11),
        course_id INT(11),
        PRIMARY KEY (id),
        FOREIGN KEY (student_id) REFERENCES students(id),
        FOREIGN KEY (course_id) REFERENCES courses(id));";

$table7 = "CREATE TABLE new_requests(
        id INT(11) NOT NULL AUTO_INCREMENT,
        student_id INT(11),
        instructor_id INT(11),
        attachment VARCHAR(100),
        note VARCHAR(100),
        PRIMARY KEY (id),
        FOREIGN KEY (student_id) REFERENCES students(id),
        FOREIGN KEY (instructor_id) REFERENCES instructors(id)
)";

$tables = [$table1, $table2, $table3, $table4, $table5, $table6, $table7];


foreach ($tables as $k => $sql) {
    $query = @$conn->query($sql);

    if (!$query)
        $errors[] = "Table $k : Creation failed ($conn->error)";
    else
        $errors[] = "Table $k : Creation done succesfully";
}


foreach ($errors as $msg) {
    echo "$msg <br>";
}

CloseCon($conn)
?>