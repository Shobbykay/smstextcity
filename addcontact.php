
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="FundRealEstate">
    <meta name="keywords" content="FundRealEstate, FundRealEstate Management">
    <meta name="author" content="Kayode Shobalaje">
    <title>Add Single Contact</title>

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
                <a class="nav-link_" href="dashboard.php">Home</a>
              </li>
              <li class="">
                <a class="nav-link_ active" href="sendsms.php">Send SMS</a>
              </li>
              <li class="">
                <a class="nav-link_" href="upload_bulknumbers.php">Create SMS Group</a>
              </li>
              <li class="">
                <a class="nav-link_" href="delivery_report.php">Delivery Report</a>
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
            <li><a href="dashboard.php" class=""><i class="la la-dashboard la-xl"></i>Dashboard</a></li>
            <li><a href="smslog.php" class=""><i class="la la-envelope la-xl"></i>SMS Logs</a></li>
            <li><a href="#" class="active"><i class="la la-user-secret la-xl"></i>Contact List</a></li>
            <li><a href="bulk_numbers.php" class=""><i class="la la-briefcase la-xl"></i>Bulk Numbers</a></li>
            <li><a href="upload_bulknumbers.php" class=""><i class="la la-arrow-up la-xl"></i>Upload Bulk Numbers</a></li>
            <li><a href="drafts.php" class=""><i class="la la-pencil la-xl"></i>Drafts</a></li>
            <li><a href="#" class=""><i class="la la-sticky-note la-xl"></i>Instructions</a></li>
            <li><a href="delivery_report.php" class=""><i class="la la-flag la-xl"></i>Delivery Report</a></li>
            <li><a href="settings.php" class=""><i class="la la-cog la-xl"></i>Settings</a></li>
        </ul>
    </div>

    <div class="container">
        <h1>Add New Contact</h1>
        <small>Save a single contact address</small>

        <div class="row mt-2">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Phone Number</label>
                                <input type="text" class="form-control smdj" placeholder="phone number">
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <label for="">Full Name (Optional)</label>
                                <input type="text" class="form-control smdj" placeholder="first_name last_name (optional)">
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <label for="">Full Name (Optional)</label>
                                <textarea class="form-control smdj" placeholder="first_name last_name (optional)"></textarea>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <button class="btn btn-info btn-rounded" type="submit">Save Contact</button>
                            </div>
                        </div>
                    </div>
                </div>
                

            </div>
        </div>
    </div>

</body>
</html>