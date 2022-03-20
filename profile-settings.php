<?php
ob_start();


/*if(!isset($_SESSION['login_id'])){header("Location: login");}*/
if(!isset($_COOKIE['log'])){header("Location: login");}
else{
  $id=$_COOKIE['log'];
}

//include database connection
include('functions.php'); 
include('conn'.DS.'db_connection.php'); 
include('classes'.DS.'querying_class.php');
include('classes'.DS.'form_class.php');
include('classes'.DS.'insertion_class.php');

$query_guy=new DataQuery();
$form_man=new FormDealer();

$success="";

include('inc/updates.php'); 

/*Get all records about user*/
$record=$query_guy->find_by_id("POTOUSERS","POTO_ID",$id);

$firstname=ucfirst($record['FIRSTNAME']); 
$lastname=ucfirst($record['LASTNAME']);
$name=" ".$firstname." ".$lastname;
$email=$record['EMAIL'];
$call=$record['CALL_LINE'];
$whatsapp=$record['WHATSAPP_LINE'];
$facebook=$record['FACEBOOK_NAME'];
$status=$record['STATUS'];
$speciality=$record['SPECIALITY'];
$currently=$record['CURRENTLY'];
$mmt=$record['MMT'];
$mct=$record['MCT'];
$fc=$record['FAVORITE_COURSE'];
$ambitions=$record['AMBITIONS'];
$year=$record['YEAR_GROUP'];
$old_photo=$record['PROFILE_PHOTO'];

/*profile photo updater*/
$update_event="onchange=\"update_photo('{$id}');\"";


//extra information to be retrieved from the database
/*get all countries*/
$count=$query_guy->find_all("COUNTRY");
$cifd="";//countries

while($countries=mysqli_fetch_assoc($count)){
     $v=$countries['COUNTRY_NAME'];
     $count_id=$countries['COUNTRY_ID'];

     $cifd.='<option value="'.$count_id.'">'.$v.'</option>';

}

//select all faculties from database
$faculty_results=$query_guy->find_all("FACULTY");
$faculty_var="";

while($faculties=mysqli_fetch_assoc($faculty_results)){
     $f_value=$faculties['FACULTY_NAME'];
     $f_id=$faculties['FACULTY_ID'];

     $faculty_var.="<option value='{$f_id}'>".$f_value."</option>";

}

?>





<?php include("inc/header.php"); ?>
 <title>Profile Settings</title>
<link rel="stylesheet" href="css/dashboard.css"/>
</head>

<body>

	 <nav class="navbar navbar-inverse navbar-fixed-right">
	     <div class="navbar-header"> 
	        <button type="button" class="navbar-toggle collapsed" data-target="#collapsemenu" data-toggle="collapse">
	          <span class="icon-bar"></span>
	          <span class="icon-bar"></span>
	          <span class="icon-bar"></span>
	        </button>
	        <a href="index" style="margin-top:-7px;"  class="navbar-brand"><img width="200" class="img-responsive pull-left animated wow bounceInDown " src="images/poto.png"/></a>
	       <!--  <a href="#" class="navbar-brand"><span><i class="fa fa-barcode fa-fw"></i></span>Nelson Storm</a> -->
	       <!-- <img src="logo.jpg" class="img-responsive img-circle"/> -->
	     </div>
	    <div class="collapse navbar-collapse pull-right" id="collapsemenu">
        <ul class="nav navbar-nav">
            <li><a href="#" ><i class="fa fa-user"></i> <?php echo $name; ?></a></li>
        </ul>

     </div>

</nav>


