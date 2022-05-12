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
    <body id="appBody">
        <div id="sideBar">
            <div id="titleSet">
                <h6>Settings ⚙️</h6>
            </div>
            <div class="course">
                <div class="courseVis">
                    <p class="courseText" id="accountClick" >Account</p>
                </div>
            </div>
            <div class="course">
                <div class="courseVis">
                    <p class="courseText" id="courseClick">Files</p>
                </div>
            </div>
            <div class="course">
                <div class="courseVis">
                    <p class="courseText" id="contentClick">Content</p>
                </div>
            </div>
            <div id="lastList" class="course">
                <div class="courseVis">
                    <p class="courseText" id="passwordClick">Password</p>
                </div>
            </div>
        </div>

        <div class="mainContent" id="account">
            <div class="titleBit blob">
                <p><b>Account</b></p>
            </div>
            <div class="main">
            <form id="formBox" action="includes/changeName.inc.php" method="post">
                <h2>Change name</h2> <br>
                <h3 class="Lable">Forename</h3>
                <input class="inputThing" type="text" name="name"></input>
                <h3 class="Lable">Surname</h3>
                <input class="inputThing" type="text" name="sName"></input>
                <input class="buttonPress" type="submit" value="Login" name="submit"></input>
            </form>
            </div> 
        </div>

        <div class="mainContent" id="courses">
            <div class="titleBit blob">
                <p><b>Upload Files</b></p>
            </div>
            <div class="main">
                <?php uploadResource($conn);?>
                <form method="post" action="" enctype="multipart/form-data">
                    <label class="titleLable" for="uploadFile">File to Upload: </label>
                    <input class="buttonFile" type="file" name="uploadFile" value="Select File :" />
                    <div class="radioButtonsFlex">
                        <input type="radio" id="webdev" name="courseId" value="1">
                        <label for="webdev">Web Dev</label><br>
                        <input type="radio" id="psych" name="courseId" value="2">
                        <label for="psych">Psychology</label><br>
                        <input type="radio" id="maths" name="courseId" value="3">
                        <label for="maths">Maths</label><br>
                        <input type="radio" id="banking" name="courseId" value="4">
                        <label for="banking">Banking</label>
                    </div>
                    <input class="buttonPress" type="submit" value="Upload File"/>
                </form>
            </div> 
        </div>
        <div class="mainContent" id="password">
            <div class="titleBit blob">
                <p><b>Change Password</b></p>
            </div>
            <div class="main">
                <form id="formBox" action="includes/changePass.inc.php" method="post">
                    <h3 class="Lable">Current Password</h3>
                    <input class="inputThing" type="text" name="curPwd"></input> <br>
                    <h3 class="Lable">New Password</h3>
                    <input class="inputThing" type="text" name="newPwd"></input><br>
                    <h3 class="Lable">Re-enter Password</h3>
                    <input class="inputThing" type="text" name="newPwdR"></input>
                    <input class="buttonPress" type="submit" value="Login" name="submit"></input>
                </form>
            </div> 
        </div>
        
        <div class="mainContent" id="content">
            <div class="titleBit blob">
                <p><b>Add Content</b></p>
            </div>
            <div class="main">
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


        
        <script src="settings.js"></script>     
    </body>
</html>