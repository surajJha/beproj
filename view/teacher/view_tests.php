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

        <?php include('header.php'); ?>


        <div class="container-fluid">
            <div class="row">
                <?php include('teacher_sidebar.php'); ?>
                <!-- ***********END OF SIDEBAR PANEL************8-->


                <div class="col-lg-offset-3" >             

                    <div class="container">
                        <div class="row">
                            <div id="test_table">

                            </div>      

                        </div>

                        <div class="row">
                            <div id="prev_table">

                            </div>      
                        </div>
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

        <script src="../../controller/teacher/view_tests.js"></script>
    </body>
</html>
