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
        <link href="../../lib/theme/css/bootstrap.min.css" rel="stylesheet">
        <link href="../../lib/theme/css/sidebar.css" rel="stylesheet">  
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">


    </head>

    <body>

        <?php include('header.php'); ?>



        <div class="container-fluid">
            <div class="row">
                <?php include('teacher_sidebar.php'); ?>
                <!-- ***********END OF SIDEBAR PANEL************8-->
                <div class="col-lg-offset-3 col-lg-8">  
                    <br>
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <h3><b>Set Question Paper</b></h3>
                        </div>

                        <div class="panel-body">
                            <div class="alert-success" id="success_message">

                            </div>
                            <div class="alert-error" id="error_message">

                            </div>
                            <div id="bigdiv">
                                <form class="form-horizontal"  method="post" id="set_question_paper_form" >

                                    <div class="row">
                                        <div class="col-lg-1"></div>
                                        
                                        <div class="form-group col-lg-4" style="padding-left: 80px" >
                                            <label for="sqp_standard" class="control-label"> Standard:</label>
                                            <select id="sqp_standard" name="sqp_standard" class="form-control">
                                            </select>
                                        </div> 

                                        <div class="col-lg-1"></div>

                                        <div class="form-group col-lg-4" style="padding-left: 80px" >
                                            <label for="sqp_division" class="control-label"> Division:</label>
                                            <select id="sqp_division" name="sqp_division" class="form-control">
                                            </select>
                                        </div>  
                                    </div>


                                    <!-- 2nd ROW-->
                                    <div class="row">
                                        <div class="col-lg-1"></div>
                                        <div class="form-group col-lg-4" style="padding-left: 80px" >
                                            <label for="sqp_subject" class="control-label"> Subject:</label>
                                            <select id="sqp_subject" name="sqp_subject" class="form-control">
                                            </select>
                                        </div>   

                                        <div class="col-lg-1"></div>

                                        <div class="form-group col-lg-4" style="padding-left: 80px" >
                                            <label for="sqp_topic" class="control-label"> Topic:</label>
                                            <select multiple id="sqp_topic" name="sqp_topic[ ]" class="form-control">
                                            </select>
                                        </div> 
                                    </div>

                                    <!-- 3rd ROW-->
                                    <div class="row">
                                        <div class="col-lg-1"></div>
                                        
                                        <div  class="form-group col-lg-4" style="padding-left: 80px">
                                            <label for="sqp_date" class="control-label"> Test Date:</label>
                                            <input type="date" id="sqp_date" name="sqp_date" class="form-control" placeholder= "YYYY-MM-DD"/>
                                        </div> 

                                        <div class="col-lg-1"></div>

                                        <div class="form-group col-lg-4" style="padding-left: 80px">
                                            <label for="sqp_duration" class="control-label"> Test Duration:</label>
                                            <input type="text" id="sqp_duration" name="sqp_duration" class="form-control input-md" placeholder="Enter duration of test in minutes" required>
                                        </div>  
                                    </div>
                                    
                                    <!--5th ROW-->
                                    <div class="row">
                                        <div class="col-lg-1"></div>
                                        
                                        <div class="form-group col-lg-4" style="padding-left: 80px" >
                                            <label for="sqp_name" class="control-label"> Test Name:</label>
                                            <select id="sqp_name" name="sqp_name" class="form-control">
                                            </select>
                                        </div> 

                                        <div class="col-lg-1"></div>

                                        <div id="otn" hidden class="form-group col-lg-4" style="padding-left: 80px" >
                                            <label for="tname" class="control-label"> &nbsp;</label>
                                            <input type="text" id="tname" class="form-control input-md"  name="tname" placeholder="Test Name">
                                        </div>  
                                    </div>


                                    <!--5th ROW-->
                                    <div class="row">
                                        <div class="col-lg-1"></div>
                                        <div class="form-group col-lg-4" style="padding-left: 80px" >
                                            <label for="sqp_random" class="control-label"> Choose type of test:</label>
                                            <select id="sqp_random" name="sqp_random" class="form-control">
                                                <option value="">Select Type</option>
                                                <option value="0">Custom</option>
                                                <option value="1">Random</option>
                                            </select>
                                        </div> 

                                        <div class="col-lg-1"></div>

                                        <div hidden id="nq" class="form-group col-lg-4" style="padding-left: 80px">
                                            <label for="sqp_no_question" class="control-label"> Number of Questions:</label>
                                            <input type="text" id="sqp_no_question" name="sqp_no_question" class="form-control input-md" placeholder="Enter total number of questions" required>
                                        </div> 
                                    </div>

                                    <!--Submit-->
                                    <div class="row" >
                                        <center>
                                            <div class="form-group">
                                                <button id="sqp_submit" class="btn btn-lg btn-primary " type="submit" style="margin-top: 20px">
                                                    Submit
                                                </button>
                                            </div>    
                                        </center>
                                    </div>

                                </form>
                            </div>

                        </div>
                    </div>

                </div>


                <!--*************************************************************************-->

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
        <script src="../../controller/teacher/set_question_paper.js"></script>

        <!--- link specific js - ajax -->
    </body>
</html>
