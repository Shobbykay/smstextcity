<?php
//@session_start();
abstract class SmsStatus {
    const Failure = 'failure';
    const Success = 'success';
    
    //connection
    const TEST_SERVER = 'localhost';
    const TEST_USERNAME = 'root';
    const TEST_PASSWORD = '';
    const TEST_DATABASE = 'smstextcity';
    
    const PROD_SERVER = 'localhost';
    const PROD_USERNAME = 'fundrea1_por';
    const PROD_PASSWORD = 'iOqhy;)Prc?N';
    const PROD_DATABASE = 'fundrea1_portal';

    const HASH_USR = 'djk0==';
    
}

class Smstextcity {
    public static function conn() {

        $con=mysqli_connect(SmsStatus::TEST_SERVER,SmsStatus::TEST_USERNAME,SmsStatus::TEST_PASSWORD,SmsStatus::TEST_DATABASE);// Check connection
        if (mysqli_connect_errno())
        {  
            echo "Failed to connect to MySQL: ".mysqli_connect_error();
        }
        // return the connection
        return $con;

    }

    public static function login($email,$pwd) {        
        $con= Smstextcity::conn();
        $pwd=sha1($pwd);

        $q=mysqli_query($con,"select * from login_user where email_address='$email' AND password='$pwd'");
        $n=mysqli_num_rows($q);
        $response=array();

        if ($n>0){
            $response['status']='success';
            if($f=mysqli_fetch_assoc($q)){
                //array_push($g,$f['options']);
                $response['adfullname']=base64_encode($f['full_name']);
                $response['emm']=base64_encode($f['email_address']);
                $_SESSION['emm_r']=base64_encode($email);
            }
        }
        else{
            $response['status']='error';            
            $response['msg']='Invalid user account';            
        }
        return json_encode($response);
    }

    public static function guidv4($data = null) {
        // Generate 16 bytes (128 bits) of random data or use the data passed into the function.
        $data = $data ?? random_bytes(16);
        assert(strlen($data) == 16);
    
        // Set version to 0100
        $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
        // Set bits 6-7 to 10
        $data[8] = chr(ord($data[8]) & 0x3f | 0x80);
    
        // Output the 36 character UUID.
        return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
    }
    
    public static function insert_signout($email) {
        $con=Smstextcity::conn();
        $browser=$_SERVER['HTTP_USER_AGENT'];

        $q=mysqli_query($con,"UPDATE admin_logon SET last_login=now() WHERE email_address='$email'");
        
        if ($q){}
        else{
            //$respose['status']='An error occured saving your record. Try again.';
        }
        return '';
    }

    public static function createuser($name,$email,$password,$creator) {

        $con= Smstextcity::conn();
        $msg='';
        $ty='';
        $response=array();
        $pwd = sha1($password);
        $now = Date('y-m-d h:i:s');
        
        
        //check if contacts for client company is 10 already
        $q=mysqli_query($con,"select * from admin_logon where email_address='$email'");
        $n=mysqli_num_rows($q);
        if ($n>0){
          
            $ty='error';
            $msg='User Account already exist with details';
           
            
        }else{
            //save now
            $qqq=mysqli_query($con,"insert into admin_logon(fullname,email_address,password,created_by,date_created) values('$name','$email','$pwd','$creator',now())");
            if ($qqq){
                $ty='success';
                //$msg.='Contact Details saved successfully';
            }
            else{
                $ty='error';
                $msg.='An error occured while trying to save contact details. Try Again: '.mysqli_error($con);
                echo $msg;
            } 
        }
        
        $response['message']=$msg;
        $response['status']=$ty;

        return json_encode($response);
    }

    public static function createfunding($opt,$created_by){
        $con= Smstextcity::conn();
        $date_created=Date('Y-m-d h:i:s');
        $response=array();
        $msg='';
        $status='';

        $query="INSERT INTO `funding_plans`(`option_`, `created_by`, `date_created`) VALUES ('$opt','$created_by','$date_created')";

        $q=mysqli_query($con,$query);
        if ($q){
            $status='success';
            $msg = 'Option added successfully';
        }
        else{
            $status='error';
            $msg = 'error: '.mysqli_error($con);
        }

        $response['message']=$msg;
        $response['status']=$status;

        return json_encode($response);
    }

