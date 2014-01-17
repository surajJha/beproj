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
                <?php include('admin_sidebar.php'); ?>
                <!-- ***********END OF SIDEBAR PANEL************-->


                <div class="col-sm-9 col-sm-offset-3 main" >             
                    <div class="container">
                        <div class="row">

                            <div class="page-header"><h3><strong>Manage Subject</strong></h3></div>

                            <form class="form-horizontal"  type="post" id="manage_subject_form" >

                                <div class="row">
                                    <div class="form-group col-lg-4" style="padding-left: 80px" >
                                        <label for="ms_standard" class="control-label"> Standard:</label>
                                        <select id="ms_standard" name="ms_standard" class="form-control">
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-lg-4" style="padding-left: 80px" >
                                        <label for="ms_subject" class="control-label"> Subject:</label>
                                        <select id="ms_subject" name="ms_subject" class="form-control">
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="form-group col-lg-4" style="padding-left: 80px" >                                        
                                        <input type="text" id="ms_new_subject" name="ms_new_subject" class="form-control">
                                        </input>
                                    </div> 
                                </div>

                                <div class="row">
                                    <div class="form-group col-lg-8" style="padding-left: 80px" >
                                        <br/>Please enter the topics separated by a comma(,) or space.<br/>
                                        <label for="ms_topics" class="control-label">Topics:</label>
                                        <textarea class="form-control" rows="10" cols="10" id="ms_topics" name="ms_topics"> </textarea>
                                    </div>
                                </div>

                                <div class="row" >
                                    <div class="form-group col-lg-4" style="padding-left: 80px">
                                        <button id="submit_manage_subject" class="btn btn-lg btn-primary " type="submit" style="margin-top: 20px">
                                            Submit
                                        </button>
                                    </div>    
                                </div>

                            </form>


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
        
        <script src="../../controller/admin/manage_subject.js"></script>
        
    </body>
</html>
