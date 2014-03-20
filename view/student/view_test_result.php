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
        <?php include('../header.php'); ?>



        <div class="container-fluid">
            <div class="row">
                <!-- ***********END OF SIDEBAR PANEL************-->
                <div class="container">
                    <div class="row">
                        <div class="col-lg-offset-1 col-lg-10">
                            <p hidden><?php echo $_GET['test_id']; ?></p>

                            <div class="row" id="test_summary">

                            </div>

                            <div class="row">
                                <div class="col-lg-3" id="chart1"> </div>
                                <div class="col-lg-9" id="chart2"> </div>
                            </div>

                            <div class="row" id="question_details">

                            </div>

                            <div class="alert-warning" id="error_message" style="padding: 5%; font-size: 20px">

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
        <script src="../../controller/student/view_test_result.js"></script>

    </body>
</html>