    public static function createnegotiation($email,$funding_plan,$amount,$interest,$duration,$other,$created_by){
        $con= Smstextcity::conn();
        $date_created=Date('Y-m-d h:i:s');
        $response=array();
        $msg='';
        $status='0';//0-ongoing,1-completed,2-rejected
        $negotiation_id = 'neg-'.self::guidv4();
        $prod_id='867-1688058009-649-785';

        $query="INSERT INTO `negotiation`(`nego_id`,`product_id`,`user_id`, `funding_plan`, `amount_offered`, `interest`, `duration`, `other`, `status`, `date_created`) VALUES ('$negotiation_id','$prod_id','$created_by','$funding_plan','$amount','$interest','$duration','$other','$status','$date_created')";

        $q=mysqli_query($con,$query);
        if ($q){
            $status='success';
            $msg = 'Negotiation added successfully';

            //log
            self::insert_log($email,"You created a negotiation offer");
        }
        else{
            $status='error';
            $msg = 'error: '.mysqli_error($con);
        }

        $response['message']=$msg;
        $response['status']=$status;

        return json_encode($response);
    }

    public static function add_user_response($email,$nego_id,$user_id,$msg_){
        $con= Smstextcity::conn();
        $date_created=Date('Y-m-d h:i:s');
        $response=array();
        $msg='';
        //status ::: 0-developer,1-user
        $status='1';
        //type ::: 0-negotiation,1-rejected, 2-accept
        $type='0';

        $query="INSERT INTO `developers_response`(`nego_id`, `user_id`, `response`, `status`, `type`, `created_by`, `date_created`) VALUES ('$nego_id','$user_id','$msg_','$status','$type','$email','$date_created')";

        $q=mysqli_query($con,$query);
        if ($q){
            $statusx_='success';
            $msg = 'Response added';
            $log_msg='You responded to the developer\'s response on your negotiation';
            //log
            self::insert_log($email,$log_msg);
        }
        else{
            $statusx_='error';
            $msg = 'error: '.mysqli_error($con);
        }

        $response['message']=$msg;
        $response['status']=$statusx_;

        return json_encode($response);
    }

    public static function add_developer_response($email,$nego_id,$user_id,$msg_,$status,$type,$created_by){
        $con= Smstextcity::conn();
        $date_created=Date('Y-m-d h:i:s');
        $response=array();
        $msg='';
        //status ::: 0-developer,1-user
        //type ::: 0-negotiation,1-rejected, 2-accept

        $query="INSERT INTO `developers_response`(`nego_id`, `user_id`, `response`, `status`, `type`, `created_by`, `date_created`) VALUES ('$nego_id','$user_id','$msg_','$status','$type','$created_by','$date_created')";

        $q=mysqli_query($con,$query);
        if ($q){
            $statusx_='success';
            $msg = 'Response added';
            $log_msg='';

            if ($status==0 && $type==0){
                $log_msg='Developer responded to your negotiation';

                //update negotiation
                $query_upd="UPDATE `negotiation` SET status='0',stage=1 WHERE nego_id='$nego_id'";
                mysqli_query($con,$query_upd);

            } else if ($status==0 && $type==1){
                $log_msg='Your negotiation has been rejected. Please view negotiation to see reasons.';

                //update negotiation
                $query_upd="UPDATE `negotiation` SET status='2',stage=1 WHERE nego_id='$nego_id'";
                mysqli_query($con,$query_upd);

            } else if ($status==0 && $type==2){
                $log_msg='Your negotiation offer has been accepted. You can now start funding.';

                //update negotiation
                $query_upd="UPDATE `negotiation` SET status='1',stage=1 WHERE nego_id='$nego_id'";
                mysqli_query($con,$query_upd);

            } else {
                $log_msg='You responded to the developer\'s response on your negotiation';
            }
            //log
            self::insert_log($email,$log_msg);
        }
        else{
            $statusx_='error';
            $msg = 'error: '.mysqli_error($con);
        }

        $response['message']=$msg;
        $response['status']=$statusx_;

        return json_encode($response);
    }
    
