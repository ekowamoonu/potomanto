<?php ob_start();

/*if(!isset($_SESSION['login_id'])){header("Location: login");}*/
if(!isset($_COOKIE['log'])){header("Location: login");}
else{
  $id=$_COOKIE['log'];
}

//include database connection
include('functions.php'); 
include('conn'.DS.'db_connection.php'); 
include('classes'.DS.'querying_class.php');

$query_guy=new DataQuery();


/*Get firstname and lastname records about user*/
$record=$query_guy->find_by_id("POTOUSERS","POTO_ID",$id);

$firstname=ucfirst($record['FIRSTNAME']); 
$lastname=ucfirst($record['LASTNAME']);
$department_id=$record['DEPT_ID'];
$institution_id=$record['IN_ID'];
$year_group=$record['YEAR_GROUP'];
$name=" ".$firstname." ".$lastname;


/*this code passes the user's id to a js funtion which sends this id to doc-upload-parser to be used for 
project submission*/

$refresh_link="onload=\"refresh_doc_list('{$id}');\" ";

/*listing all projects by the user*/

//select all documents posted by user 
//pass id's to a delete link and use js to do the rest
$project_list=$query_guy->find_by_col("PROJECTS","USER_POSTING_ID",$id);
$p_list="";

while($row_set=mysqli_fetch_assoc($project_list)){

  $project_id=$row_set['PROJECT_ID'];
  $original_file=$row_set['PROJECT_FILE'];
  $project_file=strlen($row_set['PROJECT_FILE'])>20?substr($row_set['PROJECT_FILE'],0,20).'...':$row_set['PROJECT_FILE'];
  

  $p_list.='<div id="record-'.$project_id.'" class="recorder-'.$original_file.'">
                   <a href="#" class="delete"><i class="fa fa-file fa-fw"></i>'.$project_file.'<i class="fa fa-times-circle fa-fw"></i></a></div>';


  
  
}



//list all documents uploaded in user's department
$filter_link="";
if(isset($_GET['only'])){
       
      $dept_project_list="SELECT * FROM PROJECTS WHERE INSTITU_ID=".$institution_id." AND DEP_ID=".$department_id." AND YEAR_GROUP='{$year_group}' ORDER BY UPLOAD_TIME DESC";
      $dept_results=mysqli_query(DB_Connection::$connection,$dept_project_list);
      $docs_number=mysqli_num_rows($dept_results);
      $department_uploads="";
      $filter_link='<a href="documents-from-my-department" class="btn btn-info"> <i class="fa fa-graduation-cap"></i>Documents From My Department</a>';

      if($docs_number==0){$department_uploads="<i class='fa fa-plug fa-2x'></i> Ooops! No documents uploaded from your department yet.";}
      else{

              while($docx_results=mysqli_fetch_assoc($dept_results)){
                          
                          $doc_header=$docx_results['PROJECT_HEADER'];
                          $doc_file=$docx_results['PROJECT_FILE'];
                          $doc_id=$docx_results['PROJECT_ID'];
                          $upload_date=gaby_timeago_detector($docx_results['UPLOAD_TIME']);
                                  
                          $department_uploads.='<div class="row">
                                                 <div class="col-md-7 col-sm-7"><h1><i class="fa fa-file"></i> '.$doc_header.'</h1>
                                                 <p>Uploaded '. $upload_date.'</p>
                                                 </div>
                                                 <div class="col-lg-2"><a href="user_projects/'.$doc_file.'" download="'.$doc_file.'" class="btn btn-info"><i class="fa fa-download"></i> Get This Document</a></div>
                                                 <div class="col-lg-2"><a href="project_detail?details='.$doc_id.'"  class="btn btn-danger"><i class="fa fa-book"></i> View This In Library</a></div>
                                                 </div>
                                                 <hr/>';

              }
                                                                                                            
         }//end else doc number !=0
     


}else{

$dept_project_list="SELECT * FROM PROJECTS WHERE INSTITU_ID=".$institution_id." AND DEP_ID=".$department_id." ORDER BY UPLOAD_TIME DESC";
$dept_results=mysqli_query(DB_Connection::$connection,$dept_project_list);
$docs_number=mysqli_num_rows($dept_results);
$department_uploads="";

if($docs_number==0){$department_uploads="<i class='fa fa-plug fa-2x'></i> Ooops! No documents uploaded from your department yet.";}
else{

        while($docx_results=mysqli_fetch_assoc($dept_results)){
                    
                    $doc_header=$docx_results['PROJECT_HEADER'];
                    $doc_file=$docx_results['PROJECT_FILE'];
                    $doc_id=$docx_results['PROJECT_ID'];
                    $upload_date=gaby_timeago_detector($docx_results['UPLOAD_TIME']);
                    $filter_link='<a href="documents-from-my-department?only='.$year_group.'" class="btn btn-info"> <i class="fa fa-graduation-cap"></i>Documents From My Class</a>';
                            
                    $department_uploads.='<div class="row">
                                           <div class="col-md-7 col-sm-7"><h1><i class="fa fa-file"></i> '.$doc_header.'</h1>
                                           <p>Uploaded '. $upload_date.'</p>
                                           </div>
                                           <div class="col-lg-2"><a href="user_projects/'.$doc_file.'" download="'.$doc_file.'" class="btn btn-info"><i class="fa fa-download"></i> Get This Document</a></div>
                                           <div class="col-lg-2"><a href="project_detail?details='.$doc_id.'"  class="btn btn-danger"><i class="fa fa-book"></i> View This In Library</a></div>
                                           </div>
                                           <hr/>';

        }
                                                                                                      
   }//end else doc_number!=0 for get not set

}//end else get not set


