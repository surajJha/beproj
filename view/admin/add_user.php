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

                            <div class="page-header"><h3><strong>Add new user</strong></h3></div>

                            <form class="form-horizontal"  method="post" id="add_user_form" >
                                <div class="row">
                                    <div class="form-group col-lg-4" style="padding-left: 80px" >
                                        <label for="au_user_id" class="control-label"> User-id:</label>
                                        <input type="text" id="au_user_id" name="au_user_id" class="form-control">
                                        </input>
                                    </div>   

                                </div>

                                <div class="row">
                                    <div class="form-group col-lg-4" style="padding-left: 80px" >
                                        <label for="au_fname" class="control-label"> First Name:</label>
                                        <input type="text" id="au_fname" name="au_fname" class="form-control">
                                        </input>
                                    </div>   

                                </div>

                                <div class="row">
                                    <div class="form-group col-lg-4" style="padding-left: 80px" >
                                        <label for="au_lname" class="control-label"> Last Name:</label>
                                        <input type="text" id="au_lname" name="au_lname" class="form-control">
                                        </input>
                                    </div>   

                                </div>

                                <div class="row">
                                    <div class="form-group col-lg-4" style="padding-left: 80px" >
                                        <label for="au_email" class="control-label"> Email:</label>
                                        <input type="text" id="au_email" name="au_email" class="form-control">
                                        </input>
                                    </div>   

                                </div>

                                <div class="row">
                                    <div class="form-group col-lg-4" style="padding-left: 80px" >
                                        <label for="au_phone" class="control-label"> Mobile:</label>
                                        <input type="text" id="au_phone" name="au_phone" class="form-control">
                                        </input>
                                    </div>   
                                </div>

                                <div class="row">
                                    <div class="form-group col-lg-4" style="padding-left: 80px" >
                                        <label for="au_dob" class="control-label"> Date of Birth:</label>
                                        <input type="text" id="au_dob" name="au_dob" class="form-control">
                                        </input>
                                    </div>   
                                </div>

                                <div class="row">
                                    <div class="form-group col-lg-4" style="padding-left: 80px" >
                                        <label for="au_type" class="control-label"> Type:</label>
                                        <select type="text" id="au_type" name="au_type" class="form-control">
                                            <option>Select Type</option>
                                            <option value="student">Student</option>
                                            <option value="teacher">Teacher</option>
                                            <option value="admin">Admin</option>
                                        </select>
                                    </div>   
                                </div>
                                
                                <div id="mother_tongue" class="row">
                                    <div class="form-group col-lg-4" style="padding-left: 80px" >
                                        <label for="au_mothertongue" class="control-label"> Mother Tongue:</label>
                                        <input type="text" id="au_mothertongue" name="au_mothertongue" class="form-control">
                                        </input>
                                    </div> 
                                </div>
                                
                                <div id="access_level" class="row">
                                    <div class="form-group col-lg-4" style="padding-left: 80px" >
                                        <label for="au_access" class="control-label"> Access Level:</label>
                                        <select type="text" id="au_access" name="au_access" class="form-control">
                                            <option>Select Access Level</option>
                                            <option value="1">1-Teacher</option>
                                            <option value="2">2-Principal</option>
                                        </select>
                                    </div> 
                                </div>
                                
                                <div class="row" >
                                    <div class="form-group col-lg-4" style="padding-left: 80px">
                                        <button id="submit_add_user" class="btn btn-lg btn-primary " type="submit" style="margin-top: 20px">
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
        
        <script src="../../controller/admin/add_user.js"></script>
    </body>
</html>
