<?php
session_start();
include 'includeSession.php';
include dirname(dirname(__FILE__)) . '/anandniwas.com/config/config.php';
$postParams = Functions::getPostParams();
$userDataHandlerObj = new userDataHandler();
$roomData = $userDataHandlerObj->allRoomStatus();
?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Register</title>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="css/sb-admin.css" rel="stylesheet">

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
                                Anumati Pass Registration
                            </h1>
                            <ol class="breadcrumb">
                                <li class="active">
                                    <i class="fa fa-edit"></i> Anumati Pass Registration
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
                    <?php } unset($_SESSION['message']); ?>
                    <div class="row">
                        <div class="col-lg-10 col-lg-offset-1">

                            <form action="action/action.php" method="post" class="form-horizontal">
                    <fieldset>
                        <input type="hidden" name="action" value="register">
                        <!-- Form Name -->
                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 col-sm-12 col-xs-12 control-label" style="font-size:24px;">Stay Details</label>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 col-sm-12 col-xs-12 control-label" for="textinput">Arrival Date</label>
                            <div class="col-md-4 col-sm-12 col-xs-12 date">
                                <input id="arrivalDate" name="arrivalDate" type="date" placeholder="Arrival Date" class="form-control input-md" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 col-sm-12 col-xs-12 control-label" for="textinput">Departure Date</label>
                            <div class="col-md-4 col-sm-12 col-xs-12 date">
                                <input id="departureDate" name="departureDate" type="date" placeholder="Arrival Date" class="form-control input-md" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 col-sm-12 col-xs-12 control-label" style="font-size:24px;margin-top:20px;">Sangat Details</label>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 col-sm-12 col-xs-12 control-label" for="textinput">Person Incharge </label>
                            <div class="col-md-4 col-sm-12 col-xs-12">
                                <input id="inchargeName" name="inchargeName" type="text" placeholder="Person Incharge Name" class="form-control input-md"
                                    required="">

                            </div>
                        </div>

                        <!-- Select Basic -->
                        <div class="form-group">
                            <label class="col-md-4 col-sm-12 col-xs-12 control-label" for="selectbasic">Gender</label>
                            <div class="col-md-4 col-sm-12 col-xs-12">
                                <select id="gender" name="gender" class="form-control">
          <option value="Male">Male</option>
          <option value="Female">Female</option>
        </select>
                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 col-sm-12 col-xs-12 control-label" for="textinput">Mobile Number</label>
                            <div class="col-md-4 col-sm-12 col-xs-12">
                                <p>Please do not add zero (0) before number.</p>
                                <input id="mobileNumber" name="mobileNumber" type="tel" placeholder="Mobile Number" class="form-control input-md" required="">

                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 col-sm-12 col-xs-12 control-label" for="textinput">Address</label>
                            <div class="col-md-4 col-sm-12 col-xs-12">
                                <input id="address" name="address" type="text" placeholder="Address" class="form-control input-md" required="">

                            </div>
                        </div>

                        <!-- Select Basic -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="city">City</label>
                            <div class="col-md-4">
                                <select id="city" name="city" class="form-control" required>
              <option value="">Please Select City</option>
              <option  selected  value="">Please Select City</option>
              <option  value="ABU ROAD">ABU ROAD</option>
              <option  value="AGRA">AGRA</option>
              <option  value="AHEMDABAD">AHEMDABAD</option>
              <option  value="AHEMDABAD-KUBER">AHEMDABAD-KUBER</option>
              <option  value="AJMER">AJMER</option>
              <option  value="ALLAHBAD">ALLAHBAD</option>
              <option  value="AMRITSAR">AMRITSAR</option>
              <option  value="ASANGAON">ASANGAON</option>
              <option  value="BANDA">BANDA</option>
              <option  value="BANGKOK">BANGKOK</option>
              <option  value="BANGALORE">BANGALORE</option>
              <option  value="BAREILY">BAREILY</option>
              <option  value="BEAWAR">BEAWAR</option>
              <option  value="BHARUCH">BHARUCH</option>
              <option  value="BHAVNAGAR">BHAVNAGAR</option>
              <option  value="BHAWANI MANDI">BHAWANI MANDI</option>
              <option  value="BHILWARA">BHILWARA</option>
              <option  value="BHOPAL">BHOPAL</option>
              <option  value="BIJAPUR">BIJAPUR</option>
              <option  value="BILASPUR">BILASPUR</option>
              <option  value="BUNDI">BUNDI</option>
              <option  value="CHHADVEL">CHHADVEL</option>
              <option  value="CHALISGAON">CHALISGAON</option>
              <option  value="CHATTARPUR">CHATTARPUR</option>
              <option  value="CHENNAI">CHENNAI</option>
              <option  value="COLLEGE PARK">COLLEGE PARK</option>
              <option  value="DAHOD">DAHOD</option>
              <option  value="DELHI">DELHI</option>
              <option  value="DEWAS">DEWAS</option>
              <option  value="DHULE">DHULE</option>
              <option  value="DHOND">DHOND</option>
              <option  value="DUBAI">DUBAI</option>
              <option  value="ETAWAH">ETAWAH</option>
              <option  value="FAIZABAD">FAIZABAD</option>
              <option  value="GANDHIDHAM">GANDHIDHAM</option>
              <option  value="GODHARA">GODHARA</option>
              <option  value="GORAKHPUR">GORAKHPUR</option>
              <option  value="GURGAON">GURGAON</option>
              <option  value="GWALIOR">GWALIOR</option>
              <option  value="HAMILTON">HAMILTON</option>
              <option  value="HAROA">HAROA</option>
              <option  value="HONG KONG">HONG KONG</option>
              <option  value="HYDERABAD">HYDERABAD</option>  
              <option  value="INDORE">INDORE</option>
              <option  value="JABALPUR">JABALPUR</option>
              <option  value="JAIPUR">JAIPUR</option>
              <option  value="JAMNAGAR">JAMNAGAR</option>
              <option  value="JHANSI">JHANSI</option>
              <option  value="JODHPUR">JODHPUR</option>
              <option  value="JUNAGARH">JUNAGARH</option>
              <option  value="KALOL">KALOL</option>
              <option  value="KANPUR">KANPUR</option>
              <option  value="KATNI CITY">KATNI CITY</option>
              <option  value="KATNI CAMP">KATNI CAMP</option>
              <option  value="KHAIRTHAL">KHAIRTHAL</option>
              <option  value="KHANDWA">KHANDWA</option>
              <option  value="KOLKATA">KOLKATA</option>
              <option  value="KOTA">KOTA</option>
              <option  value="LOS ANGELES">LOS ANGELES</option>
              <option  value="LUCKNOW">LUCKNOW</option>
              <option  value="MAIHAR">MAIHAR</option>
              <option  value="MALEGAON">MALEGAON</option>
              <option  value="MANDSOR">MANDSOR</option>
              <option  value="MANILA">MANILA</option>
              <option  value="MASSACHUSETTS">MASSACHUSETTS</option>
              <option  value="MUMBAI">MUMBAI</option>
              <option  value="NASHIK">NASHIK</option>
              <option  value="NAUSARI">NAUSARI</option>
              <option  value="NEW YORK">NEW YORK</option>
              <option  value="NIMBAHEDA">NIMBAHEDA</option>
              <option  value="ORAI">ORAI</option>
              <option  value="OTHER">OTHER</option>
              <option  value="PACHORA">PACHORA</option>
              <option  value="PALANPUR">PALANPUR</option>
              <option  value="PANNA">PANNA</option>    
              <option  value="PIMPRI">PIMPRI</option>
              <option  value="PUNE">PUNE</option>
              <option  value="RAIGARH">RAIGARH</option>
              <option  value="RAJKOT">RAJKOT</option>
              <option  value="RATLAM">RATLAM</option>
              <option  value="REWA">REWA</option>
              <option  value="SATNA">SATNA</option>
              <option  value="SAWAI MADHOPUR">SAWAI MADHOPUR</option>
              <option  value="SECUNDRABAD">SECUNDRABAD</option>
              <option  value="SHAHADA">SHAHADA</option>
              <option  value="SINDH">SINDH</option>
              <option  value="SINGAPORE">SINGAPORE</option>
              <option  value="SOLAPUR">SOLAPUR</option>
              <option  value="SUGAR LAND">SUGAR LAND</option>
              <option  value="SURAT">SURAT</option>
              <option  value="SURAT.R.N.">SURAT.R.N.</option>
              <option  value="UJJAIN">UJJAIN</option>
              <option  value="ULHAS NAGAR - 1">ULHAS NAGAR - 1</option>
              <option  value="ULHAS NAGAR - 2">ULHAS NAGAR - 2</option>
              <option  value="ULHAS NAGAR - 3">ULHAS NAGAR - 3</option>
              <option  value="ULHAS NAGAR - 4">ULHAS NAGAR - 4</option>
              <option  value="ULHAS NAGAR - 5">ULHAS NAGAR - 5</option>
              <option  value="UMARIA">UMARIA</option>
              <option  value="VADODRA">VADODRA</option>
              <option  value="VALSAD">VALSAD</option>
              <option  value="VARANASI">VARANASI</option>
              <option  value="VIDISHA">VIDISHA</option>

    </select>
                            </div>
                        </div>
                        <!-- Select Basic -->
                        <div class="form-group">
                            <label class="col-md-4 col-sm-12 col-xs-12 control-label" for="state">State</label>
                            <div class="col-md-4 col-sm-12 col-xs-12">
                                <select id="state" name="state" class="form-control" required>
          <option value="">Please Select State</option>
          <option value="Andaman and Nicobar">Andaman and Nicobar</option>
          <option value="Andhra Pradesh">Andhra Pradesh</option>
          <option value="Arunachal Pradesh">Arunachal Pradesh</option>
          <option value="Assam">Assam</option>
          <option value="Bihar">Bihar</option>
          <option value="Chandigarh">Chandigarh</option>
          <option value="Chhattisgarh">Chhattisgarh</option>
          <option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
          <option value="Daman and Diu">Daman and Diu</option>
          <option value="Delhi">Delhi</option>
          <option value="Goa">Goa</option>
          <option value="Gujarat">Gujarat</option>
          <option value="Haryana">Haryana</option>
          <option value="Himachal Pradesh">Himachal Pradesh</option>
          <option value="Jammu and Kashmir">Jammu and Kashmir</option>
          <option value="Jharkhand">Jharkhand</option>
          <option value="Karnataka">Karnataka</option>
          <option value="Kerala">Kerala</option>
          <option value="Lakshadweep">Lakshadweep</option>
          <option value="Madhya Pradesh">Madhya Pradesh</option>
          <option value="Maharashtra">Maharashtra</option>
          <option value="Manipur">Manipur</option>
          <option value="Meghalaya">Meghalaya</option>
          <option value="Mizoram">Mizoram</option>
          <option value="Nagaland">Nagaland</option>
          <option value="Odisha">Odisha</option>
          <option value="Poducherry">Poducherry</option>
          <option value="Punjab">Punjab</option>
          <option value="Rajasthan">Rajasthan</option>
          <option value="Sikkim">Sikkim</option>
          <option value="Tamil Nadu">Tamil Nadu</option>
          <option value="Telangana">Telangana</option>
          <option value="Tripura">Tripura</option>
          <option value="Uttar Pradesh">Uttar Pradesh</option>
          <option value="Uttarakhand">Uttarakhand</option>
          <option value="West Bengal">West Bengal</option>
        </select>
                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 col-sm-12 col-xs-12 control-label" for="email">Email</label>
                            <div class="col-md-4 col-sm-12 col-xs-12">
                                <input id="email" name="email" type="text" placeholder="Email" class="form-control input-md">

                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 col-sm-12 col-xs-12 control-label" for="numberOfMales" min='0' max='6' >Number of Males</label>
                            <div class="col-md-4 col-sm-12 col-xs-12">
                                <input id="numberOfMales" name="numberOfMales" type="number" value="0" placeholder="Male" class="form-control input-md" required="">

                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 col-sm-12 col-xs-12 control-label" for="numberOfFemales">Number of Females</label>
                            <div class="col-md-4 col-sm-12 col-xs-12">
                                <input id="numberOfFemales" name="numberOfFemales" type="number" placeholder="Female" class="form-control input-md" value="0" min='0'
                                    max='6'>

                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 col-sm-12 col-xs-12 control-label" for="numberOfChildren">Number of Children</label>
                            <div class="col-md-4 col-sm-12 col-xs-12">
                                <input id="numberOfChildren" name="numberOfChildren" type="number" placeholder="Child" class="form-control input-md" value="0" min='0'
                                    max='6'>

                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 col-sm-12 col-xs-12 control-label" for="textinput">Total Count</label>
                            <div class="col-md-4 col-sm-12 col-xs-12">
                                <input id="totalCount" name="totalCount" readonly type="text" placeholder="Total" class="form-control input-md">
                                <span class="help-block" style="color:black" id="totalCountError"></span>
                            </div>
                        </div>

                        <div id="groupMember1">
                            <div class="form-group">
                                <label class="col-md-4 col-sm-12 col-xs-12 control-label" style="font-size:24px;margin-top:20px;">Group Members Details</label>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 col-sm-12 col-xs-12 control-label" style="font-size:18px;">Group Member 1</label>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 col-sm-12 col-xs-12 control-label" for="textinput">Name</label>
                                <div class="col-md-4 col-sm-12 col-xs-12">
                                    <input id="groupMember1Name" name="textinput1" type="text" placeholder="Name" class="form-control input-md">

                                </div>
                            </div>

                            <!-- Select Basic -->
                            <div class="form-group">
                                <label class="col-md-4 col-sm-12 col-xs-12 control-label" for="selectbasic">Gender</label>
                                <div class="col-md-4 col-sm-12 col-xs-12">
                                    <select id="selectbasic" name="selectbasic1" class="form-control">
        <option value="">Select Gender</option>
          <option value="Male">Male</option>
          <option value="Female">Female</option>
        </select>
                                </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 col-sm-12 col-xs-12 control-label" for="Age">Age</label>
                                <div class="col-md-4 col-sm-12 col-xs-12">
                                    <input id="Age" name="Age1" type="text" placeholder="Age" class="form-control input-md">

                                </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 col-sm-12 col-xs-12 control-label" for="textinput">Mobile Number</label>
                                <div class="col-md-4 col-sm-12 col-xs-12">
                                    <input id="groupMember1PhoneNumber" name="mobile1" type="text" placeholder="Mobile Number" class="form-control input-md">

                                </div>
                            </div>
                        </div>
                        <div id="groupMember2">
                            <div class="form-group">
                                <label class="col-md-4 col-sm-12 col-xs-12 control-label" style="font-size:18px;">Group Member 2</label>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 col-sm-12 col-xs-12 control-label" for="textinput">Name</label>
                                <div class="col-md-4 col-sm-12 col-xs-12">
                                    <input id="groupMember2Name" name="textinput2" type="text" placeholder="Name" class="form-control input-md">

                                </div>
                            </div>

                            <!-- Select Basic -->
                            <div class="form-group">
                                <label class="col-md-4 col-sm-12 col-xs-12 control-label" for="selectbasic">Gender</label>
                                <div class="col-md-4 col-sm-12 col-xs-12">
                                    <select id="selectbasic" name="selectbasic2" class="form-control">
        <option value="">Select Gender</option>
          <option value="Male">Male</option>
          <option value="Female">Female</option>
        </select>
                                </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 col-sm-12 col-xs-12 control-label" for="Age">Age</label>
                                <div class="col-md-4 col-sm-12 col-xs-12">
                                    <input id="Age" name="Age2" type="text" placeholder="Age" class="form-control input-md">

                                </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 col-sm-12 col-xs-12 control-label" for="textinput">Mobile Number</label>
                                <div class="col-md-4 col-sm-12 col-xs-12">
                                    <input id="groupMember2PhoneNumber" name="mobile2" type="text" placeholder="Mobile Number" class="form-control input-md">

                                </div>
                            </div>
                        </div>
                        <div id="groupMember3">
                            <div class="form-group">
                                <label class="col-md-4 col-sm-12 col-xs-12 control-label" style="font-size:18px;">Group Member 3</label>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 col-sm-12 col-xs-12 control-label" for="textinput">Name</label>
                                <div class="col-md-4 col-sm-12 col-xs-12">
                                    <input id="groupMember3Name" name="textinput3" type="text" placeholder="Name" class="form-control input-md">

                                </div>
                            </div>

                            <!-- Select Basic -->
                            <div class="form-group">
                                <label class="col-md-4 col-sm-12 col-xs-12 control-label" for="selectbasic">Gender</label>
                                <div class="col-md-4 col-sm-12 col-xs-12">
                                    <select id="selectbasic" name="selectbasic3" class="form-control">
          <option value="Male">Male</option>
          <option value="Female">Female</option>
        </select>
                                </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 col-sm-12 col-xs-12 control-label" for="Age">Age</label>
                                <div class="col-md-4 col-sm-12 col-xs-12">
                                    <input id="Age" name="Age3" type="text" placeholder="Age" class="form-control input-md">

                                </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 col-sm-12 col-xs-12 control-label" for="textinput">Mobile Number</label>
                                <div class="col-md-4 col-sm-12 col-xs-12">
                                    <input id="groupMember3PhoneNumber" name="mobile3" type="text" placeholder="Mobile Number" class="form-control input-md">

                                </div>
                            </div>
                        </div>
                        <div id="groupMember4">
                            <div class="form-group">
                                <label class="col-md-4 col-sm-12 col-xs-12 control-label" style="font-size:18px;">Group Member 4</label>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 col-sm-12 col-xs-12 control-label" for="textinput">Name</label>
                                <div class="col-md-4 col-sm-12 col-xs-12">
                                    <input id="groupMember4Name" name="textinput4" type="text" placeholder="Name" class="form-control input-md">

                                </div>
                            </div>

                            <!-- Select Basic -->
                            <div class="form-group">
                                <label class="col-md-4 col-sm-12 col-xs-12 control-label" for="selectbasic">Gender</label>
                                <div class="col-md-4 col-sm-12 col-xs-12">
                                    <select id="selectbasic" name="selectbasic4" class="form-control">
          <option value="">Select Gender</option>
          <option value="Male">Male</option>
          <option value="Female">Female</option>
        </select>
                                </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 col-sm-12 col-xs-12 control-label" for="Age">Age</label>
                                <div class="col-md-4 col-sm-12 col-xs-12">
                                    <input id="Age" name="Age4" type="text" placeholder="Age" class="form-control input-md">

                                </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 col-sm-12 col-xs-12 control-label" for="textinput">Mobile Number</label>
                                <div class="col-md-4 col-sm-12 col-xs-12">
                                    <input id="groupMember4PhoneNumber" name="mobile4" type="text" placeholder="Mobile Number" class="form-control input-md">

                                </div>
                            </div>
                        </div>
                        <div id="groupMember5">
                            <div class="form-group">
                                <label class="col-md-4 col-sm-12 col-xs-12 control-label" style="font-size:18px;">Group Member 5</label>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 col-sm-12 col-xs-12 control-label" for="textinput">Name</label>
                                <div class="col-md-4 col-sm-12 col-xs-12">
                                    <input id="groupMember5Name" name="textinput5" type="text" placeholder="Name" class="form-control input-md">

                                </div>
                            </div>

                            <!-- Select Basic -->
                            <div class="form-group">
                                <label class="col-md-4 col-sm-12 col-xs-12 control-label" for="selectbasic">Gender</label>
                                <div class="col-md-4 col-sm-12 col-xs-12">
                                    <select id="selectbasic" name="selectbasic5" class="form-control">
          <option value="">Select Gender</option>
          <option value="Male">Male</option>
          <option value="Female">Female</option>
        </select>
                                </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 col-sm-12 col-xs-12 control-label" for="Age">Age</label>
                                <div class="col-md-4 col-sm-12 col-xs-12">
                                    <input id="Age" name="Age5" type="text" placeholder="Age" class="form-control input-md">

                                </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 col-sm-12 col-xs-12 control-label" for="textinput">Mobile Number</label>
                                <div class="col-md-4 col-sm-12 col-xs-12">
                                    <input id="textinput" name="mobile5" type="text" placeholder="Mobile Number" class="form-control input-md">

                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-md-4 col-sm-12 col-xs-12 control-label" style="font-size:24px;margin-top:20px;">Transport Details</label>
                        </div>
                        <!-- Select Basic -->
                        <div class="form-group">
                            <label class="col-md-4 col-sm-12 col-xs-12 control-label" for="selectbasic">Vehicle Type</label>
                            <div class="col-md-4 col-sm-12 col-xs-12">
                                <select id="selectbasic" name="vehicle_type" class="form-control">
          <option value="Private Car">Private Car</option>
          <option value="Train">Train</option>
        </select>
                            </div>
                        </div>

                        <!-- Select Basic -->
                        <div class="form-group">
                            <label class="col-md-4 col-sm-12 col-xs-12 control-label" for="selectbasic">From/Via</label>
                            <div class="col-md-4 col-sm-12 col-xs-12">
                                <select id="selectbasic" name="from" class="form-control">
          <option value="Ashok Nagar">Ashok Nagar</option>
          <option value="Gwalior">Gwalior</option>
          <option value="Urli">Urli</option>
          <option value="Mumbai">Mumbai</option>
          <option value="Pune">Pune</option>
          <option value="Bina">Bina</option>
          <option value="Lalitpur">Lalitpur</option>
        </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 col-sm-12 col-xs-12 control-label" for="button1id"></label>
                            <div class="col-md-8">
                                <button id="button1id" name="button1id" class="btn btn-success">Submit</button>
                                <button id="button2id" name="button2id" class="btn btn-warning">Reset</button>
                            </div>
                        </div>

                    </fieldset>
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

        <!-- Additional JavaScript -->
        <script src="js/script.js"></script>
        <script src='js/registerUser.js'></script>
        <script src="js/roomStatus.js"></script>

    </body>

</html>
