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
        <link href="../../lib/theme/css/sidebar.css" rel="stylesheet">         
    </head>

    <body>

        <?php include('../header.php'); ?>

        <div class="container-fluid">
            <div class="row">
                <?php include('student_sidebar.php'); ?>
                <!-- ***********END OF SIDEBAR PANEL************-->

                <div class="col-sm-9 col-sm-offset-3 main" >             
                    <div class="container">

                        <div class="row">
                            <div class="page-header"><h3><strong>Report List </strong></h3></div>
                        </div>

                        <div class="row"  id="acd_year">
                            <div class="col-lg-8">
                                Academic Year
                            </div>
                        </div>

                        <hr>
                        
                        <div class="row">
                            <div class="col-lg-offset-1 col-lg-8" id="test_name">
                                Test Name
                            </div>
                        </div>

                        <hr>
                        
                        <div class="row">
                            <div class="col-lg-offset-2 col-lg-8">
                                Test1
                            </div>
                        </div>
                        
                        <hr>

                    </div>
                </div>
            </div>
        </div>



        <!-- ********************************************************************-->

        <!-- include footer -->

        <!-- JavaScript -->

        <script src="../../lib/theme/js/jquery-1.10.2.js"></script>
        <script src="../../lib/theme/js/bootstrap.js"></script>
        <script src="../../lib/theme/js/modern-business.js"></script>
        <script src="../../lib/theme/docs-assets/js/holder.js"></script>
    </body>
</html>
