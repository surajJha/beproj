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


                <div class="col-sm-9 col-sm-offset-2 main" id="bigdiv">             
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="panel panel-default">
                                <div class="panel-heading"><h2><?php echo $_SESSION['fname'] . ' ' . $_SESSION['lname']; ?></h2>
                                </div>
                                <div class="panel-body">Content here..</div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="panel panel-default">
                               
                                <div class="panel-body">
                                    <img src="img1.gif" style="width: 100%">
                                </div>
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
    </body>
</html>
