<?php
if (!isset($_SESSION)) {
    session_start();
}

    //include 'includeSession.php';
?>
<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="">S.S.D.N.</a>
    </div>
    <ul class="nav navbar-right top-nav">
        <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_SESSION['user'] ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
    </ul>
    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
            <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'ADMIN') { ?>
                <li>
                    <a href="testing.php"><i class="fa fa-fw fa-plus"></i>Test Function</a>
                </li>
                
                <?php
            } else if (isset($_SESSION['role']) && $_SESSION['role'] == 'RECEPTION') {
                ?>
                <li>
                    <a href="dataEntry.php"><i class="fa fa-fw fa-plus"></i> Anumati Pass Registration</a>
                </li>
                <li>
                    <a href="totalRegistrations.php"><i class="fa fa-fw fa-plus"></i> Total Registrations</a>
                </li>
                <li>
                    <a href="completedRegistrations.php"><i class="fa fa-fw fa-plus"></i> Completed Registrations</a>
                </li>
                <li>
                    <a href="pendingRegistrations.php"><i class="fa fa-fw fa-plus"></i> Pending Registrations</a>
                </li>
                <!--<li>
                    <a href="inventoryStatus.php"><i class="fa fa-fw fa-list"></i> Inventory Status</a>
                </li>
                <li>
                    <a href="print.php"><i class="fa fa-fw fa-print"></i> Print Reciept</a>
                </li>
                <li>
                    <a href="completeStatus.php"><i class="fa fa-fw fa-list"></i> Complete Status</a>
                </li>
                <li>
                    <a href="roomStatus.php"><i class="fa fa-fw fa-th-list"></i> Room Status</a>
                </li>-->
                
            <?php } else if (isset($_SESSION['role']) && $_SESSION['role'] == 'DATAENTRY') { ?>
                <li>
                    <a href="globalRegistrations.php"><i class="fa fa-fw fa-plus"></i> Total Registrations</a>
                </li>
                <li>
                    <a href="globalCompletedRegistrations.php"><i class="fa fa-fw fa-plus"></i> Completed Registrations</a>
                </li>
                <li>
                    <a href="globalPendingRegistrations.php"><i class="fa fa-fw fa-plus"></i> Pending Registrations</a>
                </li>
            <?php } else if (isset($_SESSION['role']) && $_SESSION['role'] == 'TESTING') { ?>
                <li>
                    <a href="testing.php"><i class="fa fa-fw fa-plus"></i> TESTING</a>
                </li>
                <li>
                    <a href="sangatRegistration.php"><i class="fa fa-fw fa-plus"></i> SANGAT REGISTRATION</a>
                </li>
                <li>
                    <a href="searchRegistration.php"><i class="fa fa-fw fa-plus"></i> SEARCH REGISTRATION</a>
                </li>
                <li>
                    <a href="anumatiRegistration.php"><i class="fa fa-fw fa-plus"></i> ANUMATI PASS</a>
                </li>
            <?php } ?>
        </ul>
    </div>
    <!-- /.navbar-collapse -->
</nav>