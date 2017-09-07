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
        <style>
            /* Center the loader */
            #loader {
            position: absolute;
            left: 50%;
            top: 50%;
            z-index: 1;
            width: 150px;
            height: 150px;
            margin: -75px 0 0 -75px;
            border: 16px solid #f3f3f3;
            border-radius: 50%;
            border-top: 16px solid #3498db;
            width: 120px;
            height: 120px;
            -webkit-animation: spin 2s linear infinite;
            animation: spin 2s linear infinite;
            display: none;
            }

            @-webkit-keyframes spin {
            0% { -webkit-transform: rotate(0deg); }
            100% { -webkit-transform: rotate(360deg); }
            }

            @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
            }

            /* Add animation to "page content" */
            .animate-bottom {
            position: relative;
            -webkit-animation-name: animatebottom;
            -webkit-animation-duration: 1s;
            animation-name: animatebottom;
            animation-duration: 1s
            }

            @-webkit-keyframes animatebottom {
            from { bottom:-100px; opacity:0 } 
            to { bottom:0px; opacity:1 }
            }

            @keyframes animatebottom { 
            from{ bottom:-100px; opacity:0 } 
            to{ bottom:0; opacity:1 }
            }
        </style>

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
                        <div class="col-md-12" id="loader"></div>
                    </div>
                    <!-- /.row -->
                    <?php if (isset($_SESSION['message']) && $_SESSION['message'] != '') { ?>
                        <div class="alert alert-success fade in">
                            <a href="#" class="close" data-dismiss="alert">&times;</a>
                            <strong style="font-size:16px"><?php echo $_SESSION['message']; ?></strong>
                        </div>
                    <?php } unset($_SESSION['message']); ?>
                    <div id="printDetails">
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
        <script>
            $(document).ready(function(){
                var arrivalDate = moment($('#stayDetails').data('arrivaldate')).format('DD-MM-YYYY');
                var departureDate = moment($('#stayDetails').data('departuredate')).format('DD-MM-YYYY');
                var stayDetails = arrivalDate.concat(' To ', departureDate);
                $('.stayDetailSpan').html(stayDetails);
                // var printContent = $('#printContent').html();
                // $('#printHtml').val(printContent);
                // $('#generatePassForm').submit(function(){
                //     $('#detailsDiv').hide();
                //     $('#loader').show();
                // });
            });
        </script>

    </body>

</html>
