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
        <link href="../../lib/theme/css/datepicker.css" rel="stylesheet">  


    </head>

    <body>

        <?php include('../header.php'); ?>



        <div class="container-fluid">
            <div class="row">
                <?php include('teacher_sidebar.php'); ?>
                <!-- ***********END OF SIDEBAR PANEL************8-->


                <div class="col-sm-9 col-sm-offset-3 main">  


                    <div class="page-header">
                        <h3><b>Select type of test </b></h3>
                    </div>

                    <!--**************TABS ***************************************************-->
                    <div class="tabbable">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab1" data-toggle="tab">Random Test</a></li>
                            <li><a href="#tab2" data-toggle="tab">Custom Test</a></li>
                        </ul>

                        <!--*************************************************************************-->
                        <div class="tab-content">
                            <!-- rt == random test, ct == custom test -->
                            <!--**********RANDOM TEST TAB CONTENT****************************-->
                            <div class="tab-pane active" id="tab1"><br><br>

                                <form class="form-horizontal"  type="post" id="rt" >
                                    <div class="row">
                                        <div class="form-group col-lg-5" style="padding-left: 80px" >
                                            <label for="rt_standard" class="control-label"> Standard:</label>

                                            <select id="rt_standard" name="rt_standard" class="form-control">

                                            </select>

                                        </div>   

                                        <div class="form-group col-lg-5" style="padding-left: 80px" >
                                            <label for="rt_standard" class="control-label"> Division:</label>

                                            <select id="rt_standard" name="rt_standard" class="form-control">

                                            </select>

                                        </div>  
                                    </div>
                                    <!-- NEXT ROW-->
                                    <div class="row">
                                        <div class="form-group col-lg-5" style="padding-left: 80px">
                                            <label for="rt_standard" class="control-label"> No. Of Questions:</label>

                                            <input type="text" class="form-control input-md" placeholder="Enter the total number of questions">

                                        </div>  

                                        <div class="form-group col-lg-5" style="padding-left: 80px">
                                            <label for="rt_standard" class="control-label"> Standard:</label>

                                            <input type="text" class="form-control input-md" placeholder="test duration in minutes">

                                        </div>  

                                    </div>

                                    <div class="row">
                                        <input type="text" value="02/16/12" data-date-format="mm/dd/yy" id="datepicker" readonly="readonly" >
                                         <span class="add-on"><i class="icon-th"></i></span>
                                        <script>
                                            $('#datepicker').datepicker();
                                        </script>
                                    </div>    

                                </form>











                            </div>
                            <!--*************************************************************************-->

                            <!--**********CUSTOM TEST TAB CONTENT****************************-->   
                            <div class="tab-pane" id="tab2">

                                <p>I'm in Section 2.</p>











                            </div>
                            <!--*************************************************************************-->
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
    <script src="../../lib/theme/js/bootstrap-datepicker.js"></script>
    <script src="../../lib/theme/js/datepicker.less"></script>

    <!--- link specific js - ajax -->
</body>
</html>
