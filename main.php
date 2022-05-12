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
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ace Academy</title>
        <link rel="stylesheet" href="main.css">
        <link rel="icon" href="Assets/favicon.svg">
    </head>
    <body>
        <div class="progress">
        </div>
        <div id="topBar">
            <div id="topBarRight">
                <div id="topBarLinks">
                    <a href="studentHome.php" class="topBarLinksText">Home</a>
                    <a href="index.php" class="topBarLinksText">Log-out</a>
                </div>
            </div>
        </div>
        <div id="sideBar">
            <div id="sideBarLogo">
            <p>Ace <b>Academy</b></p>
            </div>
            <hr style="width: 90%; border-radius: 10px; margin-left: 5%; margin-top: 1vh; margin-bottom: 1vh; ", size="1", color=grey>
            <div id="profile">
                <div id="profileVis">
                    <!-- Add student name-->
                    <p id="name">Oliver Dorrian</p>
                    <p class="downArrow" style="margin-left: 1vh;">❯</p>                    
                </div>
                <div id="profileInvis">
                    <a href="settings.php" id="acountLink">My Account</a>
                    <a href="index.php" id="logOut">Log-Out</a>
                </div>
            </div>
            <hr style="width: 90%; border-radius: 10px; margin-left: 5%; margin-bottom: 1vh; margin-top: 1vh;", size="1", color=grey>
            
            <!-- This Should be conditional, only loading the stuff if needed, so if the person if subsrivved to the course -->
            <div class="course">
                <div class="courseVis">
                    <p class="courseText">Web Dev</p>
                </div>
            </div>
            
            <div class="course">
                <div class="courseVis">
                    <p class="courseText">Bootstrap</p>
                </div>
            </div>
            
            <div class="course">
                <div class="courseVis">
                    <p class="courseText">Objective Development</p>
                </div>
            </div>
            
            <div class="course">
                <div class="courseVis">
                    <p class="courseText">Banking</p>
                </div>
            </div>
        </div>
        <div id="quickLinks">
            <!-- This is where quick links should go!-->
            <!-- Needs some complex php for it tbh-->
        </div>
        <!-- Depending on which course they selected this should load the mainpage content-->
        <!-- just deleted the div for the previous courses posts, then run the fuction that fills them-->
        <!-- This should be involked by -->
        <?php displayPosts($conn, 1); ?>
        <div class="article">
                <h1 class="downLoadsTitle">
                    Downloads
                </h1>
                <div class="downLoadArea">
                    <hr style="width: 100%; border-radius: 10px;", size="1", color=grey>
                    <div class="downLoadAreaTitle">
                        <div class="name">
                            <p>Name</p>
                        </div>
                        <div class="uploaded">
                            <p>Uploaded</p>                        
                        </div>        
                        <div class="size">
                            <p>Size</p>
                        </div>        
                        <div class="author">
                            <p>Author</p>
                        </div>
                    </div>
                    <?php displayResources($conn, 1); ?>
                    <hr style="width: 100%; border-radius: 10px;", size="1", color=grey>
                </div>
            </div>
        </div>
        <script src="main.js"></script>
    </body> 
</html> 