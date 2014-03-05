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
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    </head>
    <body>
        <?php include('../header.php'); ?>



        <div class="container-fluid">
            <div class="row">
                <?php include('student_sidebar.php'); ?>
                <!-- ***********END OF SIDEBAR PANEL************-->
                <div class="col-sm-9 col-sm-offset-3 main" >             
                    <input type="button" id="mychart" value="chart" />
                      <div id="chart" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

                </div>

            </div>

        </div>
        <script src="chart.js"></script>
        <script src="../../lib/theme/js/highcharts.js"></script>
        <script src="../../lib/theme/js/exporting.js"></script>

      
    </body>
</html>
