<?php

$conn = mysqli_connect("localhost", "root", "", "aceBase");

$sql = "CREATE TABLE IF NOT EXISTS quizList (
    quizID INT AUTO_INCREMENT PRIMARY KEY,
    courseID INT NOT NULL,
    quizName VARCHAR(255) NOT NULL
    )";

if(mysqli_query($conn, $sql)) echo "<p>Table quizList created.</p>";
else die(mysqli_error($conn));

$sql = "CREATE TABLE IF NOT EXISTS quizQA (
    questionID INT AUTO_INCREMENT PRIMARY KEY,
    quizID INT NOT NULL,
    question VARCHAR(255) NOT NULL,
    answer1 VARCHAR(255) NOT NULL,
    answer2 VARCHAR(255) NOT NULL,
    answer3 VARCHAR(255) NOT NULL,
    answer4 VARCHAR(255) NOT NULL
    )";

if(mysqli_query($conn, $sql)) echo "<p>Table quizQA created.</p>";
else die(mysqli_error($conn));

$sql = "CREATE TABLE IF NOT EXISTS studentGrades (
    score INT NOT NULL,
    quizID INT NOT NULL,
    courseID INT NOT NULL,
    studentID INT NOT NULL

    )";

if(mysqli_query($conn, $sql)) echo "<p>Table studentGrades created.</p>";
else die(mysqli_error($conn));

?>