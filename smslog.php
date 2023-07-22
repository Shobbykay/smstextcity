
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
                <a class="nav-link_" href="dashboard.php">Home</a>
              </li>
              <li class="">
                <a class="nav-link_ active" href="#">Send SMS</a>
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
            <li><a href="dashboard.php" class=""><i class="la la-dashboard la-xl"></i>Dashboard</a></li>
            <li><a href="#" class="active"><i class="la la-envelope la-xl"></i>SMS Logs</a></li>
            <li><a href="#" class=""><i class="la la-user-secret la-xl"></i>Contact List</a></li>
            <li><a href="#" class=""><i class="la la-briefcase la-xl"></i>Bulk Numbers</a></li>
            <li><a href="#" class=""><i class="la la-arrow-up la-xl"></i>Upload Bulk Numbers</a></li>
            <li><a href="#" class=""><i class="la la-sticky-note la-xl"></i>Instructions</a></li>
            <li><a href="#" class=""><i class="la la-flag la-xl"></i>Delivery Report</a></li>
            <li><a href="#" class=""><i class="la la-cog la-xl"></i>Settings</a></li>
        </ul>
    </div>

    <div class="container">
        <h1>SMS Logs</h1>
        <small>History of all sent SMS</small>

        <div class="mt-2">
            <div class="card">
                <div class="card-body">
                    <h5>Filter</h5>
                    <div class="row mt-2 filter">
                        <div class="col-md-3">
                            <label for="">SMS Type</label>
                            <select name="" id="" class="form-control smdj">
                                <option value="all">All</option>
                                <option value="drafts">Drafts</option>
                                <option value="sent">Sent</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="">Date Range</label>
                            <input type="text" class="form-control smdj" placeholder="select date range">
                        </div>
                        <div class="col-md-4">
                            <button class="btn btn-info btn-rounded mt-2">Search</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-2">
                <table class="table table-striped table-hover datatable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Sender Name</th>
                            <th>Message</th>
                            <th>Pages</th>
                            <th>Date Sent</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <td colspan="6" align="center">No data available</td>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Sender Name</th>
                            <th>Message</th>
                            <th>Pages</th>
                            <th>Date Sent</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

</body>
</html>