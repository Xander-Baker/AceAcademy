<?php
    session_start();
    include("includes/functions.inc.php");
    include("includes/dbh.inc.php");
    if(!isset($_SESSION["loggedIn"]) || isset($_SESSION["loggedIn"]) != 1){
        header("location: index.php?error=notloggedin");
    }
    if($_SESSION["type"] == "Tutor"){
        header("location: tutorHome.php");
    }


?>

<!DOCTYPE html>
    <head>
        <meta charset="UTF-8">
        <title>Settings</title>
        <link rel="stylesheet" href="settings.css">
        <link rel="icon" href="assets/favicon.svg">
    </head>
    <body>
        <div id="sideBar">
            <div id="sideBarLogo">
                <a href="studentHome.php"><p>Ace <b>Academy</b></p></a>
            </div>
            <div class="course">
                <div class="courseVis">
                    <p class="courseText" id="accountClick" >Account</p>
                </div>
            </div>
            <div class="course">
                <div class="courseVis">
                    <p class="courseText" id="courseClick">Courses</p>
                </div>
            </div>
            <div class="course">
                <div class="courseVis">
                    <p class="courseText" id="passwordClick">Password</p>
                </div>
            </div>
            <div class="course">
                <div class="courseVis">
                    <p class="courseText" id="bugClick">Bug reports</p>
                </div>
            </div>
            <div class="course">
                <div class="courseVis">
                    <p class="courseText">Raw Data</p>
                </div>
            </div>
            <div class="course">
                <div class="courseVis">
                    <p class="courseText">Tutors</p>
                </div>
            </div>
            <div class="course">
                <div class="courseVis">
                    <p class="courseText">Contact</p>
                </div>
            </div>
        </div>
        <div class="mainContent" id="account">
            <div class="titleBit blob">
                <p><b>Account</b></p>
            </div>
            <div class="main">
            <form id="formBox" action="includes/changeName.inc.php" method="post">
                <h1>Change name</h1>
                <h2 class="Lable">Forename</h2>
                <input class="inputThing" type="text" name="name"></input>
                <h2 class="Lable">Surname</h2>
                <input class="inputThing" type="text" name="sName"></input>
                <input class="buttonPress" type="submit" value="Login" name="submit"></input>
            </form>
            </div> 
        </div>
        <div class="mainContent" id="courses">
            <div class="titleBit blob">
                <p><b>Courses</b></p>
            </div>
            <div class="main">
            <?php
            if (isset($_POST["courseId"])) {
                
                $courseId = $_POST["courseId"];
                courseEnrol($conn, $courseId, $_SESSION["id"]);
                header("location: settings.php");

            }

            for($i = 1; $i <= 4; $i++){
                $userId = $_SESSION["id"];
                $sql = "SELECT * FROM studentsOnCourses WHERE courseId ='$i' AND usersId = '$userId'";
                $data = mysqli_query($conn, $sql);
                if (mysqli_num_rows($data)==0){
                    $sql = "SELECT * FROM courses WHERE courseId='$i'";
                    $data = mysqli_query($conn, $sql);
                    $numRows = mysqli_num_rows($data);
                    if ($numRows > 0) {
                        while ($row = mysqli_fetch_array($data)) {
                            $courseName = $row["name"];

                            echo "<h2>$courseName</h2>";
                            echo "<form method='post' action=''>";
                            echo "<input type='hidden' name='courseId' value='$i'/>";
                            echo "<input type='submit' value='ENROL'>";
                            echo "</form>";	
                        }
                    }
                }
            }
            ?>
            </div> 
        </div>
        <div class="mainContent" id="password">
            <div class="titleBit blob">
                <p><b>Password</b></p>
            </div>
            <div class="main">
            <form id="formBox" action="includes/changePass.inc.php" method="post">
                    <h1>Change Password</h1>
                    <h2 class="Lable">Current Password</h2>
                    <input class="inputThing" type="text" name="curPwd"></input>
                    <h2 class="Lable">New Password</h2>
                    <input class="inputThing" type="text" name="newPwd"></input>
                    <h2 class="Lable">New Password Repeat</h2>
                    <input class="inputThing" type="text" name="newPwdR"></input>
                    <input class="buttonPress" type="submit" value="Login" name="submit"></input>
                    </form>
            </div> 
        </div>
        <div class="mainContent" id="bugs">
            <div class="titleBit blob">
                <p><b>Bug Reports</b></p>
            </div>
            <div class="main">
            </div> 
        </div>
        <script src="settings.js"></script>
    </body>
</html>