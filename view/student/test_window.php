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
        <link rel="stylesheet" type="text/css" href="../../lib/theme/css/jquery.countdown.css">
        <link href="../../lib/theme/font-awesome/css/font-awesome.min.css" rel="stylesheet">

        <!--*********************************SCRIPTS******************************************-->
        <script src="../../lib/theme/js/jquery-1.10.2.js"></script>

        <!-- Countdown Timer-->

        <script type="text/javascript" src="../../lib/theme/js/jquery.plugin.js"></script> 
        <script src="../../lib/theme/js/jquery.countdown.js"></script>
        <script type = "text/javascript" >
            function preventBack() {
                window.history.forward();
            }
            setTimeout("preventBack()", 0);
            window.onunload = function() {

            };
        </script>

    </head>





    <body>
        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class =" container">
                <a href="#" class =" navbar-brand">HexaGraph</a>
            </div>
        </div>

        <div class="container">  

            <div class="row">
                </br></br>
                <div class=" col-lg-7">
                    <form method="get" id="test_questions">
                        <div class="row">
                            <div class="panel panel-primary">

                                <?php
                                session_start();
                                ?>
                                <?php
                                $test = $_SESSION['test'];
                                $i = $_SESSION['test']['i'];
                                if ($i < sizeof($test['questions']))
                                {

                                    displayQuestion($test['questions'][$i]['type'], $i);
                                }

                                if ($i == sizeof($test['questions']) - 1)
                                {
                                    $next_disabled = "disabled";
                                } else
                                {
                                    $next_disabled = "";
                                }
                                if ($i == 0)
                                {
                                    $previous_disabled = "disabled";
                                } else
                                {
                                    $previous_disabled = "";
                                }
                                ?>
                            </div>

                        </div>
                    </form>
                    <div class="row" style="padding: 5%">
                        <div class="col-lg-offset-1 col-lg-3">

                            <button style="margin-bottom: 05px" class="btn btn-lg btn-primary" id="prev"  type="submit" <?php echo $previous_disabled ?>  >Previous Question</button>
                        </div>
                        <div class="col-lg-offset-3 col-lg-3">

                            <button style="margin-bottom: 05px" class="btn btn-lg btn-success" id="next"  type="submit" <?php echo $next_disabled ?> >Next Question</button>
                        </div>
                    </div>

                </div>



                <div class ="col-lg-offset-1 col-lg-4">

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                                <div style="font-size:16px; padding: 5%">
                                    <?php
                                    echo "<b>Test id : </b>" . $_SESSION['test']['test_id'] . "<br/>";
                                    echo "<b>Number of questions : </b>" . sizeof($_SESSION['test']['questions']) . "<br/>";
                                    echo "<b>Subject : </b>" . $_SESSION['test']['subject_name'] . "<br/>";
                                    echo "<b>Date : </b>" . $_SESSION['test']['date'];
                                    ?>
                                </div>
                            </div>
                        </div>

                        <div class="panel-body">



                            <div class="row">
                                <div class="col-lg-8 col-lg-offset-2">
                                    <div class="panel panel-info">
                                        <div class="panel-heading">
                                            <div id="clock"></div>
                                        </div>
                                    </div>
                                </div>


                                <!--call to countdown-->
                                <script type="text/javascript">
                                    //countdown timer
                                    $("#clock").countdown({until: <?php
                                    $t = $_SESSION['test']['duration'];
                                    $t*=60;
                                    echo $t
                                    ?>,
                                        onExpiry: function() {

                                            var values = $("#test_questions").serialize();
                                            $.ajax(
                                                    {
                                                        type: 'POST',
                                                        url: '../../model/student/submit_test.php',
                                                        cache: false,
                                                        data: values,
                                                        success: function(data)
                                                        {
                                                            window.location = "http://localhost/beproj/view/student/test_result.php";
                                                        }
                                                    });
                                        }
                                    });

                                    //store time of countdown timer
                                    //loop to store time after every min and copy this code to onchange
                                    //var periods = $("clock").countdown('getTimes');