<div class="container-fluid">

	<div class="col-md-2">
		<div class="sidebar content-box" style="display: block;">
                <ul class="nav">
                    <!-- Main menu -->
                    <li><a href="poto-dashboard"><i class="fa fa-file"></i> Document Upload</a></li>
                    <li  class="current"><a href="#" id="profile_settings"><i class="fa fa-gears"></i>Profile Settings</a><li>
                    <li><a href="projects"><i class="fa fa-book"></i> Poto-Library</a><li>
                     <li><a href="person-potomanto?poto987xyzpotyuisid=<?php echo $id;  ?>" ><i class="fa fa-user"></i> <span>See My Live Profile</span></a></li>
                    <li><a href="forum-landing"><i class="fa fa-comment"></i> Poto-Forum</a></li>
                      <li><a href="#"><i class="fa fa-calendar"></i> <?php echo date("d/M/y",time()); ?></a></li>
                    <li><a href="logout"><i class="fa fa-exclamation-circle"></i> Logout</a></li>
                     <li><a href="#"  onclick="alert('Feature under construction');"><!-- <i class="fa fa-paper-plane"></i> Send Quick .... --></a></li>
                <!--     <li class="submenu">
                         <a href="#">
                            <i class="glyphicon glyphicon-list"></i> Pages
                            <span class="caret pull-right"></span>
                         </a> -->
                         <!-- Sub menu -->
                       <!--   <ul>
                            <li><a href="login.html">Login</a></li>
                            <li><a href="signup.html">Signup</a></li>
                        </ul>
                    </li> -->
                </ul>
             </div>
	</div><!--end of side bar-->

	<div class="col-md-4">
		<div class="profile-upload-box  text-center">
      <img src="user_photos/<?php echo $old_photo; ?>" style="max-width:100%;" alt="User's Potomanto Photo"/>
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data" method="post">

    			<label class="btn btn-info btn-file">
    				<i class="fa fa-camera"></i> Choose New Pic<input type="file" name="photo" id="profile_pic" <?php echo $update_event; ?> style="display:none;"/>
    			</label>

          <label class="btn btn-info btn-submit" id="submit_pic">
             <i class="fa fa-upload"></i> Now Upload New Pic<input type="submit" name="photo_submit"  value="photo_submit" style="display:none;"/>
          </label>
    </form>
		</div>

	</div>

	<div class="col-md-6">
	  <div class="profile-card">
	  	<h3 class="text-center"><i class="fa fa-pencil"></i> Edit Your Poto-Profile Here</h3>
	  	<ul>
	  		 <ul class="nav">
                  <li>Academics <span class="value"><a href="#" data-toggle="modal" data-target="#country"> Change</a></span></li>
                  <li>Firstname: <?php echo ucfirst($firstname); ?>  <span class="value"><a href="#" data-toggle="modal" data-target="#firstname">Change </a></span></li>
                  <li>Lastname: <?php echo ucfirst($lastname); ?>  <span class="value"><a href="#" data-toggle="modal" data-target="#lastname">Change</a></span></li>
                  <li>Email: <?php echo $email; ?> <span class="value"><a href="#" data-toggle="modal" data-target="#email">Change </a></span></li>
                  <li>Call Line: <?php echo $call; ?> <span class="value"><a href="#" data-toggle="modal" data-target="#call_line">Change</a></span></li>
                  <li>Whatsapp Line: <?php echo $whatsapp; ?> <span class="value"><a href="#" data-toggle="modal" data-target="#whatsapp">Change </a></span></li>
                  <li>Facebook Name: <?php echo $facebook; ?> <span class="value"><a href="#" data-toggle="modal" data-target="#facebook">Change </a></span></li>
                  <li>Status: <?php echo $status; ?>  <span class="value"><a href="#" data-toggle="modal" data-target="#status">Change</a></span></li>
                  <li>Speciality: <?php echo $speciality; ?> <span class="value"><a href="#" data-toggle="modal" data-target="#speciality">Change</a></span></li>
                  <li>Most Memorable Times: <?php echo $mmt; ?>  <span class="value"><a href="#" data-toggle="modal" data-target="#mmt">Change</a></span></li>
                  <li>Most Challenging Times: <?php echo $mct; ?> <span class="value"><a href="#" data-toggle="modal" data-target="#mct">Change</a></span></li>
                  <li>Favorite Course: <?php echo $fc; ?> <span class="value"><a href="#" data-toggle="modal" data-target="#fc">Change</a></span></li>
                  <li>Ambitions: <?php echo $ambitions; ?> <span class="value"><a href="#" data-toggle="modal" data-target="#ambitions">Change</a></span></li>
                  <li>Personality <span class="value"><a href="#" data-toggle="modal" data-target="#personality">Change</a></span></li>
            </ul>
	  	</ul>
		  
	  </div>
	</div><!--end project card-->


</div>



<!--this file contains all update modals-->
<?php include('inc/dashboard_modals.php'); ?>



<?php include("inc/footer.php"); ?>
<script>
        new WOW().init();
</script>

<script type="text/javascript">
    //display submit button only after  a new profile pic has been selected
    $(function(){
          $("#submit_pic").hide();

          $("#profile_pic").change(function(){
            $("#submit_pic").fadeIn();
          });
    });

</script>



<script type="text/javascript">
         $(function(){
              //ajax call to select all insitutions in specific country
        $("#co").change(function(){          
             
             var country=$("#co").val();
            
             if(country!="default"){
                 
                $(".modal-title").html("A Little Info About Your Academic Life <i class='fa fa-spinner fa-spin fa-fw'></i>");
              $.post("parsers/signup_third_parser.php",{country:country},function(data){
                   $("#institution").html('<option value="default" class="institution">Institution Attended</option>'+data);
                   $(".modal-title").html("A Little Info About Your Academic Life");

              });
             }

     });

      //ajax call to select all faculties in specific institution
/*     $("#institution").change(function(){
             
             var institution=$("#institution").val();
             if(institution!="default"){
                 
                $(".modal-title").html("A Little Info About Your Academic Life <i class='fa fa-spinner fa-spin fa-fw'></i>");
              $.post("parsers/signup_third_parser.php",{institution:institution},function(data){
                   
                   $("#faculty").html('<option value="default">School Or Faculty You Were In</option>'+data);
                   //alert(data);
                   $(".modal-title").html("A Little Info About Your Academic Life");

              });
             }

     });*/

       //ajax call to select all departments in specific faculty
     $("#faculty").change(function(){
             
             var faculty=$("#faculty").val();

             if(faculty!="default"){
                 
                $(".modal-title").html("A Little Info About Your Academic Life <i class='fa fa-spinner fa-spin fa-fw'></i>");
              $.post("parsers/signup_third_parser.php",{faculty:faculty},function(data){
                   
                   $("#department").html(' <option value="default">Specific Department</option>'+data);
                   //alert(data);
                   $(".modal-title").html("A Little Info About Your Academic Life");

              });
             }

     });

         });

    </script>
</body>
</html>