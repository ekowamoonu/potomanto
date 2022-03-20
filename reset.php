<?php ob_start();
session_start();

if(/*isset($_SESSION['login_id'])||*/isset($_COOKIE['log'])){header("Location: poto-dashboard");}

include('functions.php'); 
include('conn'.DS.'db_connection.php'); 
include('classes'.DS.'querying_class.php');
include('classes'.DS.'form_class.php');
include('classes'.DS.'insertion_class.php');

function crypto_rand_secure($min,$max)
{
    $range = $max - $min;
    if($range < 0)
      return $min;
    $log = log($range, 2);
    $bytes = (int) ($log/8) + 1; //length in bytes
    $bits = (int) $log + 1; //length in bits
    $filter = (int) (1 << $bits) - 1; //set all lower bits to 1
    do{
      $rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
      $rnd = $rnd & $filter; //discard irrelevant bits
    }while($rnd >= $range);
    
    return $min + $rnd;
}


function getToken($length = 8)
{
    $token = "";
    $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
    $codeAlphabet .= "0123456789";
    for($i=0;$i<$length;$i++){
      $token .= $codeAlphabet[crypto_rand_secure(0,strlen($codeAlphabet))];
    }
    
    return $token;
}


$query_guy=new DataQuery();
$form_man=new FormDealer();

$error_msg=$form_man->log_error("Password Reset <i class='fa fa-refresh'></i>","normal");

if(isset($_POST['reset'])){
    if($form_man->emptyField($_POST['user'])||
       $form_man->emptyField($_POST['reset_email'])
      ){
       $error_msg=$form_man->log_error("All Fields Required!","red");
    }

    else{
            $user=$form_man->cleanString($_POST['user']);
            $reset_email=$form_man->cleanString($_POST['reset_email']);

            
            //check if user exists
            $user_check="SELECT * FROM POTOUSERS WHERE CALL_LINE='{$user}' OR EMAIL='{$user}'";
            $res=mysqli_query(DB_Connection::$connection,$user_check);

           /* if(!$res){echo "failed".mysqli_error(DB_Connection::$connection);}*/

            if(mysqli_num_rows($res)>=1){
                            
                            //generate random string and store in a variable
                            //hash random string
                            //update database record using the phone number or email
                            //send random string as email to user with reset email provided

                            /*generate random string*/
                            $generated_password=getToken(7);

                            /*hash generated password*/
                            $new_password=password_hash($generated_password,PASSWORD_BCRYPT,['cost'=>11]);

                            /*update database with new password*/
                            $update=mysqli_query(DB_Connection::$connection,"UPDATE POTOUSERS SET P_PASSWORD='{$new_password}' WHERE CALL_LINE='{$user}' OR EMAIL='{$user}'");

                            /*email new password to user*/

            ////Message
            $message = "Dear Potouser,\r\n";
            $message .= "This is your new login password:\r\n";
            $message .= "-----------------------\r\n";
            $message .= "".$generated_password."\r\n";
            $message .= "-----------------------\r\n";
            $message .= "Please you can opt to change this after you login to your dashboard.\r\n\r\n";
            $message .= "If you did not request this forgotten password reset, kindly contact us on 0209058871 \r\n\r\n";
            $message .= "Cheers,\r\n";
            $message .= "-- Potomanto team";
      
             //////Headers
            $headers = "From: Potomanto <webmaster@potomanto.com> \n";
            $headers .= "To-Sender: \n";
            $headers .= "X-Mailer: PHP\n"; // mailer
            $headers .= "Reply-To: webmaster@potomanto.com\n"; // Reply address
            $headers .= "Return-Path: webmaster@potomanto.com\n"; //Return Path for errors
            $headers .= "Content-Type: text/html; charset=iso-8859-1"; //Enc-type
      
            /////Subject
            $subject = "New Potomanto Password";

            $message=str_replace("\r\n","<br/ >",$message);

            mail($reset_email,$subject,$message,$headers);

            $error_msg=$form_man->log_error("Password Reset Successful! See Reset Email For New Password <i class='fa fa-check'></i>","normal");
                              
                        }
            else{
                 $error_msg=$form_man->log_error("Your Details Don't Exist!","red");
            }

    }



}

?>

<?php include("inc/header.php"); ?>
<title>Password Reset</title>
<link rel="stylesheet" href="css/login.css"/>
</head>

<body>


 <div class="container form-main-div"><!--form starts-->
  <section class="row login-row">
      <div class="col-md-5 col-md-offset-3 form-div">
        <?php echo $error_msg; ?>
        <form class="form actual-form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
          <input type="text" name="user" class="form-control" placeholder="&#128100; Signup Phone No./Email"/>
          <input type="email" name="reset_email" class="form-control" placeholder="&#128274; Reset Email"/>
          <p class="text-center" style="padding-top:20px;"><a href="login"  style="color:orange;">Done resetting? Login Here</a></p>
          <input type="submit" class="form-control btn btn-success submit-btn" name="reset" value="Reset My Password"/>
<!--           <input  class="form-control btn btn-success submit-btn normal-btn" onclick="window.location='index';" value="Back To Home Page"/>
          <input  class="form-control btn btn-success submit-btn normal-btn" onclick="window.location='signup_first';" value="Register"/> -->
        </form>
      </div>
  </section><!--form ends-->
 </div>
   

<div class="container-fluid copyright">
    <section class="row">
        <div class="col-md-12">
            <h5>BitDistrikt Technologies &copy; <?php echo date("Y M",time()); ?> <a href="about#support">User Support</a></h5>
        </div>
    </section>
</div>




<?php include("inc/footer.php"); ?>
<script>
        new WOW().init();
</script>
</body>
</html>