<?php //copy the time to session variable             ?>
                                </script>
                            </div>

                            <div class="row" style="padding: 5%">
                                <center>
                                    </br>
                                    <button style="margin-bottom: 05px" class="btn btn-lg btn-warning" id="submit_test"  type="submit" >Submit Test</button>
                                </center>
                            </div>

                        </div>

                    </div>

                </div>

            </div>
        </div>

        <?php

        function displayQuestion($type, $i)
        {

            echo "<div class=\"panel-heading\" >";
            echo "<div class=\"row\" style=\"padding:5%; font-size:17px\">";
            echo "<b>Question " . ($i + 1) . " : </b>" . $_SESSION['test']['questions'][$i]['question_desc'] . "<br>";
            echo "</div>";
            echo "</div>";

            echo "<div class=\"panel-body\" style=\"padding-left: 7%\">";
            echo "<b style=\" font-size:17px\">Answer : </b><br>";

            //change to Mcq
            if ($type == "Mcq")
            {
                displayMcq($i);
            } elseif ($type == "Subjective")
            {
                displaySubjective($i);
            } elseif ($type == "Numeric")
            {
                displayNumeric($i);
            } elseif ($type == "TrueFalse")
            {
                displayTrueFalse($i);
            }
        }

        function displayMcq($i)
        {
            $AOption = "";
            $BOption = "";
            $COption = "";
            $DOption = "";

            if ($_SESSION['test']['questions'][$i]['response'] == 'A')
            {
                $AOption = "checked=\"checked\"";
            } else if ($_SESSION['test']['questions'][$i]['response'] == 'B')
            {
                $BOption = "checked=\"checked\"";
            } else if ($_SESSION['test']['questions'][$i]['response'] == 'C')
            {
                $COption = "checked=\"checked\"";
            } else if ($_SESSION['test']['questions'][$i]['response'] == 'D')
            {
                $DOption = "checked=\"checked\"";
            }

            echo "<div class=\" row \" style=\"padding:3%\">";
            echo "<input  type = \"radio\" name = \"{$i}\" class =\"option\" value = \"A\" {$AOption} > {$_SESSION['test']['questions'][$i]['optionA']} </br>";
            echo "</div>";

            echo "<div class=\" row \" style=\"padding:3%\">";
            echo "<input type = \"radio\" name = \"{$i}\" class =\"option\" value = \"B\" {$BOption}> {$_SESSION['test']['questions'][$i]['optionB']}</br>";
            echo "</div>";

            echo "<div class=\" row \" style=\"padding:3%\">";
            echo "<input type = \"radio\" name = \"{$i}\" class =\"option\" value = \"C\" {$COption}> {$_SESSION['test']['questions'][$i]['optionC']}</br>";
            echo "</div>";

            echo "<div class=\" row \" style=\"padding:3%\">";
            echo "<input  type = \"radio\" name = \"{$i}\" class =\"option\" value = \"D\" {$COption}> {$_SESSION['test']['questions'][$i]['optionD']}";
            echo "</div>";


            echo "</div>";
        }

        function displaySubjective($i)
        {
            echo "<textarea class=\"form-control\" rows=\"6\" cols=\"200\" id=\"{$i}\" name=\"{$i}\"></textarea>";
            echo "</div>";
        }

        function displayNumeric($i)
        {

            echo "<input type=\"text\" id=\"{$i}\" name=\"{$i}\" class=\"form-control\">";
            echo "</div>";
        }

        function TrueFalse($i)
        {
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

        <script src="../../lib/theme/js/bootstrap.js"></script>
        <script src="../../lib/theme/js/modern-business.js"></script>
        <script type="text/javascript" src="../../controller/student/test_window.js"></script>

    </body>
</html>