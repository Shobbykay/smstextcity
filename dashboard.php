
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="FundRealEstate">
    <meta name="keywords" content="FundRealEstate, FundRealEstate Management">
    <meta name="author" content="Kayode Shobalaje">
    <title>Dashboard</title>

    <link rel="apple-touch-icon" href="src/assets/img/smstextcity_logo.png">
    <link rel="shortcut icon" type="image/png" href="src/assets/img/smstextcity_logo.png"> 

    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="src/assets/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" type="text/css" href="src/assets/css/vendors.min.css"> -->
    <!-- <link rel="stylesheet" type="text/css" href="assets/css/animate.css">-->
    <link rel="stylesheet" type="text/css" href="src/assets/css/balloon.css">
    <link rel="stylesheet" type="text/css" href="src/assets/css/dashboard.css">
    
    <link rel="stylesheet" type="text/css" href="src/assets/fonts/css/line-awesome.min.css">

</head>
<body>
    <div class="header">
        <div class="d-flex justify-content-between">
            <div class="p-2">
            <img src="src/assets/img/smstextcity_logo.png" class="logo_" alt="logo"></div>
            <div class="p-2">
            <ul class="navb">
              <li class="">
                <a class="nav-link_ active" href="#">Home</a>
              </li>
              <li class="">
                <a class="nav-link_" href="sendsms.php">Send SMS</a>
              </li>
              <li class="">
                <a class="nav-link_" href="#">Create SMS Group</a>
              </li>
              <li class="">
                <a class="nav-link_" href="#">Delivery Report</a>
              </li>
            </ul>
            </div>
            <div class="p-2">&nbsp;</div>
            <div class="p-2">
                <img src="src/assets/img/avt.png" class="avt_" alt="Avatar">&nbsp;&nbsp;
                <strong data-balloon="Welcome to SMSTextCity" data-balloon-pos="down" data-balloon-visible>Kayode Shobalaje</strong> &nbsp;&nbsp;&nbsp;&nbsp;
                <a href="signout.php" class="btn btn-info btn-rounded btn-sm text-white"><small>Sign Out</small></a>
            </div>
        </div>
    </div>

    <div class="left-sidebar">
        <strong><small>MENU</small></strong>
        <ul>
            <li><a href="#" class="active"><i class="la la-dashboard la-xl"></i>Dashboard</a></li>
            <li><a href="#" class="smslog.php"><i class="la la-envelope la-xl"></i>SMS Logs</a></li>
            <li><a href="#" class=""><i class="la la-user-secret la-xl"></i>Contact List</a></li>
            <li><a href="#" class=""><i class="la la-briefcase la-xl"></i>Bulk Numbers</a></li>
            <li><a href="#" class=""><i class="la la-arrow-up la-xl"></i>Upload Bulk Numbers</a></li>
            <li><a href="#" class=""><i class="la la-sticky-note la-xl"></i>Instructions</a></li>
            <li><a href="#" class=""><i class="la la-flag la-xl"></i>Delivery Report</a></li>
            <li><a href="#" class=""><i class="la la-cog la-xl"></i>Settings</a></li>
        </ul>
    </div>

    <div class="container">
        <h1>Dashboard</h1>
        <small>Welcome to SMSTextCity</small>

        <div class="row mt-2">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h6 class="upper vgh">Total Contacts</h6>
                        <h2>0</h2>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h6 class="upper vgh">Total Groups</h6>
                        <h2>0</h2>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h6 class="upper vgh">SMS Sent</h6>
                        <h2>0</h2>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h6 class="upper vgh">Account Unit</h6>
                        <h2>$0</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>