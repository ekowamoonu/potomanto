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
<link rel="stylesheet" href="css/intermediary.css"/>
</head>

<body>


 <div class="container-fluid form-main-div"><!--success message starts-->
  <section class="row">
      <div class="col-md-8  col-md-offset-2 form-div wow animated bounceIn">
       <h2 class="success-head">Great! <?php echo strtoupper($firstname); ?> You have come a long way!</h2>
        <div class="span9">
           <h3>Potomanto is a Library just for you.</h3>
           <h3>So upload your slides, pdfs and other materials and help someone who needs it</h3>
           <a class="btn btn-success" href="poto-dashboard"><span><i class="fa fa-upload fa-fw"></i></span>Do Some Uploads!</a>
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