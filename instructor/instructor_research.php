<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../instructor/instructor_research.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Stalemate&display=swap" rel="stylesheet">
    <title> Instructor Research Groups </title>

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


</head>

<script>
    function approve() {
        alert("The Request Is Accepted");
    }

    function reject() {
        alert("The Request Is Declined");
    }

    function download_file() {
        alert("The File Is Successfully Downloaded");
    }
</script>

<body>
    <!-- Side navigation -->
    <div class="sidenav">
        <div><img src="../assets/hogwarts_logo.png" height="180px" style="opacity: 0.8;"></img>
        </div>
        <br>

        <strong style="text-align:center;">Instructor <br><b>Remus Lupin</b></strong>


        <hr style="border-color: white;">

        <table id="tablenavbar">
            <tr id="hv">
                <td>
                    <a href="http://localhost/WebProgrammingProject/instructor/instructor_mainpage.php"><img height="50px" src="../assets/home.png" alt=""></a>
                </td>
                <td> <a id="icon1" href="http://localhost/WebProgrammingProject/instructor/instructor_mainpage.php">Main Page</a>
                </td>
            </tr>
            <tr id="hv">
                <td>
                    <a href="http://localhost/WebProgrammingProject/instructor/instructor_courses.php"><img height="50px" src="../assets/courses.png" alt=""></a>
                </td>
                <td> <a id="icon2" href="http://localhost/WebProgrammingProject/instructor/instructor_courses.php">Courses</a>
                </td>
            </tr>
            <tr id="hv">
                <td>
                    <a href="http://localhost/WebProgrammingProject/instructor/instructor_research.php"><img height="50px" src="../assets/researchgroups.png" alt=""></a>
                </td>
                <td> <a id="icon3" href="http://localhost/WebProgrammingProject/instructor/instructor_research.php">Research Group</a>
                </td>
            </tr>
            <tr id="hv">
                <td>
                    <a href="http://localhost/WebProgrammingProject/mainpage/login.php"><img height="50px" src="../assets/logout.png" alt=""></a>
                </td>
                <td><a id="icon4" href="http://localhost/WebProgrammingProject/mainpage/login.php">Log Out</a></td>
            </tr>
        </table>
    </div>

    <div class="dropdown">
        <button class="dropbtn">Select</button>
        <div class="dropdown-content">
            <a href="#">Research Group Students</a>
            <a href="#NewRequests">New Requests</a>
        </div>
    </div>
    <br>

    <div class="main">
        <div class="groupstudents" id="#ResearchGroupStudents">
            <h1>Research Group Students</h1><br>
            <table>
                <tr id="heads">
                    <th id="hashtag">#</th>
                    <th>Student ID</th>
                    <th>Student Name</th>
                    <th>GPA</th>
                    <th>Class</th>
                    <th>Courses taken in the active semester</th>
                </tr>
                <tr>
                    <td id="hashtag">1</td>
                    <td>1499858</td>
                    <td>Ernie Macmillan</td>
                    <td>3.05</td>
                    <td>4th year</td>
                    <td id="fixed">
                        <ul id="courses">
                            <li>Transfiguration</li>
                            <li>Arithmancy</li>
                            <li>Divination</li>
                            <li>Study of Ancient Runes</li>
                            <li>Xylomancy</li>
                        </ul>
                    </td>
                </tr>
                <tr>
                    <td id="hashtag">2</td>
                    <td>3007459</td>
                    <td>Katie Bell</td>
                    <td>2.76</td>
                    <td>3rd year</td>
                    <td id="fixed">
                        <ul id="courses">
                            <li>History of Magic</li>
                            <li>Defence Against the Dark Arts</li>
                            <li>Transfiguration</li>
                            <li>Care of Magical Creatures</li>
                            <li>Herbology</li>
                            <li>Magical Theory</li>
                        </ul>
                    </td>
                </tr>
                <tr>
                    <td id="hashtag">3</td>
                    <td>3679267</td>
                    <td>Hannah Abbott</td>
                    <td>3.21</td>
                    <td>4th year</td>
                    <td id="fixed">
                        <ul id="courses">
                            <li>Astronomy</li>
                            <li>Charms</li>
                            <li>Study of Ancient Runes</li>
                            <li>Arithmancy</li>
                            <li>Ghoul Studies</li>
                        </ul>
                    </td>
                </tr>
                <tr>
                    <td id="hashtag">4</td>
                    <td>3125670</td>
                    <td>Jack Sloper</td>
                    <td>2.94</td>
                    <td>5th year</td>
                    <td id="fixed">
                        <ul id="courses">
                            <li>Xylomancy</li>
                            <li>Magical Theory</li>
                            <li>Defence Against the Dark Arts</li>
                            <li>Arithmancy</li>
                            <li>Care of Magical Creatures</li>
                        </ul>
                    </td>
                </tr>
                <tr>
                    <td id="hashtag">5</td>
                    <td>8101086</td>
                    <td>Colin Creevey</td>
                    <td>3.41</td>
                    <td>2nd year</td>
                    <td id="fixed">
                        <ul id="courses">
                            <li>Flying</li>
                            <li>Divination</li>
                            <li>Herbology</li>
                            <li>Potions</li>
                            <li>History of Magic</li>
                            <li>Charms</li>
                        </ul>
                    </td>
                </tr>

            </table>

        </div>


        <div class="requests" id="NewRequests">
            <h1>New Requests</h1>
            <table>
                <tr id="heads">
                    <th>Decision</th>
                    <th>Request Number</th>
                    <th id="research_student">Student</th>
                    <th id="research_note">Note</th>
                    <th>Attachment</th>
                </tr>
                <tr>
                    <td>
                        <button onclick="approve()" id="decision"><img src="../assets/approved.png" alt=""></button>
                        <button onclick="reject()" id="decision"><img src="../assets/reject.png" alt=""></button>
                    </td>
                    <td>1</td>
                    <td id="research_student">
                        <ul>
                            <li>4268765</li>
                            <li>Milly Bulstro</li>
                            <li>4th Grade</li>
                        </ul>
                    </td>
                    <td id="research_note">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Repellat molestias voluptate ipsa dignissimos numquam voluptatem quas voluptatibus facere id, corrupti eius enim illum qui non error facilis ab earum accusamus.</td>
                    <td><img onclick="download_file()" title="Download" id="download" src="../assets/download.png" height="50px" alt=""></td>
                </tr>
                <tr>
                    <td>
                        <button onclick="approve()" id="decision"><img src="../assets/approved.png" alt=""></button>
                        <button onclick="reject()" id="decision"><img src="../assets/reject.png" alt=""></button>
                    </td>
                    <td>2</td>
                    <td id="research_student">
                        <ul>
                            <li>1809230</li>
                            <li>Geoffrey Hooper</li>
                            <li>3rd Grade</li>
                        </ul>
                    </td>
                    <td id="research_note">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam non sunt distinctio explicabo quae, sapiente quasi fugiat deleniti perferendis enim asperiores doloremque? Est amet fugit eveniet iusto id a ullam?</td>
                    <td><img onclick="download_file()" title="Download" id="download" src="../assets/download.png" height="50px" alt=""></td>
                </tr>
                <tr>
                    <td>
                        <button onclick="approve()" id="decision"><img src="../assets/approved.png" alt=""></button>
                        <button onclick="reject()" id="decision"><img src="../assets/reject.png" alt=""></button>
                    </td>
                    <td>3</td>
                    <td id="research_student">
                        <ul>
                            <li>4651012</li>
                            <li>Eloise Midgen</li>
                            <li>5th Grade</li>
                        </ul>
                    </td>
                    <td id="research_note">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque ipsa deserunt nemo, totam distinctio voluptatem, tempora pariatur dolores omnis explicabo qui animi eveniet natus suscipit. Facilis at incidunt tempora possimus!</td>
                    <td><img onclick="download_file()" title="Download" id="download" src="../assets/download.png" height="50px" alt=""></td>
                </tr>
                <tr>
                    <td>
                        <button onclick="approve()" id="decision"><img src="../assets/approved.png" alt=""></button>
                        <button onclick="reject()" id="decision"><img src="../assets/reject.png" alt=""></button>
                    </td>
                    <td>4</td>
                    <td id="research_student">
                        <ul>
                            <li>3142269</li>
                            <li>Blaise Zabini</li>
                            <li>4th Grade</li>
                        </ul>
                    </td>
                    <td id="research_note">Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita architecto eligendi harum minima itaque tenetur sit pariatur deleniti. Corporis tenetur sapiente quod cumque repudiandae impedit ea saepe error nostrum commodi!</td>
                    <td><img onclick="download_file()" title="Download" id="download" src="../assets/download.png" height="50px" alt=""></td>
                </tr>
            </table>
        </div>
    </div>
</body>

</html>