    public static function createproduct($project_name,$product,$state,$city,$amount,$initial_phase,$min_funding,$total_collateral,$desc,$location,$landmarks,$estate_usp,$doc_appr,$land,$apthome,$created_by)
    {
        $con= Smstextcity::conn();
        
        $city=stripslashes(trim($city));
        $project_name=addslashes(trim($project_name));
        $product=addslashes(trim($product));
        $initial_phase=addslashes(trim($initial_phase));
        $min_funding=addslashes(trim($min_funding));
        $total_collateral=addslashes(trim($total_collateral));
        $desc=addslashes(trim($desc));
        $location=addslashes(trim($location));
        $landmarks=addslashes(trim($landmarks));
        $estate_usp=addslashes(trim($estate_usp));
        $doc_appr=addslashes(trim($doc_appr));
        $land=addslashes(trim($land));
                
        $prod_id=mt_rand(100,999).'-'.time().'-'.substr(uniqid(),0,3).'-'.mt_rand(100,999);
        $date_created=Date('Y-m-d h:i:s');
        $prod_img='';
        $response=array();
        $msg='';
        $status='';

        // Check if file was uploaded without errors
        if(isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0){
            $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
            $filename = $prod_id.'.jpg';//$_FILES["photo"]["name"]
            $prod_img = $filename;
            $filetype = $_FILES["photo"]["type"];
            $filesize = $_FILES["photo"]["size"];
        
            // Verify file extension
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            if(!array_key_exists($ext, $allowed)){
                $response['message']='Error: Please select a valid file format.';
                $response['status']='error';

                return json_encode($response);
            }
        
            // Verify file size - 10MB maximum
            $maxsize = 10 * 1024 * 1024;
            if($filesize > $maxsize){
                $response['message']='Error: File size is larger than the allowed limit.';
                $response['status']='error';

                return json_encode($response);
            }
        
            // Verify MYME type of the file
            if(in_array($filetype, $allowed)){
                // Check whether file exists before uploading it
                if(file_exists("upload/" . $filename)){
                    $response['message']=$filename . ' already exists.';
                    $response['status']='error';

                    return json_encode($response);
                } else{
                    move_uploaded_file($_FILES["photo"]["tmp_name"], "products/" . $filename);
                    // echo "Your file was uploaded successfully.";
                } 
            } else{
                $response['message']='Error: There was a problem uploading your file. Please try again.';
                $response['status']='error';

                return json_encode($response);
            }
        } else{
            echo "Error: " . $_FILES["photo"]["error"];
            $response['message']='Error: '.$_FILES["photo"]["error"];
            $response['status']='error';

            return json_encode($response);
        }
        
        
        $query="INSERT INTO `products`(`product_id`, `project_name`, `product`, `state`, `city`, `amount`, `initial_phase`, `min_funding`, `total_collateral`, `description`, `location`, `landmarks`, `estate_usp`, `docs_appr`, `land`, `appartment`, `prod_img`, `created_by`, `date_created`) VALUES ('$prod_id','$project_name','$product','$state','$city','$amount','$initial_phase','$min_funding','$total_collateral','$desc','$location','$landmarks','$estate_usp','$doc_appr','$land','$apthome','$prod_img','$created_by','$date_created')";

        $q=mysqli_query($con,$query);
        if ($q){
            $status='success';
            $msg = 'Product added successfully';
        }
        else{
            $status='error';
            $msg = 'error: '.mysqli_error($con);
        }

        $response['message']=$msg;
        $response['status']=$status;

        return json_encode($response);
    }
    
    public static function fetch_admin() {
        //all client contracts
        $con= Smstextcity::conn();

        $q=mysqli_query($con,'select * from admin_logon order by date(date_created) desc');
        $n=mysqli_num_rows($q);
        $respose=array();

        if ($n>0){
            //contains output
            $respose['status']='success';
            $respose['data'] = array();
            while($f=mysqli_fetch_assoc($q)){                
                array_push($respose['data'],$f);
            }
        }
        else{
            $respose['status']='error';
            $respose[0]='no data found';

        }
        return json_encode($respose);
    }
    
    public static function fetch_users() {
        //all client contracts
        $con= Smstextcity::conn();

        $q=mysqli_query($con,'select * from user_details order by date(date_created) desc');
        $n=mysqli_num_rows($q);
        $respose=array();

        if ($n>0){
            //contains output
            $respose['status']='success';
            $respose['data'] = array();
            while($f=mysqli_fetch_assoc($q)){                
                array_push($respose['data'],$f);
            }
        }
        else{
            $respose['status']='error';
            $respose[0]='no data found';

        }
        return json_encode($respose);
    }

