<?php ob_start();
session_start();
if(!isset($_SESSION['id'])){header("Location: signup_first.php");}
//include database connection
include('functions.php'); 
include('conn'.DS.'db_connection.php'); 
$connection=new DB_Connection();
include('classes'.DS.'querying_class.php');

$signup_id=$_SESSION['id'];

$query_guy=new DataQuery();

//firstname picker
$results=$query_guy->find_by_id("POTOUSERS","POTO_ID",$signup_id);

$firstname=$results['FIRSTNAME'];


?>

<?php include("inc/header.php"); ?>
<title>Portfolio Built Successfully!</title>
<link rel="stylesheet" href="css/portfolio-build-success.css"/>
</head>

<body>


 <div class="container-fluid form-main-div"><!--success message starts-->
  <section class="row">
      <div class="col-md-8  col-md-offset-2 form-div wow animated bounceIn">
       <h2 class="success-head">Awesome! <?php echo $firstname; ?> Your Portfolio Has Been SuccessFully Built!<span><i class="fa fa-check fa-fw"></i></span></h2>
        <div class="span9">
           <h3>But You Still Have To Upload Your Profile Photo</h3>
           <h3>You Can Now Easily Share Files To Your Colleagues By Simply Logging In To Your Dashboard</h3>
           <h3>You Can Login To Your Dashboard To Do That or Proceed To Seeing Your Live Portfolio!</h3>
           <a class="btn btn-info" href="login"><span><i class="fa fa-cogs fa-fw"></i></span> To My Dashboard</a>
           <a class="btn btn-success" href="person-potomanto?poto987xyzpotyuisid=<?php echo $signup_id; ?>"><span><i class="fa fa-user fa-fw"></i></span> See My Live Portfolio!</a>
        </div>
      </div>
  </section><!--success message ends-->
 </div>
 
  




<?php include("inc/footer.php"); ?>
<script>
        new WOW().init();
</script>
</body>
</html>