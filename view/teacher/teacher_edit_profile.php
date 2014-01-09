<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <script src="../../lib/theme/js/jquery-1.10.2.js"></script>
        <script src="../../lib/theme/js/bootstrap.js"></script>
        <script type="text/javascript" src="../../lib/theme/js/parsley.min.js"></script>
        <script type="text/javascript" src="../../lib/theme/js/parsley.js"></script>
        <title> HexaGraph   </title>

        <!-- Bootstrap core CSS -->
        <link href="../../lib/theme/css/bootstrap.css" rel="stylesheet">
        <link href="../../lib/theme/css/sidebar.css" rel="stylesheet">         
    </head>

    <body>

        <?php include('../header.php'); ?>



        <div class="container-fluid">
            <div class="row">

                <?php include('teacher_sidebar.php'); ?>
                <!-- ***********END OF SIDEBAR PANEL************8-->

                <!-- START OF USER SPECIFIC CODE******************************************-->


                <div class="col-sm-9 col-sm-offset-3 main">             

                    <div class="row">
                        <div class="col-sm-9">

                            <div class="page-header">
                                <h3>Edit basic information here</h3>
                            </div>
                            <form parsley-validate >
                                <table class="table-condensed" style="border: blue">

                                    <tr ><td>
                                            <h4>  First Name :</h4>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control input-lg" placeholder="Enter your first name" required >

                                        </td>
                                    </tr>



                                    <tr><td>
                                            <h4>   Last Name :  </h4>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control input-lg" placeholder="Enter your last name" required parsley-trigger="change">   
                                        </td>
                                    </tr>



                                    <tr><td>
                                            <h4>   Email :</h4>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control input-lg" placeholder="Enter a valid email id" required parsley-type="email" required>   
                                        </td>
                                    </tr>



                                    <tr><td>
                                            <h4>    Phone Number : </h4>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control input-lg" placeholder="Enter a valid phone number" parsley-type="phone" required>   
                                        </td>
                                    </tr>



                                    <tr><td>
                                            <h4>   Enter New Password :</h4>
                                        </td>
                                        <td>
                                            <input type="password" class="form-control input-lg" placeholder="Enter new password" id="pwd" required>   
                                        </td>
                                    </tr>



                                    <tr><td style="padding-right: 50px">
                                            <h4>   Re-Enter New Password</h4>
                                        </td>
                                        <td>
                                            <input type="password" class="form-control input-lg" placeholder="Re-enter new password" parsley-equalto="#pwd" required parsley-error-message="Passwords do not match">   
                                        </td>
                                    </tr>




                                </table><br><br>&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button class="btn btn-primary btn-lg" type="submit" id="edit_form_submit" style="padding-left: 60px;padding-right: 60px">Submit</button>

                            </form>

                        </div>
                    </div>



























                </div>

                <!-- ********************************************************************-->

                <!-- include footer -->

                <!-- JavaScript -->


                <script src="../../lib/theme/js/modern-business.js"></script>
                <script src="../../lib/theme/docs-assets/js/holder.js"></script>


                <script src="../../controller/teacher/teacherupdate.js"></script>

                </body>
                </html>