    public static function Smstextcity_statistics($email){
        $con= Smstextcity::conn();
        $response=array();
        
        $response['ping_statistics']=array();
        
        $response['ping_statistics'][0]['total_prod']=mysqli_num_rows(mysqli_query($con,"select * from products"));
//        array_push($response['ping_statistics'],mysqli_num_rows(mysqli_query($con,"select * from client_contract")));
//        
        $response['ping_statistics'][0]['you_upl']=mysqli_num_rows(mysqli_query($con,"select * from products WHERE created_by='$email' AND date(date_created) = cast(Date(Now()) as Date)"));
        
//        array_push($response['ping_statistics'],mysqli_num_rows(mysqli_query($con,"select * from contact_list")));
//        
        $response['ping_statistics'][0]['upl_today']=mysqli_num_rows(mysqli_query($con,"select * from products WHERE date(date_created) = cast(Date(Now()) as Date)"));
//         array_push($response['ping_statistics'],mysqli_query($con,"select DISTINCT client_name FROM contact_list"));
//        
        $response['ping_statistics'][0]['total_users']=mysqli_num_rows(mysqli_query($con,"select * from admin_logon"));
//        array_push($response['ping_statistics'],mysqli_num_rows(mysqli_query($con,"select * from client_contract WHERE `expected_close_date` BETWEEN NOW() - INTERVAL 30 DAY AND NOW() AND status='open'")));

        return json_encode($response);
    }

    public static function dashboard_user_stats_f($user_id){

        $con= Smstextcity::conn();
        $response=array();

        $query = "SELECT IFNULL((select sum(amount_offered) from negotiation where user_id='$user_id' AND status=0), 0) as sum_ongoing, IFNULL((select sum(amount_offered) from negotiation where user_id='$user_id' AND status=1), 0) as sum_completed, IFNULL((select sum(amount_offered) from negotiation where user_id='$user_id' AND status=2), 0) as sum_rejected, IFNULL((select count(1) from negotiation where user_id='$user_id'), 0) as total_negotiations, IFNULL((select count(1) from negotiation where user_id='$user_id' AND status=0), 0) as ongoing_negotiations, IFNULL((select count(1) from negotiation where user_id='$user_id' AND status=1), 0) as completed_negotiations FROM DUAL";

        // $q=mysqli_query($con,$query);

        if (!mysqli_query($con,$query)){
            $response['status'] = 'error';
            $response['message'] = mysqli_error($con);
        } else{
            $q=mysqli_query($con,$query);
            $n = mysqli_num_rows($q);
            $f=mysqli_fetch_assoc($q);
            $response['status'] = 'success';
            $response['data'] = $f;
        }
        
        // $f=mysqli_fetch_assoc($q);
        // array_push($response['data'],$f);

        return json_encode($response);

    }
    
    public static function fetch_products() {
        //all client contracts
        $con= Smstextcity::conn();

        //$fetch
        $q=mysqli_query($con,'select product_id,project_name,product,initial_phase,location,created_by,date_created from products order by date(date_created) desc');
        $n=mysqli_num_rows($q);
        $response=array();

        if ($n>0){
            //contains output
            $response['status']='success';
            $response['data'] = array();
            while($f=mysqli_fetch_assoc($q)){
                array_push($response['data'],$f);
            }
        }
        else{
            $response['status']='error';
            $response[0]='no data found';
        }
        return json_encode($response);
    }
    
    public static function fetch_data($tablename,$order,$columns) {
        //all client contracts
        $con= Smstextcity::conn();

        //$fetch
        $query="SELECT ".$columns." FROM ".$tablename." ORDER BY ".$order." desc";
        $q=mysqli_query($con,$query);
        $n=mysqli_num_rows($q);
        $response=array();

        if ($n>0){
            //contains output
            $response['status']='success';
            $response['data'] = array();
            while($f=mysqli_fetch_assoc($q)){
                array_push($response['data'],$f);
            }
        }
        else{
            $response['status']='error';
            $response['data']='no data found';
        }
        return json_encode($response);
    }
    
    public static function fetch_client() {
        $con= Smstextcity::conn();

        $client_name=array();
        $client_address=array();
        $client=array();

        $q=mysqli_query($con,'select * from contact_list');
        $n=mysqli_num_rows($q);

        if ($n>0){
            $g=array();
            while($f=mysqli_fetch_assoc($q)){
                if (!in_array($f['client_name'],$client_name)){
                    //does not exist
                    array_push($client_name,$f['client_name']);
                    array_push($client_address,$f['client_address']);
                }
            }
            array_push($client,$client_name);
            array_push($client,$client_address);

            return json_encode($client);
        }
        else{
            return 'nothing found';
        }
    }
    
