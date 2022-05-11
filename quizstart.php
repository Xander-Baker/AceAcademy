<?php

session_start();
include("includes/dbh.inc.php");

if(isset($_POST['finish'])) {
    header("createquiz.php");
    if(!empty($_POST['quizName']) && !empty($_POST['courses']) ){
        $quizName = $_POST['quizName'];
        $courseID = $_POST['courses'];

        $query = "insert into quizlist(courseID, quizName) values ('$courseID', '$quizName')";
        mysqli_query($conn, $query) or die(mysqli_error());
        echo'<script> window.location.href = "createquiz.php";</script>';


    }

}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>CREATE QUIZ</title>
</head>
<body>
<form action = "quizstart.php" method="post">
    <p>Enter Quiz Name below</p>
    <input type="text" name="quizName">

    <p>Select the courses</p>
    <select name="courses" id="courses">
        <option value="1">WebDev</option>
        <option value="2">Psychology</option>
        <option value="4">Banking</option>
        <option value="3">Maths</option>
    </select>
    <button type="submit" name="finish"> Start Making Quiz </button>

</form>
</body>
</html>