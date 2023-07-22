<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="FundRealEstate">
    <meta name="keywords" content="FundRealEstate, FundRealEstate Management">
    <meta name="author" content="Kayode Shobalaje">
    <title>SMSTEXTCITY :: Login</title>

    <link rel="apple-touch-icon" href="src/assets/img/smstextcity_logo.png">
    <link rel="shortcut icon" type="image/png" href="src/assets/img/smstextcity_logo.png"> 

    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="src/assets/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" type="text/css" href="src/assets/css/vendors.min.css"> -->
    <!-- <link rel="stylesheet" type="text/css" href="assets/css/animate.css">
    <link rel="stylesheet" type="text/css" href="assets/css/balloon.css"> -->
    <link rel="stylesheet" type="text/css" href="src/assets/css/main.css">
    
    <link rel="stylesheet" type="text/css" href="src/assets/fonts/css/line-awesome.min.css">

</head>
<body>
        
    <div class="container-login">
        <center>
            <img src="src/assets/img/smstextcity_logo.png" alt="logo">
            <h3>Sign In</h3>
        </center>
        
        <form method="post" id="logina" action="#">
            <label class="xsp">Email Address</label>
            <input type="email" name="emm" id="emm" class="form-control" placeholder="Email Address" autocomplete="off" required>
            <label class="xsp">Password</label>
            <input type="password" name="pwwd" id="pwwd" class="form-control" placeholder="Password" autocomplete="off" required>
            <div class="pull-right">
                <label for="show-hide" id="eye-watcher"><i class="la la-eye"></i></label>
                <input type="checkbox" name="" id="show-hide">
            </div>
            <div class="clearfix"></div>
            
            <div class="text-center">
                <button name="loginbtn" id="loginbtn" type="submit" class="btn btn-info btn-rounded">Login</button>
                <small>Having Trouble logging in? <a href="forgot.php" class="btn btn-link">Fogot Password</a></small>
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
    
    <script src="assets/js/jquery-3.2.1.min.js" type="text/javascript"></script>
    <script src="assets/js/knotifier.js" type="text/javascript"></script>
<!--    <script src="assets/js/login.js" type="text/javascript"></script>-->
    
    <script>
    
    document.addEventListener( "DOMContentLoaded", function() {
    //created by {k11y}
        var PasswordToggler = function( element, field, eyewatch ) {
            this.element = element;
            this.field = field;
            this.eyewatch = eyewatch;

            this.toggle();	
        };

        PasswordToggler.prototype = {
            toggle: function() {
                var self = this;
                self.element.addEventListener( "change", function() {
                    if( self.element.checked ) {
                        self.field.setAttribute( "type", "text" );
                        self.eyewatch.innerHTML='<i class="la la-eye-slash"></i>';
                    } else {
                        self.field.setAttribute( "type", "password" );
                        self.eyewatch.innerHTML='<i class="la la-eye"></i>';
                    }
                }, false);
            }
        };

        var checkbox = document.getElementById( "show-hide" );
        var pwd = document.getElementById( "pwwd" );
        var eye = document.getElementById( "eye-watcher" );

        var toggler = new PasswordToggler( checkbox, pwd, eye );
        //do not copy without reference

    });
        
    </script>

</body>
</html>