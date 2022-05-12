<?php
    session_start();
    include("includes/dbh.inc.php");
    $questionNum = 1;
    $answerNum = 0;
    $score = 0;

    $quizNum = $_GET['quizNum'];

    ?>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>TAKE QUIZ</title>
    <link rel="stylesheet" href="quizTest.css">
</head>
<body>



<?php

    $query = "SELECT * FROM quizQA WHERE quizID = '$quizNum' ORDER BY questionID ASC ";
    $result = mysqli_query($conn, $query);

    $query2 = "SELECT * FROM quizList WHERE quizID = '$quizNum'";
    $result2 = mysqli_query($conn, $query2);


    $correctArray = [];
    $choiceArray = [];

    $check = false;



    $row3 = mysqli_fetch_array($result2);
    $ham = $row3["quizID"];
    $ham2 = $row3["quizName"];
    $course = $row3["courseID"];
    echo "<div id='contentMargin'> ";
    //for($p = 0; $p < count($ham); $p++) {
        //if($ham[$p] == $quizNum){
            echo '<h1>'.$ham2.'</h1>' ;
        //}
    //}



    echo '<form action="quiztest.php?quizNum='.$quizNum.'" method="post">';
 
    if(mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {

            //if($row['quizID'] == $quizNum) {

                $ans = array($row['answer1'], $row['answer2'], $row['answer3'], $row['answer4']);

                shuffle($ans);
                $name = 'Button+'.strval($questionNum);
                $val = 'test+'.strval($answerNum);



                echo '<h1>Question '.$questionNum.'</h1>';
                echo "<h3>" . $row["question"] . "</h3>" ?>
                <p>Select the correct answer below </p>
                <?php foreach ($ans as $choice) {
                    $searchString = " ";
                    $replaceString = "";
                    $choice2 = str_replace($searchString, $replaceString, $choice);
                    ?>

                        <input type=radio name=<?php echo $name ?> value=<?php echo $choice2?>>
                    <label for=<?php echo $name ?>><?php echo $choice ?></label>
                    <?php

                    $answerNum += 1;
                    $val = 'test+'.strval($answerNum);
                }

                if (isset($_POST[$name])) {

                            // Show the radio button value, i.e. which one was checked when the form was sent
                    $x = $_POST[$name];
                   // echo $x;
                    $choiceArray[$questionNum] = $x;
                    //array_push($ChoiceArray, $x);
                }
                else{
                    $choiceArray[$questionNum] = "";
                }

                $choice3 = str_replace($searchString, $replaceString, $row['answer1']);
                $correctArray[$questionNum] = $choice3;
                $questionNum += 1;

            //}
       }
    }
    echo "<br>";
    echo '<button type="submit" name="butt" value="Submit"> Finish quiz </button>';
    echo "<div> ";


        if(isset($_POST["butt"])) {
            for ($i = 1; $i < $questionNum; $i++) {
                if ($choiceArray[$i] == $correctArray[$i]) {
                    $score += 1;
                }
            }
            echo '<script>alert(' . $score . ')</script>';
                $studentID = $_SESSION["id"];

                $results = ($score / ($questionNum-1)) * 100;

                $resultset = mysqli_query($conn, "SELECT * FROM studentGrades WHERE studentID='$studentID' AND quizID='$quizNum'");
                $count = mysqli_num_rows($resultset);


                if ($count == 0) {

                    $query3 = "INSERT INTO studentGrades(score, quizID, courseID, studentID) values('$results','$quizNum', '$course', '$studentID')";
                    mysqli_query($conn, $query3) or die(mysqli_error());
                    echo '<script>alert(' . $results . ')</script>';

                } else {
                    echo '<script>alert("You can only sit this test once!")</script>';

                }




        echo'<script>window.location = "studentHome.php"</script>';
    }




                echo'</form>';

    ?>

<br>

</body>
</html>