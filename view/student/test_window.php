<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <title> HexaGraph   </title>


        <!-- Bootstrap core CSS -->
        <link href="../../lib/theme/css/bootstrap.css" rel="stylesheet">

        <!-- Add custom CSS here -->
        <link href="../../lib/theme/css/modern-business.css" rel="stylesheet">
        <link href="../../lib/theme/font-awesome/css/font-awesome.min.css" rel="stylesheet">

    </head>

    <body>
        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class =" container">
                <a href="#" class =" navbar-brand">HexaGraph</a>
            </div>
        </div>

        <div class="container">  
            <div class="row">
                <br>
            </div>
            <div class="row">
                <div class="col-lg-offset-1 col-lg-10">

                    <form method="post" id="test_questions">
                        <div class="row">

                            <?php
                            session_start();
                            ?>

                            <div class="col-md-8">
                                <?php
                                echo "<b>Test id : </b>" . $_SESSION['test']['test_id'] . "<br/>";
                                echo "<b>Number of questions : </b>" . $_SESSION['test']['no_questions'] . "<br/>";
                                ?>
                            </div>

                            <div class="col-md-4">
                                <?php
                                echo "<b>Subject : </b>" . $_SESSION['test']['subject_name'] . "<br/>";
                                echo "<b>Date : </b>" . $_SESSION['test']['date'];
                                ?>
                            </div>
                        </div>

                        <div class="row">
                            <hr>
                        </div>


                        <div class="row">
                            <div style="width:1000px;height:400px;overflow:auto;padding:5px;">

                                <?php
                                $test = $_SESSION['test'];

                                for ($i = 0; $i < $test['no_questions']; $i++) {
                                    echo "<pre>";
                                    //echo "<hr>";
                                    displayQuestion($test['questions'][$i]['type'], $i);
                                    //echo "<hr>";
                                    echo "</pre>";
                                }
                                ?>

                            </div>
                        </div>

                        <div class="row" style="padding: 5%">
                            <div class="col-lg-offset-5">
                                <button style="margin-bottom: 05px" class="btn btn-lg btn-primary" id="submit_test"  type="submit" >Submit Test</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>

        </div>

        <?php

        function displayQuestion($type, $i) {

            echo "<div class=\"row\" style=\"padding:2%\">";
            echo "<b>Question " . ($i + 1) . " : </b>" . $_SESSION['test']['questions'][$i]['question_desc'] . "<br>";

            echo "<b>Answer : </b><br>";

            //change to Mcq
            if ($type == "Mcq") {
                displayMcq($i);
            } elseif ($type == "Subjective") {
                displaySubjective($i);
            } elseif ($type == "Numeric") {
                displayNumeric($i);
            } elseif ($type == "TrueFalse") {
                displayTrueFalse($i);
            }
        }

        function displayMcq($i) {

            echo "<div class=\" col-lg-4 col-lg-offset-1 \">";

            echo "<input  type = \"radio\" name = \"{$i}\" value = \"A\"> {$_SESSION['test']['questions'][$i]['optionA']} <br>";
            echo "<input type = \"radio\" name = \"{$i}\" value = \"B\"> {$_SESSION['test']['questions'][$i]['optionB']}";

            echo "</div>";

            echo "<div class=\" col-lg-4 col-lg-offset-1 \">";

            echo "<input  type = \"radio\" name = \"{$i}\" value = \"C\"> {$_SESSION['test']['questions'][$i]['optionC']} <br>";
            echo "<input  type = \"radio\" name = \"{$i}\" value = \"D\"> {$_SESSION['test']['questions'][$i]['optionD']}";

            echo "</div>";
            echo "</div>";
        }

        function displaySubjective($i) {
            echo "<textarea class=\"form-control\" rows=\"6\" cols=\"200\" id=\"{$i}\" name=\"{$i}\"></textarea>";
            echo "</div>";
        }

        function displayNumeric($i) {

            echo "<input type=\"text\" id=\"{$i}\" name=\"{$i}\" class=\"form-control\">";
            echo "</div>";
        }

        function TrueFalse($i) {
            echo "<div class=\" col-lg-4 col-lg-offset-1 \">";

            echo "<input type = \"radio\" name = \"{$i}\" value = \"True\">True";

            echo "</div>";

            echo "<div class=\" col-lg-4 col-lg-offset-1 \">";

            echo "<input  type = \"radio\" name = \"{$i}\" value = \"False\">False";

            echo "</div>";
            echo "</div>";
        }
        ?>


        <!-- JavaScript -->
        <script src="../../lib/theme/js/jquery-1.10.2.js"></script>
        <script src="../../lib/theme/js/bootstrap.js"></script>
        <script src="../../lib/theme/js/modern-business.js"></script>
        
        <script src="../../controller/student/test_window.js"></script>

    </body>
</html>