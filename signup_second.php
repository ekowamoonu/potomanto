<?php ob_start();
session_start();
if(!isset($_SESSION['id'])){header("Location: signup_first.php");}
//include database connection
include('functions.php'); 
include('conn'.DS.'db_connection.php'); 
$connection=new DB_Connection();
include('classes'.DS.'querying_class.php');
include('classes'.DS.'form_class.php');

//get the list of all countries from the database
$query_guy=new DataQuery();
$form_man=new FormDealer();
$error_msg=$form_man->log_error("A Moment For Your Academic Details","normal");

//<i class='fa fa-spinner fa-spin'></i>

$signup_id=$_SESSION['id'];

?>



<?php 
    
    /*queries to get all countries, departments, faculties from the database*/
    
//select all countries
$results=$query_guy->find_all("COUNTRY");
$country="";

while($countries=mysqli_fetch_assoc($results)){
     $value=$countries['COUNTRY_NAME'];
     $country_id=$countries['COUNTRY_ID'];

     $country.="<option value='{$country_id}'>".$value."</option>";

}


//select all year groups
$year_results=$query_guy->find_all("YEARS");
$year="";

while($years=mysqli_fetch_assoc($year_results)){
     $value=$years['YEAR_GROUP'];
     $year_id=$years['YEAR_GROUP'];

     $year.="<option value='{$year_id}'>".$value."</option>";

}

//select all faculties from database
$faculty_results=$query_guy->find_all("FACULTY");
$faculty_var="";

while($faculties=mysqli_fetch_assoc($faculty_results)){
     $f_value=$faculties['FACULTY_NAME'];
     $f_id=$faculties['FACULTY_ID'];

     $faculty_var.="<option value='{$f_id}'>".$f_value."</option>";

}





//form submission
if(isset($_POST['submit'])){

      if($form_man->emptyField($_POST['country'])||
         $form_man->emptyField($_POST['institution'])||
         $form_man->emptyField($_POST['faculty'])||
         $form_man->emptyField($_POST['department'])||
         $form_man->emptyField($_POST['year'])
         
          ){
            $error_msg=$form_man->log_error("Ouch! You Left Some Fields Blank","red");
      }//end second if

      else{
           
           $country=$form_man->cleanString($_POST['country']);
           $institution=$form_man->cleanString($_POST['institution']);
           $faculty=$form_man->cleanString($_POST['faculty']);
           $department=$form_man->cleanString($_POST['department']);
           $year=$form_man->cleanString($_POST['year']);

           //update person's profile
           $query="UPDATE POTOUSERS SET ";
           $query.="CO_ID='{$country}',";
           $query.="IN_ID='{$institution}',";
           $query.="FA_ID='{$faculty}',";
           $query.="DEPT_ID='{$department}',";
          /* $query.="STATUS='{$status}',";*/
           $query.="YEAR_GROUP='{$year}',";
           $query.="CURRENTLY='...', ";
           $query.="MMT='...',";
           $query.="MCT='...',";
           $query.="FAVORITE_COURSE='...',";
           $query.="AMBITIONS='...',";
           $query.="TEAM_WORK='50',";
           $query.="HUMAN_RELATIONS='50',";
           $query.="PERSONALITY_ATTITUDE='50',";
           $query.="OPENESS='50', ";
           $query.="PROFILE_PHOTO='avatar.png'";
           $query.="WHERE POTO_ID=".$signup_id;

           $update=mysqli_query(DB_Connection::$connection,$query);

           if($update){
            setcookie("completion","notcomplete",time()+71556926);
            setcookie("completion_id",$signup_id,time()+71556926);
            setcookie("log",$signup_id,time()+(3*365*24*60*60));
           // echo mysqli_error(DB_Connection::$connection);
            header("Location: intermediary");
           }
      }//end else

}//first if ends


?>



<?php include("inc/header.php"); ?>
<title>Academic Profile</title>
<link rel="stylesheet" href="css/signup_second.css"/>
</head>

<body>


 <div class="container form-main-div"><!--form starts-->
  <section class="row">
      <div class="col-md-5 col-md-offset-3 form-div">
        <?php echo $error_msg; ?>
        <form class="form actual-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
          <select class="form-control" name="country" id="country">
            <option value="default">Where Is Your University Located</option>
            <?php echo $country; ?>
          </select>
           <select class="form-control" name="institution" id="institution"><!--id=institution-->
            <option value="default" class="institution">Name Of Your University</option>
           
          </select>
          <select class="form-control" name="faculty" id="faculty"><!--id=faculty-->
            <option value="default">School/Faculty You Belong To</option>
            <?php echo $faculty_var; ?>
          </select>
          <select class="form-control" name="department" id="department">
            <option value="default">Specific Department</option>
      
          </select>

           <select class="form-control" name="year">
            <option value="default">Your Year Group</option>
            <?php echo $year; ?>
          </select>

          <input type="submit" name="submit" class="form-control btn btn-success submit-btn"  value="I'm Done!"/>
        </form>
      </div>
  </section><!--form ends-->
 </div>
 
   


<!-- <div class="container-fluid copyright">
    <section class="row">
        <div class="col-md-12">
            <h5>BitDistrikt Technologies &copy; <?php echo date("Y M",time()); ?></h5>
        </div>
    </section>
</div> -->




<?php include("inc/footer.php"); ?>
<script type="text/javascript" src="js/signup_third.js"></script>
<script>
        new WOW().init();
</script>
</body>
</html>