<?php
if(!isset($_SESSION))
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
        <title>Generate Pass</title>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="css/sb-admin.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


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
                                Generate Pass
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
                        <div class="col-lg-12">
                            <div class="table-responsive" id='printContent'>
                                <table class="table table-responsive table-bordered">
                                    <tr>
                                        <th class='header text-center' colspan='4'>
                                            Shri Satguru Devay Namah
                                        </th>
                                    </tr>
                                    <tr>
                                        <th class='header text-center' colspan='4'>
                                            Anumati Pass
                                        </th>
                                    </tr>
                                    <tr>
                                        <td class='subHeader'>S.No:</td>
                                        <td class='subHeader'><?php if(isset($_POST['id']))  echo $_POST['id'];?></td>
                                        <td class='subHeader'>Date:</td>
                                        <td class='subHeader'><?php echo date('d-m-Y') ?></td>
                                    </tr>
                                    <tr>
                                        <td class='subHeader'>Sangat Incharge:</td>
                                        <td class='subHeader'><?php if(isset($_POST['name']))  echo $_POST['name'];?></td>
                                        <td class='subHeader'>Sangat Mobile:</td>
                                        <td class='subHeader'><?php if(isset($_POST['mobileNumber']))  echo $_POST['mobileNumber'];?></td>
                                    </tr>
                                    <tr>
                                        <td class='subHeader'>Rehbar Name:</td>
                                        <td class='subHeader'>Param Pujniye Ammaji</td>
                                        <td class='subHeader'>Rehbar Mobile:</td>
                                        <td class='subHeader'>9011870007</td>
                                    </tr>
                                    <tr>
                                        <td class='subHeader'>Address</td>
                                        <td class='subHeader'><?php if(isset($_POST['address']))  echo $_POST['address'];?></td>
                                        <td class='subHeader'>Gender</td>
                                        <td class='subHeader'><?php if(isset($_POST['gender']))  echo $_POST['gender'];?></td> 
                                    </tr>
                                    <tr class='stayDetails'>
                                        <td class='subHeader'>Stay Details</td>
                                        <td class='subHeader' id='stayDetails'></td>
                                    </tr>
                                    <tr>
                                        <td class='header text-center' colspan='4'><strong>Note: This pass is only for Param Pujniye Ammaji’s Sangat.</strong></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <form role="form" action="action/action.php" method="post">
                                <input type="hidden" value="generatePass" name="action">
                                <input type="hidden" value="<?php if(isset($_POST['sangat_id']))  echo $_POST['sangat_id'];?>" name="sangat_id">
                                <input type="hidden" value="<?php if(isset($_POST['name']))  echo $_POST['name'];?>" name="name">
                                <input type="hidden" value="<?php if(isset($_POST['gender']))  echo $_POST['gender'];?>" name="gender">
                                <input type="hidden" value="<?php if(isset($_POST['father_name']))  echo $_POST['father_name'];?>" name="fatherName">
                                <input type="hidden" value="<?php if(isset($_POST['mobile_number']))  echo $_POST['mobile_number'];?>" name="mobileNumber">
                                <input type="hidden" value="<?php if(isset($_POST['email']))  echo $_POST['email'];?>" name="email">
                                <input type="hidden" value="<?php if(isset($_POST['address']))  echo $_POST['address'];?>" name="address">
                                <input type="hidden" value="<?php if(isset($_POST['city']))  echo $_POST['city'];?>" name="city">
                                <input type="hidden" value="<?php if(isset($_POST['state']))  echo $_POST['state'];?>" name="state">
                                <input type="hidden" value="<?php if(isset($_POST['country']))  echo $_POST['country'];?>" name="country">
                                <input type="hidden" value="<?php if(isset($_POST['occupation']))  echo $_POST['occupation'];?>" name="occupation">
                                <input id="printHtml" type="hidden" value="" name="printHtml">
                                <div class="row" style="margin:10px">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-md-12 col-sm-12 col-xs-12 control-label" for="Arrival Date">Arrival Date</label>
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <input id="arrivalDate" name="arrivalDate" type="date" placeholder="Arrival Date" class="form-control input-md"
                                                    required="required">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-md-12 col-sm-12 col-xs-12 control-label" for="Departure Date">Departure Date</label>
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <input id="departureDate" name="departureDate" type="date" placeholder="Departure Date" class="form-control input-md"
                                                    required="required">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="margin:10px">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-md-12 col-sm-12 col-xs-12 control-label" for="selectbasic">Vehicle Type</label>
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <select id="selectbasic" name="comingBy" class="form-control">
                                                    <option value="Private Car">Private Car</option>
                                                    <option value="Train">Train</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <!-- Select Basic -->
                                        <div class="form-group">
                                            <label class="col-md-12 col-sm-12 col-xs-12 control-label" for="selectbasic">From/Via</label>
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <select id="selectbasic" name="comingFrom" class="form-control">
                                                    <option value="Ashok Nagar">Ashok Nagar</option>
                                                    <option value="Gwalior">Gwalior</option>
                                                    <option value="Urli">Urli</option>
                                                    <option value="Mumbai">Mumbai</option>
                                                    <option value="Pune">Pune</option>
                                                    <option value="Bina">Bina</option>
                                                    <option value="Lalitpur">Lalitpur</option>
                                                    <option value="Jhansi">Jhansi</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group text-center">
                                    <label class="col-md-12 col-sm-12 col-xs-12 control-label" for="button1id"></label>
                                    <div class="col-md-12">
                                        <button id="button1id" name="button1id" class="btn btn-success">Submit</button>
                                        <button id="button2id" name="button2id" class="btn btn-warning">Reset</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->
        
        <!-- jQuery -->
        <script src="js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>

        <script src="https://momentjs.com/downloads/moment.min.js"></script>
        <script>
            $('#button1id').click(function(){
                var arrivalDate = moment($('#arrivalDate').val()).format('DD-MM-YYYY');
                var departureDate = moment($('#departureDate').val()).format('DD-MM-YYYY');
                var stayDetails = arrivalDate.concat(' To ', departureDate);
                $('#stayDetails').text(stayDetails);
                var printContent = $('#printContent').html();
                $('#printHtml').val(printContent);
            });
        </script>

    </body>

</html>
