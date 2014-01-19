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

                <!-- VIEW SPECEFIC CODE here -->
                <div class="col-sm-9 col-sm-offset-3 main" >             

                    <div class="container">
                        <div class="row">

                            <div class="page-header"><h3><strong>Manage Class</strong></h3></div>
                            <!-- ******** TABS HERE****************-->
                            <div class="tabbable">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#tab1" data-toggle="tab">Assign Class Teacher</a></li>
                                    <li><a href="#tab2" data-toggle="tab">Assign Subject Teacher</a></li>
                                    <li><a href="#tab3" data-toggle="tab">Assign Student</a></li>
                                    <li><a href="#tab4" data-toggle="tab">Add Class</a></li>
                                </ul>


                                <!-- ***************************************ALL TAB Content HERE*********************************-->
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab1">
                                        <!-- ********CT TAB Content HERE****************-->
                                        <br/>
                                        <form class="form-horizontal"  type="post" id="assign_class_teacher" >

                                            <div class="row">

                                                <div class="form-group col-lg-4" style="padding-left: 80px" >
                                                    <label for="ct_standard" class="control-label"> Standard:</label>
                                                    <select id="ct_standard" name="ct_standard" class="form-control">
                                                    </select>
                                                </div>   

                                                <div class="form-group col-lg-4" style="padding-left: 80px" >
                                                    <label for="ct_division" class="control-label"> Division:</label>
                                                    <select id="ct_division" name="ct_division" class="form-control">
                                                    </select>
                                                </div>  
                                            </div>

                                            <!-- NEXT ROW-->
                                            <div class="row">
                                                <div class="form-group col-lg-4" style="padding-left: 80px" >
                                                    <label for="ct_teacher" class="control-label"> Class Teacher:</label>
                                                    <select id="ct_teacher" name="ct_teacher" class="form-control">
                                                    </select>
                                                </div>   
                                            </div>


                                            <div class="row" >
                                                <div class="form-group col-lg-4" style="padding-left: 80px">
                                                    <button id="submit_class_teacher" class="btn btn-lg btn-primary " type="submit" style="margin-top: 20px">
                                                        Submit
                                                    </button>
                                                </div>    
                                            </div>

                                        </form>

                                        <div class="alert-success" id="success_message_tab1">

                                        </div>
                                        <div class="alert-error" id="error_message_tab1">

                                        </div>


                                    </div>




                                    <div class="tab-pane" id="tab2">
                                        <!-- ********ASSIGN SUBJECT TEACHER TAB Content HERE****************-->
                                        <br/>
                                        <form class="form-horizontal"  method="post" id="assign_subject_teacher" >

                                            <div class="row">

                                                <div class="form-group col-lg-4" style="padding-left: 80px" >
                                                    <label for="st_standard" class="control-label"> Standard:</label>
                                                    <select id="st_standard" name="st_standard" class="form-control">
                                                    </select>
                                                </div>   

                                                <div class="form-group col-lg-4" style="padding-left: 80px" >
                                                    <label for="st_division" class="control-label"> Division:</label>
                                                    <select id="st_division" name="st_division" class="form-control">
                                                    </select>
                                                </div>  
                                            </div>

                                            <!-- NEXT ROW-->
                                            <div class="row">
                                                <div class="form-group col-lg-4" style="padding-left: 80px" >
                                                    <label for="st_subject" class="control-label"> Subject:</label>
                                                    <select id="st_subject" name="st_subject" class="form-control">
                                                    </select>
                                                </div> 
                                                <div class="form-group col-lg-4" style="padding-left: 80px" >
                                                    <label for="st_teacher" class="control-label"> Teacher:</label>
                                                    <select id="st_teacher" name="st_teacher" class="form-control">
                                                    </select>
                                                </div>   
                                            </div>


                                            <div class="row" >
                                                <div class="form-group col-lg-4" style="padding-left: 80px">
                                                    <button id="submit_subject_teacher" class="btn btn-lg btn-primary " type="submit" style="margin-top: 20px">
                                                        Submit
                                                    </button>
                                                </div>    
                                            </div>

                                        </form>

                                        <div class="alert-success" id="success_message_tab2">

                                        </div>
                                        <div class="alert-error" id="error_message_tab2">

                                        </div>

                                    </div>

                                    <div class="tab-pane" id="tab3">
                                        <!-- ********STUDENT TAB Content HERE****************-->
                                        <br/>
                                        <form class="form-horizontal"  method="post" id="assign_students" >

                                            <div class="row">

                                                <div class="form-group col-lg-4" style="padding-left: 80px" >
                                                    <label for="s_standard" class="control-label"> Standard:</label>
                                                    <select id="s_standard" name="s_standard" class="form-control">
                                                    </select>
                                                </div>   

                                                <div class="form-group col-lg-4" style="padding-left: 80px" >
                                                    <label for="s_division" class="control-label"> Division:</label>
                                                    <select id="s_division" name="s_division" class="form-control">
                                                    </select>
                                                </div>  
                                            </div>

                                            <!-- NEXT ROW-->
                                            <div class="row">
                                                <div class="form-group col-lg-8" style="padding-left: 80px" >
                                                    <br/>Please enter the user-ids of students separated by a comma(,) or space or upload CSV file.<br/>
                                                    <label for="students" class="control-label">Add students:</label>
                                                    <textarea class="form-control" rows="10" cols="10" id="students" name="students"></textarea>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="form-group col-lg-8" style="padding-left: 80px" >
                                                    <div style="position:relative;">
                                                        <a class='btn btn-default' href='javascript:;'>
                                                            Add CSV File
                                                            <input type="file" style='position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;color:transparent;' id="students_csv" name="students_csv" size="40"  onchange='$("#upload-file-info").html($(this).val());'>
                                                        </a>
                                                        &nbsp;
                                                        <span class='label label-info' id="upload-file-info"></span>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="row" >
                                                <div class="form-group col-lg-4" style="padding-left: 80px">
                                                    <button id="submit_assign_students" class="btn btn-lg btn-primary " type="submit" style="margin-top: 20px">
                                                        Submit
                                                    </button>
                                                </div>    
                                            </div>

                                        </form>
                                        <div class="alert-success" id="success_message_tab3">

                                        </div>
                                        <div class="alert-error" id="error_message_tab3">

                                        </div>

                                    </div>

                                    <div class="tab-pane" id="tab4">
                                        <!-- ********Class TAB Content HERE****************-->
                                        <br/>
                                        <form class="form-horizontal"  method="post" id="add_class" >

                                            <div class="row">

                                                <div class="form-group col-lg-4" style="padding-left: 80px" >
                                                    <label for="set_standard" class="control-label"> Standard:</label>
                                                    <input type="text" id="set_standard" name="set_standard" class="form-control">
                                                    </input>
                                                </div>   

                                                <div class="form-group col-lg-4" style="padding-left: 80px" >
                                                    <label for="set_division" class="control-label"> Division:</label>
                                                    <input type="text" id="set_division" name="set_division" class="form-control">
                                                    </input>
                                                </div>  
                                            </div>



                                            <div class="row" >
                                                <div class="form-group col-lg-4" style="padding-left: 80px">
                                                    <button id="submit_add_class" class="btn btn-lg btn-primary " type="submit" style="margin-top: 20px">
                                                        Submit
                                                    </button>
                                                </div>    
                                            </div>

                                        </form>

                                        <div class="alert-success" id="success_message_tab4">

                                        </div>
                                        <div class="alert-error" id="error_message_tab4">

                                        </div>

                                    </div>
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

        <script src="../../controller/admin/manage_class.js"></script>
    </body>
</html>
