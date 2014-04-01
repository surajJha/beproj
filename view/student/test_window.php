<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <script src="../../lib/theme/js/countdown/countdown.js"></script>
        <title> HexaGraph   </title>


        <!-- Bootstrap core CSS -->
        <link href="../../lib/theme/css/bootstrap.css" rel="stylesheet">

        <!-- Add custom CSS here -->
        <link href="../../lib/theme/css/modern-business.css" rel="stylesheet">
        <link href="../../lib/theme/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/jquery.countdown.css"> 
        <script type="text/javascript" src="js/jquery.plugin.js"></script> 
        <script type="text/javascript" src="js/jquery.countdown.js"></script>
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

                            <div class="col-md-10">
                                <?php
                                echo "<b>Test id : </b>" . $_SESSION['test']['test_id'] . "<br/>";
                                echo "<b>Number of questions : </b>" . sizeof($_SESSION['test']['questions']) . "<br/>";
                                ?>
                            </div>

                            <div class="col-md-2">
                                <?php
                                echo "<b>Subject : </b>" . $_SESSION['test']['subject_name'] . "<br/>";
                                echo "<b>Date : </b>" . $_SESSION['test']['date'];
                                ?>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-offset-5">
                                <div id="clock"></div>

                                <script>
                                    var myCD2 = new Countdown({
                                        // Using "number of seconds"
                                        time: <?php
                                $t = $_SESSION['test']['duration'];
                                $t*=60;
                                echo $t
                                ?>, // Total number of seconds to count down.

                                        width: 200, // Defaults to 200 x 30 pixels, you can specify a custom size here
                                        height: 50, //
                                        inline: true,
                                        rangeHi: "hour", // The highest unit of time to display
                                        rangeLo: "second", // The lowest unit of time to display
                                        numbers: {
                                            font: "Arial",
                                            color: "#FFFFFF",
                                            bkgd: "#365D8B",
                                            rounded: 0.15, // percentage of size 
                                            shadow: {
                                                x: 0, // x offset (in pixels)
                                                y: 3, // y offset (in pixels)
                                                s: 4, // spread
                                                c: "#000000", // color
                                                a: 0.4	 // alpha	// <- no comma on last item!
                                            }
                                        }, // <- no comma on last item!

                                        onclose: submit(),
                                    });


                                </script>
                            </div>
                        </div>

                        <div class="row">
                            <hr>
                        </div>


                        <div class="row">
                            <div style="width:1000px;height:350px;overflow:auto;padding:5px;">

                                <?php
                                $test = $_SESSION['test'];

                                for ($i = 0; $i < sizeof($test['questions']); $i++)
                                {
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

        function displayQuestion($type, $i)
        {

            echo "<div class=\"row\" style=\"padding:2%\">";
            echo "<b>Question " . ($i + 1) . " : </b>" . $_SESSION['test']['questions'][$i]['question_desc'] . "<br>";

            echo "<b>Answer : </b><br>";

            //change to Mcq
            if ($type == "Mcq")
            {
                displayMcq($i);
            }
            elseif ($type == "Subjective")
            {
                displaySubjective($i);
            }
            elseif ($type == "Numeric")
            {
                displayNumeric($i);
            }
            elseif ($type == "TrueFalse")
            {
                displayTrueFalse($i);
            }
        }

        function displayMcq($i)
        {

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
        <script src="../../lib/theme/js/jquery-1.10.2.js"></script>
        <script src="../../lib/theme/js/bootstrap.js"></script>
        <script src="../../lib/theme/js/modern-business.js"></script>

        <script src="../../controller/student/test_window.js"></script>

    </body>
</html>