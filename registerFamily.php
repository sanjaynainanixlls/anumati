<?php
session_start();
include 'includeSession.php';
?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Family Registration</title>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="css/sb-admin.css" rel="stylesheet">
        <!-- Form CSS -->
        <link href="css/registerFamily.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!--Bootstrap DatePicker-->
        <link href="css/bootstrap-datepicker3.css" rel="stylesheet">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body>

        <div id="wrapper">
            <?php include_once 'leftSidebar.php'; ?>
            <div id="page-wrapper">

                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">
                                Family Registration
                            </h1>
                        </div>
                    </div>
                    <!-- /.row -->
                    <?php if (isset($_SESSION['message']) && $_SESSION['message'] != '') { ?>
                        <div class="alert alert-success fade in">
                            <a href="#" class="close" data-dismiss="alert">&times;</a>
                            <strong style="font-size:16px"><?php echo $_SESSION['message']; ?></strong>
                        </div>
                    <?php } unset($_SESSION['message']); ?>
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                        <div class="stepwizard">
                            <div class="stepwizard-row setup-panel">
                                <div class="stepwizard-step">
                                    <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
                                    <p>Step 1</p>
                                </div>
                                <div class="stepwizard-step">
                                    <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                                    <p>Step 2</p>
                                </div>
                            </div>
                        </div>
                        <form method="POST" action="action/action.php">
                            <input type="hidden" value="familyRegistration" name="action">
                            <div class="row setup-content" id="step-1">
                                <div class="col-xs-12">
                                    <div class="col-md-12">
                                        <h3> Please Enter Details of Family Head.</h3>
                                        <div class="form-group">
                                            <label class="control-label">Full Name</label>
                                            <input name="inchargeName" maxlength="100" type="text" required="required" class="form-control" placeholder="Enter Full Name" />
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Gender</label>
                                            <select id="gender" name="gender" class="form-control">
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Mobile Number</label>
                                            <input name="mobileNumber" maxlength="10" type="tel" required="required" class="form-control" placeholder="Enter Mobile Number." />
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">E-Mail</label>
                                            <input name="email" type="email" required="required" class="form-control" placeholder="Enter Email" />
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Address</label>
                                            <input name="address" maxlength="100" type="text" required="required" class="form-control" placeholder="Enter Address" />
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">City</label>
                                            <input name="city" maxlength="100" type="text" required="required" class="form-control" placeholder="Enter City" />
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Occupation</label>
                                            <input name="occupation" maxlength="100" type="text" required="required" class="form-control" placeholder="Enter Occupation" />
                                        </div>
                                        <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
                                    </div>
                                </div>
                            </div>
                            <div class="row setup-content" id="step-2">
                                <div class="col-xs-12">
                                    <div class="col-md-12">
                                        <h3> Please enter details of family members.</h3>
                                                <div class="row clearfix">
                                                    <div class="col-md-12 column">
                                                    <input type="hidden" name="count" id="count" value="0">
                                                        <table class="table table-bordered table-hover" id="tab_logic">
                                                            <thead>
                                                                <tr >
                                                                    <th class="text-center">
                                                                        #
                                                                    </th>
                                                                    <th class="text-center">
                                                                        Full Name
                                                                    </th>
                                                                    <th class="text-center">
                                                                        Gender
                                                                    </th>
                                                                    <th class="text-center">
                                                                        Age
                                                                    </th>
                                                                    <th class="text-center">
                                                                        Mobile
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr id='addr1'></tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <a id="add_row" class="btn btn-default pull-left">Add Family Member</a><a id='delete_row' class="pull-right btn btn-default">Delete Family Member</a>
                                            
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 text-center">
                                            <input class="btn btn-success btn-md" type="submit" value="Finish"></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->

        <!-- jQuery -->
        <script src="js/jquery.js"></script>
        <!-- jQuery easing-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>

        <!-- Register Family Core JavaScript -->
        <script src="js/registerFamily.js"></script>

        <!-- Additional JavaScript -->
    </body>

</html>
