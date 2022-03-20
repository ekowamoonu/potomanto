<?php ob_start();
session_start();

if(/*isset($_SESSION['login_id'])||*/isset($_COOKIE['log'])){header("Location: poto-dashboard");}

include('functions.php'); 
include('conn'.DS.'db_connection.php'); 
include('classes'.DS.'querying_class.php');
include('classes'.DS.'form_class.php');
include('classes'.DS.'insertion_class.php');

$query_guy=new DataQuery();
$form_man=new FormDealer();

$error_msg=$form_man->log_error("Login To Your Dashboard","normal");

if(isset($_POST['login'])){
    if($form_man->emptyField($_POST['phone'])||
       $form_man->emptyField($_POST['password'])
      ){
       $error_msg=$form_man->log_error("Illegal Login Attempt!","red");
    }

    else{
            $phone=$form_man->cleanString($_POST['phone']);
            $password=$form_man->cleanString($_POST['password']);


            $pass_check="SELECT * FROM POTOUSERS WHERE CALL_LINE='{$phone}'";//select record from table using username
            $res=mysqli_query(DB_Connection::$connection,$pass_check);

           /* if(!$res){echo "failed".mysqli_error(DB_Connection::$connection);}*/
            $record= mysqli_fetch_assoc($res);

            if(password_verify($password,$record['P_PASSWORD'])){

                            /*$_SESSION['login_id']=$record['POTO_ID'];*/
                            $set_id=$record['POTO_ID'];
                            setcookie("log",$set_id,time()+(3*365*24*60*60));
                            header("Location: poto-dashboard");
                        }
            else{
                 $error_msg=$form_man->log_error("Illegal Login Attempt!","red");
            }

    }



}

?>

<?php include("inc/header.php"); ?>
<title>Login</title>
<link rel="stylesheet" href="css/login.css"/>
</head>

<body>


 <div class="container form-main-div"><!--form starts-->
  <section class="row login-row">
      <div class="col-md-5 col-md-offset-3 form-div">
        <?php echo $error_msg; ?>
        <form class="form actual-form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
          <input type="text" name="phone" class="form-control" placeholder="&#128100; Your Phone Number"/>
          <input type="password" name="password" class="form-control" placeholder="&#128274; Password"/>
          <p class="text-center"><a href="reset"  style="color:orange;">Forgot your password? Click Here</a></p>
          <input type="submit" class="form-control btn btn-success submit-btn" name="login" value="Open My Potomanto"/>
          <input  class="form-control btn btn-success submit-btn normal-btn" onclick="window.location='index';" value="Back To Home Page"/>
          <input  class="form-control btn btn-success submit-btn normal-btn" onclick="window.location='signup_first';" value="Register"/>
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