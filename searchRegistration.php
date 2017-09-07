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

    <title>Search</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

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
                            Search
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
                <?php if (isset($_SESSION['content']) && $_SESSION['content'] != '') { ?>
                        <div id="printTable" style="display:none">
                            <?php echo $_SESSION['content']?>
                        </div>
                <?php } unset($_SESSION['content']); ?>
                <div class="row">
                    <div class="col-lg-12">

                        <div class="form-group col-lg-4 col-lg-offset-4">
                            <label>Please Enter Mobile Number</label>
                            <form method="post" action="action/action.php">
                                <input type="hidden" id="getSangatByMobileNumber" name="action" value="getSangatByMobileNumber">
                                <input id="mobileNumber" type="number"  class="form-control" name="mobileNumber" required="required" style="margin-bottom:20px">
                                <button id="searchByMobileNumberSubmit" type="submit" class="btn btn-success">Submit</button>
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
    <script>
        var printContents = document.getElementById('printTable').innerHTML;
         w=window.open();
         w.document.write(printContents);
         w.print();
         w.close();
    </script>
</body>

</html>