?>



<?php include("inc/header.php"); ?>
 <title><?php echo $firstname."'s Poto-Dashboard"; ?></title>
<link rel="stylesheet" href="css/dashboard.css"/>
</head>

<body <?php //echo $refresh_link; ?>>

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

	<div class="col-lg-2">
		<div class="sidebar content-box" style="display: block;">
           <ul class="nav">
                    <!-- Main menu -->
             <li class="submenu"><a><i class="fa fa-file"></i> Document Upload <span class="caret pull-right"></span></a>

                    	<ul>
                            <li><a href="poto-dashboard"><i class="fa fa-folder"></i> Upload New File</a></li>
                            <li><a href="#" data-toggle="modal" data-target="#documents"><i class="fa fa-folder"></i> My Uploads</a></li>
                            <li class="current"><a href="documents-from-my-department"><i class="fa fa-folder"></i> Documents From My Department</a></li>
                        </ul>
                    </li>
                    <li><a href="profile-settings"><i class="fa fa-gears"></i>Profile Settings</a><li>
                    <li><a href="projects" id="profile_settings"><i class="fa fa-book"></i> Poto-Library</a><li>
                     <li><a href="person-potomanto?poto987xyzpotyuisid=<?php echo $id;  ?>" ><i class="fa fa-user"></i> <span>See My Live Profile</span></a></li>
                    <li><a href="forum-landing"><i class="fa fa-comment"></i> Poto-Forum</a></li>
                     <li><a href="#"><i class="fa fa-calendar"></i> <?php echo date("d/M/y",time()); ?></a></li>
                    <li><a href="logout"><i class="fa fa-exclamation-circle"></i> Logout</a></li>
                     <li><a href="#"  onclick="alert('Feature under construction');"><!-- <i class="fa fa-paper-plane"></i> Send Quick .... --></a></li>
           </ul>
        </div>
	</div><!--end of side bar-->


  <div class="col-md-10 docs-list-col"><!--documents list-->
       <div class="departments-doc-list">
        <h3><i class="fa fa-folder"></i> List of documents uploaded by users in your department</h3>
        <h4><?php echo $filter_link; ?></h4>
         
         <?php echo $department_uploads; ?>
      
       </div>
  </div>

 


</div>


			<!--uploaded documents-->
			 <div class="modal fade" id="documents" tabindex="-1"><!--modal div begins-->
                      <div class="modal-dialog"><!--modal dialog begins-->
                        <div class="modal-content"><!-- modal-content begins -->
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                            <h3 class="modal-title">My Uploaded Files</h3>
                          </div>
                          <div class="modal-body"><!-- modal-body begins -->
                          	<ul class="nav">

                          		<?php echo $p_list; ?>
								<!-- <li><i class="fa fa-file fa-fw"></i> jsjword.docx <i class="fa fa-trash fa-fw"></i></li>
								<li><i class="fa fa-file fa-fw"></i> peter.jpg <i class="fa fa-trash fa-fw"></i></li>
								<li><i class="fa fa-file fa-fw"></i> memember.css <i class="fa fa-trash fa-fw"></i></li>
								<li><i class="fa fa-file fa-fw"></i> file.zip <i class="fa fa-trash fa-fw"></i></li> -->
							           </ul>
                            
                          </div><!-- modal-body ends -->
                        </div><!-- modal-content ends -->
                      </div><!--modal dialog ends-->
    </div><!--modal div ends-->
   



<?php include("inc/footer.php"); ?>

<script>
        new WOW().init();
</script>


<script type="text/javascript">
   $(function(){
	  $(".submenu > a").click(function(e) {
	    e.preventDefault();
		    var $li = $(this).parent("li");
		    var $ul = $(this).next("ul");

		    if($li.hasClass("open")) {
			      $ul.slideUp(350);
			      $li.removeClass("open");
		    } else {
			      $(".nav > li > ul").slideUp();
			      $(".nav > li").removeClass("open");
			      $ul.slideDown();
			      $li.addClass("open");
	      }
  });
});
</script>

<script type="text/javascript" src="js/layout.js"></script>
</body>
</html>    