<?php
@session_start();

//import classes
require "connect.php";
require "constants.php";

$constants = new Constants();

//receive data from POST
if (isset($_POST['action'])){
    // echo $constants->getRegistrationCode();
    

    if ($_POST['action'] == $constants->getRegistrationCode()){
        // account registration
        echo register_account($mysqli, $_POST);

    } else if ($_POST['action'] == "login"){

        //
        echo login($mysqli, $_POST);

    } else if ($_POST['action'] == "single___comment__"){

        // single page comment
        echo add_comment__single($mysqli, $_POST);

    }
}


/**
 * 
 * FUNCTIONS FOR ACTION
 * 
 */

    function login($mysqli, $data){
        $email = $data['email'];
        $password = $data['password'];

        $query = "SELECT * FROM user_details WHERE email_address='$email'";// 
        $result = $mysqli->query($query);
        $num = $result->num_rows;
        
        if ($num < 1){
            $response_array = array(
                "message" => 'User does not exist',
                "code" => "422"
            );
            
            return json_encode($response_array);
        } else{
            $rec = $result->fetch_assoc();
            // $bcrypt = new Bcrypt();

            $verify_password = password_verify($password, $rec['password']);

            if ($verify_password){
                $response_array = array(
                    "message" => 'Welcome '.strtok($rec['first_name'], " "),
                    "code" => "200"
                );

                if ($rec['is_verified'] != 1){
                    //unverified account
                    $response_array = array(
                        "message" => 'Account not verified',
                        "code" => "422"
                    );

                    return json_encode($response_array);
                } else if ($rec['is_disabled'] != 0){
                    //unverified account
                    $response_array = array(
                        "message" => 'Account blocked, contact admin',
                        "code" => "422"
                    );

                    return json_encode($response_array);
                }

                $_SESSION['userdata'] = $rec;
                
                return json_encode($response_array);
            } else {
                $response_array = array(
                    "message" => 'Invalid Password supplied',
                    "code" => "422"
                );
                
                return json_encode($response_array);
            }
        }      

    }

    function register($mysqli){
        if ($result = $mysqli -> query("SELECT * FROM states")) {
            echo "Returned rows are: " . $result -> num_rows;
            $array = array();
            while ($row = $result -> fetch_row()) {
                array_push($array, $row);
            }
            // Free result set
            $result -> free_result();
            return $array;
        }
    }

    function gen_uuid() {
        return sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
            // 32 bits for "time_low"
            mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),
    
            // 16 bits for "time_mid"
            mt_rand( 0, 0xffff ),
    
            // 16 bits for "time_hi_and_version",
            // four most significant bits holds version number 4
            mt_rand( 0, 0x0fff ) | 0x4000,
    
            // 16 bits, 8 bits for "clk_seq_hi_res",
            // 8 bits for "clk_seq_low",
            // two most significant bits holds zero and one for variant DCE1.1
            mt_rand( 0, 0x3fff ) | 0x8000,
    
            // 48 bits for "node"
            mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )
        );
    }

    function register_account($mysqli, $data){

        // $uuid = new UUID();
        // $bcrypt = new Bcrypt();

        //filter data
        $firstname = addslashes(trim($data['firstname']));
        $lastname = addslashes(trim($data['lastname']));
        $userid = gen_uuid();//$uuid->guidv4() //mt_rand().mt_rand()
        $email = addslashes($data['email_add']);
        $phone = $data['phone'];
        $how = $data['how'];
        $pwd = password_hash($data['password'], PASSWORD_DEFAULT);//$bcrypt->hash
        $ip_address = $_SERVER['REMOTE_ADDR'];
        $browser = 'GOOGLE CHROME';
        $now = Date('Y-m-d h:i:s');


        //validation
        if (strlen($data['password']) < 6){
            $response_array = array(
                "message" => "Passwords cannot be less than 6 characters",
                "code" => "422"
            );
            
            return json_encode($response_array);
        } else if ($data['password'] !== $data['confirm']){
            $response_array = array(
                "message" => "Passwords do not match",
                "code" => "422"
            );
            
            return json_encode($response_array);

        } else if (!is_numeric($data['phone']) || strlen($data['phone']) != 11) {
            $response_array = array(
                "message" => "Invalid Phone Number",
                "code" => "422"
            );
            
            return json_encode($response_array);
        }


        
        //database query builder
        $query = "INSERT INTO user_details(`user_id`, `first_name`, `last_name`, `email_address`, `phone_num`, `how_did_you`, `password`, `ip_address`, `browser`, `is_verified`, `is_disabled`, `date_created`) VALUES ('$userid','$firstname','$lastname','$email','$phone','$how','$pwd','$ip_address','$browser',1,0,'$now')";

        $resp = '';
        if ($result = $mysqli -> query($query)) {
            $resp = "Successful";//Verification in progress
        }else{
            $resp = "Error description: " . $mysqli -> error;//"An error occured. Please Try Again."
        }

        $mysqli -> close();

        $response_array = array(
            "message" => $resp,
            "code" => "200"
        );
        
        return json_encode($response_array);
    }

