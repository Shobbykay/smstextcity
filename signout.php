<?php

@session_start();
//header("Cache-Control: no-cache, must-revalidate");
// require_once('api/functions/slim.php');

// $emailaa=base64_decode($_SESSION['emm_r']);

//log activity
// Pingsales::insert_signout($emailaa);

//kill session
// unset($_SESSION['emm_r']);
// session_destroy();

//redirect
echo '<script>location.href="./";</script>';
//header("Location: ./");