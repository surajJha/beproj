<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <script src="../../lib/theme/js/jquery-1.10.2.js"></script>
        <script src="../../lib/theme/js/bootstrap.js"></script>
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
                <!-- ***********END OF SIDEBAR PANEL************8-->

                <!-- START OF USER SPECIFIC CODE******************************************-->


                <div class="col-sm-9 col-sm-offset-3 main">             

                    <div class="row">
                        <div class="col-sm-9">

                            <div class="page-header">
                                <h3>Edit basic information here</h3>
                            </div>

                            <div id="success_message" class="alert-success">

                            </div>
                            <div id="error_message" class="alert-warning">

                            </div>


                            <form id="edit_profile_form"  >
                                <table class="table-condensed" style="border: blue">

                                    <tr ><td>
                                            <label for="fname" class="control-label">First Name: </label>
                                        </td>
                                        <td>
                                            <input type="text" name="fname" id="fname" class="form-control input-md" value="<?php echo $_SESSION['fname'] ?>" required >
                                        </td>
                                    </tr>

                                    <tr><td>
                                            <label for="lname" class="control-label">Last Name :</label>
                                        </td>
                                        <td>
                                            <input type="text" name="lname" id="lname" class="form-control input-md" value="<?php echo $_SESSION['lname'] ?>" required >   
                                        </td>
                                    </tr>



                                    <tr><td>
                                            <label for="email" class="control-label">Email: </label>
                                        </td>
                                        <td>
                                            <input type="email" name="email" id="email" class="form-control input-md" value="<?php echo $_SESSION['email'] ?>" required>   
                                        </td>
                                    </tr>



                                    <tr><td>
                                            <label for="phone" class="control-label">Phone Number: </label>
                                        </td>
                                        <td>
                                            <input type="text" name="phone" id="phone" class="form-control input-md" value="<?php echo $_SESSION['phone'] ?>"  required>   
                                        </td>
                                    </tr>



                                    <tr><td>
                                            <label for="password" class="control-label">Enter New Password: </label> 
                                        </td>
                                        <td>
                                            <input type="password" name="password" id="password" class="form-control input-md" placeholder="Enter new password"  required>   
                                        </td>
                                    </tr>

                                    <tr id="re_enter_password"><td>
                                            <label for="re_password" class="control-label">Re-Enter New Password: </label> 
                                        </td>
                                        <td>
                                            <input type="password" name="re_password" id="re_password" class="form-control input-md" placeholder="Re-enter password" required >   
                                        </td>
                                    </tr>

                                    <tr>
                                        <td></td>
                                        <td></td>
                                    </tr>

                                    <tr>
                                        <td></td>
                                        <td>
                                            <button class="btn btn-primary btn-lg" type="submit" id="edit_profile_submit">Submit</button>
                                        </td>
                                    </tr>
                                </table>


                            </form>
                        </div>
                    </div>
                </div>
                <!-- ********************************************************************-->

            </div>
        </div>

        <!-- include footer -->

        <!-- JavaScript -->


        <script src="../../lib/theme/js/modern-business.js"></script>
        <script src="../../lib/theme/docs-assets/js/holder.js"></script>

        <script src="../../controller/edit_profile.js"></script>
        <script>


        </script>
    </body>
</html>
