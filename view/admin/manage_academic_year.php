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
                <?php include('admin_sidebar.php'); ?>
                <!-- ***********END OF SIDEBAR PANEL************-->


                <div class="col-sm-9 col-sm-offset-3 main" >             

                    <div class="container">
                        <div class="row">

                            <div class="page-header"><h3><strong>Manage Academic Year</strong></h3></div>

                            <form class="form-horizontal"  method="post" id="acad_year_form" >

                                <div class="row">
                                    <div class="form-group col-lg-4" style="padding-left: 80px" >
                                        <label for="acad_start" class="control-label"> Start Date:</label>
                                        <input type="date" id="acad_start" name="acad_start" class="form-control">
                                        </input>
                                    </div> 
                                </div>



                                <div class="row">
                                    <div class="form-group col-lg-4" style="padding-left: 80px" >
                                        <label for="acad_end" class="control-label"> End Date:</label>
                                        <input type="date" id="acad_end" name="acad_end" class="form-control">
                                        </input>
                                    </div> 
                                </div>

                                <div class="row" >
                                    <div class="form-group col-lg-4" style="padding-left: 80px">
                                        <button id="submit_acad_year" class="btn btn-lg btn-primary " type="submit" style="margin-top: 20px">
                                            Submit
                                        </button>
                                    </div>    
                                </div>

                            </form>

                            <div class="alert-success" id="success_message">

                            </div>
                            <div class="alert-error" id="error_message">

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
        
        <script src="../../controller/admin/manage_academic_year.js"></script>
    </body>
</html>
