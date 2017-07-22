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
                                <table class="table table-responsive table-bordered table-hover" id="completeStatusTable">
                                    <thead>
                                        <tr id="tableHeads">
                                            <th>NAME</th>
                                            <th>FATHER'S NAME</th>
                                            <th>GENDER</th>
                                            <th>MOBILE NUMBER</th>
                                            <th>EMAIL</th>
                                            <th>ADDRESS</th>
                                            <th>CITY</th>
                                            <th>STATE</th>
                                            <th>COUNTRY</th>
                                            <th>OCCUPATION</th>
                                            <th>GENERATE PASS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        if(isset($_SESSION['sangatDetails']) && !empty($_SESSION['sangatDetails'])){
                                        $data = $_SESSION['sangatDetails'];
                                         foreach ($data as $key => $value) { ?>
                                        <tr class="completeStatusTableRow">
                                            <form role="form" action="generatePass.php" method="post">
                                                <input type="hidden" value="<?php if(isset($value['sangat_id']))  echo $value['sangat_id'];?>" name="id">
                                                <input type="hidden" value="<?php if(isset($value['name']))  echo $value['name'];?>" name="name">
                                                <input type="hidden" value="<?php if(isset($value['gender']))  echo $value['gender'];?>" name="gender">
                                                <input type="hidden" value="<?php if(isset($value['father_name']))  echo $value['father_name'];?>" name="fatherName">
                                                <input type="hidden" value="<?php if(isset($value['mobile_number']))  echo $value['mobile_number'];?>" name="mobileNumber">
                                                <input type="hidden" value="<?php if(isset($value['email']))  echo $value['email'];?>" name="email">
                                                <input type="hidden" value="<?php if(isset($value['address']))  echo $value['address'];?>" name="address">
                                                <input type="hidden" value="<?php if(isset($value['city']))  echo $value['city'];?>" name="city">
                                                <input type="hidden" value="<?php if(isset($value['state']))  echo $value['state'];?>" name="state">
                                                <input type="hidden" value="<?php if(isset($value['country']))  echo $value['country'];?>" name="country">
                                                <input type="hidden" value="<?php if(isset($value['occupation']))  echo $value['occupation'];?>" name="occupation">
                                                <td class="completeStatusTableRowName"><?php echo $value['name']; ?></td>
                                                <td><?php echo $value['father_name']; ?></td>
                                                <td class="completeStatusTableRowPhoneNumber"><?php echo $value['gender']; ?></td>
                                                <td><?php echo $value['mobile_number']; ?></td>
                                                <td class="completeStatusTableRowCity"><?php echo $value['email']; ?></td>
                                                <td><?php echo $value['address']; ?></td>
                                                <td><?php echo $value['city']; ?></td>
                                                <td><?php echo $value['state']; ?></td>
                                                <td><?php echo $value['country']; ?></td>
                                                <td><?php echo $value['occupation']; ?></td>
                                                <td><input class="btn btn-success" type="submit" value="Generate Pass"></td>
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
