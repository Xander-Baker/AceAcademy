<?php
    session_start();
    include("includes/functions.inc.php");
    include("includes/dbh.inc.php");
    if(!isset($_SESSION["loggedIn"]) || isset($_SESSION["loggedIn"]) != 1){
        header("location: index.php?error=notloggedin");
    }
    if($_SESSION["type"] == "Student"){
        header("location: studentHome.php");
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
                <p>Ace <b>Academy</b></p>
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
            <?php uploadResource($conn);?>

            <form method="post" action="" enctype="multipart/form-data">
                <label for="uploadFile">File to Upload</label>
                <input type="file" name="uploadFile"/>
                <br/>
                <input type="radio" id="webdev" name="courseId" value="1">
                <label for="webdev">Web Dev</label><br>
                <input type="radio" id="psych" name="courseId" value="2">
                <label for="psych">Psychology</label><br>
                <input type="radio" id="maths" name="courseId" value="3">
                <label for="maths">Maths</label><br>
                <input type="radio" id="banking" name="courseId" value="4">
                <label for="banking">Banking</label><br>
                <input type="submit" value="UPLOAD FILE"/>
            </form>

            <br/>
            <br/>

            <?php uploadPost($conn);?>
            <form method="post" action="" enctype="multipart/form-data">
                <label for="title">Title: </label>
                <input type="text" name="title"></input>
                <label for="uploadFile">Image to Upload</label>
                <input type="file" name="uploadImg"/>
                <br/>
                <label for="content">Content: </label><br/>
				<textarea name="content" cols="80" rows="10"></textarea>
                <input type="radio" id="webdev" name="courseId" value="1">
                <label for="webdev">Web Dev</label><br>
                <input type="radio" id="psych" name="courseId" value="2">
                <label for="psych">Psychology</label><br>
                <input type="radio" id="maths" name="courseId" value="3">
                <label for="maths">Maths</label><br>
                <input type="radio" id="banking" name="courseId" value="4">
                <label for="banking">Banking</label><br>
                <input type="submit" value="UPLOAD POST"/>
            </form>
            <?php authoriseStudents($conn); ?>
            <?php authoriseStudentsForm($conn); ?>
            <a href="quizstart.php">Click here to create a quiz!</a>
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