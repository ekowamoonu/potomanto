<?php
ob_start();
session_start();
//include database connection
include('functions.php'); 
include('conn'.DS.'db_connection.php'); 
$connection=new DB_Connection();
include('classes'.DS.'querying_class.php');
include('classes'.DS.'form_class.php');
include('classes'.DS.'pagination.php');
//get the list of all countries from the database
$query_guy=new DataQuery();
$form_man=new FormDealer();

?>
<?php include("inc/header.php"); ?>
<title>Welcome To Poto-Forum</title>
<link rel="stylesheet" href="css/forum-landing.css"/>
</head>


<body>

<!--first container-->
<div class="container">
  <div class="row">
    <section class="col-md-5 welcome-col">
      <h3><span><i class="fa fa-comments"></i></span> Welcome To The Poto-Forum</h3>
       <p><span><i class="fa fa-check"></i></span> Join and contribute your ideas in interesting discussions and topics
         going on among students just like you.
       </p>
       <p><span><i class="fa fa-check"></i></span> Get help with your academic challenges, ask your questions and allow other students
        and alumni professionals from all over the world to help you out.
       </p>
       <p><span><i class="fa fa-check"></i></span> Let your suggestions, ideas and complains be heard by students
        all over the country
       </p>
       <p><span><i class="fa fa-check"></i></span>
         Everyone is a writer on Poto-Forum
       </p>
        <p><span><i class="fa fa-check"></i></span>
         We simply can't wait to open this up for you!
       </p>
      <a class="btn btn-info btn-block" href="#">Under Construction...10% <i class="fa fa-spinner fa-spin"></i> <!-- <span><i class="fa fa-long-arrow-right"></i></span> --></a>
    </section>
  </div>
</div>
  
<!-- <div class="container-fluid copyright">
   <a href="login"> <section class="row">
        <div class="col-md-12" style="height:40px;">
            <h5><b>Share A Document<b></h5>
        </div>
    </section></a>
</div>
 -->



<?php include("inc/footer.php"); ?>
</body>
</html>