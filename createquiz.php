<?php
session_start();
include("includes/dbh.inc.php");

$sql = mysqli_query($conn,"SELECT MAX(QuizID) FROM quizlist");
$row = mysqli_fetch_array($sql);
$maxID = $row[0];



if(isset($_POST['enter'])){

    if(!empty($_POST['question']) && !empty($_POST['answer1']) && !empty($_POST['answer2']) && !empty($_POST['answer3']) && !empty($_POST['answer4'])){
        echo '<script>alert("")</script>';
        $question = $_POST['question'];
        $answer1 = $_POST['answer1'];
        $answer2 = $_POST['answer2'];
        $answer3 = $_POST['answer3'];
        $answer4 = $_POST['answer4'];

        $query = "insert into quizqa(QuizID, question, answer1, answer2, answer3, answer4) values('$maxID', '$question' , '$answer1', '$answer2', '$answer3', '$answer4')";
        $run = mysqli_query($conn, $query) or die(mysqli_error());
        if($run){
            echo "Form submitted successfully";
        }
        else{
            echo "Form not submitted";
        }
    }
    else{
        echo " all fields required";
    }
}

if(isset($_POST['finish'])) {
    echo '<script>alert("quiz saved")</script>';

    if(!empty($_POST['question']) && !empty($_POST['answer1']) && !empty($_POST['answer2']) && !empty($_POST['answer3']) && !empty($_POST['answer4'])){
        echo '<script>alert("")</script>';

        $question = $_POST['question'];
        $answer1 = $_POST['answer1'];
        $answer2 = $_POST['answer2'];
        $answer3 = $_POST['answer3'];
        $answer4 = $_POST['answer4'];


        $query = "insert into quizqa(QuizID, question, answer1, answer2, answer3, answer4) values('$maxID', '$question' , '$answer1', '$answer2', '$answer3', '$answer4')";
        $run = mysqli_query($conn, $query) or die(mysqli_error());}
    echo'<script> window.location.href = "tutorHome.php";</script>';
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>CREATE QUIZ</title>
</head>
<body>
<form action = "createquiz.php" method="post">


    <p>Enter question below</p>
    <input type="text" name="question">
    <p>Enter correct answer below</p>
    <input type="text" name="answer1">
    <p>Enter answer below</p>
    <input type="text" name="answer2">
    <p>Enter answer below</p>
    <input type="text" name="answer3">
    <p>Enter answer below</p>
    <input type="text" name="answer4">
    <br>
    <br>
    <button type="submit" name="enter"> Add another question </button>
    <button type="submit" name="finish"> Finish Quiz </button>
</form>
</body>
</html>