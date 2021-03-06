<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <title> HexaGraph   </title>

        <!-- Bootstrap core CSS -->
        <link href="../../lib/theme/css/bootstrap.css" rel="stylesheet">
        <link href="../../lib/theme/css/sidebar.css" rel="stylesheet">         
    </head>
    <body>
        <?php include('header.php'); ?>



        <div class="container-fluid">
            <div class="row">

                <?php include('teacher_sidebar.php'); ?>

                <div class="container">
                    <div class="row">
                        <div class="col-lg-offset-2">
                            <div style="padding: 2%">
                                <p hidden><?php echo $_GET['test_id']; ?></p>

                                <div class="row">
                                    <div class="panel panel-info">
                                        <div class="panel-heading" id="test_summary">

                                        </div>
                                        <div class="panel-body">
                                            <div class="row" hidden id="b" style="padding: 2%">
                                                <center>
                                                    <button class="btn btn-danger">Delete Test</button>
                                                </center>

                                            </div>
                                            <div hidden class="alert-warning" id="error_message" style="padding: 5%; font-size: 15px"></div>
                                            <div class="row" id="question_details"></div>
                                        </div>
                                    </div>
                                </div>



                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="../../lib/theme/js/jquery-1.10.2.js"></script>
        <script src="../../lib/theme/js/bootstrap.js"></script>
        <script src="../../lib/theme/js/modern-business.js"></script>
        <script src="../../lib/theme/docs-assets/js/holder.js"></script>

        <script src="../../lib/theme/js/highcharts.js"></script>
        <script src="../../lib/theme/js/exporting.js"></script>
        <script src="../../controller/teacher/view_test.js"></script>

    </body>
</html>
