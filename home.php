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

        <title>HOME :: SSDNDEEPU</title>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="css/sb-admin.css" rel="stylesheet">

        <!-- Morris Charts CSS -->
        <link href="css/plugins/morris.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

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
                                Anand Niwas, Shri Anandpur 
                            </h1>

                            <ol class="breadcrumb">
                                <li class="active">
                                    <i class="fa fa-dashboard"></i> Dashboard
                                </li>
                            </ol>
                        </div>

                    </div>
                    <!-- /.row -->

                    <?php if (isset($_SESSION['message']) && $_SESSION['message'] != '') { ?>
                        <div class="alert alert-success fade in">
                            <a href="#" class="close" data-dismiss="alert">&times;</a>
                            <strong style="font-size:16px"><?php echo $_SESSION['message']; ?></strong>
                        </div>
                    <?php } unset($_SESSION['message']);?>
                    <div class="row">
                        <a href="searchDetails.php"><div class="col-lg-6 col-md-6">
                                <div class="panel panel-primary">
                                    <div class="panel-heading text-center">
                                        <div class="row">
                                            <h1>Generate Anumati Pass</h1>
                                        </div>
                                    </div>
                                </div>
                            </div></a>
                        <a href="registerFamily.php"><div class="col-lg-6 col-md-6">
                                <div class="panel panel-primary">
                                    <div class="panel-heading text-center">
                                        <div class="row">
                                            <h1>Register New Family</h1>
                                        </div>
                                    </div>
                                </div>
                            </div></a>
                    </div>
                    <div id="printDetails" style="display:none">
                    <?php 
                        if(isset($_SESSION['anumatiPassDetails'])){
                            $anumatiPassDetails = $_SESSION['anumatiPassDetails'];
                        }
                        if(isset($_SESSION['inchargeDetails'])){
                            $inchargeDetails = $_SESSION['inchargeDetails'];
                        }
                        if(isset($_SESSION['memberDetails'])){
                            $memberDetails = $_SESSION['memberDetails'];
                        }
                        
                        $count = 0;
                        foreach ($anumatiPassDetails as $key => $anumatiPassDetail) {
                            if(isset($anumatiPassDetail['isIncharge']) && $anumatiPassDetail['isIncharge'] == 1){
                                ?>
                                    <div class="row" id="detailsDiv">
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
                                                <td class='subHeader'><?php if(isset($anumatiPassDetail)){
                                                    echo $anumatiPassDetail['anumatiPassNumber'];
                                                } 
                                                ?></td>
                                                <td class='subHeader'>Date:</td>
                                                <td class='subHeader'><?php echo date('d-m-Y') ?></td>
                                            </tr>
                                            <tr>
                                                <td class='subHeader'>Sangat Incharge:</td>
                                                <td class='subHeader'><?php echo $inchargeDetails['inchargeName']; ?></td>
                                                <td class='subHeader'>Sangat Mobile:</td>
                                                <td class='subHeader'><?php echo $inchargeDetails['mobileNumber']; ?></td>
                                            </tr>
                                            <tr>
                                                <td class='subHeader'>Rehbar Name:</td>
                                                <td class='subHeader'>Param Pujniye Ammaji</td>
                                                <td class='subHeader'>Rehbar Mobile:</td>
                                                <td class='subHeader'>9011870007</td>
                                            </tr>
                                            <tr>
                                                <td class='subHeader'>Address</td>
                                                <td class='subHeader'><?php echo $inchargeDetails['address']; ?></td>
                                                <td class='subHeader'>Gender</td>
                                                <td class='subHeader'><?php echo $inchargeDetails['gender']; ?></td> 
                                            </tr>
                                            <tr class='stayDetails'>
                                                <td class='subHeader'>Stay Details</td>
                                                <td class='subHeader' id='stayDetails' data-arrivalDate=<?php echo $anumatiPassDetail['arrivalDate']; ?> data-departureDate=<?php echo $anumatiPassDetail['departureDate']; ?>><span class="stayDetailSpan"></span></td>
                                            </tr>
                                            <tr>
                                                <td class='header text-center' colspan='4'><strong>Note: This pass is only for Param Pujniye Ammaji’s Sangat.</strong></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                                <?php
                            }
                            else{
                                foreach ($memberDetails as $key => $singleMember) {
                                   if($singleMember['familyMemberId'] == $anumatiPassDetail['sangatId'] && $anumatiPassDetail['isIncharge'] == 0){
                                        ?>
                                                <div class="row" id="detailsDiv">
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
                                                <td class='subHeader'><?php if(isset($anumatiPassDetail)){
                                                    echo $anumatiPassDetail['anumatiPassNumber'];
                                                } 
                                                ?></td>
                                                <td class='subHeader'>Date:</td>
                                                <td class='subHeader'><?php echo date('d-m-Y') ?></td>
                                            </tr>
                                            <tr>
                                                <td class='subHeader'>Sangat Incharge:</td>
                                                <td class='subHeader'><?php echo $singleMember['fullName']; ?></td>
                                                <td class='subHeader'>Sangat Mobile:</td>
                                                <td class='subHeader'><?php echo $singleMember['mobileNumber']; ?></td>
                                            </tr>
                                            <tr>
                                                <td class='subHeader'>Rehbar Name:</td>
                                                <td class='subHeader'>Param Pujniye Ammaji</td>
                                                <td class='subHeader'>Rehbar Mobile:</td>
                                                <td class='subHeader'>9011870007</td>
                                            </tr>
                                            <tr>
                                                <td class='subHeader'>Address</td>
                                                <td class='subHeader'><?php echo $inchargeDetails['address']; ?></td>
                                                <td class='subHeader'>Gender</td>
                                                <td class='subHeader'><?php echo $inchargeDetails['gender']; ?></td> 
                                            </tr>
                                            <tr class='stayDetails'>
                                                <td class='subHeader'>Stay Details</td>
                                                <td class='subHeader' id='stayDetails' data-arrivalDate=<?php echo $anumatiPassDetail['arrivalDate']; ?> data-departureDate=<?php echo $anumatiPassDetail['departureDate']; ?>><span class="stayDetailSpan"></span></td>
                                            </tr>
                                            <tr>
                                                <td class='header text-center' colspan='4'><strong>Note: This pass is only for Param Pujniye Ammaji’s Sangat.</strong></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                                        <?php
                                   }
                                }
                            }
                        }    
                    ?>
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
        <!-- Additional JavaScript -->
        <script src="js/script.js"></script>




    </body>

</html>
