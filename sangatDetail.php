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
        <title>Sangat Detail</title>

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
                                Sangat Detail
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
                            <div class="table-responsive">
                            <h2>Family Details</h2>
                            <form action="action/action.php" METHOD="POST">
                                <input type="hidden" name="action" value="generateAnumatiPass">
                                <table class="table table-responsive table-bordered table-hover" id="completeStatusTable">
                                    <thead>
                                        <tr id="tableHeads">
                                            <th>SELECT</th>
                                            <th>NAME</th>
                                            <th>GENDER</th>
                                            <th>MOBILE NUMBER</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        <?php 
                                        if(isset($_SESSION['familyInchargeDetails']) && !empty($_SESSION['familyInchargeDetails'])){
                                        $data = $_SESSION['familyInchargeDetails']; ?>
                                        <tr class="completeStatusTableRow">
                                            <td><input type="checkbox" name="memberIdForAnumatiPass[]" value="<?php echo $data['inchargeId'] ?>"></td>
                                            <td><?php echo $data['inchargeName']; ?></td>
                                            <td><?php echo $data['gender']; ?></td>
                                            <td><?php echo $data['mobileNumber']; ?></td>
                                            <input type="hidden" name="address" value="<?php echo $data['address'] ?>">
                                            <input type="hidden" name="email" value="<?php echo $data['email'] ?>">
                                            <input type="hidden" name="city" value="<?php echo $data['city'] ?>">
                                            <input type="hidden" name="inchargeId" value="<?php echo $data['inchargeId'] ?>">
                                            <input type="hidden" name="inchargeName" value="<?php echo $data['inchargeName']; ?>">
                                            <input type="hidden" name="inchargeGender" value="<?php echo $data['gender']; ?>">
                                            <input type="hidden" name="inchargeMobileNumber" value="<?php echo $data['mobileNumber']; ?>">
                                        </tr>
                                        <?php }?>
                                        <?php 
                                        if(isset($_SESSION['familyMemberDetails']) && !empty($_SESSION['familyMemberDetails'])){
                                        $data = $_SESSION['familyMemberDetails']; 
                                         foreach ($data as $key => $value) {
                                          ?>
                                        <tr class="completeStatusTableRow">
                                                <td><input type="checkbox" name="memberIdForAnumatiPass[]" value="<?php echo $value['familyMemberId'] ?>"></td>
                                                <td class="completeStatusTableRowName"><?php echo $value['fullName']; ?></td>
                                                <td class="completeStatusTableRowPhoneNumber"><?php echo $value['gender']; ?></td>
                                                <td><?php echo $value['mobileNumber']; ?></td>
                                        </tr>
                                        <?php } } unset($_SESSION['familyInchargeDetails']);
                                        unset($_SESSION['familyMemberDetails']);?>
                                    </tbody>
                                </table>
                                <table class="table table-responsive table-bordered table-hover" id="completeStatusTable">
                                    <thead>
                                        <tr id="tableHeads">
                                            <th>Arrival Date</th>
                                            <th>Departure Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><input type="date" name="arrivalDate" class="form-control input-md"></td>
                                            <td><input type="date" name="departureDate" class="form-control input-md"></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table class="table table-responsive table-bordered table-hover" id="completeStatusTable">
                                    <thead>
                                        <tr id="tableHeads">
                                            <th>Coming From</th>
                                            <th>Coming By</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <select id="selectbasic" name="comingBy" class="form-control">
                                                    <option value="Private Car">Private Car</option>
                                                    <option value="Train">Train</option>
                                                </select>
                                            </td>
                                            <td>
                                                <select id="selectbasic" name="comingFrom" class="form-control">
                                                    <option value="Ashok Nagar">Ashok Nagar</option>
                                                    <option value="Gwalior">Gwalior</option>
                                                    <option value="Urli">Urli</option>
                                                    <option value="Mumbai">Mumbai</option>
                                                    <option value="Pune">Pune</option>
                                                    <option value="Bina">Bina</option>
                                                    <option value="Lalitpur">Lalitpur</option>
                                                </select>
                                            </td>
                                            
                                        </tr>
                                        <tr>
                                            <td colspan=2 class="text-center"><button id="generateAnumatiPass" type="submit" class="btn btn-success">Submit</button></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </form>
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
