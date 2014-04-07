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
                <?php include('student_sidebar.php'); ?>
                <!-- ***********END OF SIDEBAR PANEL************-->


                <div class="col-lg-10 col-lg-offset-2 main" >             

                    <div class="container">
                        <div class="panel panel-info" style="width: 90%">
                            <div class="panel-heading">
                                <h4>Select the parameters to view Results!</h4><br>
                            </div>

                            <div class="panel-body">

                                <form  id="view_results" method="post" class="form-horizontal" >

                                    <div class="row">
                                        <div class="col-lg-4">
                                            <select required id="s1" name="s1" class="form-control">
                                                <option>Select Criteria</option>
                                                <option>Test Performance Summary</option>
                                                <option>My Performance Summary</option>
                                                <option>Subject Performance Summary</option>
                                            </select>
                                        </div>

                                        <div class="col-lg-3" id="s2"></div>

                                        <div class="col-lg-3" id="s3"></div>
                                        
                                        <div class="col-lg-2" id="s4"></div>

                                    </div> 
                                </form>

                            </div>
                        </div>
                    </div>

                    <!--to load the contents through ajax -->
                    <div class="col-lg-11" id ="myContent"></div>


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



        <script src="../../lib/theme/js/highcharts-all.js"></script>
        <script src="../../lib/theme/js/highcharts-more.js"></script>
        <script src="../../lib/theme/js/highcharts.js"></script>


        <script src="../../lib/theme/js/data.js"></script>

        <script src="../../controller/student/results.js"></script>
    </body>
</html>
