<?php
if(!isset($_SESSION))
    session_start();
include 'includeSession.php';
include dirname(dirname(__FILE__)) . '/sewa.ssdndeepu.com/action/completeStatusAction.php';
$userDataHandlerObj = new userDataHandler();
$data = $userDataHandlerObj->getCompleteStatus();
?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Total Registrations</title>

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
                                Total Registrations from <?php echo $_SESSION['user'] ?>
                            </h1>
                            
                        </div>
                    </div>
                    <!-- /.row -->

                    <div class="row">
                        
                        <div class="col-lg-3 text-center" style="padding-bottom: 20px;">
                            <div class="form-group">
                                <input class="form-control" type="text" id="searchByName" placeholder="Search by Name" />
                            </div>
                        </div>
                        
                        
                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover" id="completeStatusTable">
                                    <thead>
                                        <tr id="tableHeads">
                                            <th>Person Incharge</th>
                                            <th>Phone Number</th>
                                            <th>City</th>
                                            <th>Coming Date</th>
                                            <th>Return Date</th>
                                            <th>Total People</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(!empty($data)){?>
                                        <?php foreach ($data as $key => $value) { ?>
                                        <tr class="completeStatusTableRow">
                                                <td class="completeStatusTableRowName"><?php echo $value['Incharge_Name']; ?></td>
                                                <td class="completeStatusTableRowPhoneNumber"><?php echo $value['Incharge_Mobile']; ?></td>
                                                <td class="completeStatusTableRowCity"><?php echo $value['City']; ?></td>
                                                <td class="completeStatusTableRowComingDate"><?php echo $value['Arrival_date']; ?></td>
                                                <td class="completeStatusTableRowReturnDate"><?php echo $value['Departure_date']; ?></td>
                                                <td class="completeStatusTableRowNumberOfPeople"><?php echo (int)$value['Males_Count'] + (int)$value['Females_Count'] + (int)$value['Children_Count']; ?></td>
                                        </tr>
                                        <?php } }?>
                                    </tbody>
                                </table>
                            </div>
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

        <script src="js/completeStatus.js"></script>

    </body>

</html>
