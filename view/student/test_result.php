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

        <?php session_start(); ?>

        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class =" container">
                <a href="#" class =" navbar-brand">HexaGraph</a>
            </div>
        </div>

        <!-- PAGE TITLE GOES HERE ************************************ -->
        <div class="container">
            <div style="width:1200px;height:800px;overflow:auto;padding:5px;">

                <div class="row">
                    <div class="col-lg-offset-1 col-lg-10"> 

                        <div style="padding: 5%">

                            <div class="row">
                                <center>
                                    <h3>Test Result</h3>
                                </center>
                            </div>

                            <hr/>

                            <div class="row">
                                <div class="col-lg-offset-1 col-lg-4">
                                    <b>Test id : </b> <?php echo $_SESSION['test_id'] . "<br/>"; ?>
                                    <b>Subject : </b> <?php echo $_SESSION['test']['subject_name'] . "<br/>"; ?>
                                    <b>Class : </b> <?php echo $_SESSION['test']['standard'] . " - " . $_SESSION['test']['division'] . "<br/>"; ?>
                                </div> 

                                <div class="col-lg-offset-1 col-lg-4">
                                    <b>Date : </b> <?php echo $_SESSION['test']['date'] . "<br/>"; ?>
                                    <b>Duration : </b> <?php echo $_SESSION['test']['duration'] . " minutes" . "<br/>"; ?>
                                </div>
                            </div>



                            <div class="row" style="color: green">
                                <div class="col-lg-offset-1 col-lg-4">
                                    <b>
                                        Marks Obtained : <?php echo $_SESSION['test']['m']; ?> 
                                    </b>
                                </div>

                                <div class="col-lg-offset-1 col-lg-4">
                                    <b>
                                        Total Marks : <?php echo $_SESSION['test']['no_questions']; ?>
                                    </b>
                                </div>
                            </div>

                            <hr/>

                            <div class="row">
                                <div style="width:1000px;height:350px;overflow:auto;padding:5px;">
                                    <div class="table-responsive">
                                        <table class="table table-striped">

                                            <thead>
                                                <tr> 
                                                    <th>Question No.</th> <th>Description</th> <th>Your Answer</th> <th>Correct Answer</th> 
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php
                                                for ($i = 0; $i < sizeof($_SESSION['test']['questions']); $i++)
                                                {
                                                    $r = "<tr>";
                                                    $r.="<td>" . ($i + 1) . "</td>";
                                                    $r.="<td>" . $_SESSION['test']['questions'][$i]['question_desc'] . "</td>";
                                                    $r.="<td>" . $_SESSION['test']['questions'][$i]['response'] . "</td>";
                                                    $r.="<td>" . $_SESSION['test']['questions'][$i]['answer'] . "</td>";
                                                    $r.="</tr>";
                                                    echo $r;
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <hr/>
                            </div>
                        </div>
                    </div>  

                </div>
            </div>
        </div>

        <!-- **************************************************** -->

        <!-- * destroying session variables related to that test * -->

        <?php
        if (isset($_SESSION['test_id']))
            unset($_SESSION['test_id']);
        if (isset($_SESSION['test']))
            unset($_SESSION['test']);
        ?>
        <!-- ******************************************************** -->

        <!-- JavaScript -->
        <script src="../../lib/theme/js/jquery-1.10.2.js"></script>
        <script src="../../lib/theme/js/bootstrap.js"></script>
        <script src="../../lib/theme/js/modern-business.js"></script>

    </body>
</html>