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
                    <h3 class="topBarLinksText activeLink">Learning</h3>
                    <h3 class="topBarLinksText">Home</h3>
                    <h3 class="topBarLinksText">Quizzes</h3>
                    <h3 class="topBarLinksText">Calenders</h3>
                </div>
            </div>
        </div>
        <div id="sideBar">
            <div id="sideBarLogo">
            <a href="studentHome.php"><p>Ace <b>Academy</b></p></a>
            </div>
            <hr style="width: 90%; border-radius: 10px; margin-left: 5%; margin-top: 1vh; margin-bottom: 1vh; ", size="1", color=grey>
            <div id="profile">
                <div id="profileVis">
                    <div id="profileImg">
                        <img src="assets/userProflie.png">
                    </div>
                    <p id="name">Oliver Dorrian</p>
                    <p class="downArrow" style="margin-left: 1vh;">❯</p>                    
                </div>
                <div id="profileInvis">
                    <p id="acountLink">My Account</p>
                    <P id="logOut">Log-Out</P>
                </div>
            </div>
            <hr style="width: 90%; border-radius: 10px; margin-left: 5%; margin-bottom: 1vh; margin-top: 1vh;", size="1", color=grey>

            <div class="course">
                <div class="courseVis">
                    <p class="courseText">Web Dev</p>
                    <p class="downArrow">❯</p>
                </div>
                <div class="courseDropDown">
                    <p class="courseDropDownText">Week One</p>
                    <p class="courseDropDownText">Week Two</p>
                    <p class="courseDropDownText">Week Three</p>
                </div>
            </div>
            
            <div class="course">
                <div class="courseVis">
                    <p class="courseText">Bootstrap</p>
                    <p class="downArrow">❯</p>
                </div>
                <div class="courseDropDown">
                    <p class="courseDropDownText">Week One</p>
                    <p class="courseDropDownText">Week Two</p>
                    <p class="courseDropDownText">Week Three</p>
                </div>
            </div>
            
            <div class="course">
                <div class="courseVis">
                    <p class="courseText">Objective Development</p>
                    <p class="downArrow">❯</p>
                </div>
                <div class="courseDropDown">
                    <p class="courseDropDownText">Week One</p>
                    <p class="courseDropDownText">Week Two</p>
                    <p class="courseDropDownText">Week Three</p>
                </div>
            </div>
            
            <div class="course">
                <div class="courseVis">
                    <p class="courseText">C++ MasterClass</p>
                    <p class="downArrow">❯</p>
                </div>
                <div class="courseDropDown">
                    <p class="courseDropDownText">Week One</p>
                    <p class="courseDropDownText">Week Two</p>
                    <p class="courseDropDownText">Week Three</p>
                </div>
            </div>

            <div class="progressBar">
                <div id="progressText">
                    <p>Course Completed:</p>
                </div>
                <div id="progressCircle">
                    <div class="circle">
                        <div class="inner">
                            <p>78%</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="quickLinks">
            <h3 id="felxClick">Flex Design</h3>
            <h3 id="centerDivClick">Centering Divs</h3>
            <h3>DOM Objects</h3>
        </div>
        
        <?php displayPosts($conn, 1); ?>
        <div class="article" id="flexArticle">
            
            <div class="articleInformation">
                <h3>10/03/2022</h3>
                <h3>Week 1</h3>
            </div>
            <div class="articleTitle">
                <h1 class="articleTitleMain">Web Dev: Flex Design</h1>
                <h3 class="articleTitleSmall">The Flexbox Layout aims at providing a more efficient way to lay out, align and distribute space among items in a container.</h3>
            </div>
            <div class="articleImg">
                <img src="Assets/webDeve.jpg">
            </div>
            <div id="textArea">
                <h1 class="BiggestText">
                    Flex Box introduction
                </h1>
                <p class="SmallText">
                    Flexbox is an excellent method to handle page layouts in CSS. 
                    It can manipulate the height and width of an item to occupy all the space within the 
                    parent container ("flex-container") and control the vertical and horizontal flow of each
                    child ("flex-items").
                </p>
                <p class="SmallText">
                    A design pattern that can be tricky in responsive design is a sidebar that sits inline with some content. 
                    Where there is viewport space, this pattern works great, 
                    but where space is condensed, that rigid layout can become problematic.
                </p>
                <h1 class="BiggestText">
                    Terminology Of Flex Boxes
                </h1>
                <p class="SmallText">
                    Flex-container and flex-item are the basic components in the flexbox layout. 
                    You can consider flex-container as a parent element on a page that contains children known as flex-items. 
                    The main idea behind the flex layout is that all the flex-items inside the 
                    flex-container are either laid out along the main axis or the cross axis as shown below:
                </p>
                <div class="articleImg">
                    <img src="Assets/flexPic.webp" class="textAreaImg">
                </div>
                <h1 class="BiggestText">
                    Key Facts 
                </h1>
                <p class="SmallText">
                    When working with flexbox you need to think in terms of two axes — the main axis and the cross axis. 
                    The main axis is defined by the flex-direction property, and the cross axis runs perpendicular to it. 
                    Everything we do with flexbox refers back to these axes, so it is worth understanding how they work from the outset.
                </p>
                <div class="articleInformation">
                    <h3>10/03/2022</h3>
                    <h3>Week 1</h3>
                </div>
            </div>
        </div>
        <div class="article" id="CenteringDivs">
            <div class="articleInformation">
                <h3>12/03/2022</h3>
                <h3>Week 1</h3>
            </div>
            <div class="articleTitle">
                <h1 class="articleTitleMain">Web Dev: Centering A Div</h1>
                <h3 class="articleTitleSmall">The Flexbox Layout aims at providing a more efficient way to lay out, align and distribute space among items in a container.</h3>
            </div>
            <div class="articleImg">
                <img src="Assets/center.jpg">
            </div>
            <div id="textArea">
                <h1 class="BiggestText">
                    Centering introduction
                </h1>
                <p class="SmallText">
                    Whether you’re building a site from scratch or with the Bootstrap CSS framework, 
                    you’ll need to have a basic understanding of HTML and CSS to create and customize 
                    your layouts.
                </p>
                <p class="SmallText">
                    A major challenge of building layouts is arranging and styling elements on the page. 
                    Do you want the elements to overlap or have space between them? 
                    Do you want the layout to be responsive? Do you want some text on the page to be 
                    centered and the rest left-aligned? These are just a few questions you’ll have to 
                    address as you code.
                </p>
                <h1 class="BiggestText">
                    How to Center Text in Div in CSS
                </h1>
                <p class="SmallText">
                    Using CSS, you can center text in a div in multiple ways. The most common way is to 
                    use the text-align property to center text horizontally. 
                    Another way is to use the line-height and vertical-align properties.
                     The last way exclusively applies to flex items and requires the justify-content 
                     and align-items properties. Using this method, you can center text horizontally, 
                     vertically, or both. We'll take a closer look at each method below. 
                </p>
                <div class="codeBox">
                    <code>
                        <h3>position: absolute; </h3>
                        <h3>bottom: 0;</h3>
                        <h3>left: 46%;</h3>
                    </code>
                </div>
                <img scr="https://github.com/OliverDorrian/A-interactive-CV/blob/35e08d308f3d847304847cfd0c8f3d7d22c31f87/index.css#L94-L95">
                <h1 class="BiggestText">
                    Key Facts 
                </h1>
                <p class="SmallText">
                    The text-align: center; only centers the element's inline contents, not the element itself. 
                    If it is a block element (a div is), you need to set margin: 0 auto; , 
                    else if it is an inline element, you need to set the text-align: center; 
                    on its parent element instead.
                </p>
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
                <div class="articleInformation">
                    <h3>12/03/2022</h3>
                    <h3>Week 1</h3>
                </div>
            </div>
        </div>
        <script src="main.js"></script>
    </body> 
</html> 