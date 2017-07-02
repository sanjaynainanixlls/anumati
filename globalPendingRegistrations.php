<?php
if(!isset($_SESSION))
    session_start();
include 'includeSession.php';
include dirname(dirname(__FILE__)) . '/sewa.ssdndeepu.com/action/globalPendingRegistrationsAction.php';
$userDataHandlerObj = new userDataHandler();
$data = $userDataHandlerObj->getGlobalPendingRegistrations();
?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Pending Registrations</title>

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
                                Pending Registrations
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
                                            <th>ARRIVAL Date</th>
                                            <th>DEPARTURE Date</th>
                                            <th>PERSON INCHARGE</th>
                                            <th>GENDER</th>
                                            <th>MOBILE NUMBER</th>
                                            <th>ADDRESS</th>
                                            <th>CITY</th>
                                            <th>STATE</th>
                                            <th>EMAIL</th>
                                            <th>MALES</th>
                                            <th>FEMALES</th>
                                            <th>CHILDREN</th>
                                            <th>MEMBER 1</th>
                                            <th>MEMBER 1 GENDER</th>
                                            <th>MEMBER 1 AGE</th>
                                            <th>MEMBER 1 MOBILE</th>
                                            <th>MEMBER 2</th>
                                            <th>MEMBER 2 GENDER</th>
                                            <th>MEMBER 2 AGE</th>
                                            <th>MEMBER 2 MOBILE</th>
                                            <th>MEMBER 3</th>
                                            <th>MEMBER 3 GENDER</th>
                                            <th>MEMBER 3 AGE</th>
                                            <th>MEMBER 3 MOBILE</th>
                                            <th>MEMBER 4</th>
                                            <th>MEMBER 4 GENDER</th>
                                            <th>MEMBER 4 AGE</th>
                                            <th>MEMBER 4 MOBILE</th>
                                            <th>MEMBER 5</th>
                                            <th>MEMBER 5 GENDER</th>
                                            <th>MEMBER 5 AGE</th>
                                            <th>MEMBER 5 MOBILE</th>
                                            <th>COMING BY</th>
                                            <th>VIA</th>
                                            <th>Done</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(!empty($data)){?>
                                        <?php foreach ($data as $key => $value) { ?>
                                        <tr class="completeStatusTableRow">
                                            <form role="form" action="action/action.php" method="post">
                                                <input type="hidden" value="markAsDone" name="action">
                                                <input type="hidden" value="<?php if(isset($value['id']))  echo $value['id'];?>" name="id">
                                                <td class="completeStatusTableRowComingDate"><?php echo $value['Arrival_date']; ?></td>
                                                <td class="completeStatusTableRowReturnDate"><?php echo $value['Departure_date']; ?></td>
                                                <td class="completeStatusTableRowName"><?php echo $value['Incharge_Name']; ?></td>
                                                <td><?php echo $value['Incharge_Gender']; ?></td>
                                                <td class="completeStatusTableRowPhoneNumber"><?php echo $value['Incharge_Mobile']; ?></td>
                                                <td><?php echo $value['Address']; ?></td>
                                                <td class="completeStatusTableRowCity"><?php echo $value['City']; ?></td>
                                                <td><?php echo $value['State']; ?></td>
                                                <td><?php echo $value['Email_Id']; ?></td>
                                                <td><?php echo $value['Males_Count']; ?></td>
                                                <td><?php echo $value['Females_Count']; ?></td>
                                                <td><?php echo $value['Children_Count']; ?></td>
                                                <td><?php echo $value['Member_Name_1']; ?></td>
                                                <td><?php echo $value['Gender_1']; ?></td>
                                                <td><?php echo $value['Age_1']; ?></td>
                                                <td><?php echo $value['Mobile_1']; ?></td>
                                                <td><?php echo $value['Member_Name_2']; ?></td>
                                                <td><?php echo $value['Gender_2']; ?></td>
                                                <td><?php echo $value['Age_2']; ?></td>
                                                <td><?php echo $value['Mobile_2']; ?></td>
                                                <td><?php echo $value['Member_Name_3']; ?></td>
                                                <td><?php echo $value['Gender_3']; ?></td>
                                                <td><?php echo $value['Age_3']; ?></td>
                                                <td><?php echo $value['Mobile_3']; ?></td>
                                                <td><?php echo $value['Member_Name_4']; ?></td>
                                                <td><?php echo $value['Gender_4']; ?></td>
                                                <td><?php echo $value['Age_4']; ?></td>
                                                <td><?php echo $value['Mobile_4']; ?></td>
                                                <td><?php echo $value['Member_Name_5']; ?></td>
                                                <td><?php echo $value['Gender_5']; ?></td>
                                                <td><?php echo $value['Age_5']; ?></td>
                                                <td><?php echo $value['Mobile_5']; ?></td>
                                                <td><?php echo $value['Vehicle_Type']; ?></td>
                                                <td><?php echo $value['via']; ?></td>
                                                <td><input class="btn btn-success" type="submit" value="Done"></td>
                                            </form>
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