    public static function fetch_logs($id='') {
        $con= Smstextcity::conn();

        $query='';
        if ($id!==''){
            $query="select * from Smstextcity_log where id='$id' order by id desc";
        }
        else{
            $query='select * from Smstextcity_log order by id desc';
        }
        
        $q=mysqli_query($con,$query);
        $n=mysqli_num_rows($q);
        $respose=array();

        if ($n>0){
            $count=0;
            $respose['status']='success';
            while($f=mysqli_fetch_assoc($q)){
                array_push($respose,$f);
                $count++;
            }
        }
        else{
            $respose['status']='error';
            $respose[0]='no data found';
        }
        return json_encode($respose);
    }
    
    public static function sum_query($table_query){
        if (empty($table_query)){
            return '0';
        }
        else{
            $con= Smstextcity::conn();
            $qw=mysqli_query($con,"select sum(amount) AS sum from ".$table_query);
            $nw=mysqli_num_rows($qw);
            
            if ($qw && ($nw>0)){
                $sum=mysqli_fetch_assoc($qw)['sum'];
                if (empty($sum)){
                    $sum='0';
                }
                return number_format($sum);
            }else{
                return '0';
            }
        }
    }
    
    public static function fetch_accounts($id='') {
        $con= Smstextcity::conn();

        $add_query='';
        if (!empty($id)){
            $add_query=" WHERE id='$id'";
        }
        
        $q=mysqli_query($con,'select * from admin_accounts'.$add_query.' order by id desc');
        $n=mysqli_num_rows($q);

        if ($n>0){
            $g=array();
            while($f=mysqli_fetch_assoc($q)){
                array_push($g,$f);
            }
            return $g;
        }
        else{
            return '';
        }
    }
    
    public static function fetch_admindetails($admin_email) {
        $con= Smstextcity::conn();
        
        $q=mysqli_query($con,"select fullname, email_address, last_login, created_by, date_created from admin_logon where email_address='$admin_email'");
        $n=mysqli_num_rows($q);

        if ($n>0){
            $f=mysqli_fetch_assoc($q);
            return $f;
        }
        else{
            return '';   
        }
    }
    
    public static function fetch_adminname($admin_email) {
        $con= Smstextcity::conn();
        
        $q=mysqli_query($con,"select * from admin_logon where email_address='$admin_email'");
        $n=mysqli_num_rows($q);

        if ($n>0){
            $f=mysqli_fetch_assoc($q);
            return strtok($f['fullname']," ");
        }
        else{
            return '';   
        }
    }
    
    public static function count_query($table_query){
        if (empty($table_query)){
            return '0';
        }
        else{
            $con= Smstextcity::conn();
            $qw=mysqli_query($con,"select * from ".$table_query);
            if ($qw){
                return mysqli_num_rows($qw);
            }else{
                return '0';
            }
        }
    }
    
    public static function chk_admin($email) {
        /*$admin=array("developer@pingsms.net","anslemesi@pingsms.net");
        
        if (in_array($email,$admin)){
            return 'yes';
        }
        */
        $con=Smstextcity::conn();
        $q=mysqli_query($con,"select * from admin_accounts where email_address='$email'");
        $n=mysqli_num_rows($q);
        if ($n>0){
            if ($f=mysqli_fetch_assoc($q)){
                if ($f['role']=='admin'){
                    return 'yes';
                }
            }
        }
        
    }
    
    public static function fetch_all_records($table_name=''){
        $con= Smstextcity::conn();
        if (trim($table_name)!==''){
            $q=mysqli_query($con,'select * from '.$table_name.' order by id desc');
            $n=mysqli_num_rows($q);
            if ($n>0){
                //contains output
                $g=array();
                while($f=mysqli_fetch_assoc($q)){
                    array_push($g,$f);
                }
                return $g;    
            }
            else{
                return '';
            }
        }else{
            return '';
        }
    }
    
    public static function insert_log($email,$msg) {
        $con= Smstextcity::conn();
        $msg = addslashes($msg);

        mysqli_query($con,"insert into log(email_address,msg,date_created) values('$email','$msg',now())");
        //no output
    }
    
}