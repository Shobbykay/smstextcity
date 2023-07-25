<?php
// echo sha1('12345678');
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="FundRealEstate">
    <meta name="keywords" content="FundRealEstate, FundRealEstate Management">
    <meta name="author" content="Kayode Shobalaje">
    <title>SMSTEXTCITY :: Forgot Password</title>

    <link rel="apple-touch-icon" href="src/assets/img/smstextcity_logo.png">
    <link rel="shortcut icon" type="image/png" href="src/assets/img/smstextcity_logo.png"> 

    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="src/assets/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" type="text/css" href="src/assets/css/vendors.min.css"> -->
    <!-- <link rel="stylesheet" type="text/css" href="assets/css/animate.css">
    <link rel="stylesheet" type="text/css" href="assets/css/balloon.css"> -->
    <link rel="stylesheet" href="src/assets/css/iziToast.css">
    <link rel="stylesheet" type="text/css" href="src/assets/css/main.css">
    
    <link rel="stylesheet" type="text/css" href="src/assets/fonts/css/line-awesome.min.css">

</head>
<body>
        
    <div class="container-login">
        <center>
            <img src="src/assets/img/smstextcity_logo.png" alt="logo">
            <h3>Forgot Password</h3>
        </center>
        
        <form method="post" id="login" action="#">
            <label class="xsp">Email Address</label>
            <input type="email" name="emm" id="emm" class="form-control" placeholder="Email Address" autocomplete="off" required>
            
            <div class="clearfix"></div>
            
            <div class="text-center">
                <button name="loginbtn" id="loginbtn" type="submit" class="btn btn-info btn-rounded">Recover</button>
                <small>Remember your password? <a href="./" class="btn btn-link">Log In</a></small>
            </div>
            
        </form>
    </div>
    
<!--    <div class="alert alert-not-success alert-notify alert-dismissible slideInDown animated"><a href="#" class="close" data-dismiss="alert" aria-label="close"><i class="la la-close bsm"></i></a>Error occured</div>-->
    
<!--loader-->

<div class="showbox-bg">
<div class="showbox box-shadow-3">
  <div class="loader">
    <svg class="circular" viewBox="25 25 50 50">
      <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"/>
    </svg>
  </div>
</div>    
</div>
<!--end of loader-->
    
    <script src="src/assets/js/jquery-3.2.1.min.js" type="text/javascript"></script>
    <script src="src/assets/js/iziToast.js" type="text/javascript"></script>
    <script src="src/assets/js/knotifier.js" type="text/javascript"></script>
   <script src="src/assets/js/login.js" type="text/javascript"></script>
   
</body>
</html>